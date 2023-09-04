<?php require "../assets/includes/header.php"?>

<!-- Add FAQs -->
<div class="modal fade" id="addFAQModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="addFAQModalLabel">Add FAQs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addFAQsForm">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <textarea class="form-control" placeholder="Question" rows="3" id="addQuestion"
                                name="addQuestion"></textarea>
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" placeholder="Answer" rows="3" id="addAnswer"
                                name="addAnswer"></textarea>
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
                        id="addFAQCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit FAQs -->
<div class="modal fade" id="editFAQModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editFAQModalLabel">Edit FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editFAQForm">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <textarea class="form-control" placeholder="Question" rows="3" id="editQuestion"
                                name="editQuestion"></textarea>
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" placeholder="Answer" rows="3" id="editAnswer"
                                name="editAnswer"></textarea>
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
                        id="editFAQCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editFAQId" id="editFAQId">
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
                            <span class="fs-5 fw-bold">FAQs</span>
                            <div>
                                <button class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                                    data-bs-target="#addFAQModal" aria-controls="addFAQModal"><i
                                        class="bi bi-plus-lg me-1"></i>Add
                                    New</button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id='FAQTableContainer'>

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



<script src="../js/faqs.js"></script>
<?php require "../assets/includes/footer.php" ?>