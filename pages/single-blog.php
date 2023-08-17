<?php
	include "../assets/utils/_header.php";
?>

<!-- START PAGE BANNER AND BREADCRUMBS -->
<section class="single-page-title-area" data-background="../img/bg/heading.png">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-page-title">
                    <h2>Single Blog Post</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span class="lnr lnr-home"></span></a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
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
                <div id="singleBlogContainer"></div>
                <div class="blog-single-comment-list mt-5">
                    <h4>Comments</h4>
                    <hr>
                    <div class="commet-list-content">
                        <ul class="commentlist" id="blogCommentList">
                            <p>No Comments Aviailable! Be the first to post a comment</p>
                        </ul>
                    </div>
                </div>
                <div class="blog-single-comment-form mt-5">
                    <h4>Leave a Message</h4>
                    <hr>
                    <div class="blog-single-cform">
                        <form id="blogCommentForm">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <span class="form-icon"><i class="icofont icofont-user-alt-5"></i></span>
                                    <input name="aname" class="form-control form-controlb" id="afirst-name"
                                        placeholder="Your Name" required="required" type="text">
                                </div>
                                <div class="form-group col-lg-4">
                                    <span class="form-icon"><i class="icofont icofont-envelope"></i></span>
                                    <input name="aemail" class="form-control form-controlb" id="aemail"
                                        placeholder="Your Email" required="required" type="email">
                                </div>
                                <div class="form-group col-lg-4">
                                    <span class="form-icon"><i class="icofont icofont-globe"></i></span>
                                    <input name="website" class="form-control form-controlb" id="website"
                                        placeholder="Your Website" type="text">
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea rows="6" name="rmessage" class="form-control" id="adescription"
                                        placeholder="Your Message Here..." required="required"></textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <button title="Click here to submit your message!" class="btn btn-lg btn-app-form"
                                        type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
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
                            <a href="#"><img class="img-fluid" src="../img/gallery/Bone3.jpg" alt=""></a>
                            <a href="#" class="icon"><i class="icofont icofont-link"></i></a>
                        </div>
                        <div class="single-recent-post">
                            <a href="#"><img class="img-fluid" src="../img/gallery/Bone3.jpg" alt=""></a>
                            <a href="#" class="icon"><i class="icofont icofont-link"></i></a>
                        </div>
                        <div class="single-recent-post">
                            <a href="#"><img class="img-fluid" src="../img/gallery/Bone3.jpg" alt=""></a>
                            <a href="#" class="icon"><i class="icofont icofont-link"></i></a>
                        </div>
                    </div>
                </div>
                <!-- <div class="sidebar-widget">
                    <h5 class="widget-title">Tag List</h5> -->
                <!-- end widget tittle-->
                <!-- <div class="tags-lists">
                        <span><a href="#">cancer</a></span>
                        <span><a href="#">care</a></span>
                        <span><a href="#">healthy</a></span>
                        <span><a href="#">check</a></span>
                        <span><a href="#">general</a></span>
                        <span><a href="#">surgery</a></span>
                        <span><a href="#">Diabetes</a></span>
                        <span><a href="#">Urology</a></span>
                    </div>
                </div> -->
                <!-- end widget -->
            </aside>
            <!-- end side bar -->
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END BLOG SECTION -->
<script src="../js/singleBlog.js"></script>

<?php include "../assets/utils/_footer.php" ?>