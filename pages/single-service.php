<?php include "../assets/utils/_header.php" ?>

<!-- START PAGE BANNER AND BREADCRUMBS -->
<section class="single-page-title-area" data-background="../img/bg/heading.png">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-page-title">
                    <h2>Single Service Details</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <ol class="breadcrumb"></ol>
            </div>
        </div>
        <!-- end row-->
    </div>
</section>
<!-- END PAGE BANNER AND BREADCRUMBS -->


<!-- START SERVICE SECTION -->
<section id="service" class="section-padding">
    <div class="auto-container">
        <div class="row">

            <?php include "../assets/utils/_serviceSidebar.php" ?>

            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="image-tab">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pr-0 mb-2">
                            <div id="tabsJustifiedContent" class="tab-content"></div>
                        </div>
                        <div class="col-lg-3 col-md-3 c0l-sm-12 col-xs-12 pr-lg-3 pr-md-3 pr-sm-0 pr-0">
                            <ul id="tabsJustified" class="nav nav-tabs text-center"></ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12" id="singleServiceContainer"></div>
                </div>
            </div>
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END SERVICE SECTION -->

<!-- SINGLE DOCTOR PROMO -->
<div class="single-doc-promo bg-theme mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="single-doc-promo-box-img">
                    <img class="img-fluid" src="../img/bg/image-420x575.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="single-doc-promo-box">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-doc-promo-content">
                                <h5>If you need any home service</h5>
                                <p>Feel free to call us 24hr emergency number</p>
                                <a href="tel:+88 315 67 39"><i class="icofont icofont-phone"></i>+88 315 67 39</a>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4">
                            <a href="tel:+88 315 67 39" class="single-doc-promo-btn fadeInUp animated">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SINGLE DOCTOR PROMO -->

<script src="../js/singleService.js"></script>

<?php include "../assets/utils/_footer.php" ?>