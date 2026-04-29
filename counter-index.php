<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "Db/dbConnection.php";
session_start();

if (isset ($_POST['submit'])) {

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$child = $_POST['child'];
	$adult = $_POST['adult'];
	$senior = $_POST['senior'];
	$total_amount = $child * 40 + $adult * 80 + $senior * 60;
	$date = $_POST['date'];

	$q1 = "INSERT INTO `tickets`(`fname`, `lname`, `email`, `child`, `adults`, `senior`, `total_amount`,`date`) VALUES ('$fname','$lname','$email','$child','$adult','$senior','$total_amount','$date')";

	$res = $con->query($q1);

	if ($res) {
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
		$mail->Username = 'poriyajay515@gmail.com';
		$mail->Password = 'pjuoxblrcjbvfzmu';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$mail->Port = 465;

		//Recipients
		$mail->setFrom('poriyajay515@gmail.com');
		$mail->addAddress($email);

		//Content
		$mail->isHTML(true);
		$mail->Subject = "Congrats $fname Your Safari Adventure is Booked Successfully";
		$mail->Body = '<div style="background-color: #fae0dd; padding: 20px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <div
        style="max-width: 600px; margin: 0 auto; background-color: #FFFFFF; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1
            style="color: #0163b2; text-align: center; font-size: 32px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">
            Congratulations!</h1>
            <h1 style="color: #007ce0; text-align: center; font-size: 32px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">
                ' . $fname . ' ' . $lname . '</h1>

        <p style="color: #696969; line-height: 1.8; ">Thank you for booking tickets to the zoo! Your booking details
        </p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #F0F8FF; color: #f2645a; font-weight: bold;">
                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Ticket Type</th>
                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Persons</th>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Child</td>
                <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">' . $child . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Adult</td>
                <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">' . $adult . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Senior</td>
                <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">' . $senior . '</td>
            </tr>
        </table>

        <p style="color: #696969; line-height: 1.8; margin-top: 20px;">Your total amount is <strong
                style="color: #f2645a;">' . $total_amount . '&#8377;</strong>.</p>

        <div style="text-align: center; margin-top: 30px;">
            <img src="https://cdn.dribbble.com/users/332742/screenshots/4735157/media/146a65a5e9defbce4a719f03d6e7848f.gif"
                alt="Payment Image" height="250px" style="border-radius: 8px;">
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button
                style="padding: 12px 24px; background-color: #f2645a; color: #fff; border: none; border-radius: 5px; font-size: 18px;">
                Date: ' . $date . '</button>
        </div>

        <p style="color: #696969; line-height: 1.8; margin-top: 20px;">If you have any questions, feel free to give Feedback
        </p>

        <a href="http://localhost/safari/feedback.php"><h2 style="color: #007ce0; line-height: 1.8; margin-top: 20px; text-align: center;">GIVE FEEDBACK</h2></a>
    </div>
</div>';

		$send = $mail->send();

		if ($send) {
			header("Location: counter-index.php");
		} else {
			echo "Data could not be sent. Please Try Againe!";

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
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png" />
	<link rel="manifest" href="img/favicon/site.webmanifest" />
	<title>Ticket Counter</title>
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
	<style>
		.form__field[type="date"] {
			width: 250px;
		}
	</style>
</head>

<body>
	<div class="page-wrapper">
		<!-- header start-->
		<header class="header header-common">
			<div class="header__top">
				<div class="row align-items-center">
					<div class="col-6 col-lg-4">
						<a class="logo" href="counter-index.php"><img class="logo__img" src="img/logo_zoo_black.png"
								alt="logo" /></a>
					</div>
					<div class="col-6 col-lg-8 d-flex justify-content-end">
						<!-- main menu start-->
						<ul class="main-menu">
							<li class="main-menu__item">
								<a class="main-menu__link" href="counter-index.php"><span>HOME</span></a>
							</li>
							<li class="main-menu__item">
								<a class="main-menu__link" href="counter-dashboard.php"><span>DASHBOARD</span></a>
							</li>
							<li class="main-menu__item">
								<a class="main-menu__link" href="logout.php"><span>LOGOUT</span></a>
							</li>
						</ul>
						<span class="header__button">EMPID: <span><?php if (isset ($_SESSION['id'])) {
							echo $_SESSION['id'];
						} else {
							echo "NO ID";
						}?></span></span>
					</div>
				</div>
			</div>
		</header>
		<!-- header end-->
		<main class="main">
			<section class="section background--gray">
				<form method="POST">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-4">
										<input class="form__field w-100" type="text" name="fname"
											placeholder="First Name" style="margin-right: 5px;" />
									</div>
									<div class="col-4">
										<input class="form__field w-100" type="text" name="lname"
											placeholder="Last Name" style="margin-right: 5px;" />
									</div>
									<div class="col-4">
										<input class="form__field w-100" type="email" name="email"
											placeholder="Email" />
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="cart">
									<div class="cart__heading">
										<div class="row">
											<div class="col-lg-4">
												<h6 class="cart__title">Tickets</h6>
											</div>
											<div class="col-lg-2 text-center d-none d-lg-block">
												<h6 class="cart__title">Price</h6>
											</div>
											<div class="col-lg-3 text-center d-none d-lg-block">
												<h6 class="cart__title">Persons</h6>
											</div>
											<div class="col-lg-2 text-center d-none d-lg-block">
												<h6 class="cart__title">Summary</h6>
											</div>
											<div class="col-lg-1"></div>
										</div>
									</div>
									<div class="cart__body">
										<div class="cart-item">
											<div class="row align-items-center">
												<div class="col-lg-4">
													<div class="cart-item__product">
														<div class="cart-item__product-img">
															<img class="img--contain" src="img/ticket/2.png"
																alt="img" />
														</div>
														<div class="cart-item__product-name">
															Child
															<i class="color--orange">(Up to 12 years)</i>
														</div>
													</div>
												</div>
												<div class="col-lg-2 text-center">
													<div class="cart-item__price">
														<span>40</span><span>₹</span>
													</div>
												</div>
												<div class="col-lg-3 text-center">
													<div class="cart-item__count">
														<span class="cart-item__minus"></span>
														<input class="cart-item__input" type="number" name="child"
															value="0" /><span class="cart-item__plus"></span>
													</div>
												</div>
												<div class="col-lg-2 text-center">
													<div class="cart-item__summa">
														<span>0</span><span>₹</span>
													</div>
												</div>
											</div>
										</div>
										<div class="cart-item">
											<div class="row align-items-center">
												<div class="col-lg-4">
													<div class="cart-item__product">
														<div class="cart-item__product-img">
															<img class="img--contain" src="img/ticket/3.png"
																alt="img" />
														</div>
														<div class="cart-item__product-name">
															Adults
															<i class="color--orange">(12-79 years)</i>
														</div>
													</div>
												</div>
												<div class="col-lg-2 text-center">
													<div class="cart-item__price">
														<span>80</span><span>₹</span>
													</div>
												</div>
												<div class="col-lg-3 text-center">
													<div class="cart-item__count">
														<span class="cart-item__minus"></span>
														<input class="cart-item__input" type="number" name="adult"
															value="0" /><span class="cart-item__plus"></span>
													</div>
												</div>
												<div class="col-lg-2 text-center">
													<div class="cart-item__summa">
														<span>0</span><span>₹</span>
													</div>
												</div>
											</div>
										</div>
										<div class="cart-item">
											<div class="row align-items-center">
												<div class="col-lg-4">
													<div class="cart-item__product">
														<div class="cart-item__product-img">
															<img class="img--contain" src="img/ticket/4.png"
																alt="img" />
														</div>
														<div class="cart-item__product-name">
															Senior
															<i class="color--orange">(80+ years)</i>
														</div>
													</div>
												</div>
												<div class="col-lg-2 text-center">
													<div class="cart-item__price">
														<span>60</span><span>₹</span>
													</div>
												</div>
												<div class="col-lg-3 text-center">
													<div class="cart-item__count">
														<span class="cart-item__minus"></span>
														<input class="cart-item__input" type="number" name="senior"
															value="0" /><span class="cart-item__plus"></span>
													</div>
												</div>
												<div class="col-lg-2 text-center">
													<div class="cart-item__summa">
														<span>0</span><span>₹</span>
													</div>
												</div>
											</div>
										</div>
										<div class="cart__lower">
											<div class="row">
												<div class="col-lg-8">
													<div class="coupon-block">
														<h6 class="cart__title color--orange">
															Choose Visit Date
														</h6>
														<input class="form__field w-50" name="date" id="date" min="" type="date" />
													</div>
												</div>
												<div class="col-lg-4 text-lg-right">
													<div class="cart-totals">
														<h6 class="cart__title color--orange">
															Total: <span id="total"
																class="color--primary">10</span><span
																class="color--primary"> ₹</span>
														</h6>
														<button class="form__submit" name="submit" type="submit">
															Confirm
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</section>
		</main>
	</div>
	<!-- libs-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="js/libs.min.js"></script>
	<!-- scripts-->
	<script src="js/common.js"></script>
	<script>
// Get today's date in the format YYYY-MM-DD
const today = new Date().toISOString().split('T')[0];

// Set the min attribute of the date input to today's date
document.getElementById("date").min = today;
</script>

	<script>
		$(document).ready(function () {
			// Initialize summa
			$('.cart-item__summa span:first-child').text('0');

			// Update summa on input change
			$('.cart-item__input').change(function () {
				updateSumma($(this).closest('.cart-item'));
			});

			// Decrement functionality
			$('.cart-item__minus').click(function () {
				var $input = $(this).siblings('.cart-item__input');
				var currentValue = parseInt($input.val());
				// Check if currentValue is greater than 0
				if (!isNaN(currentValue) && currentValue > 0) {
					$input.val(currentValue - 1);
					updateSumma($(this).closest('.cart-item'));
				}
			});

			// Increment functionality
			$('.cart-item__plus').click(function () {
				var $input = $(this).siblings('.cart-item__input');
				var currentValue = parseInt($input.val());
				// Check if currentValue is a number
				if (!isNaN(currentValue)) {
					$input.val(currentValue + 1);
					updateSumma($(this).closest('.cart-item'));
				}
			});

			// Update summa function
			function updateSumma(cartItem) {
				var itemName = cartItem.find('.cart-item__product-name').text().trim();
				if (!itemName.toLowerCase().includes('baby')) {
					var price = parseFloat(cartItem.find('.cart-item__price span:first-child').text());
					var quantity = parseInt(cartItem.find('.cart-item__input').val());
					var summa = price * quantity;
					cartItem.find('.cart-item__summa span:first-child').text(summa.toFixed(0)); // Round to nearest integer
				}
				updateTotal();
			}

			// Update total amount
			function updateTotal() {
				var total = 0;
				$('.cart-item__summa span:first-child').each(function () {
					total += parseFloat($(this).text());
				});
				$('#total').text(total.toFixed(0)); // Round to nearest integer for total
			}

			// Initial total calculation
			updateTotal();
		});

	</script>
	</script>
</body>

</html>