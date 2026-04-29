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
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png">
	<link rel="manifest" href="img/favicon/site.webmanifest">
	<title>Services</title>
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
			<!-- promo start-->
			<section class="promo-primary">
				<picture>
					<source srcset="img/services.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/services.jpg" alt="img" />
				</picture>
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="align-container">
								<div class="align-container__item"><span class="promo-primary__pre-title">SAFARI ZOO</span>
									<h1 class="promo-primary__title"><span>Awesome</span> <span>Services</span></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- promo end-->
			<!-- video block start-->
			<section class="section video-block no-padding-bottom">
				<div class="container">
					<div class="row bottom-70">
						<div class="col-lg-5">
							<div class="heading heading--primary heading--style-2"><span class="heading__pre-title">Zoo Services</span>
								<h2 class="heading__title"><span>Words about</span><br /> <span>SAFARI Zoo</span></h2>
							</div>
						</div>
						<div class="col-lg-7">
							<p><strong>Escape the ordinary and enter a world teeming with life. Safari Zoo isn't just a
									zoo – it's a portal to an unforgettable
									adventure.</strong></p>
							<p class="no-margin-bottom">Explore sprawling landscapes meticulously designed to replicate diverse
								ecosystems. Witness the power of a lion's roar, the elegance of a giraffe's stride, and
								the playful energy of primates swinging through the trees.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="video-frame">
								<video autoplay loop muted class="img--bg">
  									<source src="img/vid/event-vid-2.mp4" type="video/mp4">
								</video>
							<a class="video-trigger video-frame__trigger" href=""><span class=""><i class="" aria-hidden="true"></i></span><h1 class="video-frame__text color--white">SAFARI ZOO</h1></a></div>
						</div>
					</div>
				</div>
			</section>
			<!-- video block end-->
			<!-- front services start-->
			<section class="section front-services no-padding-bottom">
				<div class="container">
					<div class="row bottom-70">
						<div class="col-md-5 bottom-30">
							<div class="heading heading--primary heading--style-2"><span class="heading__pre-title">Services</span>
								<h2 class="heading__title"><span>Special Services</span><br /> <span>for our
										Visitors</span></h2>
							</div>
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
								<div class="icon-item__icon color--orange">
									<span class="fa fa-camera"></span>
								</div>
								<h6 class="icon-item__title">Photos with Animals</h6>
								<p>Capture memorable moments with our amazing animals through photography.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon color--orange">
									<span class="fa fa-cutlery"></span>
								</div>
								<h6 class="icon-item__title">Restaraunts & Fast Foods</h6>
								<p>Enjoy a variety of dining options, including delicious meals and refreshments.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon color--orange">
									<span class="fa fa-wifi"></span>
								</div>
								<h6 class="icon-item__title">Free Wi-Fi with Hi Speed</h6>
								<p>Stay connected with fast, complimentary Wi-Fi during your visit.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon color--orange">
									<span class="fa fa-trophy"></span>
								</div>
								<h6 class="icon-item__title">Many Competitions</h6>
								<p>Participate in various thrilling competitions for a chance to win exciting prizes and rewards.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon color--orange">
									<span class="fa fa-car"></span>
								</div>
								<h6 class="icon-item__title">Free Parking Area</h6>
								<p>Convenient and secure car parking facilities available for our safari visitors.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon color--orange">
									<span class="fa fa-map-signs"></span>
								</div>
								<h6 class="icon-item__title">Guide Services</h6>
								<p>Knowledgeable guides to enhance your safari experience with insights and information.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon color--orange">
									<span class="fa fa-shopping-cart"></span>
								</div>
								<h6 class="icon-item__title">Zoo Shopping</h6>
								<p>Explore our safari unique gift shops for souvenirs and wildlife-themed items.</p>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__icon color--orange">
									<span class="fa fa-soccer-ball-o"></span>
								</div>
								<h6 class="icon-item__title">Play Area for Kids</h6>
								<p>Experience the delight of fun, safe play areas for children during your zoo visit.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- front services end-->
				<!-- section start-->
				<section class="section">
					<div class="container">
						<div class="row bottom-50">
							<div class="col-12">
								<div class="heading heading--primary heading--center"><span class="heading__pre-title">Our partners</span>
									<h2 class="heading__title no-margin-bottom"><span>People Who</span> <span>Trust Us</span></h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="logos-slider">
								<?php

									$select = "SELECT * FROM partner ORDER BY id";
									$result = $con->query($select);
									while ($row = mysqli_fetch_array($result)) {

										?>
										<div class="logos-slider__item"><a href="<?PHP echo $row['link']; ?>"><img
													src="img/partner/<?PHP echo $row['img']; ?>" alt="logo" /></a></div>
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