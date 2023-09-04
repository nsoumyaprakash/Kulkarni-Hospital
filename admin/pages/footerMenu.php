<?php require "../assets/includes/header.php"?>

<!-- Add Menu Item Modal -->
<div class="modal fade" id="addFooterMenuItemModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="addFooterMenuItemModalLabel">Add Footer Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addFooterMenuItemForm">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="addFooterMenuSlNo" class="form-label">Sl. No. *</label>
                            <input type="number" class="form-control" id="addFooterMenuSlNo" name="addFooterMenuSlNo"
                                required>
                        </div>
                        <div class="col-md-10">
                            <label for="addFooterMenuTitle" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="addFooterMenuTitle" required>
                        </div>

                        <!-- Sub Menu -->
                        <div class="col-md-12">
                            <a class="btn btn-sm btn-info" data-bs-target="#footerMenuAddSubMenu"
                                data-bs-toggle="collapse"><span>Sub-Menu</span><i class="bi bi-chevron-down ms-2"></i>
                            </a>
                            <div id="footerMenuAddSubMenu" class="collapse">
                                <div class="card mt-2" style="background: #bfc7f26b;">
                                    <div class="card-body p-2">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="addFooterSubMenuTitle" class="form-label">Title *</label>
                                                <input type="text" class="form-control" id="addFooterSubMenuTitle">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="addFooterSubMenuSlug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="addFooterSubMenuSlug">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    id="addFooterSubMenuItemsButton"><i
                                                        class="bi bi-plus-lg me-1"></i>Add</button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mt-2" id="viewFooterSubMenuItemsContainer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addFooterCloseButton" class="btn btn-sm btn-secondary"
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
<div class="modal fade" id="editFooterMenuItemModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editFooterMenuItemModalLabel">Edit Footer Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editFooterMenuItemForm">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="editFooterMenuSlNo" class="form-label">Sl. No. *</label>
                            <input type="number" class="form-control" id="editFooterMenuSlNo" name="editFooterMenuSlNo"
                                required>
                        </div>
                        <div class="col-md-10">
                            <label for="editFooterMenuTitle" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="editFooterMenuTitle" name="editFooterMenuTitle"
                                required>
                        </div>

                        <!-- Edit Sub Menu -->
                        <div class="col-md-12">
                            <a class="btn btn-sm btn-info" data-bs-target="#footerEditSubMenu"
                                data-bs-toggle="collapse"><span>Sub-Menu</span><i class="bi bi-chevron-down ms-2"></i>
                            </a>
                            <div id="footerEditSubMenu" class="collapse">
                                <div class="card mt-2" style="background: #bfc7f26b;">
                                    <div class="card-body p-2">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="editFooterSubMenuTitle" class="form-label">Title *</label>
                                                <input type="text" class="form-control" id="editFooterSubMenuTitle">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="editFooterSubMenuSlug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="editFooterSubMenuSlug">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    id="editFooterSubMenuItemsButton"><i
                                                        class="bi bi-plus-lg me-1"></i>Add</button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mt-2" id="viewFooterEditSubMenuItemsContainer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="editFooterCloseButton" class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editFooterId" id="editFooterId">
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
                            <span class="fs-5 fw-bold">Footer Menu</span>
                            <div>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addFooterMenuItemModal"><i class="bi bi-plus-lg me-1"></i>Add
                                    New</button>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#advanceFiltersNavbar"><i class="bi bi-funnel"></i></button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id="footerMenuTableContainer">
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




<script src="../js/footerMenu.js"></script>
<?php require "../assets/includes/footer.php" ?>