<?php require "../assets/includes/header.php"?>

<div class="container-fluid">
    <main id="main" class="main">
        <div class="pagetitle">
            <!-- <h1>UserProfile</h1> -->
            <nav>
                <ol class="breadcrumb"></ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>
                                    <div id="profileDetailsContainer">
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form class="row g-3" id="userProfileForm">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img class="img-thumbnail" id="previewEditImage" alt="Preview Image"
                                                    style="display: none;">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="editImageHiddenFile"
                                                        id="editImageHiddenFile">
                                                    <img src="" id="storedViewImage" class="img-thumbnail">
                                                </div>
                                                <div class="custom-file-upload">
                                                    <input type="file" id="imageInput" name="imageInput">
                                                    <label for="imageInput"><i class="bi bi-upload me-2"></i></label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName"
                                                    value="" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="phone" value=""
                                                    required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <input type="hidden" id="editUserProfileId" name="editUserProfileId">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
</div>




<script src="../js/userProfile.js"></script>
<?php require "../assets/includes/footer.php" ?>