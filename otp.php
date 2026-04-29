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
	<title>OTP</title>
	<!-- styles-->
	<link rel="stylesheet" href="css/styles.min.css" />
	<link rel="stylesheet" href="css/custom.css" />
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
	<style>
		.page-wrapper {
			background-image: url(img/custom/background-otp.svg);
			background-size: cover;
			background-position: center bottom;
		}

		#anchor-register {
			color: #282f34;
			text-decoration: underline;
			text-decoration-skip-ink: auto;
		}

		#anchor-register:hover {
			color: #fdd340;
			text-decoration-line: none;
		}
	</style>
</head>

<?php 

include "./Db/dbConnection.php";

session_start();

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$pass = $_SESSION['pass'];
$city = $_SESSION['city'];
$phno = $_SESSION['phno'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

$user_otp = $_POST['otp'];

if($user_otp == $_SESSION["genrate_otp"]){

	$q1 = "INSERT INTO `user`(`fname`, `lname`, `email`, `password`, `phno`, `city`) VALUES ('$fname','$lname','$email','$pass','$phno','$city')";

	$res = $con->query($q1);

	if(!$res){
		echo "Error-> Internal Server Error";
		header("Location: register.php");
	}
	header("Location: index.php");

}else{
header("Location: register.php");
}

}

?>

<body>
	<div class="page-wrapper">
		<main class="main">
			<!-- section start-->
			<section class="mt-lg-5">
				<div class="container">
					<div class="row bottom-50">
						<div class="col-12">
							<div class="heading heading--primary heading--center">
								<h2 class="heading__title no-margin-bottom"><span>Confirm</span> <span>OTP</span></h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
							<p class="color--primary text-center">Enter 4 digit code sent to <?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "Email Not Valid Go Back" ?></p>
							<form class="form" name="otp-form" id="otp-form" method="POST">
								<div class="row mt-3">
									<div class="col-md-6 offset-md-3 text-center">
										<input class="form__field" type="number" name="otp" id="otpInput" minlength="4"
											maxlength="4" pattern="[0-9]{4}" placeholder="Enter 4-Digit OTP" />
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-md-12 text-center">
										<button class="button button--primary button--filled" name="btn-submit"
											type="submit" value="Submit OTP">Submit OTP</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div>
					<p class="text-center m-3"><strong><a id="anchor-register" href="register.php">Edit Email</a></strong></p>
				</div>
			</section>
			<!-- section end-->
		</main>
	</div>
	<!-- libs-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/libs.min.js"></script>
	<!-- scripts-->
	<script src="js/common.js"></script>
</body>

</html>