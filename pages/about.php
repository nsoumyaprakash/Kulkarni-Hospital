<?php include "../assets/utils/_header.php" ?>

<!-- START PAGE BANNER AND BREADCRUMBS -->
<section class="single-page-title-area" data-background="../img/bg/heading.png">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-page-title">
                    <h2>About Us</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span class="lnr lnr-home"></span></a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">About us</li>
                </ol>
            </div>
        </div>
        <!-- end row-->
    </div>
</section>
<!-- END PAGE BANNER AND BREADCRUMBS -->


<!-- START ABOUT SECTION -->
<section id="about" class="section-padding">
    <div class="auto-container">
        <div class="row">
            <div id="aboutIntro"
                class="col-lg-6 col-md-6 col-sm-12 col-12 pr-lg-5 pr-md-5 pr-sm-0 pr-0 mb-lg-0 mb-md-0 mb-sm-5 mb-5 about-us-into">
            </div>
            <!-- end col -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-12" id="aboutFeaturesContainer"></div>
            <!-- end col -->
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END ABOUT SECTION -->


<!-- START VIDEO & FAQ -->
<section id="videofaq" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 pr-lg-5 pr-md-5 pr-sm-0 pr-0 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
                <div class="text-left">
                    <div class="section-title section-title-left">
                        <h3>Frequently <span>Asked Question</span></h3>
                        <span class="line"></span>
                    </div>
                </div>
                <!-- end section title -->
                <div class="panel-group faq-home-accor" id="accordion"></div>
            </div>
            <!-- end col -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="text-left">
                    <div class="section-title section-title-left">
                        <h3>Our Hospital <span>Promo Video </span></h3>
                        <span class="line"></span>
                    </div>
                </div>
                <!-- end section title -->
                <div class="youtube-promo-video-wrap">
                    <div class="youtube-promo-video-img">
                        <img class="img-fluid" src="../img/bg/video.jpg" alt="">
                    </div>
                    <div class="youtube-promo-video">
                        <a id="hospitalPromoVideo" data-title="PORTFOLIO YOUTUBE VIDEO" data-vbtype="youtube"
                            class="venobox info vbox-item" data-gall="gallu"><i
                                class="icofont icofont-youtube-play"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END VIDEO & FAQ -->


<!-- START TESTIMONIAL -->
<section id="testimonialfaq" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 text-center mx-auto">
                <div class="section-title">
                    <h3>What Our<span> Patients Says</span></h3>
                    <span class="line"></span>
                </div>
            </div>
            <!-- end section title -->
        </div>
        <div class="row" id="testimonialContainer"></div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END TESTIMONIAL -->


<!-- START CLIENT SECTION -->
<div id="client" class="client-section bg-gray">
    <div class="container">
        <div class="row">
            <div class="client-slider owl-carousel owl-theme" id="clientsContainer"></div>
        </div>
    </div>
    <!--- END CONTAINER -->
</div>
<!-- END CLIENT SECTION -->

<script src="../js/about.js"></script>

<?php include "../assets/utils/_footer.php" ?>