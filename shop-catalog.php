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
	<title>Catalog</title>
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

		$currentPage = "shop";
		include "header2.php"

			?>
		<!-- header end-->
		<main class="main">
			<!-- shop start-->
			<section class="section shop">
				<div class="container">
					<div class="row align-items-baseline">
						<div class="col-5"><span class="shop__aside-trigger">Filter</span></div>
					</div>
					<div class="row">
						<div class="col-lg-9 mt-3" style="margin-left: 140px;">
							<div class="row offset-30">
								<?php

								

								include "Db/dbConnection.php";

								$q1 = "SELECT * FROM `products`";

								$res = $con->query($q1);

								if ($res->num_rows > 0) {
									while ($row = $res->fetch_assoc()) {
										$id = $row['id'];
										$category = $row['category'];
										$name = $row['name'];
										$old_price = $row['old_price'];
										$new_price = $row['new_price'];
										$material = $row['material'];
										$color = $row['color'];
										$desc = $row['desc'];
										$img1 = $row['img1'];
										$img2 = $row['img2'];
										$img3 = $row['img3'];
										$size = $row['size'];

										echo '
										<div class="col-12 col-sm-6 col-md-4">
																	<div class="shop-item">
																		<div class="shop-item__img"><span
																				class="shop-item__badge shop-item__badge--hot">Hot</span>
																			<a class="shop-item__add" href="shop-product.php?id=' . $id . '">
																				<span>View</span></a><img class="img--contain"
																				src="img/product/' . $img1 . '" alt="img" />
																		</div>
																		<div class="shop-item__details">
																			<h6 class="shop-item__name"><a href="shop-product.html">' . $name . '</a>
																			</h6>
																			<div class="shop-item__details-lower">
																			<span class="shop-item__sale">
																				<s class="shop-item__price-old">' . $old_price . '₹</s>
																				<span class="shop-item__price">' . $new_price . '₹</span>
																			</span>
																			</div>
																		</div>
																	</div>
																</div>';
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- shop end-->
		</main>
		<!-- footer start-->
		<?php

		include "footer.php"

			?>
		<!-- footer end-->
		<div class="shop__backdrop"></div>
	</div>
	<!-- libs-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/libs.min.js"></script>
	<!-- scripts-->
	<script src="js/common.js"></script>

</body>

</html>