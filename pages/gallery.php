<?php include "../assets/utils/_header.php" ?>

<!-- START PAGE BANNER AND BREADCRUMBS -->
<section class="single-page-title-area" data-background="../img/bg/heading.png">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-page-title">
                    <h2>Image Gallery</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <ol class="breadcrumb">
                </ol>
            </div>
        </div>
        <!-- end row-->
    </div>
</section>
<!-- END PAGE BANNER AND BREADCRUMBS -->


<!-- START GALLERY SECTION -->
<section id="gallery" class="section-padding doctor-page">
    <div class="auto-container">
        <!-- <div class="row mb-5">
            <div class="col-lg-12">
                <div class="portfolio-filter-menu wow fadeInUp">
                    <ul id="galleryImgCat">
                        <li class="filter active" data-filter="all">
                            <i class="icofont icofont-listine-dots"></i>
                            Show All Image
                        </li>
                        <li class="filter" data-filter=".home-care">
                            <i class="icofont icofont-paralysis-disability"></i>
                            Home Care
                        </li>
                        <li class="filter" data-filter=".diabetes-solution">
                            <i class="icofont icofont-pills"></i>
                            Diabetes Solution
                        </li>
                        <li class="filter" data-filter=".bariatric-surgery">
                            <i class="icofont icofont-surgeon"></i>
                            Bariatric Surgery
                        </li>
                        <li class="filter" data-filter=".dental-medicine">
                            <i class="icofont icofont-paralysis-disability"></i>
                            Dental Medicine
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->

        <div class="portfolio-items">
            <div class="row text-center" id="galleryContainer"></div>
        </div>
        <!-- pagination -->
        <div class="row wow fadeInDown">
            <div class="col-lg-12 mt-5">
                <div class="theme-pagination">
                    <nav class="navbar justify-content-center">
                        <ul class="pagination">
                            <!-- <li class="page-item"><a class="page-link" href="#">PREV</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">NEXT</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END GALLERY SECTION -->

<script src="../js/gallery.js"></script>

<?php include "../assets/utils/_footer.php" ?>