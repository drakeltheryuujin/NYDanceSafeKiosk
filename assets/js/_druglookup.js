$(document).ready(function(){
    $.ajax({
        url:'http://tripbot.tripsit.me/api/tripsit/getAllDrugs',
        complete: function (response) {
            $('#search_results').html(response);
            debugger;
        },
        error: function () {
            $('#search_results').html('Bummer: there was an error!');
        },
    });
    return false;
});