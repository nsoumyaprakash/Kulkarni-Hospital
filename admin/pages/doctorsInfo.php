<?php require "../assets/includes/header.php"?>

<!-- Add Doctors -->
<div class="modal fade" id="addDoctorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="addDoctorModalLabel">Add Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addDoctorForm" enctype="multipart/form-data">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Name *" id="addName" name="addName">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Speciality *" id="addSpeciality"
                                name="addSpeciality">
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="addDept" id="addDept"></select>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="About" rows="3" id="addAbout"
                                name="addAbout"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-check-label" for="addStatus">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="addStatus" name="addStatus">
                                <label class="form-check-label" id="addStatusOption">Draft</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="custom-file-upload">
                                <input type="file" id="addImageInput" name="addImageInput">
                                <label for="addImageInput"><i class="bi bi-upload me-2"></i>Upload
                                    Image</label>
                            </div>
                            <img class="img-thumbnail" id="previewImage" alt="Preview Image" style="display: none;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="addDoctorCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Doctors -->
<div class="modal fade" id="editDoctorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editDoctorModalLabel">Edit Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDoctorForm" enctype="multipart/form-data">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Name *" id="editName" name="editName">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Speciality *" id="editSpeciality"
                                name="editSpeciality">
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="editDept" id="editDept"></select>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="About" rows="3" id="editAbout"
                                name="editAbout"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-check-label" for="editStatus">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="editStatus" name="editStatus">
                                <label class="form-check-label" id="editStatusOption">Draft</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="custom-file-upload">
                                <input type="file" id="editImageInput" name="editImageInput">
                                <label for="editImageInput"><i class="bi bi-upload me-2"></i>Upload
                                    Image</label>
                            </div>
                            <img class="img-thumbnail" id="previewEditImage" alt="Preview Image" style="display: none;">
                            <input type="hidden" name="editImageHiddenFile" id="editImageHiddenFile">
                            <img src="" id="storedViewImage" class="img-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="editDoctorCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editDoctorId" id="editDoctorId">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save2 me-1"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Section Ends -->

<div class="container-fluid">
    <main id="main" class="main">
        <div class="pagetitle">
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
                        <div class="card-header d-flex justify-content-between">
                            <span class="fs-5 fw-bold">Doctors</span>
                            <div>
                                <button class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                                    data-bs-target="#addDoctorModal" aria-controls="addDoctorModal"><i
                                        class="bi bi-plus-lg me-1"></i>Add
                                    New</button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id='doctorsTableContainer'>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Left side columns -->
            </div>
        </section>
    </main>
    <!-- End #main -->
</div>



<script src="../js/doctor.js"></script>
<?php require "../assets/includes/footer.php" ?>