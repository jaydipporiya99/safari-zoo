<?php

include "Db/dbConnection.php";
?>



<!-- menu dropdown start-->
<div class="menu-dropdown">
    <div class="menu-dropdown__inner" data-value="start">
        <div class="screen screen--start">
            <div class="screen__item screen--trigger" data-category="home"><a class="screen__link" href="index.php">Home</a><span>
                    <svg class="icon">
                        <use xlink:href="#chevron"></use>
                    </svg></span></div>
            <div class="screen__item screen--trigger" data-category="home"><a class="screen__link" href="animals.php">Animals</a><span>
                    <svg class="icon">
                        <use xlink:href="#chevron"></use>
                    </svg></span></div>
            <div class="screen__item screen--trigger" data-category="home"><a class="screen__link" href="shop.php">Shop</a><span>
                    <svg class="icon">
                        <use xlink:href="#chevron"></use>
                    </svg></span></div>
            <div class="screen__item screen--trigger" data-category="home"><a class="screen__link" href="map.php">Map</a><span>
                    <svg class="icon">
                        <use xlink:href="#chevron"></use>
                    </svg></span></div>
            <div class="screen__item screen--trigger" data-category="home"><a class="screen__link" href="index.php">Contacts</a><span>
                    <svg class="icon">
                        <use xlink:href="#chevron"></use>
                    </svg></span></div>
            <div class="screen__item screen--trigger" data-category="home"><a class="screen__link" href="login.php">Login</a><span>
                    <svg class="icon">
                        <use xlink:href="#chevron"></use>
                    </svg></span></div>

            <div class="screen__item screen--trigger" data-category="pages"><span>Pages</span><span>
                    <svg class="icon">
                        <use xlink:href="#chevron"></use>
                    </svg></span></div>
            <ul class="screen__socials">
                <li><a class="item--facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a class="item--instagram" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul><a class="screen__button" href="tickets.php">Tickets</a>
        </div>
    </div>
    <div class="menu-dropdown__inner" data-value="pages">
        <div class="screen screen--sub">
            <div class="screen__heading">
                <h6 class="screen__back">
                    <svg class="icon">
                        <use xlink:href="#chevron-left"></use>
                    </svg> <span>Pages</span>
                </h6>
            </div>
            <div class="screen__item"><a class="screen__link" href="about.php">About</a></div>
            <div class="screen__item"><a class="screen__link" href="donation.php">Donate</a></div>
            <div class="screen__item"><a class="screen__link" href="services.php">Services</a></div>
            <div class="screen__item"><a class="screen__link" href="Events.php">Events</a></div>
            <div class="screen__item"><a class="screen__link" href="gallery.php">Gallery</a></div>
            <div class="screen__item"><a class="screen__link" href="partner.php">Partner</a></div>
            <div class="screen__item"><a class="screen__link" href="job.php">Career</a></div>
        </div>
    </div>
</div>
<!-- menu dropdown end-->

<!-- header start-->
<header class="header header-common">
    <div class="header__top">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4"><a class="logo" href="index.php"><img class="logo__img" src="img/logo_zoo_black.png" alt="logo" /></a></div>
            <div class="col-6 col-lg-8 d-flex justify-content-end">
                <!-- main menu start-->
                <ul class="main-menu">
                    <li class="main-menu__item <?php echo ($currentPage === 'index') ? 'main-menu__item--active' : ''; ?>"><a class="main-menu__link" href="index.php"><span>Home</span></a></li>
                    <li class="main-menu__item <?php echo ($currentPage === 'animals') ? 'main-menu__item--active' : ''; ?>"><a class="main-menu__link" href="animals.php"><span>Animals</span></a></li>
                    <li class="main-menu__item <?php echo ($currentPage === 'shop') ? 'main-menu__item--active' : ''; ?>"><a class="main-menu__link" href="shop.php"><span>Shop</span></a></li>
                    <li class="main-menu__item <?php echo ($currentPage === 'map') ? 'main-menu__item--active' : ''; ?>"><a class="main-menu__link" href="map.php"><span>Map</span></a></li>
                    <li class="main-menu__item <?php echo ($currentPage === 'contacts') ? 'main-menu__item--active' : ''; ?>"><a class="main-menu__link" href="contacts.php"><span>Contact</span></a></li>
                    <?php if (isset ($_SESSION['fname'])): ?>
                        <li class="main-menu__item <?php echo ($currentPage === 'user') ? 'main-menu__item--active' : ''; ?>"><a
                                class="main-menu__link" href="user.php"><span>User</span></a></li>
                    <?php else: ?>
                        <li class="main-menu__item <?php echo ($currentPage === 'login') ? 'main-menu__item--active' : ''; ?>"><a
                                class="main-menu__link" href="login.php"><span>Login</span></a></li>
                    <?php endif; ?>
                </ul>
                <!-- main menu end--><a class="header__button" id="dynamicLink" href="#">Tickets</a>
                <!-- menu-trigger start-->
                <div class="hamburger">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <!-- menu-trigger end-->
            </div>
        </div>
    </div>
    <div class="header__lower">
        <div class="row">
            <div class="col-auto d-flex align-items-center">
                <ul class="lower-menu">
                    <li class="lower-menu__item"><a class="lower-menu__link" href="job.php">Career</a></li>
                    <li class="lower-menu__item"><a class="lower-menu__link" href="partner.php">Partner</a></li>
                    <li class="lower-menu__item"><a class="lower-menu__link" href="gallery.php">Gallery</a></li>
                    <li class="lower-menu__item"><a class="lower-menu__link" href="events.php">Events</a></li>
                    <li class="lower-menu__item"><a class="lower-menu__link" href="services.php">Services</a></li>
                    <li class="lower-menu__item"><a class="lower-menu__link" href="donation.php">Donate</a></li>
                    <li class="lower-menu__item"><a class="lower-menu__link" href="about.php">About</a></li>
                </ul>
                <!-- lang select end-->
                <ul class="header__socials">
                    <li><a class="item--facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a class="item--instagram" href="https://www.instagram.com/safari.ind/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- header end-->
<script>
        // Check if session variable is set
     <?php if (isset($_SESSION['fname'])): ?>
        document.getElementById('dynamicLink').href = 'tickets.php';
    <?php else: ?>
        document.getElementById('dynamicLink').href = 'register.php';
    <?php endif; ?>
</script>