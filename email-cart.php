<?php

session_start();

$fname = $_SESSION['fname']        ?? '';
$email = $_SESSION['email']        ?? '';
$amt   = $_SESSION['total_amount'] ?? 0;

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
$mail->CharSet    = 'UTF-8';
$mail->Username   = 'poriyajay515@gmail.com';
$mail->Password   = 'pjuoxblrcjbvfzmu';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

$mail->setFrom('poriyajay515@gmail.com', 'Safari Zoo');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = "Order Placed Successfully - Safari Zoo";
$mail->Body = '
<!DOCTYPE html>
<html>
<body style="margin:0;padding:0;background-color:#e8f5e9;font-family:Verdana,Geneva,Tahoma,sans-serif;">
<div style="max-width:620px;margin:30px auto;background-color:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.1);">

    <div style="background:linear-gradient(135deg,#43a047,#66bb6a);padding:40px 30px;text-align:center;">
        <h1 style="color:#fff;margin:0;font-size:28px;letter-spacing:2px;text-transform:uppercase;">
            Safari Zoo Shop
        </h1>
        <p style="color:#c8e6c9;margin:8px 0 0;font-size:14px;">Thank You for Your Order!</p>
    </div>

    <div style="padding:30px;text-align:center;background-color:#f1f8e9;">
        <h2 style="color:#43a047;font-size:26px;margin:0;">Order Confirmed!</h2>
        <h3 style="color:#333;font-size:22px;margin:10px 0 0;text-transform:uppercase;">
            ' . $fname . '
        </h3>
        <p style="color:#666;margin:10px 0 0;font-size:15px;">
            Your order has been <strong style="color:#43a047;">placed successfully!</strong><br>
            You will receive your order within <strong>7 working days</strong>.
        </p>
    </div>

    <div style="padding:30px;">
        <h4 style="color:#333;border-bottom:2px solid #43a047;padding-bottom:8px;margin-bottom:20px;">
            Order Details
        </h4>
        <table style="width:100%;border-collapse:collapse;">
            <tr style="background-color:#43a047;">
                <th style="padding:14px;text-align:left;color:#fff;font-size:14px;">Description</th>
                <th style="padding:14px;text-align:right;color:#fff;font-size:14px;">Amount</th>
            </tr>
            <tr style="background-color:#f1f8e9;">
                <td style="padding:14px;color:#333;font-size:15px;">Total Order Amount</td>
                <td style="padding:14px;text-align:right;color:#43a047;font-weight:bold;font-size:18px;">
                    &#8377;' . $amt . '
                </td>
            </tr>
            <tr style="background-color:#43a047;">
                <td style="padding:14px;color:#fff;font-weight:bold;font-size:15px;">Total Paid</td>
                <td style="padding:14px;text-align:right;color:#fff;font-weight:bold;font-size:20px;">
                    &#8377;' . $amt . '
                </td>
            </tr>
        </table>
    </div>

    <div style="margin:0 30px 30px;background:linear-gradient(135deg,#007ce0,#0163b2);border-radius:10px;padding:25px;text-align:center;">
        <p style="color:#bbe3ff;margin:0;font-size:13px;text-transform:uppercase;letter-spacing:1px;">Delivery Info</p>
        <p style="color:#fff;margin:10px 0 0;font-size:15px;line-height:1.6;">
            Your order will be delivered to your address<br>
            within <strong>7 working days</strong>!
        </p>
    </div>

    <div style="text-align:center;padding:0 30px 20px;">
        <img src="https://cdn.dribbble.com/users/2572904/screenshots/17169793/media/ed801ffe0fbeb4b95ca246ba1f5ea398.gif"
             alt="Order Success" height="200px" style="border-radius:10px;max-width:100%;">
    </div>

    <div style="background-color:#f1f8e9;padding:20px 30px;text-align:center;border-top:1px solid #c8e6c9;">
        <p style="color:#666;margin:0 0 12px;font-size:14px;">Have questions? Feel free to give us feedback!</p>
        <a href="http://localhost/safari/feedback.php"
           style="display:inline-block;background-color:#43a047;color:#fff;text-decoration:none;padding:12px 30px;border-radius:6px;font-size:15px;font-weight:bold;">
           Give Feedback
        </a>
    </div>

    <div style="background-color:#333;padding:20px 30px;text-align:center;">
        <p style="color:#aaa;margin:0;font-size:12px;">
            &copy; 2026 Safari Zoo. All rights reserved.<br>
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