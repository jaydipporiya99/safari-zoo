<?php
include "Db/dbConnection.php";
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
	<title>Cart</title>
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
			<!-- section start-->
			<section class="section background--gray mt-lg-4">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!-- cart start-->
							<div class="cart">
								<div class="cart__heading">
									<div class="row">
										<div class="col-lg-4">
											<h6 class="cart__title">Products</h6>
										</div>
										<div class="col-lg-2 text-center d-none d-lg-block">
											<h6 class="cart__title">Price</h6>
										</div>
										<div class="col-lg-3 text-center d-none d-lg-block">
											<h6 class="cart__title">Quantity</h6>
										</div>
										<div class="col-lg-2 text-center d-none d-lg-block">
											<h6 class="cart__title">Summary</h6>
										</div>
										<div class="col-lg-1"></div>
									</div>
								</div>
								<div class="cart__body">


									<?php

									$email = $_SESSION['email'];

									$q1 = "SELECT * FROM `orders` WHERE `payment` = '' AND `email`='" . $email . "'";

									$res = $con->query($q1);

									if ($res->num_rows > 0) {
										$total_qty = 0;
										$total_price = 0;
										while ($row = $res->fetch_assoc()) {
											$pid = $row['pid'];
											$qty = $row['pqty'];

											$total_qty = $total_qty + $qty;


											$q2 = "SELECT * FROM `products` where `id`=$pid";

											$res2 = $con->query($q2);

											if ($res2->num_rows > 0) {

												while ($row2 = $res2->fetch_assoc()) {

													$new_price = $row2['new_price'];
													$name = $row2['name'];
													$img1 = $row2['img1'];
													$total = $qty * $new_price;

													$total_price = $total_price + $total;

													echo '<div class="cart-item">
																				<div class="row align-items-center">
																					<div class="col-lg-4">
																						<div class="cart-item__product">
																							<div class="cart-item__product-img">
																							<img class="img--contain" src="img/product/' . $img1 . '" alt="img"/></div>
																							<div class="cart-item__product-name"><a href="shop-product.html">' . $name . '</a></div>
																						</div>
																					</div>
																					<div class="col-lg-2 text-center">
																						<div class="cart-item__price"> <span>' . $new_price . '</span><span>₹</span></div>
																					</div>
																					<div class="col-lg-3 text-center">
																						<div class=""><span class=""></span>
																							<input class="cart-item__input background--white" type="number" value="' . $qty . '"/><span class=""></span>
																						</div>
																					</div>
																					<div class="col-lg-2 text-center">
																						<div class="cart-item__summa"><span>' . $total . '</span><span>₹</span></div>
																					</div>
																					<div class="col-lg-1 text-center text-lg-right"><span class="cart-item__remove">
																						<svg class="icon">
																							<use xlink:href="#remove"></use>
																						</svg></span></div>
																				</div>
																			</div>';
												}

											}

										}

									}
									else{
										echo '<h5 class="text-center mt-5" style="color:red;">Please Add Products</h5>';
									}

									?>

									<div class="cart__lower">
										<div class="row">
											<div class="col-lg-4">
												<div class="cart-totals">
													<h6 class="cart__title color--orange">Quantity Totals: <span
															class="color--primary">
															<?php echo isset($total_qty) ? $total_qty : "00" ?>
														</span></h6>
													<h6 class="cart__title color--orange">Cart Totals: <span
															class="color--primary">
															<?php echo isset($total_price) ? $total_price : "00" ?> ₹
														</span></h6>
													<a class="cart-totals__link button button--primary"
														href="shop-checkout.php">Proceed to Checkout</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- cart end-->
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