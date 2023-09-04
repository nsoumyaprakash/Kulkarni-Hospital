<?php require "../assets/includes/header.php"?>

<div class="container-fluid">
    <main id="main" class="main">
        <div class="pagetitle">
            <!-- <h1>Dashboard</h1> -->
            <nav>
                <ol class="breadcrumb"></ol>
            </nav>
            <!-- <h1>Contact Info</h1> -->
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-md-12">

                    <div class="card">
                        <h5 class="card-header">Contact Info</h5>
                        <div class="card-body p-2">
                            <form id="contactInfoForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mapIframe" class="form-label">Map Link</label>
                                        <input type="text" class="form-control" id="mapIframe" name="mapIframe"
                                            placeholder="Enter Google Map Link">
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6 mb-3">
                                        <label for="addressText" class="form-label">Address</label>
                                        <textarea type="text" class="form-control" id="addressText" name="addressText"
                                            placeholder="Enter Address Text" rows="2"></textarea>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label for="emailText" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emailText" name="emailText"
                                            placeholder="Enter Email Text">
                                    </div>
                                    <!-- Call Number -->
                                    <div class="col-md-6 mb-3">
                                        <label for="phoneText" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phoneText" name="phoneText"
                                            placeholder="Enter Cell Text">
                                    </div>
                                    <!-- Social Links -->
                                    <div class="col-md-12 mb-3">
                                        <p class="fs-5">Social Links</p>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="facebook" name="facebook"
                                                    placeholder="Facebook Link">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="instagram" name="instagram"
                                                    placeholder="Instagram Link">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="twitter" name="twitter"
                                                    placeholder="Twitter Link">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                                    placeholder="Linkedin Link">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="otherLink" class="form-label">Opening Hours</label>
                                        <textarea type="text" class="form-control" id="otherLink" name="otherLink"
                                            placeholder="Enter Opening Hours" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-check-label" for="addStatus">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="addStatus"
                                                name="addStatus">
                                            <label class="form-check-label" id="addStatusOption">Draft</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3 border-top">
                                    <button type="reset" class="btn btn-sm btn-warning me-2"><i
                                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                                    <input type="hidden" id="editContactInfoId" name="editContactInfoId">
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="bi bi-save2 me-1"></i>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
</div>



<script src="../js/contact.js"></script>
<?php require "../assets/includes/footer.php" ?>