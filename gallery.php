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
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png" />
	<link rel="manifest" href="img/favicon/site.webmanifest" />
	<title>Gallery</title>
	<!-- styles-->
	<link rel="stylesheet" href="css/styles.min.css" />
	<!-- web-font loader-->
	<script>
		WebFontConfig = {
			google: {
				families: [
					"Nunito+Sans:300,400,500,700,900",
					"Quicksand:300,400,500,700",
				],
			},
		};

		function font() {
			var wf = document.createElement("script");

			wf.src =
				("https:" == document.location.protocol ? "https" : "http") +
				"://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js";
			wf.type = "text/javascript";
			wf.async = "true";

			var s = document.getElementsByTagName("script")[0];

			s.parentNode.insertBefore(wf, s);
		}

		font();
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
					<source srcset="img/gallery.jpg" media="(min-width: 992px)" />
					<img class="img--bg" src="img/gallery.jpg" alt="img" />
				</picture>
				<div class="container">
					<div class="row">
						<div class="col-auto">
							<div class="align-container">
								<div class="align-container__item">
									<span class="promo-primary__pre-title">SAFARI ZOO</span>
									<h1 class="promo-primary__title">
										<span>Snaps of our</span> <span>Animals</span>
									</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- promo end-->
			<!-- gallery start-->
			<section class="section gallery">
				<!-- <div class="container">
					<div class="row bottom-50 align-items-end">
						<div class="col-12">
							<ul class="filter-panel">
								<li class="filter-panel__item filter-panel__item--active" data-filter="*">
									<span>All</span>
								</li>
								<li class="filter-panel__item" data-filter=".category_2">
									<span>Bulls</span>
								</li>
								<li class="filter-panel__item" data-filter=".category_3">
									<span>Girafes</span>
								</li>
								<li class="filter-panel__item" data-filter=".category_4">
									<span>Mammals</span>
								</li>
								<li class="filter-panel__item" data-filter=".category_5">
									<span>Birds</span>
								</li>
								<li class="filter-panel__item" data-filter=".category_6">
									<span>Fishes</span>
								</li>
							</ul>
						</div>
					</div>
				</div> -->
				<div class="row gallery-masonry no-gutters"> <!-- 	here while loop for php -->

					<?php

					include "Db/dbConnection.php";

					$q1 = "SELECT * FROM `animal_gallery` ORDER BY RAND()";

					$res = $con->query($q1);

					if ($res->num_rows > 0) {

						while ($row = $res->fetch_assoc()) {
							$id = $row['id'];
							$name = $row['name'];
							$img = $row['img'];
							$type = $row['type'];


							echo '
							<div class="category_1 col-sm-6 col-lg-4 col-xl-3 gallery-masonry__item">
								<a class="gallery-masonry__img gallery-masonry__item--height-1" href="img/animals-gallery/' . $img . '"
									data-fancybox="gallery"><img class="img--bg" src="img/animals-gallery/' . $img . '" alt="img" />
									<div class="gallery-masonry__description">
										<span>' . $type . '</span><span>' . $name . '</span>
									</div>
								</a>
						    </div>';
						}
					} else {
						echo "Somthing Went Wrong From Db....";
					}

					?>
				</div>
			</section>
			<!-- gallery end-->
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