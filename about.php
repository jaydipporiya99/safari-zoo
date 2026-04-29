<?php

include "Db/dbConnection.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="description"/>
		<meta name="keywords" content="keywords"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png">
		<link rel="manifest" href="img/favicon/site.webmanifest">
		<title>About</title>
		<!-- styles-->
		<link rel="stylesheet" href="css/styles.min.css"/>
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
						<source srcset="img/about-bg.jpg" media="(min-width: 992px)"/><img class="img--bg" src="img/about-bg.jpg" alt="img"/>
					</picture>
					<div class="container">
						<div class="row">
							<div class="col-auto">
								<div class="align-container">
									<div class="align-container__item"><span class="promo-primary__pre-title">SAFARI ZOO</span>
										<h1 class="promo-primary__title"><span>About</span> <span>Zoo</span></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- promo end-->
				<!-- section start-->
				<section class="section"><img class="section__bg t50 r0" src="img/about_bg.png" alt="img"/>
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-xl-5">
								<div class="img-box">
									<div class="img-box__img"><img class="img--bg" src="img/img-box-2.jpg" alt="img"/></div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-6 offset-xl-1">
								<div class="heading heading--primary heading--style-2"><span class="heading__pre-title">About ZOO</span>
									<h2 class="heading__title"><span>Words about</span><br/> <span>SAFARI Zoo</span></h2>
								</div>
								<p><strong>Safari Zoo is an immersive wildlife sanctuary nestled in the heart of nature, dedicated to preserving and showcasing the
								wonders of the animal kingdom.</strong></p>
								<p>At Safari Zoo, visitors have the opportunity to encounter a wide array of species from around the globe. From majestic
								lions prowling their territory to playful monkeys swinging through the trees, every corner of the zoo offers a glimpse
								into the fascinating lives of animals. Whether you're fascinated by exotic birds, intrigued by reptiles, or captivated
								by mammals, Safari Zoo provides an up-close and personal encounter with wildlife unlike any other. </p>
								<p>Beyond its role as a captivating destination for animal enthusiasts, Safari Zoo is deeply committed to conservation
								efforts and environmental education. Through informative exhibits, interactive programs, and partnerships with
								conservation organizations.</p>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
				<!-- section start-->
				<section class="section no-padding-top">
					<div class="container">
						<div class="row flex-column-reverse flex-lg-row">
							<div class="col-lg-6 col-xl-6">
								<div class="heading heading--primary heading--style-2"><span class="heading__pre-title">Mission</span>
									<h2 class="heading__title"><span>Awesome AnimalS in</span><br/> <span>our Zoo</span></h2>
								</div>
								<p>At our zoo, our mission is to provide a safe and enriching environment for all the amazing animals under our care. We believe in upholding the highest standards of animal welfare while also promoting conservation and education. Through innovative habitat design, dedicated veterinary care, and enrichment programs tailored to each species.</p>
								<p class="no-margin-bottom">Our mission revolves around creating a haven where awesome animals not only survive but thrive.</p>
								<div class="row top-30">
									<div class="col-md-4">
										<div class="counter-item counter-item--front-1">
											<div class="counter-item__top">
												<h6 class="counter-item__title">Animals</h6>
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
												<h6 class="counter-item__title">Visitors per Year</h6>
											</div>
											<div class="counter-item__lower"><span class="js-counter">540</span>k</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-5">
								<div class="img-box">
									<div class="img-box__img"><img class="img--contain" src="img/wild-world.jpg" alt="img"/></div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
				<!-- section start-->
				<section class="section no-padding-top no-padding-bottom">
					<div class="row no-gutters">
						<div class="col-xl-4"><a class="action-block">
							<div class="action-block__inner"><img class="img--bg" src="img/action-block_3.jpg" alt="img"/>
								<h3 class="action-block__title"><span>The Biggest Zoo</span><br/> <span>in India</span></h3>
							</div></a></div>
						<div class="col-xl-4"><a class="action-block">
							<div class="action-block__inner"><img class="img--bg" src="img/action-block_1.jpg" alt="img"/>
								<h3 class="action-block__title"><span>The Biggest Aquarium</span><br/> <span>in Gujarat</span></h3>
							</div></a></div>
						<div class="col-xl-4"><a class="action-block">
							<div class="action-block__inner"><img class="img--bg" src="img/action-block_2.jpg" alt="img"/>
								<h3 class="action-block__title"><span>Amazing Terrarium</span><br/> <span>in Surat</span></h3>
							</div></a></div>
					</div>
				</section>
				<!-- section end-->
				
				<!-- section start-->
				<section class="section no-padding-top no-padding-bottom">
					<div class="testimonials testimonials--style-1">
						<div class="container">
							<div class="row">
								<div class="col-lg-3 d-none d-lg-block">
									<div class="testimonials__img"><img class="img--bg" src="img/man.jpg" alt="img"/></div>
								</div>
								<div class="col-lg-9">
									<div class="row align-items-center">
										<div class="col-md-7">
											<div class="heading heading--primary"><span class="heading__pre-title">Testimonials</span>
												<h2 class="heading__title"><span>What People<br/> Says</span> <span>About Us</span></h2>
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