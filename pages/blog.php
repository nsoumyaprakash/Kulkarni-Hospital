<?php include "../assets/utils/_header.php" ?>

<!-- START PAGE BANNER AND BREADCRUMBS -->
<section class="single-page-title-area" data-background="../img/bg/heading.png">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-page-title">
                    <h2>Latest Blog Post</h2>
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


<!-- START BLOG SECTION -->
<section id="blog" class="section-padding">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div id="allBlogsContainer">

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

            <!-- end col -->
            <aside class="col-lg-4 col-md-4 col-sm-12 col-12 pl-lg-5 pl-md-5 pl-sm-2 pl-2 mt-lg-0 mt-md-0 mt-sm-0 mt-5">
                <div class="sidebar-widget">
                    <h5 class="widget-title">Blog Serach</h5>
                    <!-- end widget tittle-->
                    <div class="blog-side-search">
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                        <form>
                            <div class="row">
                                <div class="form-group col-12">
                                    <input class="form-control" name="searcher" placeholder="Search..." type="text">
                                </div>
                                <button type="submit" class="btn blg-se-btn"><i
                                        class="icofont icofont-search-alt-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end widget -->
                <div class="sidebar-widget">
                    <h5 class="widget-title">Recent Post</h5>
                    <!-- end widget tittle-->
                    <div class="recent-post">
                        <div class="single-recent-post">
                            <a href="#"><img class="img-fluid" src="../img/gallery/recentpost1.jpg" alt=""></a>
                            <a href="#" class="icon"><i class="icofont icofont-link"></i></a>
                        </div>
                        <div class="single-recent-post">
                            <a href="#"><img class="img-fluid" src="../img/gallery/recentpost1.jpg" alt=""></a>
                            <a href="#" class="icon"><i class="icofont icofont-link"></i></a>
                        </div>
                        <div class="single-recent-post">
                            <a href="#"><img class="img-fluid" src="../img/gallery/recentpost1.jpg" alt=""></a>
                            <a href="#" class="icon"><i class="icofont icofont-link"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end widget -->
                <div class="sidebar-widget">
                    <h5 class="widget-title">Recent Comments</h5>
                    <!-- end widget tittle-->
                    <div class="servide-list">
                        <ul>
                            <li>
                                <span class="comment-author-link"><a href="#"><i class="icofont icofont-comment"></i> A
                                        Commenter</a></span>
                                <span>on</span>
                                <a href="#">Hello world!</a>
                            </li>
                            <li>
                                <span class="comment-author-link"><a href="#"><i class="icofont icofont-comment"></i> A
                                        Commenter</a></span>
                                <span>on</span>
                                <a href="#">Hello world!</a>
                            </li>
                            <li>
                                <span class="comment-author-link"><a href="#"><i class="icofont icofont-comment"></i> A
                                        Commenter</a></span>
                                <span>on</span>
                                <a href="#">Hello world!</a>
                            </li>
                            <li>
                                <span class="comment-author-link"><a href="#"><i class="icofont icofont-comment"></i> A
                                        Commenter</a></span>
                                <span>on</span>
                                <a href="#">Hello world!</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end widget -->
            </aside>
            <!-- end side bar -->
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END BLOG SECTION -->

<script src="../js/blogs.js"></script>

<?php include "../assets/utils/_footer.php" ?>