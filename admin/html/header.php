<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../assets/img/favicon/logo.png" alt="" height="50">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?php echo ($currentPage === 'index') ? 'active' : ''; ?>">
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- User Data -->
        <li class="menu-item <?php echo ($currentPage === 'register-data') ? 'active' : ''; ?>">
            <a href="register-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">User Data</div>
            </a>
        </li>

        <!-- Ticket Data -->
        <li class="menu-item <?php echo ($currentPage === 'ticket-data') ? 'active' : ''; ?>">
            <a href="ticket-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Analytics">Ticket Data</div>
            </a>
        </li>

        <!-- Products Data -->
        <li class="menu-item <?php echo ($currentPage === 'product-data') ? 'active' : ''; ?>">
            <a href="product-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-t-shirt"></i>
                <div data-i18n="Analytics">Products Data</div>
            </a>
        </li>

        <!-- Purchased Data -->
        <li class="menu-item <?php echo ($currentPage === 'purchased-data') ? 'active' : ''; ?>">
            <a href="purchased-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cart"></i>
                <div data-i18n="Analytics">Purchased Data</div>
            </a>
        </li>

        <!-- Animals Data -->
        <li class="menu-item <?php echo ($currentPage === 'animals-data') ? 'active' : ''; ?>">
            <a href="animals-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-github"></i>
                <div data-i18n="Analytics">Animals Data</div>
            </a>
        </li>

        <!-- Animals Gallery -->
        <li class="menu-item <?php echo ($currentPage === 'animals-gallery') ? 'active' : ''; ?>">
            <a href="animals-gallery.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-mailchimp"></i>
                <div data-i18n="Analytics">Animals Gallery</div>
            </a>
        </li>

        <!-- Donations -->
        <li class="menu-item <?php echo ($currentPage === 'donations') ? 'active' : ''; ?>">
            <a href="donations.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home-heart"></i>
                <div data-i18n="Analytics">Donations</div>
            </a>
        </li>

        <!-- Donor Data -->
        <li class="menu-item <?php echo ($currentPage === 'donor-data') ? 'active' : ''; ?>">
            <a href="donor-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-donate-heart"></i>
                <div data-i18n="Analytics">Donor Data</div>
            </a>
        </li>

        <!-- Events Data -->
        <li class="menu-item <?php echo ($currentPage === 'events-data') ? 'active' : ''; ?>">
            <a href="events-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Analytics">Events Data</div>
            </a>
        </li>

        <!-- Job Vacancies -->
        <li class="menu-item <?php echo ($currentPage === 'job-vacancies') ? 'active' : ''; ?>">
            <a href="job-vacancies.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-briefcase"></i>
                <div data-i18n="Analytics">Job Vacancies</div>
            </a>
        </li>

        <!-- Job Applicants -->
        <li class="menu-item <?php echo ($currentPage === 'job-applicants') ? 'active' : ''; ?>">
            <a href="job-applicants.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Analytics">Job Applicants</div>
            </a>
        </li>

        <!-- Animal CheckUp -->
        <li class="menu-item <?php echo ($currentPage === 'animal-checkup') ? 'active' : ''; ?>">
            <a href="animal-checkup.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="Analytics">Animal CheckUp</div>
            </a>
        </li>

        <!-- Partners Data -->
        <li class="menu-item <?php echo ($currentPage === 'partners-data') ? 'active' : ''; ?>">
            <a href="partners-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                <div data-i18n="Analytics">Partners Data</div>
            </a>
        </li>

        <!-- Feedback Data -->
        <li class="menu-item <?php echo ($currentPage === 'feedback-data') ? 'active' : ''; ?>">
            <a href="feedback-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-square-detail"></i>
                <div data-i18n="Analytics">Feedback Data</div>
            </a>
        </li>

        <!-- Contact Us Data -->
        <li class="menu-item <?php echo ($currentPage === 'contactus-data') ? 'active' : ''; ?>">
            <a href="contactus-data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-square-check"></i>
                <div data-i18n="Analytics">Contact Us Data</div>
            </a>
        </li>

        <!-- Employee -->
        <li class="menu-item <?php echo ($currentPage === 'employee') ? 'active' : ''; ?>">
            <a href="employee.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Analytics">Employee</div>
            </a>
        </li>

        <!-- Medical Assistant -->
        <li class="menu-item <?php echo ($currentPage === 'medical-assistant') ? 'active' : ''; ?>">
            <a href="medical-assistant.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Analytics">Medical Assistant</div>
            </a>
        </li>
        <!-- Admins -->
        <li class="menu-item <?php echo ($currentPage === 'admins') ? 'active' : ''; ?>">
            <a href="admins.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Admins</div>
            </a>
        </li>
        <!-- LOGOUT -->
        <li class="menu-item">
            <a href="logout.php" class="menu-link text-danger fw-bold">
                <i class="menu-icon tf-icons bx bx-exit"></i>
                <div data-i18n="Analytics">LOGOUT</div>
            </a>
        </li>
    </ul>
</aside>