<?php require "../assets/includes/header.php"?>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="addUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="addUserFullName" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="addUserFullName" name="addUserFullName">
                            <div class="invalid-feedback">Only letters and spaces are allowed.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="addUserEmail" class="form-label">Email *</label>
                            <input type="text" class="form-control" id="addUserEmail" name="addUserEmail"
                                autocomplete="off">
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="addUserPassword" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="addUserPassword" name="addUserPassword"
                                autocomplete="off">
                            <div class="invalid-feedback">Minimum 8 characters, at least 1 uppercase, lowercase, number,
                                and special character</div>
                        </div>
                        <div class="col-md-6">
                            <label for="addUserConfirmPassword" class="form-label">Confirm Password *</label>
                            <input type="password" class="form-control" id="addUserConfirmPassword"
                                name="addUserConfirmPassword">
                            <div class="invalid-feedback">Passwords does not match.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="addUserPhoneNumber" class="form-label">Phone *</label>
                            <input type="text" class="form-control" id="addUserPhoneNumber" name="addUserPhoneNumber">
                            <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="addRole" class="form-label" required>Select Role *</label>
                            <select class="form-select" id="addRole">
                                <option value="">Select</option>
                                <option value="SuperAdmin">SuperAdmin</option>
                                <option value="Admin" selected>Admin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="addOrganizationCode" class="form-label" required>Organisation Code *</label>
                            <input type="text" class="form-control" id="addOrganizationCode" name="addOrganizationCode">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="addUserStatus" name="addUserStatus">
                                <label class="form-check-label" for="addUserStatus">Allow Login</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="addUserModalCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editUserDetailsModalLabel">Edit User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserDetailsForm">
                <div class="modal-body">
                    <small class="text-danger d-block mb-3">Note: For Security reasons password is hidden by default! If
                        you wish to change your password please enter again.</small>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="editUserFullName" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="editUserFullName" name="editUserFullName">
                            <div class="invalid-feedback">Only letters and spaces are allowed.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="editUserEmail" class="form-label">Email *</label>
                            <input type="text" class="form-control" id="editUserEmail" name="editUserEmail"
                                autocomplete="off">
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="editUserPassword" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="editUserPassword" name="editUserPassword"
                                autocomplete="off">
                            <div class="invalid-feedback">Minimum 8 characters, at least 1 uppercase, lowercase, number,
                                and special character</div>
                        </div>
                        <div class="col-md-6">
                            <label for="editUserConfirmPassword" class="form-label">Confirm Password *</label>
                            <input type="password" class="form-control" id="editUserConfirmPassword"
                                name="editUserConfirmPassword">
                            <div class="invalid-feedback">Passwords does not match.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="editUserPhoneNumber" class="form-label">Phone *</label>
                            <input type="text" class="form-control" id="editUserPhoneNumber" name="editUserPhoneNumber">
                            <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="editRole" class="form-label" required>Select Role *</label>
                            <select class="form-select" id="editRole">
                                <option value="">Select</option>
                                <option value="SuperAdmin">SuperAdmin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="editOrganizationCode" class="form-label">Organisation Code *</label>
                            <input type="text" class="form-control" id="editOrganizationCode"
                                name="editOrganizationCode" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="editUserStatus"
                                    name="editUserStatus">
                                <label class="form-check-label" for="editUserStatus">Allow Login</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                        id="editUserModalCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i
                            class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    <input type="hidden" name="editUserId" id="editUserId">
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
            <!-- <h1>Users</h1> -->
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
                            <span class="fs-5 fw-bold">Users</span>
                            <div>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal"><i class="bi bi-plus-lg me-1"></i>Add New</button>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#advanceFiltersNavbar"><i class="bi bi-funnel"></i></button>
                                <a class="btn btn-sm btn-primary refreshButton"><i
                                        class="bi bi-arrow-clockwise"></i></a>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div id="usersTableContainer">

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




<script src="../js/users.js"></script>
<?php require "../assets/includes/footer.php" ?>