$(document).ready(function(){

    drugList = []
    thisDrug = "";
    drugNamePage = "";

    $.ajax({
      url:'http://nydancesafe.plur-rx.com/kiosk/assets/js/getAllDrugs.json',
      type: 'GET',
      contentType: "application/json; charset=utf-8",
      data: "{}",
      dataType: 'json',
      complete: function ( response ) {
        $(response).each(function(key, value){
          var jsonObj = JSON.parse(value.responseText);
          var drugNames = jsonObj["data"]
          $(drugNames).each(function(key, value){
            var keys = Object.keys(value)
            $(keys).each(function (index, value) {
              drugList.push(value);
            });
          });
        });
        drugList.sort();
        drugList.forEach(function(drugName){
          var html = '<tr><td><a data-toggle="modal" data-target="#drug_modal" href="drug.php">' + drugName + '</td></tr>'
          $("#drugs_list").append(html)
          $(".form-group.hidden").removeClass("hidden")
        });
        $("#drugs_list tr td a").each(function(){
          var drugName = $(this).text().replace(/[\. ,:-]+/g, "-");
          $(this).attr("href", "drug.php?drug=" + drugName )
        });

        $("#drug_search").on("keyup", function(){
          var searchText = $(this).val();
          $('#drugs_list a:not(:contains('+ searchText +'))').parents("tr").hide()
          $('#drugs_list a:contains('+ searchText +')').parents("tr").show()
        });

        $("#drugs_list td a").on("click", function(){
          drugNamePage = $(this).attr("href");
          thisDrug = $(this).text()

          $.get( drugNamePage , function( data ) {
            $( ".modal-content" ).html( data );
          });
        });
      },
      error: function () {
        $('#search_results').html('Bummer: there was an error!');
      },
    });
    return false;

});
