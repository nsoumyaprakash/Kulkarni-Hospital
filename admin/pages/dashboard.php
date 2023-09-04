<?php require "../assets/includes/header.php"?>

<div class="container-fluid">
    <main id="main" class="main">
        <div class="pagetitle">
            <!-- <h1>Dashboard</h1> -->
            <nav>
                <ol class="breadcrumb"></ol>
            </nav>
            <!-- <h1>TODAY STATISTICS</h1> -->
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-md-12">
                    <div class="row">
                        <!-- Enquiries Card -->
                        <div class="col-md-12">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Today's Enquiries</h5>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <h6 id="tot_enquiries">0</h6>
                                            <input type="hidden" id="tot_enquiries2">
                                            <!-- <i class="bi bi-people"></i> -->
                                        </div>
                                        <div class="ps-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Enquiries Card -->

                        <!-- Enquiries -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ENQUIRIES</h5>

                                    <div id="enquiryInfoTableContainer">
                                        <div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Enquiries -->
                            </div>
                        </div>
                        <!-- End Left side columns -->
                    </div>
        </section>
    </main>
    <!-- End #main -->
</div>



<script src="../js/dashboard.js"></script>
<?php require "../assets/includes/footer.php" ?>