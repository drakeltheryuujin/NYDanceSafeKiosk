$(document).ready(function(){
    $("#drug_info .list-group li").each(function(){
        var drugName = $(this).children("span").children("a").text().split(" ")[0].toLowerCase();
        $(this).children("span").children("a").attr("href", "card.php?card=" + drugName )

    });

    $("#drug_info .list-group li a").on("click", function(){
        drugInfoPage = $(this).attr("href");
        thisDrugName = $(this).text().split(" ")[0].toLowerCase();

        $.get( drugInfoPage , function( data ) {
          $( ".modal-body" ).html( data );
          windowLocation = window.location.origin + "/kiosk/" + this.url;
        });
    });
});
