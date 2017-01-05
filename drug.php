<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Info</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/css/styles.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){

  //add global variables here
  loadData( thisDrug )

  displayDrug = "";

  function loadData( thisDrug ) {
    $.ajax({

    url:'http://nydancesafe.plur-rx.com/kiosk/assets/js/getAllDrugs.json',
    type: 'GET',
    contentType: "application/json; charset=utf-8",
    dataType: 'json',
    complete: function ( response ) {
        $(response).each(function(key, value){
          var jsonObj = JSON.parse(value.responseText);
          var drugNames = jsonObj["data"]
          $(drugNames).each(function(key, value){
            displayDrug = value[thisDrug]

            if (typeof displayDrug !== 'undefined') {
              var drugName = displayDrug["pretty_name"];
              $(".drug-name").text(drugName);

              var drugDescription = displayDrug["properties"]["summary"];
              $(".drug-description").text(drugDescription);

              if (displayDrug["aliases"]) {
                var drugAliases = displayDrug["aliases"].join(", ");
                $(".drug-aliases").text(drugAliases);
              };

              labels = []
              var drugCategories = $(displayDrug["categories"]).each(function(index, category){
                labels.push('<span class="label label-info">'+ category + '</span>')
              });
              $(".drug-categories").html(labels.join(" "));

              if (displayDrug["properties"]["effects"]) {
                var drugEffects = displayDrug["properties"]["effects"]

                $(".drug-effects").text(drugEffects);
              } else if (displayDrug["formatted_effects"]) {
                var drugEffects = displayDrug["formatted_effects"].join(" ")

                $(".drug-effects").text(drugEffects);
              } else {
                $(".drug-effects").text("Drug effects not available for this substance.");
              }

              if (displayDrug["properties"]["onset"]) {
                var drugOnset = displayDrug["properties"]["onset"]

                $(".drug-onset").text(drugOnset)

              }
              if (displayDrug["properties"]["duration"]) {
                var drugDuration = displayDrug["properties"]["duration"]

                $(".drug-duration").text(drugDuration);
              }

              if (displayDrug["properties"]["after-effects"]) {
                var drugAfterEffects = displayDrug["properties"]["after-effects"]

                $(".drug-after-effects").text(drugAfterEffects);
              }

              if (displayDrug["properties"]["general-advice"]) {
                var drugAdvice = displayDrug["properties"]["general-advice"]

                $(".drug-advice").text(drugAdvice);
              }

              if (displayDrug["dose_note"]) {
                var drugDoseNote = displayDrug["dose_note"]

                $(".drug-dose-note").text(drugDoseNote);
              }

              var drugDose = displayDrug["formatted_dose"]

              $.each(drugDose, function(key, value) {

                var doseTable = '<table class="table table-bordered">'
                if (key !== "none") {
                  var doseHeader = '<thead><tr><th colspan="2">'+ key + '</th><tr></thead>';
                } else {
                  var doseHeader = '<thead><tr><th colspan="2"></th><tr></thead>';
                }
                tableRows = []
                var tableEnd = '</table>'

                $.each(value, function(amount, units) {
                  var doses = '<tr><td>'+ amount +'</td><td>'+ units +'</td></tr>'
                  tableRows.push(doses)

                });

                var tableRowHTML = tableRows.join("")
                var drugDoseHTML = doseTable + doseHeader + tableRowHTML + tableEnd
                $(".drug-dose").append(drugDoseHTML)

              });

              if (displayDrug["combos"]) {
                var drugCombos = displayDrug["combos"]; //parse into colored categories

                var dangerous = [],
                    unsafe = [],
                    caution = [],
                    lowIncreased = [],
                    lowDecreased = [],
                    noSynergy = []

                $.each(drugCombos, function(key, value) {
                  if (value["status"] == "Dangerous") {
                    dangerous.push('<li><a data-target="#drug_modal" href="drug.php?drug='+ drugName +'">'+ key +'</a></li>')
                  }
                  else if (value["status"] == "Unsafe") {
                    unsafe.push('<li><a data-target="#drug_modal" href="drug.php?drug='+ drugName +'">'+ key +'</a></li>')
                  }
                  else if (value["status"] == "Caution") {
                    caution.push('<li><a data-target="#drug_modal" href="drug.php?drug='+ drugName +'">'+ key +'</a></li>')
                  }
                  else if (value["status"] == "Low Risk & Synergy") {
                    lowIncreased.push('<li><a data-target="#drug_modal" href="drug.php?drug='+ drugName +'">'+ key +'</a></li>')
                  }
                  else if (value["status"] == "Low Risk & Decrease") {
                    lowDecreased.push('<li><a data-target="#drug_modal" href="drug.php?drug='+ drugName +'">'+ key +'</a></li>')
                  }
                  else if (value["status"] == "Low Risk & No Synergy") {
                    noSynergy.push('<li><a data-target="#drug_modal" href="drug.php?drug='+ drugName +'">'+ key +'</a></li>')
                  } else {
                    console.log("No information on drug combinations")
                  }
                });
                $(".drug-dangerous").html(dangerous.join(" "))
                $(".drug-unsafe").html(unsafe.join(" "))
                $(".drug-caution").html(caution.join(" "))
                $(".drug-increased").html(lowIncreased.join(" "))
                $(".drug-decreased").html(lowDecreased.join(" "))
                $(".drug-nosynergy").html(noSynergy.join(" "))

                $(".alert ul li a").each(function(){
                  var drugName = $(this).text().replace(/[\. ,:-]+/g, "-");
                  $(this).attr("href", "drug.php?drug=" + drugName )
                });


                $.ajax({
                  url:'https://en.wikipedia.org/w/api.php?action=query&prop=pageimages&format=json&piprop=original&titles=' + drugName,
                  type: 'GET',
                  contentType: "application/json; charset=utf-8",
                  dataType: 'jsonp',
                  complete: function ( response ) {
                    $(response).each(function(key, value){
                      var wikiId = value.responseJSON["query"]["pages"]
                      keys = ""
                      $(wikiId).each(function(key, value){
                        keys = Object.keys(value).toString();
                      });
                      if (typeof value.responseJSON["query"]["pages"][keys]["thumbnail"] !== 'undefined') {
                        var imageUrl = value.responseJSON["query"]["pages"][keys]["thumbnail"]["original"]
                        $(".drug-image").html('<img src="'+ imageUrl +'" class="img-responsive center-block" alt='+ drugName +'>')
                      } else {
                        $(".drug-image").html('<h2><span class="label label-primary">No Image</span></h2>')
                      }
                    });
                  },
                  error: function () {
                    $(".drug-image").html('<h2><span class="label label-default">No Image</span></h2>')
                  },
                });

                $(".alert ul li a").on("click", function( event ){
                  event.preventDefault();
                  drugNamePage = $(this).attr("href");
                  thisDrug = $(this).text()

                  $(".modal-content").load(drugNamePage, function() {
                       $("#drug_modal").modal("show");
                       loadData( thisDrug )
                  });
                });
              } else {
                $(".drug-combos .panel-body").html('<span>Drug interaction information not available for this substance</span>')
              }
            } // not undefined
          });
        });
      },
    });
  };

});

  </script>

