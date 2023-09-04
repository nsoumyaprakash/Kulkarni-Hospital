<?php require "../assets/includes/header.php"?>

<!-- Add Page -->
<div class="modal fade" id="addPageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="addPageModalLabel">Add Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addPageForm">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Title *" id="addTitle" name="addTitle">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Url *" id="addUrl" name="addUrl">
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" placeholder="HTML Content" rows="3" id="addHtml"
                                name="addHtml"></textarea>
                            <small style="color:red;">*Note: Paste only HTML structure.</small>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" placeholder="CSS Styles" rows="3" id="addCss"
                                name="addCss"></textarea>
                            <small style="color:red;">*Note: Paste only CSS Styles.</small>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" placeholder="JavaScript" rows="3" id="addJs"
                                name="addJs"></textarea>
                            <small style="color:red;">*Note: Paste only JavaScript Logics.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-check-label" for="addStatus">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="addStatus" name="addStatus">
                                <label class="form-check-label" id="addStatusOption">Draft</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="addPageCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Pages -->
<div class="modal fade" id="editPageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editPageModalLabel">Edit Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editPageForm">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Title *" id="editTitle"
                                name="editTitle">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Url *" id="editUrl" name="editUrl">
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" placeholder="HTML Content" rows="3" id="editHtml"
                                name="editHtml"></textarea>
                            <small style="color:red;">*Note: Paste only HTML structure.</small>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" placeholder="CSS Styles" rows="3" id="editCss"
                                name="editCss"></textarea>
                            <small style="color:red;">*Note: Paste only CSS Styles.</small>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" placeholder="JavaScript" rows="3" id="editJs"
                                name="editJs"></textarea>
                            <small style="color:red;">*Note: Paste only JavaScript Logics.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-check-label" for="editStatus">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="editStatus" name="editStatus">
                                <label class="form-check-label" id="editStatusOption">Draft</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="editPageCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editPageId" id="editPageId">
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
                            <span class="fs-5 fw-bold">Pages</span>
                            <div>
                                <button class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                                    data-bs-target="#addPageModal" aria-controls="addPageModal"><i
                                        class="bi bi-plus-lg me-1"></i>Add
                                    New</button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id='pageTableContainer'>

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



<script src="../js/page.js"></script>
<?php require "../assets/includes/footer.php" ?>