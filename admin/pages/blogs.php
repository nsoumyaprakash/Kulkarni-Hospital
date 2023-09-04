<?php require "../assets/includes/header.php"?>

<!-- Add Blogs -->
<div class="modal fade" id="addBlogModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="addBlogModalLabel">Add Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addBlogsForm" enctype="multipart/form-data">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Tag *" id="addTag" name="addTag">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Title *" id="addTitle" name="addTitle">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="Content" rows="3" id="addContent"
                                name="addContent"></textarea>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Author Name" id="addAuthor"
                                name="addAuthor">
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
                        <div class="col-md-6">
                            <div class="custom-file-upload">
                                <input type="file" id="addAuthorImageInput" name="addAuthorImageInput">
                                <label for="addAuthorImageInput"><i class="bi bi-upload me-2"></i>Author
                                    Image</label>
                            </div>
                            <img class="img-thumbnail" id="previewAuthorImage" alt="Preview Image"
                                style="display: none;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="addBlogCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Blogs -->
<div class="modal fade" id="editBlogModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editBlogModalLabel">Edit Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" enctype="multipart/form-data">
                <div class="modal-body pb-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Tag *" id="editTag" name="editTag">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Title *" id="editTitle"
                                name="editTitle">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="Content" rows="3" id="editContent"
                                name="editContent"></textarea>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Author Name" id="editAuthor"
                                name="editAuthor">
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
                        <div class="col-md-6">
                            <div class="custom-file-upload">
                                <input type="file" id="editAuthorImageInput" name="editAuthorImageInput">
                                <label for="editAuthorImageInput"><i class="bi bi-upload me-2"></i>Author
                                    Image</label>
                            </div>
                            <img class="img-thumbnail" id="previewAuthorEditImage" alt="Preview Image"
                                style="display: none;">
                            <input type="hidden" name="editAuthorImageHiddenFile" id="editAuthorImageHiddenFile">
                            <img src="" id="storedViewAuthorImage" class="img-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="editBlogCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editBlogId" id="editBlogId">
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
                            <span class="fs-5 fw-bold">Blogs</span>
                            <div>
                                <button class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                                    data-bs-target="#addBlogModal" aria-controls="addBlogModal"><i
                                        class="bi bi-plus-lg me-1"></i>Add
                                    New</button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id='blogsTableContainer'>

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



<script src="../js/blog.js"></script>
<?php require "../assets/includes/footer.php" ?>