<?php

session_start();

$fname = $_SESSION['fname'];
$email = $_SESSION['email'];
$amt = $_SESSION['total_amount'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
$mail->Subject = "Account Activation";
$mail->Body = '<h2> Hello,' . $fname . ' <br> Your order Payment done for rupees is </h2><b><h1>' . $amt . '</h1></b>';

$send = $mail->send();

if ($send) {
    header("location: index.php");
} else {
    echo "Data could not be sent. Please Try Againe!";

}

?>