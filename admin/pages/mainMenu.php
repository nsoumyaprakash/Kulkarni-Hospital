<?php require "../assets/includes/header.php"?>

<!-- Add Menu Item Modal -->
<div class="modal fade" id="menuManagementAddMainMenuItemModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="menuManagementAddMainMenuItemModalLabel">Add Menu Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addMainMenuItemForm">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="addMainMenuSlNo" class="form-label">Sl. No. *</label>
                            <input type="number" class="form-control" id="addMainMenuSlNo" required>
                        </div>
                        <div class="col-md-5">
                            <label for="addMainMenuTitleInput" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="addMainMenuTitleInput" required>
                        </div>
                        <div class="col-md-5">
                            <label for="addSlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="addSlug">
                        </div>


                        <!-- Sub Menu -->
                        <div class="col-md-12">
                            <a class="btn btn-sm btn-info" data-bs-target="#menuManagementAddSubMenu"
                                data-bs-toggle="collapse"><span>Sub-Menu</span><i class="bi bi-chevron-down ms-2"></i>
                            </a>
                            <div id="menuManagementAddSubMenu" class="collapse">
                                <div class="card mt-2" style="background: #bfc7f26b;">
                                    <div class="card-body p-2">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="addSubMenuTitleInput" class="form-label">Title *</label>
                                                <input type="text" class="form-control" id="addSubMenuTitleInput">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="addSubMenuSlug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="addSubMenuSlug">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addMenuCloseButton" class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Menu Item Modal -->
<div class="modal fade" id="menuManagementEditMainMenuItemModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="menuManagementEditMainMenuItemModalLabel">Edit Menu Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editMainMenuItemForm">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="editMainMenuSlNo" class="form-label">Sl. No. *</label>
                            <input type="number" class="form-control" id="editMainMenuSlNo" required>
                        </div>
                        <div class="col-md-5">
                            <label for="editMainMenuTitleInput" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="editMainMenuTitleInput"
                                name="editMainMenuTitleInput">
                        </div>
                        <div class="col-md-5">
                            <label for="editSlug" class="form-label">Slug *</label>
                            <input type="text" class="form-control" id="editSlug">
                        </div>

                        <!-- Edit Sub Menu -->
                        <div class="col-md-12">
                            <a class="btn btn-sm btn-info" data-bs-target="#menuManagementEditSubMenu"
                                data-bs-toggle="collapse"><span>Sub-Menu</span><i class="bi bi-chevron-down ms-2"></i>
                            </a>
                            <div id="menuManagementEditSubMenu" class="collapse">
                                <div class="card mt-2" style="background: #bfc7f26b;">
                                    <div class="card-body p-2">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="editSubMenuTitleInput" class="form-label">Title *</label>
                                                <input type="text" class="form-control" id="editSubMenuTitleInput">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="editSubMenuSlug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="editSubMenuSlug">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    id="editSubMenuItemsButton"><i
                                                        class="bi bi-plus-lg me-1"></i>Add</button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mt-2" id="viewEditSubMenuItemsContainer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="editMenuCloseButton" class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editMenuId" id="editMenuId">
                    <button type="submit" class="btn btn-sm btn-primary"><i
                            class="bi bi-plus-lg me-1"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Section Ends -->

<div class="container-fluid">
    <main id="main" class="main">
        <div class="pagetitle">
            <!-- <h1>Main Menu</h1> -->
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
                            <span class="fs-5 fw-bold">Main Menu</span>
                            <div>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#menuManagementAddMainMenuItemModal"><i
                                        class="bi bi-plus-lg me-1"></i>Add
                                    New</button>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#advanceFiltersNavbar"><i class="bi bi-funnel"></i></button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id="mainMenuTableContainer">
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




<script src="../js/mainMenu.js"></script>
<?php require "../assets/includes/footer.php" ?>