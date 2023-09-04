<!-- Advance Filters Offcanvas -->
<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="advanceFiltersNavbar"
            aria-labelledby="advanceFiltersNavbarLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title fw-bold fs-6" id="advanceFiltersNavbarLabel">Advance Filters</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="row g-3" id="advanceFiltersForm">
                    <div class="col-md-12">
                        <label for="fromAddedDate" class="form-label">From Added Date</label>
                        <input type="text" class="form-control datePicker" id="fromAddedDate" name="fromAddedDate">
                    </div>
                    <div class="col-md-12">
                        <label for="toAddedDate" class="form-label">To Added Date</label>
                        <input type="text" class="form-control datePicker" id="toAddedDate" name="toAddedDate">
                    </div>
                    <div class="text-center mt-5 border-top pt-3">
                        <button type="button" class="btn btn-sm btn-info me-2" id="closeFilterButton"
                            data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg me-1"></i>Close</button>
                        <button type="reset" class="btn btn-sm btn-warning me-2"><i
                                class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i
                                class="bi bi-save2 me-1"></i>Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Advance Filters with status Offcanvas -->
<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="advanceFiltersWithStatusNavbar"
            aria-labelledby="advanceFiltersWithStatusNavbarLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title fw-bold fs-6" id="advanceFiltersWithStatusNavbarLabel">Advance Filters</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="row g-3" id="advanceFiltersWithStatusForm">
                    <div class="col-md-12">
                        <label for="advanceFiltersStatus" class="form-label">Status</label>
                        <select class="form-select" id="advanceFiltersStatus" name="advanceFiltersStatus">
                            <option selected disabled>Select Status</option>
                            <option value='0'>Draft</option>
                            <option value='1'>Published</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="withStatusFromAddedDate" class="form-label">From Added Date</label>
                        <input type="text" class="form-control datePicker" id="withStatusFromAddedDate"
                            name="withStatusFromAddedDate">
                    </div>
                    <div class="col-md-12">
                        <label for="withStatusToAddedDate" class="form-label">To Added Date</label>
                        <input type="text" class="form-control datePicker" id="withStatusToAddedDate"
                            name="withStatusToAddedDate">
                    </div>
                    <div class="text-center mt-5 border-top pt-3">
                        <button type="button" class="btn btn-sm btn-info me-2" data-bs-dismiss="offcanvas"
                            aria-label="Close" id="withStatusCloseButton"><i class="bi bi-x-lg me-1"></i>Close</button>
                        <button type="reset" class="btn btn-sm btn-warning me-2"><i
                                class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i
                                class="bi bi-save2 me-1"></i>Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-- Offcanvas Ends -->
<!-- Image Enlarger Modal Container -->
<div id="imageEnlargerModalContainer"></div>