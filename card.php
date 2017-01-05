<?php
  $urlArr=parse_url($_SERVER['REQUEST_URI']);
  parse_str($urlArr['query']);

  $drug_name = $card;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Information Card</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/css/styles.css">

    <meta property="fb:app_id" content="185331568606506"/>
    <meta property="og:url"                content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="<?php echo(ucfirst($drug_name) . ' Health & Safety Information from NY DanceSafe') ?>" />
    <meta property="og:description"        content="What is <?php echo $drug_name ?>? What are the effects of <?php echo $drug_name ?>? Is <?php echo $drug_name ?> addictive? Read more facts about <?php echo $drug_name ?> and its use!" />
    <meta property="og:image"              content="<?php echo('http://nydancesafe.plur-rx.com/kiosk/assets/img/' . $drug_name . '-front.jpg') ?>" />

    <meta name="twitter:card" content="<?php echo('http://nydancesafe.plur-rx.com/kiosk/assets/img/' . $drug_name . '-front.jpg') ?>">
    <meta name="twitter:site" content="@nydancesafe">
    <meta name="twitter:title" content="<?php echo(ucfirst($drug_name) . ' Health & Safety Information from NY DanceSafe') ?>">
    <meta name="twitter:description" content="What is <?php echo $drug_name ?>? What are the effects of <?php echo $drug_name ?>? Is <?php echo $drug_name ?> addictive? Read more facts about <?php echo $drug_name ?> and its use!">
    <meta name="twitter:creator" content="@nydancesafe">
    <meta name="twitter:image" content="<?php echo('http://nydancesafe.plur-rx.com/kiosk/assets/img/' . $drug_name . '-front.jpg') ?>">
    <meta name="twitter:domain" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
</head>

<body>
  <?php require("breadcrumbs.php"); ?>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '185331568606506',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  $(document).ready(function(){
    if (typeof windowLocation === 'undefined') {
      windowLocation = window.location.href;
    }
  });

</script>

  <div class="col-xs-12">
    <header class="page-header">
      <h1><?php echo(ucfirst($drug_name)) ?></h1>
    </header>
    <img id="card_front" src="assets/img/<?php echo $drug_name ?>-front.jpg" class="img-responsive" />
    <img id="card_back" src="assets/img/<?php echo $drug_name ?>-back.jpg" class="img-responsive" />

      <?php require("sharing.php"); ?>
  </div>
</body>

</html>
