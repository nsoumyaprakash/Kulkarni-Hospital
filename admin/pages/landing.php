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
                        <div class="card-header fs-5 fw-bold">Home Page</div>
                        <div class="card-body pt-3">
                            <form class="row g-3" id="landingForm" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <label for="orgNameInput" class="form-label">Organization Name
                                        *</label>
                                    <input type="text" class="form-control" id="orgNameInput" name="orgNameInput">
                                </div>
                                <div class="col-md-6">
                                    <label for="titleInput" class="form-label">Title
                                        *</label>
                                    <textarea class="form-control" rows="3" id="titleInput"
                                        name="titleInput"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="descInput" class="form-label">Description *</label>
                                    <textarea class="form-control" rows="3" id="descInput" name="descInput"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-file-upload">
                                        <input type="file" id="imageInput" name="imageInput">
                                        <label for="imageInput"><i class="bi bi-upload me-2"></i>Upload Logo</label>
                                    </div>
                                    <img class="img-thumbnail" id="previewEditImage" alt="Preview Image"
                                        style="display: none;">
                                    <input type="hidden" name="editImageHiddenFile" id="editImageHiddenFile">
                                    <img src="" id="storedViewImage" class="img-thumbnail">
                                </div>
                                <div class="pt-3 border-top">
                                    <button type="reset" class="btn btn-sm btn-warning me-2"><i
                                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                                    <input type="hidden" id="editLandingtId" name="editLandingtId">
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




<script src="../js/landing.js"></script>
<?php require "../assets/includes/footer.php" ?>