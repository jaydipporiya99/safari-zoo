<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content="description" />
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png">
	<link rel="manifest" href="img/favicon/site.webmanifest">
	<meta name="keywords" content="keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Login</title>
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
			background-image: url(img/custom/background-login.svg);
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

session_start();

	include "Db/dbConnection.php";

	if($_SERVER['REQUEST_METHOD'] === "POST"){

		$email = $_POST['email'];
		$password = $_POST['pass'];

		if(!$email || !$password){
			echo '<script> alert("Please enter email and passwords")</script>';
		}
		else{

			$q1 = "SELECT * FROM `user` WHERE `email`='".$email."'";

			$res = $con->query($q1);

			if($res){
					
				while($row = $res->fetch_assoc()){
					$uid = $row["id"];
					$fname = $row["fname"];
	                $lname = $row["lname"];
	                $email = $row["email"];
	                $password = $row["pass"];
	                $phno = $row["phno"];
	                $city = $row["city"];

					if($pass == $password){
						$_SESSION['uid'] = $uid;
						$_SESSION['fname'] = $fname;
						$_SESSION['lname'] = $lname;
						$_SESSION['email'] = $email;
						$_SESSION['pass'] = $pass;
						$_SESSION['city'] = $city;
						$_SESSION['phno'] = $phno;

						header("Location: index.php");

					}
				}

			}
			else{
				echo '<script> alert("Email Not Found Try to Register")</script>';
			}

		}
		

	}

?>

<body>
	<div class="page-wrapper">
		<main class="main">
			<!-- section start-->
			<section class="section">
				<div class="container">
					<div class="row bottom-50">
						<div class="col-12">
							<div class="heading heading--primary heading--center">
								<h2 class="heading__title no-margin-bottom"><span>Login</span> <span>with us</span></h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
							<form class="form" name="login-form" method="POST">
								<div class="row">
									<div class="col-md-6">
										<input class="form__field color--primary" type="email" name="email"
											placeholder="Your Email" required/>
									</div>
									<div class="col-md-6">
										<input class="form__field" type="password" name="pass"
											placeholder="Your Password" required/>
									</div>
									<div class="col-12 text-center">
										<button class="button button--primary button--filled" name="btn-submit"
											type="submit" value="Login">Login</button>
									</div>

									<div class="col-12">
										<div class="alert alert--success alert--filled">
											<div class="alert__icon">
												<svg class="icon">
													<use xlink:href="#check"></use>
												</svg>
											</div>
											<p class="alert__text"><strong>Well done!</strong> Your form has been sent
											</p><span class="alert__close">
												<svg class="icon">
													<use xlink:href="#close"></use>
												</svg></span>
										</div>
										<div class="alert alert--error alert--filled">
											<div class="alert__icon">
												<svg class="icon">
													<use xlink:href="#close"></use>
												</svg>
											</div>
											<p class="alert__text"><strong>Oh snap!</strong> Your form has not been sent
											</p><span class="alert__close">
												<svg class="icon">
													<use xlink:href="#close"></use>
												</svg>
											</span>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div>
					<p class="text-center m-3">New User? <strong><a id="anchor-register"
								href="register.php">Register</a></strong></p>
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