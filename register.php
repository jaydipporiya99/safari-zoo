
<?php
session_start();

$fname = $_SESSION['fname'] ?? '';
$lname = $_SESSION['lname'] ?? '';
$email = $_SESSION['email'] ?? '';
$pass  = $_SESSION['pass'] ?? '';
$city  = $_SESSION['city'] ?? '';
$phno  = $_SESSION['phno'] ?? '';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_SERVER["REQUEST_METHOD"] == "POST"){

$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$pass  = $_POST["pass"];
$cpass = $_POST["confirm-pass"];
$phno  = $_POST["phno"];
$city  = $_POST["city"];

if($pass === $cpass){

$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['email']=$email;
$_SESSION['pass']=$pass;
$_SESSION['city']=$city;
$_SESSION['phno']=$phno;

$_SESSION["genrate_otp"]=random_int(1000,9999);

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

$mail = new PHPMailer(true);

try{

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;

$mail->Username = 'poriyajay515@gmail.com'; //gmail open ker
$mail->Password = 'pjuoxblrcjbvfzmu';   // Gmail App Password

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

$mail->setFrom('poriyajay515@gmail.com','Safari Zoo');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject='OTP SAFARI ZOO';

$mail->Body='
<div style="background:#A2C579;padding:20px;font-family:Verdana">
<div style="max-width:600px;margin:auto;background:#FFFFDD;padding:30px;border-radius:10px">
<h2 style="text-align:center;color:#016A70">Hello '.$fname.'</h2>

<p style="text-align:center">Your OTP Code</p>

<div style="text-align:center;margin:30px">
<span style="font-size:40px;background:#D2DE32;padding:10px 20px;border-radius:5px">
'.$_SESSION["genrate_otp"].'
</span>
</div>

<p style="text-align:center">Do not share this OTP with anyone.</p>

<p style="text-align:center;font-weight:bold;color:#016A70">Safari Zoo</p>
</div>
</div>
';

$mail->send();

header("Location: otp.php");
exit();

}catch(Exception $e){
echo "Mailer Error: ".$mail->ErrorInfo;
}

}else{
echo "Password and Confirm Password do not match";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>

<link rel="stylesheet" href="css/styles.min.css">
<link rel="stylesheet" href="css/custom.css">

<style>

.page-wrapper{
background-image:url(img/custom/background-register.svg);
background-size:cover;
background-position:center bottom;
}

#anchor-register{
color:#282f34;
text-decoration:underline;
}

#anchor-register:hover{
color:#fdd340;
text-decoration:none;
}

</style>

</head>

<body>

<div class="page-wrapper">

<main class="main">

<section class="mt-xl-5">

<div class="container">

<div class="row bottom-50">
<div class="col-12">
<h2 style="text-align:center">Register With Us</h2>
</div>
</div>

<div class="row">
<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">

<form class="form mx-auto" method="POST">

<div class="row">

<div class="col-md-6">
<input class="form__field" type="text" name="first_name"
value="<?php echo htmlspecialchars($fname); ?>"
placeholder="First Name" required>
</div>

<div class="col-md-6">
<input class="form__field" type="text" name="last_name"
value="<?php echo htmlspecialchars($lname); ?>"
placeholder="Last Name" required>
</div>

</div>

<div class="row">
<div class="col-md-12">
<input class="form__field" type="email" name="email"
value="<?php echo htmlspecialchars($email); ?>"
placeholder="Email" required>
</div>
</div>

<div class="row">

<div class="col-md-6">
<input class="form__field" type="password" name="pass"
placeholder="Password" required>
</div>

<div class="col-md-6">
<input class="form__field" type="password" name="confirm-pass"
placeholder="Confirm Password" required>
</div>

</div>

<div class="row">

<div class="col-md-6">
<input class="form__field" type="number" name="phno"
value="<?php echo htmlspecialchars($phno); ?>"
placeholder="Phone Number" required>
</div>

<div class="col-md-6">
<input class="form__field" type="text" name="city"
value="<?php echo htmlspecialchars($city); ?>"
placeholder="City" required>
</div>

</div>

<div class="row">
<div class="col-12 text-center">
<button type="submit" class="button button--primary button--filled">
Register
</button>
</div>
</div>

</form>

</div>
</div>

</div>

<p style="text-align:center;margin:20px">
Already Registered? <a id="anchor-register" href="login.php">Login</a>
</p>

</section>

</main>

</div>

<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>

</body>
</html>

