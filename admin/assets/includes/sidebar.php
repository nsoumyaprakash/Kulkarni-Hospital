<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php if ($_SESSION['role'] == 'Admin'): ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="about.php">
                <i class="bi bi-file-earmark-break"></i><span>About</span>
            </a>
        </li>
        <!-- End About Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="landing.php">
                <i class="bi bi-front"></i><span>Home</span>
            </a>
        </li>
        <!-- End Landing Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="services.php">
                <i class="bi bi-gear"></i><span>Services</span>
            </a>
        </li>
        <!-- End services Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="achievements.php">
                <i class="bi bi-trophy"></i><span>Resources</span>
            </a>
        </li>
        <!-- End achievements Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="blogs.php">
                <i class="bi bi-newspaper"></i><span>Blogs</span>
            </a>
        </li>
        <!-- End blogs Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="contactsInfo.php">
                <i class="bi bi-person-lines-fill"></i><span>Contacts</span>
            </a>
        </li>
        <!-- End contactsInfo Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="doctorsInfo.php">
                <i class="bi bi-prescription2"></i><span>Doctors</span>
            </a>
        </li>
        <!-- End doctorsInfo Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="departments.php">
                <i class="bi bi-box-seam"></i><span>Departments</span>
            </a>
        </li>
        <!-- End packages Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#menu-nav" data-bs-toggle="collapse">
                <i class="bi bi-menu-button"></i><span>Menu Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="menu-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link" href="mainMenu.php">
                        <i class="bi bi-circle"></i><span>Main Menu</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="footerMenu.php">
                        <i class="bi bi-circle"></i><span>Footer Menu</span>
                    </a>
                </li>
            </ul>
        </li> -->
        <!-- End Menu Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="disclaimer.php">
                <i class="bi bi-people"></i><span>Disclaimer</span>
            </a>
        </li>
        <!-- End Disclaimer Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="faqs.php">
                <i class="bi bi-patch-question"></i><span>FAQs</span>
            </a>
        </li>
        <!-- End FAQs Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="pages.php">
                <i class="bi bi-file-earmark"></i><span>Generate Page</span>
            </a>
        </li> -->
        <!-- End Generate Page Nav -->
        <?php endif ?>

        <?php if ($_SESSION['role'] == 'SuperAdmin'): ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="users.php">
                <i class="bi bi-people"></i><span>Users</span>
            </a>
        </li>
        <!-- End User Nav -->
        <?php endif ?>
    </ul>
</aside>
<!-- End Sidebar-->