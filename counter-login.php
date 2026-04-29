<?php

session_start();

include "Db/dbConnection.php";

if (isset ($_POST['add'])) {

  $id = $_POST['id'];
  $pass = $_POST['pass'];

  $select = "SELECT * FROM `emp` WHERE id='$id' AND pass='$pass'";

  $result = $con->query($select);

  $count = mysqli_num_rows($result);

  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $pass = $row['pass'];
    }

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;

    header("location:counter-index.php");
  } else {
    echo '<script>alert("Email or Password is Incorrect");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="description"/>
		<meta name="keywords" content="keywords"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png" />
		<link rel="manifest" href="img/favicon/site.webmanifest" />
		<title>Counter Login</title>
		<!-- styles-->
		<link rel="stylesheet" href="css/styles.min.css"/>

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
			body{
				background-color: #f3f4f5;
			}
			.page-wrapper {
				display: flex;
				justify-content: center;
				align-items: center;
				min-height: 100vh;
				margin: 0px 450px 0px 450px;
				
			}
		</style>
	</head>
	<body>
		<div class="page-wrapper">
			<form  method="POST" class="form account-form sign-in-form">
				<div class="form__fieldset">
					<h6 class="form__title">Login</h6>
					<div class="row">
						<div class="col-12">
							<input class="form__field" type="text" name="id" placeholder="Employee ID" />
							<input class="form__field" type="password" name="pass" placeholder="Employee Password" />
						</div>
						<div class="col-12">
							<button class="form__button form__submit" name="add" type="submit">Login</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- libs-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="js/libs.min.js"></script>
		<!-- scripts-->
		<script src="js/common.js"></script>
	</body>
</html>