<body>
    <div class="col-xs-12">
      <div class="page-header text-center">
          <h1>
              <span class="drug-name"></span>
              <br/>
              <small class="drug-aliases"></small>
          </h1>
          <div class="row">
            <div class="col-xs-6 col-md-10 col-xs-offset-3 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-body bg-white">
                    <div class="row">
                      <div class="drug-image"></div>
                    </div>
                  </div>
                  <div class="panel-footer">
                    <div class="row">
                      <div class="col-xs-12">
                        <p class="drug-categories"></p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
              <div class="panel-body">
                <span class="drug-description lead"></span>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Effects of this Substance</h3>
              </div>
              <div class="panel-body">
                <p class="drug-effects"></p>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Dose </h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive drug-dose">
            </div>
            <span class="drug-advice text-muted"></span>
            </div>
            <div class="panel-footer">
              <span class="drug-dose-note"></span>
            </div>
          </div>
        </div>
      <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Duration </h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                      <tr>
                          <td>Onset </td>
                          <td class="drug-onset"></td>
                      </tr>
                      <tr>
                          <td>Duration </td>
                          <td class="drug-duration"></td>
                      </tr>
                      <tr>
                          <td>After Effects </td>
                          <td class="drug-after-effects"></td>
                      </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-default drug-combos">
          <div class="panel-heading">
            <h3 class="panel-title">
              Interactions with other Substances
            </h3>
          </div>
          <div class="panel-body">
            <div class="alert alert-danger">
              <strong>Dangerous: Highly likely to cause serious problems or have adverse consequences (such as death)</strong>
              <ul class="drug-dangerous"></ul>
            </div>
            <div class="alert alert-warning">
              <strong>Unsafe: Likely to cause problems or have adverse consequences</strong>
              <ul class="drug-unsafe"></ul>
            </div>
            <div class="alert alert-caution">
              <strong>Caution: Moderately risky. May have adverse consequences.</strong>
              <ul class="drug-caution"></ul>
            </div>
            <div class="alert alert-success">
              <strong>Low Risk & Increased Effects: May increase effects of initial substance</strong>
              <ul class="drug-increased"></ul>
            </div>
            <div class="alert alert-info">
              <strong>Low Risk & Decreased Effects: May decrease effects of initial substance</strong>
              <ul class="drug-decreased"></ul>
            </div>
            <div class="alert alert-default">
              <strong>Low Risk & No Synergy: Mostly benign</strong>
              <ul class="drug-nosynergy"></ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="assets/js/druglookup.js"></script>
