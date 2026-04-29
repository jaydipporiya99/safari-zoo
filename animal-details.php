<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content="description" />
	<meta name="keywords" content="keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png" />
	<link rel="manifest" href="img/favicon/site.webmanifest" />
	<title>Animal Details</title>
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

<?php

include "Db/dbConnection.php";

$id = $_GET['id'];

$q1 = "SELECT * FROM `animals` Where `id`=$id";

$res = $con->query($q1);

if ($res->num_rows > 0) {

	while ($row = $res->fetch_assoc()) {
		$_SESSION['animal_name'] = $row['name'];
		$_SESSION['img2'] = $row['img2'];
		$_SESSION['img3'] = $row['img3'];
		$_SESSION['conservation_status'] = $row['conservation_status'];
		$_SESSION['life_span'] = $row['life_span'];
		$_SESSION['body_size'] = $row['body_size'];
		$_SESSION['native_habitat'] = $row['native_habitat'];
		$_SESSION['diet'] = $row['diet'];
		$_SESSION['desc'] = $row['desc'];
		$_SESSION['type'] = $row['type'];
	}
} else {
	echo "Somthing Went Wrong!...";
}

?>

<body>
	<div class="page-wrapper">
		<!-- menu dropdown start-->
		<?php

		$currentPage = "animals";
		include "header.php";

		?>
		<!-- header end-->
		<main class="main">
			<!-- promo start-->
			<section class="promo-primary">
				<picture>
					<source srcset="img/animals/<?php echo $_SESSION['img2']; ?>" media="(min-width: 992px)" /><img class="img--bg" src="img/animals/<?php echo $_SESSION['img2']; ?>" alt="img" />
				</picture>
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="align-container">
								<div class="align-container__item"><span class="promo-primary__pre-title">SAFARI ZOO</span>
									<h1 class="promo-primary__title"><span><?php echo $_SESSION['animal_name']; ?></span></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- promo end-->
			<!-- section start-->
			<section class="section animal-details">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
							<div class="row offset-30">
								<div class="col-12 col-sm-6 col-md-4 bottom-30">
									<div class="animal-details__icon">
										<img class="icon" src="img/animals/<?php echo $_SESSION['img3']; ?>" alt=""><!-- Reference Image -->
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-4 bottom-30">
									<h6 class="animal-details__title">Conservation status</h6>
									<p><?php echo $_SESSION['conservation_status']; ?></p>
								</div>
								<div class="col-12 col-sm-6 col-md-4 bottom-30">
									<h6 class="animal-details__title">Life span</h6>
									<p><?php echo $_SESSION['life_span']; ?> years</p>
								</div>
								<div class="col-12 col-sm-6 col-md-4 bottom-30">
									<h6 class="animal-details__title">Body size</h6>
									<p><?php echo $_SESSION['body_size']; ?> ft.</p>
								</div>
								<div class="col-12 col-sm-6 col-md-4 bottom-30">
									<h6 class="animal-details__title">Native habitat</h6>
									<p><?php echo $_SESSION['native_habitat']; ?></p>
								</div>
								<div class="col-12 col-sm-6 col-md-4 bottom-30">
									<h6 class="animal-details__title">Diet</h6>
									<p><?php echo $_SESSION['diet']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- section start-->
			<section class="section"><img class="d-block section__bg height100 width100 t0" src="img/section-bg.png" alt="img" />
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
							<h4 class="bottom-15 color--orange">Description</h6>
								<p><?php echo $_SESSION['desc']; ?></p>
						</div>
					</div>
				</div>
			</section>
			<!-- section end-->
			<!-- section start-->
			<!-- <section class="section no-padding-top no-padding-bottom">
				<div class="row no-gutters">
					<div class="col-lg-6"><a class="action-block" href="#">
							<div class="action-block__inner"><img class="img--bg" src="img/action-block_8.jpg" alt="img" />
								<h3 class="action-block__title"><span>Arabic</span><br /> <span>Horse</span></h3>
							</div>
						</a></div>
					<div class="col-lg-6"><a class="action-block" href="#">
							<div class="action-block__inner"><img class="img--bg" src="img/action-block_9.jpg" alt="img" />
								<h3 class="action-block__title"><span>African</span><br /> <span>Eliphant</span></h3>
							</div>
						</a></div>
				</div>
			</section> -->
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