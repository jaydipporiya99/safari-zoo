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
	<title>Animals</title>
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

		$currentPage = "animals";
		include "header.php";

		?>
		<!-- header end-->
		<main class="main">
			<!-- promo start-->
			<section class="promo-primary">
				<picture>
					<source srcset="img/animals.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/animals.jpg" alt="img" />
				</picture>
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="align-container">
								<div class="align-container__item"><span class="promo-primary__pre-title">SAFARI ZOO</span>
									<h1 class="promo-primary__title"><span>All</span> <span>Animals</span></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- promo end-->
			<!-- section start-->
			<section class="section animals">
				<div class="container">
					<div class="row align-items-center bottom-30">
						<!-- <div class="col-12">
							<ul class="filter-panel justify-content-start">
								<li class="filter-panel__item filter-panel__item--active"><span>All animals</span></li>
								<li class="filter-panel__item"><span>Mammals</span></li>
								<li class="filter-panel__item"><span>Reptiles</span></li>
								<li class="filter-panel__item"><span>Amphibians</span></li>
								<li class="filter-panel__item"><span>Birds</span></li>
								<li class="filter-panel__item"><span>Fishes</span></li>
								<li class="filter-panel__item"><span>Insects</span></li>
							</ul>
						</div> -->
					</div>
					<div class="row no-gutters left-3 right-3">

						<?php

						include "Db/dbConnection.php";

						$q1 = "SELECT * FROM `animals`";

						$res = $con->query($q1);

						if ($res->num_rows > 0) {

							while ($row = $res->fetch_assoc()) {
								$id = $row['id'];
								$name = $row['name'];
								$img1 = $row['img1'];
								$img2 = $row['img2'];
								$img3 = $row['img3'];
								$conservation_status = $row['conservation_status'];
								$life_span = $row['life_span'];
								$body_size = $row['body_size'];
								$native_habitat = $row['native_habitat'];
								$diet = $row['diet'];
								$desc = $row['desc'];
								$type = $row['type'];

								echo '
	
	<div class="col-sm-6 col-md-4 col-xl-3">
								<div class="animal-block"><img class="img--bg" src="img/animals/' . $img1 . '" alt="img"/>
									<div class="animal-block__details">
										<h6 class="animal-block__title">' . $name . '</h6>
										<p class="animal-block__title color--orange">' . $type . '</p>
										<a class="animal-block__link" href="animal-details.php?id=' . $id . '">Learn more</a>
									</div>
								</div>
							</div>';
							}
						}
						?>


						<!-- <div class="col-sm-6 col-md-4 col-xl-3">
								<div class="animal-block"><img class="img--bg" src="img/animal_1.jpg" alt="img"/>
									<div class="animal-block__details">
										<h6 class="animal-block__title">Lion</h6><a class="animal-block__link" href="#">Learn more</a>
									</div>
								</div>
							</div> -->
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