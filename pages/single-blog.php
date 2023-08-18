<?php include "../assets/utils/_header.php" ?>

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

            <?php include "../assets/utils/_blogSidebar.php" ?>

        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END BLOG SECTION -->
<script src="../js/singleBlog.js"></script>

<?php include "../assets/utils/_footer.php" ?>