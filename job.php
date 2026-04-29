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

	<title>Join Us</title>
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
					<source srcset="img/foundation.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/foundation.jpg" alt="img" />
				</picture>
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="align-container">
								<div class="align-container__item"><span class="promo-primary__pre-title">SAFARI ZOO</span>
									<h1 class="promo-primary__title"><span>Join</span> <span>Us</span></h1>
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
					<div class="row">
						<div class="col-12">
							<div class="heading heading--primary heading--center"><span class="heading__pre-title">Join Us</span>
								<h2 class="heading__title"><span>become part of</span> <span>our big team</span></h2>
								<p class="no-margin-bottom">Join our diverse team at the zoo and play a vital role in wildlife conservation. Experience a rewarding career
									surrounded by fascinating animals from around the world.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- section start-->
			<section class="section background--gray">
				<div class="container">
					<div class="row offset-70">

										<?php

										include "Db/dbConnection.php";

										$q1 = "SELECT * FROM `job`";

										$res = $con->query($q1);

										if ($res->num_rows > 0) {

											while ($row = $res->fetch_assoc()) {
												$id = $row['id'];
												$title = $row['title'];
												$role = $row['role'];
												$des = $row['des'];
												$img = $row['img'];

												echo '
												<div class="col-12">
							<div class="advantages-item">
								<div class="row align-items-center">
									<div class="col-lg-6">
												<div class="advantages-item__img"><img class="img--bg" src="img/job/' . $img . '" alt="img"/></div>
										</div>
										<div class="col-lg-6 col-xl-5 offset-xl-1">
											<h3 class="advantages-item__title"><strong>' . $title . '</strong><br/></h3>
											<p><strong class="color--primary background--orange">&nbsp;' . $role . '&nbsp;</strong></p>
											<p>' . $des . '</p><a class="button button--primary" href="job-apply.php?id=' . $id . '">Apply</a>
										</div>
										</div>
								</div>
							</div>
												';
											}
										} else {
											echo "No Jobs Yet...";
										}

										?><!-- while here -->

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