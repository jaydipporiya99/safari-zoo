<?php

include "Db/dbConnection.php";
session_start();


$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$email = $_SESSION['email'];
	$qty = $_POST['qty'];

	$q1 = "INSERT INTO `orders`(`name`, `lname`, `email`, `pid`, `pqty`) VALUES ('$fname','$lname','$email','$id','$qty')";

	$res2 = $con->query($q1);

	if ($res2) {
		header("Location: shop-cart.php");
		exit();
	}

}

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
	<title>Product</title>
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
		<main class="main mt-4">
			<!-- shop product start-->
			<section class="section shop-product background--brown">
				<div class="container">
					<?php

					$q1 = "SELECT * FROM `products` WHERE `id`=$id";

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
							$limited_desc = substr($desc, 0, 150);
							$img1 = $row['img1'];
							$img2 = $row['img2'];
							$img3 = $row['img3'];
							$size = $row['size'];
							echo '
								<div class="row">
							<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0">
								<!-- dual slider start-->
								<div class="dual-slider">
									<div class="main-slider">
										<div class="main-slider__item">
											<div class="main-slider__img"><img class="img--contain" style="padding: 100px;" src="img/product/' . $img1 . '" alt="single"/></div>
										</div>
										<div class="main-slider__item">
											<div class="main-slider__img"><img class="img--contain" style="padding: 100px;" src="img/product/' . $img2 . '" alt="single"/></div>
										</div>
										<div class="main-slider__item">
											<div class="main-slider__img"><img class="img--contain" style="padding: 100px;" src="img/product/' . $img3 . '" alt="single"/></div>
										</div>
									</div>
									<div class="nav-slider">
										<div class="nav-slider__item">
											<div class="nav-slider__img"><img class="img--contain p-4" src="img/product/' . $img1 . '" alt="single"/></div>
										</div>
										<div class="nav-slider__item">
											<div class="nav-slider__img"><img class="img--contain p-4" src="img/product/' . $img2 . '" alt="single"/></div>
										</div>
										<div class="nav-slider__item">
											<div class="nav-slider__img"><img class="img--contain p-4" src="img/product/' . $img3 . '" alt="single"/></div>
										</div>
									</div>
								</div>
								<!-- dual slider end-->
							</div>
							<div class="col-lg-6 col-xl-5 offset-xl-1">
								<div class="shop-product__top">
									<h4 class="shop-product__name color--orange">' . $name . '</h4>
									<s class="shop-product__old-price">' . $old_price . ' ₹</s>
									<h4 class="shop-product__price">' . $new_price . ' ₹<span>₹</span></h4>
								</div>
								<div class="shop-product__description">
									<ul class="shop-product__list">
										<li>Material: <span>' . $material . '</span></li>
										<li>Color: <span>' . $color . '</span></li>
										<li>Size: <span>' . $size . '</span></li>
									</ul>
									<p>' . $limited_desc . '...</p>
								</div>
								<form class="form product-form" method="POST" autocomplete="off">
									<div class="form__wrapper">
										<div class="form__count"><span class="form__minus"></span>
											<input class="form__field" type="number" name="qty" value="1"/>
											<span class="form__plus">
											</span>
											<button class="shop-item__add" style="border: none;">ADD TO CART</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
				<!-- shop product end-->
				<!-- section start-->
				<section class="section no-padding-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<!-- shop product tabs start-->
								<div class="tabs horizontal-tabs shop-product-tabs">
									<ul class="horizontal-tabs__header">
										<li><a class="horizontal-tabs__item-1"><span>Description </span></a></li>
										<li></li>
									</ul>
									<div class="horizontal-tabs__content">
										<div class="horizontal-tabs__item" id="horizontal-tabs__item-1">
										<br />
											<p>' . $desc . '</p>
											<div class="table">
												<div class="table__body">
													<div class="table__row">
														<div class="table__cell"><strong>Material</strong></div>
														<div class="table__cell"><strong>' . $material . '</strong></div>
													</div>
													<div class="table__row">
														<div class="table__cell"><strong>Color</strong></div>
														<div class="table__cell"><strong>' . $color . '</strong></div>
													</div>
													<div class="table__row">
														<div class="table__cell"><strong>Size</strong></div>
														<div class="table__cell"><strong>' . $size . '</strong></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>';
						}

					}


					?>

					<!-- section end-->
					<!-- section start-->
					<section class="section background--brown no-padding-top">
						<div class="container">
							<div class="row align-items-end bottom-50">
								<div class="col-md-7 col-lg-8">
									<div class="heading heading--primary">
										<h2 class="heading__title no-margin-bottom"><span>Related</span>
											<span>Products</span>
										</h2>
									</div>
								</div>
								<div class="col-md-5 col-lg-4 text-md-right">
									<div class="related-slider__dots"></div>
								</div>
							</div>
							<div class="row offset-margin">
								<div class="col-12">
									<div class="related-slider">

										<?php

										$q2 = "SELECT * FROM `products` ORDER BY RAND() LIMIT 4";

										$res2 = $con->query($q2);

										if ($res2->num_rows > 0) {

											while ($row = $res2->fetch_assoc()) {

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
											<div class="related-slider__item">
										<div class="shop-item">
											<div class="shop-item__img"><a class="shop-item__add" href="shop-product.php?id=' . $id . '">
												<span>Add to cart</span></a><img class="img--contain" src="img/product/' . $img1 . '" alt="img"/></div>
											<div class="shop-item__details">
												<h6 class="shop-item__name"><a href="shop-product.html">' . $name . '</a></h6>
												<div class="shop-item__details-lower">
												<span class="shop-item__sale">
													<s class="shop-item__price-old">' . $old_price . ' ₹</s>
													<span class="shop-item__price">' . $new_price . ' ₹</span>
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
	<script>
		$(document).ready(function () {
			// Decrement functionality
			$('.form__minus').click(function () {
				var $input = $(this).siblings('.form__field');
				var currentValue = parseInt($input.val());
				// Check if currentValue is greater than 1
				if (!isNaN(currentValue) && currentValue > 1) {
					$input.val(currentValue - 1);
				}
			});

			// Increment functionality
			$('.form__plus').click(function () {
				var $input = $(this).siblings('.form__field');
				var currentValue = parseInt($input.val());
				// Check if currentValue is a number
				if (!isNaN(currentValue)) {
					$input.val(currentValue + 1);
				}
			});
		});
	</script>
	</div>
</body>

</html>