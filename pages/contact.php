<?php include "../assets/utils/_header.php" ?>


<!-- START PAGE BANNER AND BREADCRUMBS -->
<section class="single-page-title-area" data-background="../img/bg/heading.png">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-page-title">
                    <h2>Contact Us Page</h2>
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

<!-- GOOGLE MAP -->
<div class="gmap_canvas" id="locationMap"></div>
<!-- END GOOGLE MAP -->

<!-- START CONTACT SECTION -->
<section id="contact" class="section-padding">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="contact-title">
                    <h4>You Have Any question? Simply Send Us Message</h4>
                    <hr>
                </div>
                <div class="contact-form mt-4">
                    <form id="contactEnquiryForm" class="form">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Name</label>
                                <span class="form-icon"><i class="icofont icofont-user-alt-5"></i></span>
                                <input name="cname" class="form-control form-controlb" id="cname" required="required"
                                    type="text">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <span class="form-icon"><i class="icofont icofont-envelope"></i></span>
                                <input name="cmail" class="form-control form-controlb" id="cmail" required="required"
                                    type="email">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Number</label>
                                <span class="form-icon"><i class="icofont icofont-telephone"></i></span>
                                <input name="cnumber" class="form-control form-controlb" id="cnumber"
                                    required="required" type="text">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Subject</label>
                                <span class="form-icon"><i class="icofont icofont-ui-email"></i></span>
                                <input name="csubject" class="form-control form-controlb" id="csubject"
                                    required="required" type="text">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea rows="6" name="cmessage" class="form-control" id="cmessage"
                                    placeholder="Your Message Here..." required="required"></textarea>
                            </div>
                            <div class="form-group col-lg-12 mb0">
                                <div class="actions">
                                    <input value="Submit Message" name="submit" id="submitButton"
                                        class="btn btn-lg btn-contact-bg" title="Click here to submit your message!"
                                        type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 pl-lg-5 pl-md-5 pl-sm-2 pl-2 mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                <div class="contact-title">
                    <h4>Get In Touch</h4>
                    <hr>
                </div>
                <div class="address-box mt-4" id="addressBox"></div>
                <div class="free-quote-box mt-4">
                    <h6>Ask question</h6>
                    <h3>Support is ready</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy. </p>
                    <a href="tel:+88-675-128763">Free quote <i class="icofont icofont-simple-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END CONTACT SECTION -->

<!-- SINGLE DOCTOR PROMO -->
<div class="single-doc-promo bg-theme mt-lg-5 mt-md-3 mt-sm-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="single-doc-promo-box-img">
                    <img class="img-fluid" src="../img/bg/doc-promo.png" alt="">
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
                            <a href="tel:+88 315 67 39" class="single-doc-promo-btn fadeInUp animated">Call Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SINGLE DOCTOR PROMO -->

<script src="../js/contact.js"></script>

<?php include "../assets/utils/_footer.php" ?>