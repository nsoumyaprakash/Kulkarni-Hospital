<?php require "../assets/includes/header.php"?>

<!-- Add Achievements -->
<div class="modal fade" id="addAchievementsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="addAchievementsModalLabel">Add Resources</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addAchievementsForm">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="custom-select-wrapper">
                                <a role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div id="showAddIcons" class="custom-select">Select Icon *</div>
                                    <input type="hidden" id="addIcons" name="addIcons">
                                </a>
                                <div class="dropdown-menu" id="addIconsMenu"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Numbers *" id="addNumbers"
                                name="addNumbers">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Title *" id="addTitle" name="addTitle">
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
                        id="addAchievementsCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Achievementss -->
<div class="modal fade" id="editAchievementsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editAchievementsModalLabel">Edit Resources</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editAchievementsForm">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="custom-select-wrapper">
                                <a role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div id="showEditIcons" class="custom-select">Select Icon *</div>
                                    <input type="hidden" id="editIcons" name="editIcons">
                                </a>
                                <div class="dropdown-menu" id="editIconsMenu"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Numbers *" id="editNumbers"
                                name="editNumbers">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Title *" id="editTitle"
                                name="editTitle">
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
                        id="editAchievementsCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editAchievementsId" id="editAchievementsId">
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
                            <span class="fs-5 fw-bold">Resources</span>
                            <div>
                                <button class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                                    data-bs-target="#addAchievementsModal" aria-controls="addAchievementsModal"><i
                                        class="bi bi-plus-lg me-1"></i>Add
                                    New</button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id='achievementsTableContainer'>

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



<script src="../js/achievements.js"></script>
<?php require "../assets/includes/footer.php" ?>