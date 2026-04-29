<?php 


session_start();

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
	<title>Donation</title>
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
					<source srcset="img/donation.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/donation.jpg" alt="img" />
				</picture>
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="align-container">
								<div class="align-container__item"><span class="promo-primary__pre-title">SAFARI ZOO</span>
									<h1 class="promo-primary__title"><span>Donate to</span> <span>zoo</span></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- promo end-->
			<!-- section start-->
			<section class="section">
				<div class="container">
					<div class="row offset-70">

						<?php
							include "Db/dbConnection.php";

							$q1 = "SELECT * FROM `donation`";
							$res = $con->query($q1);

							if ($res->num_rows > 0) {
								while ($row = $res->fetch_assoc()) {
									$id = $row['id'];
									$title = $row['title'];
									$img = $row['img'];
									$desc = $row['desc'];

									// Limit the description to 150 characters
									$limited_desc = strlen($desc) > 270 ? substr($desc, 0, 270) . '...' : $desc;

									echo '
									<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
										<div class="donation-item">
											<div class="row">
												<div class="col-lg-6">
													<div class="donation-item__img"><img class="img--bg" src="img/donation/' . $img . '" alt="img" /></div>
												</div>
												<div class="col-lg-6">
													<h4 class="donation-item__title"><a href="#">' . $title . '</a></h4>
													<p>' . $limited_desc . '</p>
													<a class="button button--primary" href="donation-details.php?id=' . $id . '">Donate now</a>
												</div>
											</div>
										</div>
									</div>';
								}
							}
							?>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- section start-->
			<section class="section"><img class="img--bg width100 height100 t0" src="img/section-bg.png" alt="bg" />
				<div class="container">
					<div class="row">
						<div class="col-12">
							<blockquote class="blockquote no-margin-bottom">
								<p class="blockquote__text no-margin-bottom">"Animals bring so much love and joy into our lives. By donating to their welfare, we can return the favor. Every contribution, big or small, helps create a world where all creatures can find a safe haven and a loving home.  Be the change you want to see in the world – donate today and open your heart to helping animals in need."</p>
							</blockquote>
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