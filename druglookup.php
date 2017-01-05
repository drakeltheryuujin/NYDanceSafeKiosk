<?php require("header.php"); ?>

<body>
  <?php require("breadcrumbs.php"); ?>

    <div class="container">
        <form onsubmit="return false;">
            <div class="page-header">
                <h1>Drug Lookup <small>Search the tripsit database</small></h1>
            </div>
            <div class="form-group hidden">
                <input class="form-control input-lg" type="search" placeholder="Start typing a drug name here..." id="drug_search">
            </div>
        </form>
        <div class="panel">
          <div class="panel-heading">
            <h2 class="panel-title">All Drugs</h2>
            </div>
        <div class="table-responsive">
          <table class="table table-striped">
              <tbody id="drugs_list">
              </tbody>
          </table>
      </div>
      </div>

    </div>
    <div class="modal fade" id="drug_modal" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content clearfix">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modal Title</h4></div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save</button>
                </div>
            </div>
        </div>
    </div>
  <?php require("footer.php"); ?>
  <script src="assets/js/druglookup.js"></script>

</body>

</html>
