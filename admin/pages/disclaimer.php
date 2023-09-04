<?php require "../assets/includes/header.php"?>

<div class="container-fluid">
    <main id="main" class="main">
        <div class="pagetitle">
            <!-- <h1>Site Settings</h1> -->
            <nav>
                <ol class="breadcrumb"></ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-5 fw-bold">Disclaimer</div>
                        <div class="card-body pt-3">
                            <form class="row g-3" id="disclaimerForm">

                                <div class="col-md-12">
                                    <label for="privacyPolicyInput" class="form-label">Privacy Policy *</label>
                                    <textarea class="form-control" rows="4" id="privacyPolicyInput"
                                        name="privacyPolicyInput"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="termsAndConditionInput" class="form-label">Terms And Condition *</label>
                                    <textarea class="form-control" rows="4" id="termsAndConditionInput"
                                        name="termsAndConditionInput"></textarea>
                                </div>
                                <div class="pt-3 border-top">
                                    <button type="reset" class="btn btn-sm btn-warning me-2"><i
                                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                                    <input type="hidden" id="editDisclaimerId" name="editDisclaimerId">
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="bi bi-save2 me-1"></i>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Left side columns -->
            </div>
        </section>
    </main>
    <!-- End #main -->
</div>




<script src="../js/disclaimer.js"></script>
<?php require "../assets/includes/footer.php" ?>