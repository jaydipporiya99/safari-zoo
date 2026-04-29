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
$mail->SMTPDebug  = 0;
$mail->Username   = 'poriyajay515@gmail.com';
$mail->Password   = 'pjuoxblrcjbvfzmu';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

$mail->setFrom('poriyajay515@gmail.com', 'Safari Zoo');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = "🎉 Congrats $fname! Your Safari Zoo Ticket is Confirmed!";
$mail->Body = '
<!DOCTYPE html>
<html>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Verdana, Geneva, Tahoma, sans-serif;">

<div style="max-width:620px; margin:30px auto; background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background: linear-gradient(135deg, #f2645a, #ff8c00); padding: 40px 30px; text-align:center;">
        <h1 style="color:#ffffff; margin:0; font-size:28px; letter-spacing:2px; text-transform:uppercase;">
            🦁 Safari Zoo
        </h1>
        <p style="color:#ffe0c0; margin:8px 0 0; font-size:14px;">Your Adventure Awaits!</p>
    </div>

    <!-- Congratulations -->
    <div style="padding: 30px; text-align:center; background-color:#fff8f0;">
        <h2 style="color:#f2645a; font-size:26px; margin:0;">🎉 Congratulations!</h2>
        <h3 style="color:#333333; font-size:22px; margin:10px 0 0; text-transform:uppercase;">
            ' . $fname . '
        </h3>
        <p style="color:#666666; margin:10px 0 0; font-size:15px;">
            Your ticket booking is <strong style="color:#f2645a;">confirmed successfully!</strong>
        </p>
    </div>

    <!-- Ticket Details -->
    <div style="padding: 30px;">
        <h4 style="color:#333; border-bottom: 2px solid #f2645a; padding-bottom:8px; margin-bottom:20px;">
            🎫 Booking Details
        </h4>

        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background-color:#f2645a;">
                    <th style="padding:12px; text-align:left; color:#fff; font-size:14px;">Ticket Type</th>
                    <th style="padding:12px; text-align:center; color:#fff; font-size:14px;">Persons</th>
                    <th style="padding:12px; text-align:center; color:#fff; font-size:14px;">Price Each</th>
                    <th style="padding:12px; text-align:right; color:#fff; font-size:14px;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr style="background-color:#fff8f0;">
                    <td style="padding:12px; color:#333; font-size:14px;">👶 Child <span style="color:#999; font-size:12px;">(up to 12 yrs)</span></td>
                    <td style="padding:12px; text-align:center; color:#333; font-size:14px;">' . $child . '</td>
                    <td style="padding:12px; text-align:center; color:#333; font-size:14px;">&#8377;40</td>
                    <td style="padding:12px; text-align:right; color:#f2645a; font-weight:bold; font-size:14px;">&#8377;' . ($child * 40) . '</td>
                </tr>
                <tr style="background-color:#ffffff;">
                    <td style="padding:12px; color:#333; font-size:14px;">🧑 Adult <span style="color:#999; font-size:12px;">(12-79 yrs)</span></td>
                    <td style="padding:12px; text-align:center; color:#333; font-size:14px;">' . $adult . '</td>
                    <td style="padding:12px; text-align:center; color:#333; font-size:14px;">&#8377;80</td>
                    <td style="padding:12px; text-align:right; color:#f2645a; font-weight:bold; font-size:14px;">&#8377;' . ($adult * 80) . '</td>
                </tr>
                <tr style="background-color:#fff8f0;">
                    <td style="padding:12px; color:#333; font-size:14px;">👴 Senior <span style="color:#999; font-size:12px;">(80+ yrs)</span></td>
                    <td style="padding:12px; text-align:center; color:#333; font-size:14px;">' . $senior . '</td>
                    <td style="padding:12px; text-align:center; color:#333; font-size:14px;">&#8377;60</td>
                    <td style="padding:12px; text-align:right; color:#f2645a; font-weight:bold; font-size:14px;">&#8377;' . ($senior * 60) . '</td>
                </tr>
                <tr style="background-color:#f2645a;">
                    <td colspan="3" style="padding:14px; color:#fff; font-size:16px; font-weight:bold;">
                        💰 Total Amount
                    </td>
                    <td style="padding:14px; text-align:right; color:#fff; font-size:18px; font-weight:bold;">
                        &#8377;' . $total . '
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Visit Date -->
    <div style="margin: 0 30px 30px; background: linear-gradient(135deg, #007ce0, #0163b2); border-radius:10px; padding:20px; text-align:center;">
        <p style="color:#bbe3ff; margin:0; font-size:13px; text-transform:uppercase; letter-spacing:1px;">📅 Your Visit Date</p>
        <h2 style="color:#ffffff; margin:8px 0 0; font-size:26px;">' . $new_date . '</h2>
    </div>

    <!-- GIF -->
    <div style="text-align:center; padding: 0 30px 20px;">
        <img src="https://cdn.dribbble.com/users/332742/screenshots/4735157/media/146a65a5e9defbce4a719f03d6e7848f.gif"
             alt="Celebration" height="200px" style="border-radius:10px; max-width:100%;">
    </div>

    <!-- Feedback -->
    <div style="background-color:#fff8f0; padding:20px 30px; text-align:center; border-top: 1px solid #ffe0c0;">
        <p style="color:#666; margin:0 0 12px; font-size:14px;">Have questions or feedback? We would love to hear from you!</p>
        <a href="http://localhost/safari/feedback.php"
           style="display:inline-block; background-color:#f2645a; color:#ffffff; text-decoration:none; padding:12px 30px; border-radius:6px; font-size:15px; font-weight:bold;">
           ✍️ Give Feedback
        </a>
    </div>

    <!-- Footer -->
    <div style="background-color:#333333; padding:20px 30px; text-align:center;">
        <p style="color:#aaaaaa; margin:0; font-size:12px;">
            © 2026 Safari Zoo. All rights reserved.<br>
            <span style="color:#666;">This is an automated email. Please do not reply.</span>
        </p>
    </div>

</div>

</body>
</html>';

$send = $mail->send();

if ($send) {
    header("Location: index.php");
    exit();
} else {
    echo "Mail could not be sent. Please try again!";
}

?>