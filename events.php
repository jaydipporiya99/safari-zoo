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
	<title>Events</title>
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
					<source srcset="img/events.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/events.jpg" alt="img" />
				</picture>
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="align-container">
								<div class="align-container__item"><span class="promo-primary__pre-title">SAFARI ZOO</span>
									<h1 class="promo-primary__title"><span>Special</span> <span>Events</span></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- promo end-->
			<!-- cta start-->
			<div class="cta-block">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-8">
							<p class="cta-block__text"><strong>Have a WILD time at the Zoo’s special events – Planned just for you!</strong></p>
						</div>
					</div>
				</div>
			</div>
			<!-- cta end-->
			<!-- section start-->
			<section class="section">
				<div class="container">
					<div class="row offset-margin">
    <?php
						include "Db/dbConnection.php";

						$q1 = "SELECT * FROM `events`";
						$res = $con->query($q1);

						if ($res->num_rows > 0) {
							while ($row = $res->fetch_assoc()) {
								$id = $row['id'];
								$title = $row['title'];
								$desc = $row['desc'];
								// Limiting description to 100 characters
								$limited_desc = strlen($desc) > 100 ? substr($desc, 0, 100) . '...' : $desc;
								$img = $row['img'];
								$date = $row['date'];
								$month = $row['month'];

								echo '
									<div class="col-md-6 col-xl-4">
										<a class="events-item__link" href="event-details.php?id=' . $id . '">
											<div class="events-item">
												<div class="events-item__img">
													<div class="events-item__date"><span>' . $date . '</span><span>' . $month . '</span></div>
													<img class="img--bg" src="img/' . $img . '" alt="img"/>
												</div>
												<h6 class="events-item__title"><a class="events-item__link">' . $title . '</a></h6>
												<p>' . $limited_desc . '</p>
											</div>
										</a>
									</div>';
							}
						}
						?>
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