<?php

include "Db/dbConnection.php";
session_start();

?>


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
    <div>
        <h6 class="text-secondary text-center">Medical ID: <span class="text-info fw-bold"><?php

        if (isset ($_SESSION['id'])) {
            echo $_SESSION['id'];
        } else {
            echo "NO ID";
        }

        ?></span></h6>
    </div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- INDEX -->
        <li class="menu-item <?php echo ($currentPage === 'index') ? 'active' : ''; ?>">
            <a href="index.php" class="menu-link text-info">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="Analytics">CheckUp Form</div>
            </a>
        </li>

        <!-- Animal Data -->
        <li class="menu-item <?php echo ($currentPage === 'animals-data') ? 'active' : ''; ?>">
            <a href="animals-data.php" class="menu-link text-info">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Animals Data</div>
            </a>
        </li>

        <!-- Medical CheckUp -->
        <li class="menu-item <?php echo ($currentPage === 'checkup') ? 'active' : ''; ?>">
            <a href="checkup.php" class="menu-link text-info">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Analytics">CheckUp Data</div>
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