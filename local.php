<?php require("header.php");?>

<body>
  <?php require("breadcrumbs.php"); ?>

    <div class="container">
        <div class="page-header">
            <h1>Local Test Results </h1>
            <form>
                <select class="form-control" id="state_select">
                    <option value="23" selected="">New York</option>
                    <option value="112">New Jersey</option>
                    <option value=79"">Pennsylvania</option>
                    <option value="123">Connecticut</option>
                </select>
            </form>
            <div id="test_results">
            </div>
        </div>
    </div>
<?php require("footer.php"); ?>
<script>
$(document).ready(function(){
  $("#test_results").load("https://www.ecstasydata.org/search.php?name=&field_test=&substance1=&substance2=&id=&color=&colorexact=0&city=&source=&m1=&y1=&m2=&y2=&state=23&country=&sold_as_ecstasy=both #ContentWrapper")

  $("#state_select").change(function(){
    var value = $(this).val();

    $("#test_results").load(""+ value +"&country=&sold_as_ecstasy=both #ContentWrapper")
    $.ajax({

      url:'https://www.ecstasydata.org/search.php?name=&field_test=&substance1=&substance2=&id=&color=&colorexact=0&city=&source=&m1=&y1=&m2=&y2=&state='+ value +"&country=&sold_as_ecstasy=both",
      type: 'GET',
      contentType: "application/json; charset=utf-8",
      dataType: 'json',
      complete: function ( response ) {
      }
    });
  });
});
</script>

</body>

</html>
