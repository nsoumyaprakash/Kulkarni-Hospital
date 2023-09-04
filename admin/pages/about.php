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
                        <div class="card-header d-flex justify-content-between">
                            <span class="fs-5 fw-bold">About</span>
                            <div>
                                <button class="btn btn-sm btn-primary ms-3" data-bs-toggle="offcanvas"
                                    data-bs-target="#addAboutFeaturesOffcanvas"
                                    aria-controls="addAboutFeaturesOffcanvas"><i class="bi bi-plus-lg me-1"></i>Add
                                    Features</button>
                            </div>
                        </div>

                        <div class="card-body pt-3">
                            <form class="row g-3" id="aboutForm">
                                <div class="col-md-6">
                                    <label for="titleInput" class="form-label">Title
                                        *</label>
                                    <input type="text" class="form-control" id="titleInput" name="titleInput">
                                </div>
                                <div class="col-md-6">
                                    <label for="descInput" class="form-label">Description *</label>
                                    <textarea class="form-control" rows="3" id="descInput" name="descInput"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="datePlaceInput" class="form-label">Date and Place
                                        *</label>
                                    <input type="text" class="form-control" id="datePlaceInput" name="datePlaceInput">
                                </div>
                                <div class="col-md-6">
                                    <label for="videoLinkInput" class="form-label">Video Link *</label>
                                    <input type="text" class="form-control" id="videoLinkInput" name="videoLinkInput">
                                </div>
                                <!-- Sub Menu -->
                                <div class="col-md-12">
                                    <a class="btn btn-sm btn-info" data-bs-target="#addSubMenu"
                                        data-bs-toggle="collapse"><span>Add Features</span><i
                                            class="bi bi-chevron-down ms-2"></i>
                                    </a>
                                    <div id="addSubMenu" class="collapse">
                                        <div class="card mt-2" style="background: #bfc7f26b;">
                                            <div class="card-body p-2">
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <label for="addSubMenuTitleInput" class="form-label">Title
                                                            *</label>
                                                        <input type="text" class="form-control"
                                                            id="addSubMenuTitleInput">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="custom-select-wrapper">
                                                            <a role="button" data-bs-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div id="showEditIcons" class="custom-select">Select
                                                                    Icon *</div>
                                                                <input type="hidden" id="editIcons" name="editIcons">
                                                            </a>
                                                            <div class="dropdown-menu" id="editIconsMenu"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="addSubMenuDesc"
                                                            class="form-label">Description</label>
                                                        <textarea class="form-control" rows="3" id="addSubMenuDesc"
                                                            name="addSubMenuDesc"></textarea>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            id="addSubMenuItemsButton"><i
                                                                class="bi bi-plus-lg me-1"></i>Add</button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mt-2" id="viewSubMenuItemsContainer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3 border-top">
                                    <button type="reset" class="btn btn-sm btn-warning me-2"><i
                                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                                    <input type="hidden" id="editAboutId" name="editAboutId">
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




<script src="../js/about.js"></script>

<?php require "../assets/includes/footer.php" ?>