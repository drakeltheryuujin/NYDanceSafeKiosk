    <div class="page-header">
      <h1><small>Share to:</small></h1></div>
      <div role="group" class="text-center">
        <a class="btn btn-default btn-lg" id="email_share" tabindex="0" data-html="true" data-toggle="popover" title="Email This Information"  data-placement="top" data-content='<div class="col-xs-12"><form><h2 class="text-center">Email This Information</h2><div class="form-group has-success has-feedback"><input type="hidden" name="attachment" id="attachment" value="<?php echo('http://nydancesafe.plur-rx.com/kiosk/assets/img/' . $drug_name . '-full.jpg') ?>"><input type="text" name="subject" id="subject" placeholder="Subject" required value="DanceSafe <?php echo(ucfirst($drug_name)); ?> Information Card" class="form-control input-lg" /><i class="form-control-feedback" aria-hidden="true"></i></div><div class="form-group has-error has-feedback"><input type="email" name="email" id="email" required placeholder="Email" class="form-control input-lg" /></div><div class="form-group"><textarea rows="14" name="message" id="message" placeholder="Optional Message" class="form-control">What is <?php echo $drug_name ?>? What are the effects of <?php echo $drug_name ?>? Is <?php echo $drug_name ?> addictive? Read more facts about <?php echo $drug_name ?> and its use!</textarea></div><div class="form-group clearfix"><a class="btn btn-primary btn-lg btn-block" id="send_email" disabled="disabled">Send Email</a></div></form></div>'>Email</a>
        <!--
          <a class="btn btn-default btn-lg" id="text_share" tabindex="0" data-html="true" data-toggle="popover" title="Text This Information"  data-placement="top" data-content='<div class="col-xs-12"><form><h2 class="text-center">Text This Information</h2><div class="form-group has-success has-feedback"><input class="form-control input-lg" type="text" name="phone" id="phone" placeholder="Phone #"/></div><div class="form-group clearfix"><a class="btn btn-primary btn-lg btn-block" id="send_text" disabled="disabled">Send Text</a></div></form></div>'>Text</a>
        -->
        <a class="btn btn-default btn-lg popup share" id="fb_share" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">Facebook</a>
        <a class="btn btn-default btn-lg popup share" id="twitter_share" href="https://twitter.com/share?url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>&text=What%20is%20<?php echo $drug_name ?>%20and%20its%20effects?%20Read%20more%20facts%20about%20<?php echo $drug_name ?>%20and%20its%20use!&hashtags=nydskiosk&via=nydancesafe">
          Twitter</a>
        <a class="btn btn-default btn-lg popup share" id="tumblr_share" href="http://www.tumblr.com/share/photo?source=<?php echo('http://nydancesafe.plur-rx.com/kiosk/assets/img/' . $drug_name . '-full.jpg'); ?>&caption=What%20is%20<?php echo $drug_name ?>%20and%20its%20effects?%20Read%20more%20facts%20about%20<?php echo $drug_name ?>%20and%20its%20use&clickthru=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>">
          Tumblr</a>
    </div>
<script>

 $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

    // Prevent default anchor event
    e.preventDefault();

    // Set values for window
    intWidth = intWidth || '500';
    intHeight = intHeight || '400';
    strResize = (blnResize ? 'yes' : 'no');

    // Set title and open popup with focus on it
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
  }


  /* ================================================== */


$(function(){
  $("#email_share").popover();
  $("#text_share").popover();
  $("#email_share").on('shown.bs.popover', function () {
    attachment = $("#attachment").val()
    subject = $("#subject").val();
    message = $("#message").text()

    $("#email").keyup(function(){
      email = $(this).val();
      if (email !== "") {
        $("#send_email").removeAttr("disabled")
      }
    });

    $("#subject").change(function(){
      subject = $(this).val();
    });

    $("#message").change(function(){
      message = $(this).html();
    });
    $("#send_email").click(function(event){
        mailto = "mailto:" + email + "?&subject=" + subject + "&body="+ attachment +"%0D%0A" + windowLocation + "%0D%0A" + message + "%0D%0ASent from the New York DanceSafe Information Kiosk. Contact newyork@dancesafe.org for more information"
        $(this).attr("href", mailto)
    });

  });

  $("#text_share").on('shown.bs.popover', function () {

    $("#phone").keyup(function(){
      phone = $(this).val();
      if (phone !== "") {
        $("#send_text").removeAttr("disabled")
      }
    });

    $("#send_text").click(function(event){
        android = "sms:" + phone + "?body=What is <?php echo $drug_name ?> and its effects? Read more facts about <?php echo $drug_name ?> and its use! " + windowLocation;
        ios =  "sms:" + phone + "&body=What is <?php echo $drug_name ?> and its effects? Read more facts about <?php echo $drug_name ?> and its use! " + windowLocation;
        $(this).attr("href", android)
    });
  });

  $('.popup.share').on("click", function(e) {
    $(this).customerPopup(e);
  });

});


  document.getElementById('fb_share').onclick = function(event) {
  event.preventDefault();

    FB.ui({
      method: 'share',
      display: 'popup',
      href: windowLocation,
    }, function(response){});
}

</script>
