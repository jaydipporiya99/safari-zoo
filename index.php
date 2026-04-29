<?php

include "Db/dbConnection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content="description" />
	<meta name="keywords" content="keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png">
	<link rel="manifest" href="img/favicon/site.webmanifest">

	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<title>Safari</title>
	<!-- styles-->
	<link rel="stylesheet" href="css/styles.min.css" />
	<link rel="stylesheet" href="css/custom.min.css">
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
	<style>
		body {
			--sb-track-color: #e1e1e1;
			--sb-thumb-color: #fdd340;
			--sb-size: 8px;
		}

		body::-webkit-scrollbar {
			width: var(--sb-size)
		}

		body::-webkit-scrollbar-track {
			background: var(--sb-track-color);
			border-radius: 20px;
		}

		body::-webkit-scrollbar-thumb {
			background: var(--sb-thumb-color);
			border-radius: 20px;

		}

		@supports not selector(::-webkit-scrollbar) {
			body {
				scrollbar-color: var(--sb-thumb-color) var(--sb-track-color);
			}
		}
	</style>
</head>

<?php
session_start();

?>

<body>
	<div class="page-wrapper">
		<!-- menu dropdown start-->
		<?php

		$currentPage = "index";
		include "header.php";

		?>
		<!-- header end-->
		<main class="main">
			<!-- promo start-->
			<section class="promo">
				<div class="promo-slider">
					<div class="promo-slider__item promo-slider__item--style-2">
						<picture>
							<source srcset="img/promo_1.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/promo_1.jpg" alt="img" />
						</picture>
						<div class="container">
							<div class="row">
								<div class="col-xl-7">
									<div class="align-container">
										<div class="align-container__item">
											<div class="promo-slider__wrapper-1">
												<h2 class="promo-slider__title"><span>Welcome <?php echo isset($_SESSION["fname"]) ? $_SESSION["fname"] : "Visitor" ?>
														to</span><br /><span>SAFARI</span></h2>
											</div>
											<div class="promo-slider__wrapper-2">
												<p class="promo-slider__subtitle">Where adventure meets conservation.
													Witness magnificent <br> animals while supporting our mission to
													protect endangered
													species.</p>
											</div>
											<div class="promo-slider__wrapper-3"><a class="button promo-slider__button button--primary" href="#about">Discover</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="promo-slider__item promo-slider__item--style-2">
						<picture>
							<source srcset="img/promo_2.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/promo_2.jpg" alt="img" />
						</picture>
						<div class="container">
							<div class="row">
								<div class="col-xl-6 offset-xl-6">
									<div class="align-container">
										<div class="align-container__item">
											<div class="promo-slider__wrapper-1">
												<h2 class="promo-slider__title"><span>The Greatest Zoo</span><br />
													<span>in the world</span>
												</h2>
											</div>
											<div class="promo-slider__wrapper-2">
												<p class="promo-slider__subtitle">Explore wonders of the animal kingdom
													& connect with amazing creatures. Witness their magic & join our
													mission for a
													brighter future.</p>
											</div>
											<div class="promo-slider__wrapper-3"><a class="button promo-slider__button button--primary" href="#about">Discover</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="promo-slider__item promo-slider__item--style-3">
						<picture>
							<source srcset="img/promo_3.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/promo_3.jpg" alt="img" />
						</picture>
						<div class="container">
							<div class="row">
								<div class="col-xl-8 offset-xl-2">
									<div class="align-container">
										<div class="align-container__item"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><a class="anchor promo__anchor" href="#about"><span>Scroll Down</span></a>
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!-- slider nav start-->
							<div class="promo-slider__nav"></div>
							<!-- slider nav end-->
						</div>
					</div>
				</div>
				<!-- promo pannel start-->
				<div class="promo-pannel">
					<div class="promo-pannel__details">
						<h6 class="promo-pannel__title">Contact Information</h6>
						<p><strong>Location:</strong> 123, Sarthana, Surat, Gujarat 395006</p>
						<p><strong>Phone:</strong> <a class="promo-pannel__link" href="tel:+919712414059">+91 97124
								14059</a> <a class="promo-pannel__link" href="tel:+917016707102">+91 70167 07102</a>
						</p>
						<p><strong>Openning Hours:</strong> 9:00 AM - 7:00 PM</p>
					</div>
					<a class="video-trigger" href="https://www.youtube.com/watch?v=MTfrYqlVa-c&ab_channel=SanDiegoZoo"><video class="img--bg" controls autoplay muted loop <source src="img/video-block.mp4" type="video/mp4"> </source></video><span class="video-trigger__icon"><span>Live Cam</span><i class="fa fa-play" aria-hidden="true"></i></span></a>
				</div>
				<!-- promo pannel end-->
			</section>
			<!-- promo end-->
			<!-- section start-->
			<section class="section about-front no-padding-bottom" id="about"><img class="about-front__bg t50 r0" src="img/about_bg.png" alt="img" />
				<div class="container">
					<div class="row flex-column-reverse flex-lg-row">
						<div class="col-lg-6 col-xl-5">
							<div class="info-box">
								<div class="info-box__inner"><img class="img--bg" src="img/about-us.jpg" alt="img" />
									<div class="heading heading--primary"><span class="heading__pre-title">Donation</span>
										<h2 class="heading__title color--white"><span>Help us protect</span><br />
											<span>more animals</span>
										</h2>
									</div>
									<p>Support our cause to protect animals by donating today and help us make a
										difference.</p><a class="info-box__link" href="donation.php">Donate!</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-xl-6 offset-xl-1">
							<div class="heading heading--primary heading--style-2"><span class="heading__pre-title">About ZOO</span>
								<h2 class="heading__title"><span>Words about</span><br /> <span>SAFARI Zoo</span></h2>
							</div>
							<p><strong>Escape the ordinary and enter a world teeming with life. Safari Zoo isn't just a
									zoo – it's a portal to an unforgettable
									adventure.</strong></p>
							<p class="bottom-50">Explore sprawling landscapes meticulously designed to replicate diverse
								ecosystems. Witness the power of a lion's roar, the elegance of a giraffe's stride, and
								the playful energy of primates swinging through the trees. </p>
							<div class="row offset-30">
								<div class="col-6 col-sm-3">
									<div class="brand-item bottom-30"><img class="brand-item__img" src="img/logo_1.png" alt="logo" /></div>
								</div>
								<div class="col-6 col-sm-3">
									<div class="brand-item bottom-30"><img class="brand-item__img" src="img/logo_2.png" alt="logo" /></div>
								</div>
								<div class="col-6 col-sm-3">
									<div class="brand-item bottom-30"><img class="brand-item__img" src="img/logo_3.png" alt="logo" /></div>
								</div>
								<div class="col-6 col-sm-3">
									<div class="brand-item bottom-30"><img class="brand-item__img" src="img/logo_4.png" alt="logo" /></div>
								</div>
							</div><a class="button button--primary top-50" href="partner.php">Our Partners</a>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- section start-->
			<section class="section no-padding-bottom">
				<div class="container">
					<div class="row align-items-end bottom-70">
						<div class="col-xl-7">
							<div class="heading heading--primary heading--style-2"><span class="heading__pre-title">Our
									animals</span>
								<h2 class="heading__title"><span>Rare AnimalS in</span> <span>our Zoo</span></h2>
								<p>Safari Zoo is dedicated to showcasing the extraordinary biodiversity of our planet.
									Our collection boasts a remarkable
									array of rare and endangered animals, each playing a vital role in the delicate
									balance of their ecosystems. </p>
							</div>
						</div>
						<div class="col-xl-5 d-none d-xl-block">
							<div class="row">
								<div class="col-md-4">
									<div class="counter-item counter-item--front-1">
										<div class="counter-item__top">
											<h6 class="counter-item__title">Reptiles</h6>
										</div>
										<div class="counter-item__lower"><span class="js-counter">850</span></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="counter-item counter-item--front-1">
										<div class="counter-item__top">
											<h6 class="counter-item__title">Species</h6>
										</div>
										<div class="counter-item__lower"><span class="js-counter">230</span></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="counter-item counter-item--front-1">
										<div class="counter-item__top">
											<h6 class="counter-item__title">Visitors</h6>
										</div>
										<div class="counter-item__lower"><span class="js-counter">540</span>k</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row offset-30">
						<div class="col-sm-6 col-md-4 col-xl-2"><a class="animal-item text-center background--orange color--primary">
								<div class="animal-item__icon color--primary">
									<svg class="icon" viewBox="0 0 24 24">
										<image xlink:href="img/custom/Animals/spider.png" width="24" height="24" alt="" />
									</svg>
								</div>
								<h6 class="animal-item__title">Invertebrates</h6>
							</a></div>
						<div class="col-sm-6 col-md-4 col-xl-2">
							<a class="animal-item text-center background--gray color--primary">
								<div class="animal-item__icon">
									<svg class="icon" viewBox="0 0 24 24">
										<image xlink:href="img/custom/Animals/bull.png" width="24" height="24" alt="" />
									</svg>
								</div>
								<h6 class="animal-item__title">Bulls</h6>
							</a>
						</div>
						<div class="col-sm-6 col-md-4 col-xl-2"><a class="animal-item text-center background--dark color--white">
								<div class="animal-item__icon">
									<svg class="icon" viewBox="0 0 24 24">
										<image xlink:href="img/custom/Animals/cat.png" width="24" height="24" alt="" />
									</svg>
								</div>
								<h6 class="animal-item__title">Cats</h6>
							</a></div>
						<div class="col-sm-6 col-md-4 col-xl-2"><a class="animal-item text-center background--orange color--primary">
								<div class="animal-item__icon">
									<svg class="icon" viewBox="0 0 24 24">
										<image xlink:href="img/custom/Animals/elephent.png" width="24" height="24" alt="" />
									</svg>
								</div>
								<h6 class="animal-item__title">Mammals</h6>
							</a></div>
						<div class="col-sm-6 col-md-4 col-xl-2"><a class="animal-item text-center background--gray color--primary">
								<div class="animal-item__icon">
									<svg class="icon" viewBox="0 0 24 24">
										<image xlink:href="img/custom/Animals/bird.png" width="24" height="24" alt="" />
									</svg>
								</div>
								<h6 class="animal-item__title">Birds</h6>
							</a></div>
						<div class="col-sm-6 col-md-4 col-xl-2"><a class="animal-item text-center background--dark color--white">
								<div class="animal-item__icon">
									<svg class="icon" viewBox="0 0 24 24">
										<image xlink:href="img/custom/Animals/fish.png" width="24" height="24" alt="" />
									</svg>
								</div>
								<h6 class="animal-item__title">Fishes</h6>
							</a></div>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- gallery start-->
			<section class="section gallery no-padding-bottom">
				<div class="container">
					<div class="row bottom-50 align-items-end">
						<div class="col-md-7 col-lg-6">
							<div class="heading heading--style-2"><span class="heading__pre-title">Our Gallery</span>
								<h2 class="heading__title no-margin-bottom"><span>Shots</span><br /> <span>from our
										zoo</span></h2>
							</div>
						</div>
						<div class="col-md-5 col-lg-6 text-right d-none d-md-block"><a class="button button--primary" href="animals.php">Discover animals</a></div>
					</div>
				</div>
				<div class="row no-gutters gallery-masonry">
					<div class="col-sm-6 col-md-3 gallery-masonry__item"><a class="gallery-masonry__img gallery-masonry__item--height-1" href="img/gallery_1.jpg" data-fancybox="gallery"><img class="img--bg" src="img/gallery_1.jpg" alt="img" />
							<div class="gallery-masonry__description"><span>Mamals</span><span>Giraffes</span></div>
						</a></div>
					<div class="col-sm-6 col-md-6 gallery-masonry__item"><a class="gallery-masonry__img gallery-masonry__item--height-2" href="img/gallery_2.jpg" data-fancybox="gallery"><img class="img--bg" src="img/gallery_2.jpg" alt="img" />
							<div class="gallery-masonry__description"><span>Mamals</span><span>Lions</span></div>
						</a></div>
					<div class="col-sm-6 col-md-3 gallery-masonry__item"><a class="gallery-masonry__img gallery-masonry__item--height-3" href="img/gallery_3.jpg" data-fancybox="gallery"><img class="img--bg" src="img/gallery_3.jpg" alt="img" />
							<div class="gallery-masonry__description"><span>Birds</span><span>Parrots</span></div>
						</a></div>
					<div class="col-sm-6 col-md-3 gallery-masonry__item"><a class="gallery-masonry__img gallery-masonry__item--height-1" href="img/gallery_4.jpg" data-fancybox="gallery"><img class="img--bg" src="img/gallery_4.jpg" alt="img" />
							<div class="gallery-masonry__description"><span>Reptiles</span><span>Lizards</span></div>
						</a></div>
					<div class="col-sm-6 col-md-3 gallery-masonry__item"><a class="gallery-masonry__img gallery-masonry__item--height-1" href="img/gallery_5.jpg" data-fancybox="gallery"><img class="img--bg" src="img/gallery_5.jpg" alt="img" />
							<div class="gallery-masonry__description"><span>Fishes</span><span>Clown</span></div>
						</a></div>
					<div class="col-sm-6 col-md-3 gallery-masonry__item"><a class="gallery-masonry__img gallery-masonry__item--height-1" href="img/gallery_6.jpg" data-fancybox="gallery"><img class="img--bg" src="img/gallery_6.jpg" alt="img" />
							<div class="gallery-masonry__description"><span>Mamals</span><span>Monkeys</span></div>
						</a></div>
					<div class="col-sm-6 col-md-6 gallery-masonry__item"><a class="gallery-masonry__img gallery-masonry__item--height-4" href="img/gallery_7.jpg" data-fancybox="gallery"><img class="img--bg" src="img/gallery_7.jpg" alt="img" />
							<div class="gallery-masonry__description"><span>Mamals</span><span>Elephants</span></div>
						</a></div>
				</div>
				<div class="container top-50 d-block d-md-none">
					<div class="row">
						<div class="col-12 text-center"><a class="button button--primary" href="#">Discover animals</a>
						</div>
					</div>
				</div>
			</section>
			<!-- gallery end-->
			<!-- front services start-->
			<section class="section front-services"><img class="section__bg t0 l0" src="img/front-services__bg.jpg" alt="bg" />
				<div class="container">
					<div class="row bottom-70">
						<div class="col-md-5 bottom-30">
							<div class="heading heading--primary heading--style-2"><span class="heading__pre-title">Services</span>
								<h2 class="heading__title"><span>Special Services</span><br /> <span>for our
										Visitors</span></h2>
							</div><a class="button button--primary d-none d-md-inline-block" href="services.php">All Services</a>
						</div>
						<div class="col-md-7">
							<div class="app-block">
								<div class="app-block__icon">
									<svg class="icon" viewBox="0 0 24 24">
										<image xlink:href="img/custom/icons/mobile.png" width="24" height="24" alt="" />
									</svg>
								</div>
								<h6 class="app-block__title">Mobile App of Safari Zoo</h6>
								<p class="no-margin-bottom">Unleash the wonder of Animal World Zoo with our official
									app! Explore interactive features, meet fascinating animals,
									and plan your visit seamlessly – all in one place.</p>
							</div>
						</div>
					</div>
					<div class="row offset-margin">
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon">
									<span class="fa fa-camera"></span>
								</div>
								<h6 class="icon-item__title">Photos with Animals</h6>
								<p>Capture memorable moments with our amazing animals through photography.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon">
									<span class="fa fa-cutlery"></span>
								</div>
								<h6 class="icon-item__title">Restaraunts & Fast Foods</h6>
								<p>Enjoy a variety of dining options, including delicious meals and refreshments.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon">
									<span class="fa fa-wifi"></span>
								</div>
								<h6 class="icon-item__title">Free Wi-Fi with Hi Speed</h6>
								<p>Stay connected with fast, complimentary Wi-Fi during your visit.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon">
									<span class="fa fa-trophy"></span>
								</div>
								<h6 class="icon-item__title">Many Competitions</h6>
								<p>Participate in various thrilling competitions for a chance to win exciting prizes and rewards.</p>
							</div>
						</div>
					</div>
					<div class="row top-50 d-flex d-md-none">
						<div class="col-12 text-center"><a class="button button--primary" href="services.php">All Services</a>
						</div>
					</div>
				</div>
			</section>
			<!-- front services end-->
			<!-- front events start-->
			<section class="section front-events background--gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 col-xl-7">
							<div class="heading heading--primary heading--style-2 bottom-50"><span class="heading__pre-title">Events</span>
								<h2 class="heading__title no-margin-bottom"><span>what happening</span><br />
									<span>nearest future</span>
								</h2>
							</div>
							<?php 
							
							$select = "SELECT * FROM events ORDER BY id DESC LIMIT 3";
							$result = $con->query($select);
							while ($row = mysqli_fetch_array($result)) 
							{
							?>
							<div class="nearest-item">
								<div class="row align-items-center">
									<div class="col-md-4">
										<div class="nearest-item__img"><img class="img--bg" src="img/events/<?PHP echo $row['img']; ?>" alt="img" /></div>
									</div>
									<div class="col-md-5">
										<div class="nearest-item__description"><a class="nearest-item__link" href="event-details.php?id=<?PHP echo $row['id']; ?>"><?PHP echo $row['title']; ?></a></div>
									</div>
									<div class="col-md-3">
										<div class="nearest-item__date"><span><?PHP echo $row['date']; ?></span><span><?PHP echo $row['month']; ?></span>
										</div>
									</div>
								</div>
							</div>
							<?php 
							}
							?>
							<a class="front-events__button button button--primary" href="events.php">See all
								Events</a>
						</div>
					</div>
				</div>
				<div class="main-event">
					<video autoplay loop muted class="img--bg">
  						<source src="img/vid/event-vid.mp4" type="video/mp4">
					</video>
				</div>
			</section>
			<!-- front events end-->
			<!-- section start-->
			<section class="section"><img class="section__bg t50 r0" src="img/testimonials_bg.png" alt="bg" />
				<div class="testimonials testimonials--style-1">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 d-none d-lg-block">
								<div class="testimonials__img"><img class="img--bg" src="img/man.jpg" alt="img" /></div>
							</div>
							<div class="col-lg-9">
								<div class="row align-items-center">
									<div class="col-md-7">
										<div class="heading heading--primary"><span class="heading__pre-title">Testimonials</span>
											<h2 class="heading__title"><span>What People<br /> Says</span> <span>About
													Us</span></h2>
										</div>
									</div>
									<div class="col-md-5">
										<div class="testimonials--style-1__dots text-md-right"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="testimonials-slider testimonials-slider--style-1">
											<div class="testimonials-slider__item">
												<div class="testimonials-slider__text">
													<p>My family and I had an amazing time at Safari Zoo! The safari tour was definitely the highlight of our visit. Seeing all
														the animals up close was truly unforgettable. The staff were friendly and knowledgeable, and the whole experience felt
														both educational and entertaining.</p>
												</div>
												<div class="testimonials-slider__details"><span class="testimonials-slider__name">Arvind Patel</span></div>
											</div>
											<div class="testimonials-slider__item">
												<div class="testimonials-slider__text">
													<p>Our day at Safari Zoo was fantastic! The variety of animals and the immersive exhibits made for a truly enjoyable
														experience. The safari tour was definitely a highlight, with knowledgeable guides providing interesting insights about
														the wildlife. It was a memorable day out for the whole family!</p>
												</div>
												<div class="testimonials-slider__details"><span class="testimonials-slider__name">Vikram Shah</span></div>
											</div>
											<div class="testimonials-slider__item">
												<div class="testimonials-slider__text">
													<p>We had a great time at Safari Zoo! The interactive exhibits and engaging activities kept us entertained throughout the
														day. The safari tour was an absolute thrill, getting to see the animals in their natural habitat was a highlight for
														sure. We'll definitely be recommending Safari Zoo to our friends and family!</p>
												</div>
												<div class="testimonials-slider__details"><span class="testimonials-slider__name">Rahul Patel</span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- section start-->
			<section class="section no-padding-top no-padding-bottom">
				<div class="map-banner"><img class="img--bg" src="img/cta_bg.jpg" alt="img" />
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="align-container">
									<div class="align-container__item">
										<div class="heading heading--primary">
											<h2 class="heading__title no-margin-bottom"><span>Map of Safari</span> <span>Zoo</span></h2>
										</div><a class="button button--primary" href="map.php">See map</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- section start-->
			<section class="section">
				<div class="container">
					<div class="row bottom-50">
						<div class="col-12">
							<div class="heading heading--primary heading--center"><span class="heading__pre-title">Our
									partners</span>
								<h2 class="heading__title no-margin-bottom"><span>People Who</span> <span>Trust
										Us</span></h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="logos-slider">
								<?php 

									$select = "SELECT * FROM partner ORDER BY id"; 
									$result = $con->query($select);
									while ($row = mysqli_fetch_array($result)) 
									{
								
								?>
								<div class="logos-slider__item"><a href="<?PHP echo $row['link']; ?>"><img src="img/partner/<?PHP echo $row['img']; ?>" alt="logo" /></a></div>
								<?php 
									}
								?>
							</div>
							<div class="logos-slider__dots"></div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
		</main>
		<!-- footer start-->
		<?php 
		
			include "footer.php"
		
		?>
		<!-- footer end-->
	</div>
	<!-- libs-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/libs.min.js"></script>
	<!-- scripts-->
	<script src="js/common.js"></script>
</body>

</html>