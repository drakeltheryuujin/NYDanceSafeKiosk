<ol class="breadcrumb">
    <li><a href="main.php"><span class="text-success">Home</span></a></li>
    <?php
    $crumbs = explode("/kiosk/",$_SERVER["REQUEST_URI"]);
    foreach($crumbs as $crumb){ ?>
      <li><?php echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) ); ?></li>
    <?php
    } ?>
</ol>


