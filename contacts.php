
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content="description" />
	<meta name="keywords" content="keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="img/favicon/site.webmanifest">
	<title>Contact</title>

	<link rel="stylesheet" href="css/styles.min.css" />

	<script>
		WebFontConfig = {
			google: {
				families: ['Nunito+Sans:300,400,500,700,900', 'Quicksand:300,400,500,700']
			}
		}

		function font() {
			var wf = document.createElement('script')
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
				'://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
			wf.type = 'text/javascript'
			wf.async = 'true'

			var s = document.getElementsByTagName('script')[0]
			s.parentNode.insertBefore(wf, s)
		}

		font()
	</script>
</head>

<?php

include "Db/dbConnection.php";
session_start();

/* Default values to avoid undefined errors */

$name = $_SESSION['fname'] ?? '';
$email = $_SESSION['email'] ?? '';
$phno = $_SESSION['phno'] ?? '';

/* Form submission */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $_POST['name'] ?? '';
	$email = $_POST['email'] ?? '';
	$phno = $_POST['phone'] ?? '';
	$subject = $_POST['subject'] ?? '';
	$desc = $_POST['message'] ?? '';

	$q1 = "INSERT INTO contact_us (name,email,phno,subject,`desc`)
	       VALUES ('$name','$email','$phno','$subject','$desc')";

	$res = $con->query($q1);

	if ($res) {
		header("Location: index.php");
		exit();
	} else {
		echo "Something Went Wrong!";
	}
}

?>

<body>

<div class="page-wrapper">

<?php
$currentPage = "contacts";
include "header.php";
?>

<main class="main">

<section class="promo-primary">
<picture>
<source srcset="img/contacts.jpg" media="(min-width: 992px)" />
<img class="img--bg" src="img/contacts.jpg" alt="img" />
</picture>

<div class="container">
<div class="row">
<div class="col-auto">
<div class="align-container">
<div class="align-container__item">
<span class="promo-primary__pre-title">SAFARI ZOO</span>
<h1 class="promo-primary__title">
<span>Our</span> <span>Contacts</span>
</h1>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="section">
<div class="container">

<div class="row bottom-50">
<div class="col-12">
<div class="heading heading--primary heading--center">
<h2 class="heading__title no-margin-bottom">
<span>Get in touch</span> <span>with us</span>
</h2>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">

<form class="form" method="POST">

<div class="row">

<div class="col-md-6">
<input class="form__field"
type="text"
name="name"
value="<?php echo htmlspecialchars($name); ?>"
placeholder="Your Name"
/>
</div>

<div class="col-md-6">
<input class="form__field"
type="email"
name="email"
value="<?php echo htmlspecialchars($email); ?>"
placeholder="Your Email"
/>
</div>

<div class="col-md-6">
<input class="form__field"
type="tel"
name="phone"
value="<?php echo htmlspecialchars($phno); ?>"
placeholder="Your Phone"
/>
</div>

<div class="col-md-6">
<input class="form__field"
type="text"
name="subject"
placeholder="Subject"
/>
</div>

<div class="col-12">
<textarea class="form__field form__message"
name="message"
placeholder="Text"></textarea>
</div>

<div class="col-12 text-center">
<button class="form__submit" type="submit">
Send
</button>
</div>

</div>
</form>

</div>
</div>

</div>
</section>


<section class="map-section">

<iframe
src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d929.7610525616728!2d72.8984099!3d21.2300954!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f44cd96e579%3A0xed965f1bff11ae63!2sSarthana%20Nature%20Park!5e0!3m2!1sen!2sin!4v1710837484626!5m2!1sen!2sin"
width="800"
height="600"
style="border:0;"
allowfullscreen=""
loading="lazy"
referrerpolicy="no-referrer-when-downgrade">
</iframe>

</section>

</main>

<?php include "footer.php"; ?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>

</body>
</html>
