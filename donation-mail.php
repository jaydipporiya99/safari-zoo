<?php

session_start();

$fname  = $_SESSION['fname']        ?? '';
$email  = $_SESSION['email']        ?? '';
$amount = $_SESSION['sesAmt']       ?? 0;
$title  = $_SESSION['title']        ?? 'Animal Care';

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
$mail->Subject = " Thank You $fname! Your Donation is Received!";
$mail->Body = '
<!DOCTYPE html>
<html>
<body style="margin:0;padding:0;background-color:#fae0dd;font-family:Verdana,Geneva,Tahoma,sans-serif;">
<div style="max-width:620px;margin:30px auto;background-color:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.1);">

    <div style="background:linear-gradient(135deg,#f2645a,#ff8c00);padding:40px 30px;text-align:center;">
        <h1 style="color:#fff;margin:0;font-size:28px;letter-spacing:2px;text-transform:uppercase;">🦁 Safari Zoo</h1>
        <p style="color:#ffe0c0;margin:8px 0 0;font-size:14px;">Thank You for Your Generosity!</p>
    </div>

    <div style="padding:30px;text-align:center;background-color:#fff8f0;">
        <h2 style="color:#f2645a;font-size:26px;margin:0;">Thank You!</h2>
        <h3 style="color:#333;font-size:22px;margin:10px 0 0;text-transform:uppercase;">
            ' . $fname . '
        </h3>
        <p style="color:#666;margin:10px 0 0;font-size:15px;">
            Your generous donation has been <strong style="color:#f2645a;">received successfully!</strong><br>
            You are helping us care for our amazing animals. 🐘🦁🐼
        </p>
    </div>

    <div style="padding:30px;">
        <h4 style="color:#333;border-bottom:2px solid #f2645a;padding-bottom:8px;margin-bottom:20px;">
            💰 Donation Details
        </h4>
        <table style="width:100%;border-collapse:collapse;">
            <tr style="background-color:#f2645a;">
                <th style="padding:14px;text-align:left;color:#fff;font-size:14px;">Description</th>
                <th style="padding:14px;text-align:right;color:#fff;font-size:14px;">Amount</th>
            </tr>
            <tr style="background-color:#fff8f0;">
                <td style="padding:14px;color:#333;font-size:15px;">
                    🐾 ' . $title . ' - Animal Care Donation
                </td>
                <td style="padding:14px;text-align:right;color:#f2645a;font-weight:bold;font-size:18px;">
                    &#8377;' . $amount . '
                </td>
            </tr>
            <tr style="background-color:#f2645a;">
                <td style="padding:14px;color:#fff;font-weight:bold;font-size:15px;">Total Donated</td>
                <td style="padding:14px;text-align:right;color:#fff;font-weight:bold;font-size:20px;">
                    &#8377;' . $amount . '
                </td>
            </tr>
        </table>
    </div>

    <div style="margin:0 30px 30px;background:linear-gradient(135deg,#007ce0,#0163b2);border-radius:10px;padding:25px;text-align:center;">
        <p style="color:#bbe3ff;margin:0;font-size:13px;text-transform:uppercase;letter-spacing:1px;">🌟 Your Impact</p>
        <p style="color:#fff;margin:10px 0 0;font-size:15px;line-height:1.6;">
            Your donation of <strong>&#8377;' . $amount . '</strong> will help us provide<br>
            food, shelter and medical care for our animals!
        </p>
    </div>

    <div style="text-align:center;padding:0 30px 20px;">
        <img src="https://cdn.dribbble.com/userupload/4298996/file/original-da0abee3d6d203e679f1665f203d4e68.gif"
             alt="Thank You" height="200px" style="border-radius:10px;max-width:100%;">
    </div>

    <div style="background-color:#fff8f0;padding:20px 30px;text-align:center;border-top:1px solid #ffe0c0;">
        <p style="color:#666;margin:0 0 12px;font-size:14px;">Have questions? Feel free to give us feedback!</p>
        <a href="http://localhost/safari/feedback.php"
           style="display:inline-block;background-color:#f2645a;color:#fff;text-decoration:none;padding:12px 30px;border-radius:6px;font-size:15px;font-weight:bold;">
           ✍️ Give Feedback
        </a>
    </div>

    <div style="background-color:#333;padding:20px 30px;text-align:center;">
        <p style="color:#aaa;margin:0;font-size:12px;">
            © 2026 Safari Zoo. All rights reserved.<br>
            <span style="color:#666;">This is an automated email. Please do not reply.</span>
        </p>
    </div>

</div>
</body>
</html>';

$mail->send();

header("Location: index.php");
exit();

?>