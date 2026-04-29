<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "Db/dbConnection.php";
session_start();

$id = $_GET['id'];
$q1 = "SELECT * FROM `donation` WHERE `id`=$id";
$res = $con->query($q1);

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $_SESSION['title'] = $row['title'];
        $_SESSION['img']   = $row['img'];
        $_SESSION['desc']  = $row['desc'];
    }
} else {
    echo "Something Went Wrong...";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $donor_first_name = $_SESSION['fname'];
    $donor_last_name  = $_SESSION['lname'];
    $email            = $_SESSION['email'];
    $amount           = $_POST['option-select'];
    $message          = $_POST['message'];
    $address          = $_POST['adrress'];
    $city             = $_POST['city'];
    $title            = $_SESSION['title'];

    $_SESSION['sesAmt']      = $amount;
    $_SESSION['sesTotalAmt'] = $amount;

    $q2 = "INSERT INTO `donate`(`donor_first_name`, `donor_last_name`, `email`, `amount`, `message`, `address`, `city`, `donate_title`) 
           VALUES ('$donor_first_name','$donor_last_name','$email','$amount','$message','$address','$city','$title')";
    $con->query($q2);

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
    $mail->Subject = "💚 Thank You $donor_first_name! Your Donation is Received!";
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
        <h2 style="color:#f2645a;font-size:26px;margin:0;">💚 Thank You!</h2>
        <h3 style="color:#333;font-size:22px;margin:10px 0 0;text-transform:uppercase;">
            ' . $donor_first_name . ' ' . $donor_last_name . '
        </h3>
        <p style="color:#666;margin:10px 0 0;font-size:15px;">
            Your generous donation has been <strong style="color:#f2645a;">received successfully!</strong><br>
            You are helping us care for our amazing animals. 🐘🦁🐼
        </p>
    </div>

    <div style="padding:30px;">
        <h4 style="color:#333;border-bottom:2px solid #f2645a;padding-bottom:8px;margin-bottom:20px;">💰 Donation Details</h4>
        <table style="width:100%;border-collapse:collapse;">
            <tr style="background-color:#f2645a;">
                <th style="padding:14px;text-align:left;color:#fff;font-size:14px;">Description</th>
                <th style="padding:14px;text-align:right;color:#fff;font-size:14px;">Amount</th>
            </tr>
            <tr style="background-color:#fff8f0;">
                <td style="padding:14px;color:#333;font-size:15px;">🐾 ' . $title . ' - Animal Care Donation</td>
                <td style="padding:14px;text-align:right;color:#f2645a;font-weight:bold;font-size:18px;">&#8377;' . $amount . '</td>
            </tr>
            <tr style="background-color:#f2645a;">
                <td style="padding:14px;color:#fff;font-weight:bold;font-size:15px;">Total Donated</td>
                <td style="padding:14px;text-align:right;color:#fff;font-weight:bold;font-size:20px;">&#8377;' . $amount . '</td>
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

    // ✅ Mail પછી redirect
    header("Location: ./payment.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="description" />
    <meta name="keywords" content="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png" />
    <link rel="manifest" href="img/favicon/site.webmanifest" />
    <title>Donation Info</title>
    <link rel="stylesheet" href="css/styles.min.css" />
    <script>
        WebFontConfig = {
            google: {
                families: ["Nunito+Sans:300,400,500,700,900", "Quicksand:300,400,500,700"],
            },
        };
        function font() {
            var wf = document.createElement("script");
            wf.src = ("https:" == document.location.protocol ? "https" : "http") + "://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js";
            wf.type = "text/javascript";
            wf.async = "true";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(wf, s);
        }
        font();
    </script>
</head>

<body>
<div class="page-wrapper">

    <?php include "header.php"; ?>

    <main class="main">

        <section class="promo-primary">
            <picture>
                <source srcset="img/donation-details.jpg" media="(min-width: 992px)" />
                <img class="img--bg" src="img/donation-details.jpg" alt="img" />
            </picture>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="align-container">
                            <div class="align-container__item">
                                <span class="promo-primary__pre-title">SAFARI ZOO</span>
                                <h1 class="promo-primary__title">
                                    <span>Donate</span> <span>Information</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section donation-details">
            <div class="container">
                <div class="row bottom-70">
                    <div class="col-12">
                        <div class="donation-details__img">
                            <img class="img--bg" src="img/donation/<?php echo $_SESSION['img']; ?>" alt="img" />
                        </div>
                        <h3 class="donation-details__title">
                            <strong><?php echo $_SESSION['title']; ?></strong>
                        </h3>
                        <p><?php echo $_SESSION['desc']; ?></p>
                    </div>
                </div>

                <form class="form donation-form" method="POST">
                    <div class="row bottom-50">
                        <div class="col-md-4 col-lg-3">
                            <h6 class="donation-form__title">Donation Amount <span>*</span></h6>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <div class="row offset-30">
                                <div class="col-6 col-sm-4 bottom-30">
                                    <label class="form__radio-label">
                                        <span class="form__label-text"><strong>500 ₹</strong></span>
                                        <input class="form__input-radio" type="radio" name="option-select" value="500" />
                                        <span class="form__radio-mask"></span>
                                    </label>
                                </div>
                                <div class="col-6 col-sm-4 bottom-30">
                                    <label class="form__radio-label">
                                        <span class="form__label-text"><strong>1000 ₹</strong></span>
                                        <input class="form__input-radio" type="radio" name="option-select" value="1000" />
                                        <span class="form__radio-mask"></span>
                                    </label>
                                </div>
                                <div class="col-6 col-sm-4 bottom-30">
                                    <label class="form__radio-label">
                                        <span class="form__label-text"><strong>2000 ₹</strong></span>
                                        <input class="form__input-radio" type="radio" name="option-select" value="2000" />
                                        <span class="form__radio-mask"></span>
                                    </label>
                                </div>
                                <div class="col-6 col-sm-4 bottom-30">
                                    <label class="form__radio-label">
                                        <span class="form__label-text"><strong>5000 ₹</strong></span>
                                        <input class="form__input-radio" type="radio" name="option-select" value="5000" />
                                        <span class="form__radio-mask"></span>
                                    </label>
                                </div>
                                <div class="col-6 col-sm-4 bottom-30">
                                    <label class="form__radio-label">
                                        <span class="form__label-text"><strong>10,000 ₹</strong></span>
                                        <input class="form__input-radio" type="radio" name="option-select" value="10000" />
                                        <span class="form__radio-mask"></span>
                                    </label>
                                </div>
                                <div class="col-6 col-sm-4 bottom-30">
                                    <label class="form__radio-label">
                                        <span class="form__label-text"><strong>20,000 ₹</strong></span>
                                        <input class="form__input-radio" type="radio" name="option-select" value="20000" />
                                        <span class="form__radio-mask"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bottom-30">
                        <div class="col-md-4 col-lg-3">
                            <h6 class="donation-form__title">Message</h6>
                        </div>
                        <div class="col-md-8 col-lg-8 offset-30">
                            <textarea name="message" class="form__field form__message" placeholder="Your message text"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="donation-details__title bottom-50 no-margin-top">
                                <strong>Donor</strong> Details
                            </h3>
                        </div>
                        <div class="col-md-4">
                            <input class="form__field" type="text" name="first-name" value="<?php echo $_SESSION['fname']; ?>" placeholder="First Name" />
                        </div>
                        <div class="col-md-4">
                            <input class="form__field" type="text" name="last-name" value="<?php echo $_SESSION['lname']; ?>" placeholder="Last Name" />
                        </div>
                        <div class="col-md-4">
                            <input class="form__field" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Email" />
                        </div>
                        <div class="col-md-8">
                            <input class="form__field" type="text" name="adrress" placeholder="Address" />
                        </div>
                        <div class="col-md-4">
                            <input class="form__field" type="text" name="city" placeholder="City" />
                        </div>
                        <div class="col-12 text-center">
                            <button class="form__submit" type="submit" id="payment">
                                Pay Donation
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </section>

    </main>

    <?php include "footer.php"; ?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>

</body>
</html>