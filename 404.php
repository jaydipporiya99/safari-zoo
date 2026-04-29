<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content="description" />
	<meta name="keywords" content="keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png">
	<link rel="manifest" href="img/favicon/site.webmanifest">

	<title>Opps</title>
	<!-- styles-->
	<link rel="stylesheet" href="css/styles.min.css" />
	<!-- web-font loader-->
	<script>
		WebFontConfig = {

			google: {

				families: ['Nunito+Sans:300,400,500,700,900', 'Quicksand:300,400,500,700'],

			}

		}

		function font() {

			var wf = document.createElement('script')

			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
			wf.type = 'text/javascript'
			wf.async = 'true'

			var s = document.getElementsByTagName('script')[0]

			s.parentNode.insertBefore(wf, s)

		}

		font()
	</script>
</head>

<body>
	<div class="page-wrapper">
		<!-- menu dropdown start-->
		<?php 
		
		include "header.php";
		
		?>
		<!-- header end-->
		<main class="main">
			<!-- section start-->
			<section class="error section no-padding-top no-padding-bottom"><img class="img--bg" src="img/404.jpg" alt="img" />
				<div class="align-container">
					<div class="align-container__item">
						<div class="container">
							<div class="row">
								<div class="col-lg-6 offset-lg-6 col-xl-5 offset-xl-7 text-center">
									<div class="error__title">404</div>
									<div class="error__subtitle">Page not found</div>
									<div class="error__text">Sorry, that page never returned from a trip to the Safari. So you better come back home</div><a class="button button--filled" href="index.php">Home</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
		</main>
		<!-- footer start-->
		<footer class="footer"><img class="footer__bg img--bg" src="img/background__layout.png" alt="bg" />
			<div class="container">
				<div class="row bottom-50">
					<div class="col-md-5 col-xl-4 text-center text-md-left"><a class="logo logo--footer" href="index.html"><img class="logo__img" src="img/logo_zoo_white.png" alt="logo" /></a>
						<div class="footer__details">
							<p><strong>Location:</strong> <span>av. Washington 165, NY CA 54003</span></p>
							<p><strong>Phone:</strong> <a href="tel:+31859644725">+31 85 964 47 25</a> <a href="tel:+31859644725">+31 65 792 63 11</a></p>
							<p><strong>Email:</strong> <a href="mailto:info@animalsworld.com">info@animalsworld.com</a></p>
							<p><strong>Openning hours:</strong> <span>9:00 AM - 5:00 PM</span></p>
						</div>
						<ul class="socials">
							<li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
							<li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="col-md-7 col-xl-5 d-none d-md-block">
						<h6 class="footer__title">Menu & Links</h6>
						<ul class="footer-menu">
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Home</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Membership </a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Pages</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Education</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Animals</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Support</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Schedule</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Events</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Gallery</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Blog</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Contacts</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Donate</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Foundation</a></li>
							<li class="footer-menu__item"><a class="footer-menu__link" href="#">Tickets</a></li>
						</ul>
						<ul class="footer-submenu">
							<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Documents</a></li>
							<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Association of Zoo</a></li>
							<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Aqurium</a></li>
							<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Terrarium</a></li>
							<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Terra Park</a></li>
							<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Cooperation</a></li>
							<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Libriry</a></li>
						</ul>
					</div>
					<div class="col-lg-3 d-none d-xl-block">
						<h6 class="footer__title"><span>Instagram</span> <i class="fa fa-instagram" aria-hidden="true"></i>
						</h6>
						<div class="footer-instagram"><a class="footer-instagram__item" href="#">
								<div class="footer-instagram__img"><img class="img--bg" src="img/f_ig-1.jpg" alt="ig" /></div>
							</a><a class="footer-instagram__item" href="#">
								<div class="footer-instagram__img"><img class="img--bg" src="img/f_ig-2.jpg" alt="ig" /></div>
							</a><a class="footer-instagram__item" href="#">
								<div class="footer-instagram__img"><img class="img--bg" src="img/f_ig-3.jpg" alt="ig" /></div>
							</a><a class="footer-instagram__item" href="#">
								<div class="footer-instagram__img"><img class="img--bg" src="img/f_ig-4.jpg" alt="ig" /></div>
							</a><a class="footer-instagram__item" href="#">
								<div class="footer-instagram__img"><img class="img--bg" src="img/f_ig-5.jpg" alt="ig" /></div>
							</a><a class="footer-instagram__item" href="#">
								<div class="footer-instagram__img"><img class="img--bg" src="img/f_ig-6.jpg" alt="ig" /></div>
							</a></div>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-sm-6 text-center text-sm-left">
						<div class="footer-privacy"><a class="footer-privacy__link" href="#">Privacy Policy</a><span class="footer-privacy__divider">|</span><a class="footer-privacy__link" href="#">Term and Condision</a></div>
					</div>
					<div class="col-sm-6 text-center text-sm-right"><a class="footer__link" href="#"><img src="img/footer-logo.png" alt="logo" /></a></div>
				</div>
			</div>
		</footer>
		<!-- footer end-->
	</div>
	<!-- libs-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/libs.min.js"></script>
	<!-- scripts-->
	<script src="js/common.js"></script>
</body>

</html>