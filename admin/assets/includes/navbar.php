<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="dashboard.php" class="logo d-flex align-items-center">
            <img src="../../img/logo.png" version="1.1" width="30" height="50">
            <defs>
                <linearGradient x1="12.581%" y1="10.333%" x2="88.841%" y2="100%" id="a">
                    <stop stop-color="#1AD697" offset="0%" />
                    <stop stop-color="#0019FF" offset="100%" />
                </linearGradient>
            </defs>
            <circle cx="12" cy="12" r="10" stroke="url(#a)" stroke-width="4" fill="transparent" />
            </svg>
            <span class="d-none d-lg-block ms-2"> Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="mx-3"><a href="/" target="_blank" class="btn btn-success opacity-75 new-product"><i aria-hidden="true"
                class="bi bi-globe me-1"></i> Go To Website </a></div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <?php if ($_SESSION['image'] != null): ?>
                    <img src="../../img/uplaods/<?php echo $_SESSION['image'] ?>" alt="Profile" class="rounded-circle">
                    <?php endif ?>
                    <?php if ($_SESSION['image'] == null): ?>
                    <img src="../../img/profile-img.png" alt="Profile" class="rounded-circle">
                    <?php endif ?>
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name'] ?></span>
                </a>
                <!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Email: <?php echo $_SESSION['email'] ?></h6>
                        <span>Phone: <?php echo $_SESSION['phone'] ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="userProfile.php">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>

                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="../controllers/logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
                <!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
<!-- End Header -->