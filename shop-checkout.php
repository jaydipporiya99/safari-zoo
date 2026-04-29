<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "Db/dbConnection.php";
session_start();

$email = $_SESSION['email'];

if (isset($_POST['order'])) {

	$address = $_POST['address'];
	$landmark = $_POST['landmark'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$totalamt = $_SESSION['total_amount'];


	$q3 = "UPDATE `orders` SET`address`='$address',`landmark`='$landmark',`state`='$state',`city`='$city',`zip`='$zip' WHERE `email` = '" . $email . "'";

	$res3 = $con->query($q3);

	if ($res3) {

		$q4 = "UPDATE `orders` SET`payment`='Success' WHERE `email`='" . $email . "'";

		$res4 = $con->query($q4);

		if ($res4) {
			require 'mail/Exception.php';
			require 'mail/PHPMailer.php';
			require 'mail/SMTP.php';

			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);

			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPSecure = "tls";
			$mail->SMTPAuth = true;
			$mail->SMTPDebug = 0;
			$mail->Username = 'fid395010@gmail.com';
			$mail->Password = 'bqtuehgllvziickt';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port = 465;

			//Recipients
			$mail->setFrom('jobconnect155@gmail.com');
			$mail->addAddress($email);

			//Content
			$mail->isHTML(true);
			$mail->Subject = "Order Placed Successfully";
			$mail->Body = '<div style="background-color: #40c778; padding: 20px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <div
        style="max-width: 600px; margin: 0 auto; background-color: #FFFFFF; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1
            style="color: #6c94e0; text-align: center; font-size: 32px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">
            Congratulations! Your Order Has Been Placed Successfully</h1>

        <p style="color: #696969; line-height: 1.8; ">You will receive your order within 7 working days.
        </p>


        <p style="color: #696969; line-height: 1.8; margin-top: 20px;">Your total amount is <strong
                style="color: #f2645a;">'.$totalamt.' &#8377;</strong>.</p>

        <div style="text-align: center; margin-top: 30px;">
            <img src="https://cdn.dribbble.com/users/2572904/screenshots/17169793/media/ed801ffe0fbeb4b95ca246ba1f5ea398.gif"
                alt="Payment Image" height="250px" style="border-radius: 8px;">
        </div>

        <p style="color: #696969; line-height: 1.8; margin-top: 20px;">If you have any questions, feel free to contact
            our support team.</p>

        <h2 style="color: #007ce0; line-height: 1.8; margin-top: 20px; text-align: center;">SAFARI</h2>
    </div>
</div>';

			$send = $mail->send();

			if (!$send) {
				echo "Data could not be sent. Please Try Againe!";
			} else {
				header("Location: payemnt-cart.php");
		}
		}
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
	<title>Checkout</title>
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
			<section class="section checkout mt-3">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!-- checkout start-->
							<form class="form checkout-form" method="POST">
								<div class="row">
									<div class="col-lg-7 col-xl-8">
										<div class="checkout__wrapper">
											<div class="form__fieldset">
												<h6 class="form__title">Personal Information</h6>
												<div class="row offset-30">
													<div class="col-md-6">
														<input class="form__field" type="text" value="<?php echo $_SESSION['fname']; ?>" name="first-name" placeholder="First Name" />
													</div>
													<div class="col-md-6">
														<input class="form__field" type="text" value="<?php echo $_SESSION['lname']; ?>" name="last-name" placeholder="Last Name" />
													</div>
													<div class="col-md-6">
														<input class="form__field" type="tel" value="<?php echo $_SESSION['phno']; ?>" name="phone-number" placeholder="Phone" />
													</div>
													<div class="col-md-6">
														<input class="form__field" type="email" value="<?php echo $_SESSION['email']; ?>" name="email" placeholder="Email" />
													</div>
												</div>
											</div>
											<div class="form__fieldset no-margin-bottom">
												<h6 class="form__title">Shipping Information</h6>
												<div class="row offset-30">
													<div class="col-12">
														<input class="form__field" type="text" name="address" placeholder="Address" />
													</div>
													<div class="col-md-6">
														<input class="form__field" type="text" name="landmark" placeholder="Landmark" />
													</div>
													<div class="col-md-6">
														<select class="form__select" name="state">
															<option selected disabled value="value">State</option>
															<option value="Andhra Pradesh">Andhra Pradesh</option>
															<option value="Arunachal Pradesh">Arunachal Pradesh</option>
															<option value="Assam">Assam</option>
															<option value="Bihar">Bihar</option>
															<option value="Chhattisgarh">Chhattisgarh</option>
															<option value="Goa">Goa</option>
															<option value="Gujarat">Gujarat</option>
															<option value="Haryana">Haryana</option>
															<option value="Himachal Pradesh">Himachal Pradesh</option>
															<option value="Jharkhand">Jharkhand</option>
															<option value="Karnataka">Karnataka</option>
															<option value="Kerala">Kerala</option>
															<option value="Madhya Pradesh">Madhya Pradesh</option>
															<option value="Maharashtra">Maharashtra</option>
															<option value="Manipur">Manipur</option>
															<option value="Meghalaya">Meghalaya</option>
															<option value="Mizoram">Mizoram</option>
															<option value="Nagaland">Nagaland</option>
															<option value="Odisha">Odisha</option>
															<option value="Punjab">Punjab</option>
															<option value="Rajasthan">Rajasthan</option>
															<option value="Sikkim">Sikkim</option>
															<option value="Tamil Nadu">Tamil Nadu</option>
															<option value="Telangana">Telangana</option>
															<option value="Tripura">Tripura</option>
															<option value="Uttar Pradesh">Uttar Pradesh</option>
															<option value="Uttarakhand">Uttarakhand</option>
															<option value="West Bengal">West Bengal</option>
														</select>
													</div>
													<div class="col-md-6">
														<input class="form__field" type="text" name="city" placeholder="City" />
													</div>
													<div class="col-md-6">
														<input class="form__field" type="text" name="zip" placeholder="Zip" pattern="[0-9]{6}" title="Please enter a valid 6-digit zip code" />
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-5 col-xl-4">
										<div class="checkout__wrapper">
											<div class="form__fieldset">
												<h6 class="form__title">Order Summary</h6>

												<?php



												$q1 = "SELECT * FROM `orders` WHERE `payment` = '' AND `email`='" . $email . "'";

												$res = $con->query($q1);

												if ($res->num_rows > 0) {
													$total_qty = 0;
													$total_price = 0;
													while ($row = $res->fetch_assoc()) {
														$pid = $row['pid'];
														$id = $row['id'];
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

																$_SESSION['total_per_item'] = $total;

																$total_price = $total_price + $total;

																echo '
																		 <div class="order-item">
													<div class="row no-gutters align-items-center">
														<div class="col-4 col-sm-3 col-md-2 col-lg-4">
															<div class="order-item__img"><img class="img--contain"
																	src="img/product/' . $img1 . '" alt="img" /></div>
														</div>
														<div class="col-7 col-sm-8 col-md-9 col-lg-7">
															<div class="order-item__description"><a
																	class="order-item__link"
																	href="shop-product.html">' . $name . '</a>
																<div class="order-item__count"> <span>' . $new_price . ' ₹
																	</span><span>x' . $qty . '</span></div>
															</div>
														</div>
														<div class="col-1 text-right"><span class="order-item__remove">
																<a href="delete.php?id=' . $id . '">
																	<svg class="icon">
																		<span class="fa fa-remove"
																			style="font-size: 20px; color:red;"></span>
																	</svg>
																</a>
															</span>
															</div>
													</div>
												</div>';
															}
														}

														$_SESSION['total_amount'] = $total_price;
													}
												}

												?>




											</div>
											<div class="form__fieldset no-margin-bottom">
												<div class="cart-totals">
													<h6 class="form__title">Cart Total</h6>
													<ul class="cart-totals__list">
														<li><span>Quantity</span><span><?php echo $total_qty; ?></span></li>
														<li><span>Total:</span><span><?php echo $total_price; ?></span>₹</li>
													</ul>
													<button class="form__submit" name="order" type="submit">&nbsp;Place
														Order&nbsp;</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
							<!-- checkout end-->
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