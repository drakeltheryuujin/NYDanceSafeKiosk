<?php require("header.php"); ?>

<body>
<?php require("breadcrumbs.php"); ?>
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/2cb-front.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/2cb-back.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/acid-front.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/acid-back.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/alcohol-front.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/alcohol-back.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/ecstasy-front.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(http://nydancesafe.plur-rx.com/kiosk/assets/img/ecstasy-back.jpg)"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="page-header">
                <h1>Drug Information Cards</h1></div>
        </div>
        <div class="container" id="drug_info">
            <div class="row">
                <div class="col-xs-4">
    <ul class="list-group">
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Acid (LSD)</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Alcohol</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Cathinones</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Cocaine</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">DMT</a></span></li>
    </ul>

</div>
                <div class="col-xs-4">
    <ul class="list-group">
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Ecstasy (MDMA)</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">GHB</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Heroin</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Ketamine</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Marijuana</a></span></li>
    </ul>
</div>
                <div class="col-xs-4">
    <ul class="list-group">
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Mushrooms (Psilocybin) </a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">NBOME </a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Nitrous Oxide </a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Poppers (Nitrites)</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Speed (Methamphetamine)</a></span></li>
        <li class="list-group-item"><span><a href="card.php" data-toggle="modal" data-target="#card_modal">Tobacco (Nicotine)</a></span></li>
    </ul>
</div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/infocards.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <div class="modal fade" id="card_modal" role="dialog" tabindex="-1">
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

</body>

</html>
