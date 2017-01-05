$(document).ready(function(){
    $("#drug_info .list-group li").each(function(){
        var drugName = $(this).children("span").children("a").text().split(" ")[0].toLowerCase();
        //$(this).children("span").children("a").attr("href", "cards/" + drugName + ".html")
        $(this).children("span").children("a").attr("href", "cards/" + drugName + ".html")

    });
    
    $("#drug_info .list-group li a").on("click", function(){
        drugInfoPage = $(this).attr("href");
        thisDrugName = $(this).text().split(" ")[0].toLowerCase();
        
        $.get( drugInfoPage, { card: thisDrugName }, function( data ) {
          $( ".modal-body" ).html( data );
            debugger;
        });
    });
});