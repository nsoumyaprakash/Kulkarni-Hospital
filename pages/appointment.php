<?php include "../assets/utils/_header.php" ?>

<!-- START PAGE BANNER AND BREADCRUMBS -->
<section class="single-page-title-area" data-background="../img/bg/heading.png">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="single-page-title">
                    <h2>Appointment</h2>
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


<!-- START APPOINTMENT SECTION -->
<section id="appointment" class="section-padding">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 text-center mx-auto">
                <div class="section-title">
                    <h3>Get Appointment <span>In 4 Simple Step</span></h3>
                    <span class="line"></span>
                </div>
            </div>
            <!-- end section title -->
        </div>
        <div class="appointment-line">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-5">
                    <div class="single-step text-center">
                        <div class="single-step-icon">
                            <i class="icofont icofont-hospital"></i>
                        </div>
                        <h5>Search For Department</h5>
                        <p>Select a Department.</p>
                    </div>
                </div>
                <!-- end single step -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-5">
                    <div class="single-step text-center">
                        <div class="single-step-icon">
                            <i class="icofont icofont-job-search"></i>
                        </div>
                        <h5>Search For Doctor</h5>
                        <p>Select a doctor.</p>
                    </div>
                </div>
                <!-- end single step -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-5">
                    <div class="single-step text-center">
                        <div class="single-step-icon">
                            <i class="icofont icofont-pencil"></i>
                        </div>
                        <h5>Fill Out The From</h5>
                        <p>Fill the details correctly.</p>
                    </div>
                </div>
                <!-- end single step -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-5">
                    <div class="single-step text-center">
                        <div class="single-step-icon">
                            <i class="icofont icofont-verification-check"></i>
                        </div>
                        <h5>Appointment Done</h5>
                        <p>Click on book appointment.</p>
                    </div>
                </div>
                <!-- end single step -->
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="appointment-form-ma">
                    <form id="bookApptForm">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Hospital</label>
                                <select class="form-control" id="apptHospital" name="apptHospital" required>
                                    <option value="kul123" selected>Kulkarni Medzone</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Select Department</label>
                                <select class="form-control" id="apptDepartment" name="apptDepartment" required>
                                    <option value="" selected>Select Department</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Select Doctor</label>
                                <select class="form-control" id="apptDoctor" name="apptDoctor" required>
                                    <option value="" selected>Select Doctor</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Select Date</label>
                                <input type="text" id="apptDatepicker" name="apptDateTime"
                                    class="form-control datepicker" placeholder="Click Calender Icon" required>
                            </div>
                            <div class="form-group col-lg-6 mt-2">
                                <input type="text" class="form-control" id="apptPatientName" name="apptPatientName"
                                    placeholder="Patient Name" required>
                            </div>
                            <div class="form-group col-lg-6 mt-2">
                                <input type="email" class="form-control" id="apptPatientEmail" name="apptPatientEmail"
                                    placeholder="Your Email" required>
                            </div>
                            <div class="form-group col-lg-6 mt-2">
                                <input type="text" class="form-control" id="apptPatientPhone" name="apptPatientPhone"
                                    placeholder="Phone Number" required>
                            </div>
                            <div class="form-group col-lg-6 mt-2">
                                <input type="text" class="form-control" id="apptPatientAddress"
                                    name="apptPatientAddress" placeholder="Your Address" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <textarea rows="6" class="form-control" id="apptPatientMessage"
                                    name="apptPatientMessage" placeholder="Your Message" required="required"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" class="btn btn-apfm">Book Appointment <i
                                        class="icofont icofont-thin-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END APPOINTMENT SECTION -->


<!-- START APPOINTMENT INFO -->
<section class="appointment-section section-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 d-lg-block d-md-block d-sm-none d-none">
                <div class="appointment-image">
                    <img src="../img/bg/single-doc3.png" alt="">
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 pr-5">
                        <h4>Reach Us</h4>
                        <p>Now you can connect us through internet.</p>
                        <div class="single-quote">
                            <i class="icofont icofont-xray"></i>
                            <h5>INTERNATIONAL PATIENTS</h5>
                            <p>Our patients are across the glove.</p>
                        </div>
                        <div class="single-quote">
                            <i class="icofont icofont-ui-network"></i>
                            <h5>VIRTUAL TOUR</h5>
                            <p>You can reach us using virtual platforms.</p>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 pr-5">
                        <h4>Get Facilities</h4>
                        <p>Now you can get all these facilities online.</p>
                        <div class="single-quote">
                            <i class="icofont icofont-laboratory"></i>
                            <h5>ACCESS LABREPORTS</h5>
                            <p>Get your test reports instantly.</p>
                        </div>
                        <div class="single-quote">
                            <i class="icofont icofont-briefcase-alt-2"></i>
                            <h5>BOASTER PACKAGE</h5>
                            <p>Get extra facilities using our packages.</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END APPOINTMENT INFO -->

<script src="../js/appointment.js"></script>

<?php include "../assets/utils/_footer.php" ?>