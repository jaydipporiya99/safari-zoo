<?php

session_start();

$fname  = $_SESSION['fname'];
$email  = $_SESSION['email'];
$total  = $_SESSION['totalTicket']    ?? 0;
$child  = $_SESSION['child_tickets']  ?? 0;
$adult  = $_SESSION['adult_tickets']  ?? 0;
$senior = $_SESSION['senior_tickets'] ?? 0;
$date   = $_SESSION['date']           ?? '';

$new_date = date('d-m-Y', strtotime($date));

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'poriyajay515@gmail.com';
$mail->Password   = 'pjuoxblrcjbvfzmu';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;
$mail->SMTPDebug  = 0;

$mail->setFrom('poriyajay515@gmail.com', 'Safari Zoo');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = "Congrats $fname Your Safari Adventure is Booked Successfully";
$mail->Body = '
<div style="background-color: #fae0dd; padding: 20px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #FFFFFF; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        
        <h1 style="color: #0163b2; text-align: center; font-size: 32px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">
            Congratulations!
        </h1>
        <h2 style="color: #007ce0; text-align: center; text-transform: uppercase; margin-bottom: 20px;">
            ' . $fname . '
        </h2>

        <p style="color: #696969; line-height: 1.8;">
            Thank you for booking tickets to Safari Zoo! Your booking details are below:
        </p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #F0F8FF; color: #f2645a; font-weight: bold;">
                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Ticket Type</th>
                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Persons</th>
                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Price Each</th>
                <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Subtotal</th>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">Child (up to 12 yrs)</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">' . $child . '</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">&#8377;40</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">&#8377;' . ($child * 40) . '</td>
            </tr>
            <tr style="background-color: #fafafa;">
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">Adult (12-79 yrs)</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">' . $adult . '</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">&#8377;80</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">&#8377;' . ($adult * 80) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">Senior (80+ yrs)</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">' . $senior . '</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">&#8377;60</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">&#8377;' . ($senior * 60) . '</td>
            </tr>
            <tr style="background-color: #F0F8FF;">
                <td colspan="3" style="padding: 10px; font-weight: bold; color: #f2645a;">Total Amount</td>
                <td style="padding: 10px; font-weight: bold; color: #f2645a;">&#8377;' . $total . '</td>
            </tr>
        </table>

        <div style="text-align: center; margin-top: 30px;">
            <img src="https://cdn.dribbble.com/users/332742/screenshots/4735157/media/146a65a5e9defbce4a719f03d6e7848f.gif" 
                 alt="Success" height="200px" style="border-radius: 8px;">
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <span style="padding: 12px 24px; background-color: #f2645a; color: #fff; border-radius: 5px; font-size: 18px; display: inline-block;">
                Visit Date: ' . $new_date . '
            </span>
        </div>

        <p style="color: #696969; line-height: 1.8; margin-top: 20px; text-align: center;">
            Questions? Feel free to give us feedback!
        </p>
        <div style="text-align: center; margin-top: 10px;">
            <a href="http://localhost/safari/feedback.php" 
               style="color: #007ce0; font-size: 18px; font-weight: bold; text-decoration: none;">
               GIVE FEEDBACK
            </a>
        </div>

    </div>
</div>';

$send = $mail->send();

if ($send) {
    header("Location: index.php");
    exit();
} else {
    echo "Mail could not be sent. Please try again!";
}

?>