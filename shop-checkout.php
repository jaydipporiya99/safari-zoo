<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "Db/dbConnection.php";
session_start();

$email = $_SESSION['email'];

if (isset($_POST['order'])) {

    $address  = $_POST['address'];
    $landmark = $_POST['landmark'];
    $state    = $_POST['state'];
    $city     = $_POST['city'];
    $zip      = $_POST['zip'];
    $fname    = $_SESSION['fname'];
    $lname    = $_SESSION['lname'];
    $totalamt = $_SESSION['total_amount'];

    $q3 = "UPDATE `orders` SET `address`='$address', `landmark`='$landmark', `state`='$state', `city`='$city', `zip`='$zip' WHERE `email`='" . $email . "'";
    $res3 = $con->query($q3);

    if ($res3) {

        $q4 = "UPDATE `orders` SET `payment`='Success' WHERE `email`='" . $email . "'";
        $res4 = $con->query($q4);

        if ($res4) {

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
        <h1 style="color:#fff;margin:0;font-size:28px;letter-spacing:2px;text-transform:uppercase;">🛍️ Safari Zoo Shop</h1>
        <p style="color:#c8e6c9;margin:8px 0 0;font-size:14px;">Thank You for Your Order!</p>
    </div>

    <div style="padding:30px;text-align:center;background-color:#f1f8e9;">
        <h2 style="color:#43a047;font-size:26px;margin:0;">🎉 Order Confirmed!</h2>
        <h3 style="color:#333;font-size:22px;margin:10px 0 0;text-transform:uppercase;">
            ' . $fname . ' ' . $lname . '
        </h3>
        <p style="color:#666;margin:10px 0 0;font-size:15px;">
            Your order has been <strong style="color:#43a047;">placed successfully!</strong><br>
            You will receive your order within <strong>7 working days</strong>. 📦
        </p>
    </div>

    <div style="padding:30px;">
        <h4 style="color:#333;border-bottom:2px solid #43a047;padding-bottom:8px;margin-bottom:20px;">
            🧾 Order Details
        </h4>
        <table style="width:100%;border-collapse:collapse;">
            <tr style="background-color:#43a047;">
                <th style="padding:14px;text-align:left;color:#fff;font-size:14px;">Description</th>
                <th style="padding:14px;text-align:right;color:#fff;font-size:14px;">Amount</th>
            </tr>
            <tr style="background-color:#f1f8e9;">
                <td style="padding:14px;color:#333;font-size:15px;">🛒 Total Order Amount</td>
                <td style="padding:14px;text-align:right;color:#43a047;font-weight:bold;font-size:18px;">
                    &#8377;' . $totalamt . '
                </td>
            </tr>
            <tr style="background-color:#43a047;">
                <td style="padding:14px;color:#fff;font-weight:bold;font-size:15px;">Total Paid</td>
                <td style="padding:14px;text-align:right;color:#fff;font-weight:bold;font-size:20px;">
                    &#8377;' . $totalamt . '
                </td>
            </tr>
        </table>
    </div>

    <div style="margin:0 30px 30px;background:linear-gradient(135deg,#007ce0,#0163b2);border-radius:10px;padding:25px;text-align:center;">
        <p style="color:#bbe3ff;margin:0;font-size:13px;text-transform:uppercase;letter-spacing:1px;">📦 Delivery Info</p>
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

            $send = $mail->send();

            if ($send) {
                header("Location: payemnt-cart.php");
                exit();
            } else {
                echo "Mail could not be sent. Please try again!";
            }
        }
    }
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
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/styles.min.css" />
    <script>
        WebFontConfig = {
            google: {
                families: ['Nunito+Sans:300,400,500,700,900', 'Quicksand:300,400,500,700'],
            }
        };
        function font() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        }
        font();
    </script>
</head>

<body>
<div class="page-wrapper">

    <?php
    $currentPage = "shop";
    include "header2.php";
    ?>

    <main class="main">
        <section class="section checkout mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form class="form checkout-form" method="POST">
                            <div class="row">

                                <!-- Personal & Shipping Info -->
                                <div class="col-lg-7 col-xl-8">
                                    <div class="checkout__wrapper">
                                        <div class="form__fieldset">
                                            <h6 class="form__title">Personal Information</h6>
                                            <div class="row offset-30">
                                                <div class="col-md-6">
                                                    <input class="form__field" type="text" value="<?php echo $_SESSION['fname']; ?>" name="first-name" placeholder="First Name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form__field" type="text" value="<?php echo $_SESSION['lname']; ?>" name="last-name" placeholder="Last Name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form__field" type="tel" value="<?php echo $_SESSION['phno']; ?>" name="phone-number" placeholder="Phone" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form__field" type="email" value="<?php echo $_SESSION['email']; ?>" name="email" placeholder="Email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form__fieldset no-margin-bottom">
                                            <h6 class="form__title">Shipping Information</h6>
                                            <div class="row offset-30">
                                                <div class="col-12">
                                                    <input class="form__field" type="text" name="address" placeholder="Address" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form__field" type="text" name="landmark" placeholder="Landmark" />
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form__select" name="state">
                                                        <option selected disabled value="value">State</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form__field" type="text" name="city" placeholder="City" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form__field" type="text" name="zip" placeholder="Zip" pattern="[0-9]{6}" title="Please enter a valid 6-digit zip code" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Order Summary -->
                                <div class="col-lg-5 col-xl-4">
                                    <div class="checkout__wrapper">
                                        <div class="form__fieldset">
                                            <h6 class="form__title">Order Summary</h6>
                                            <?php
                                            $q1 = "SELECT * FROM `orders` WHERE `payment` = '' AND `email`='" . $email . "'";
                                            $res = $con->query($q1);
                                            $total_qty   = 0;
                                            $total_price = 0;

                                            if ($res->num_rows > 0) {
                                                while ($row = $res->fetch_assoc()) {
                                                    $pid = $row['pid'];
                                                    $id  = $row['id'];
                                                    $qty = $row['pqty'];
                                                    $total_qty += $qty;

                                                    $q2   = "SELECT * FROM `products` WHERE `id`=$pid";
                                                    $res2 = $con->query($q2);

                                                    if ($res2->num_rows > 0) {
                                                        while ($row2 = $res2->fetch_assoc()) {
                                                            $new_price   = $row2['new_price'];
                                                            $name        = $row2['name'];
                                                            $img1        = $row2['img1'];
                                                            $total       = $qty * $new_price;
                                                            $total_price += $total;

                                                            echo '
                                                            <div class="order-item">
                                                                <div class="row no-gutters align-items-center">
                                                                    <div class="col-4 col-sm-3 col-md-2 col-lg-4">
                                                                        <div class="order-item__img">
                                                                            <img class="img--contain" src="img/product/' . $img1 . '" alt="img" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-7 col-sm-8 col-md-9 col-lg-7">
                                                                        <div class="order-item__description">
                                                                            <a class="order-item__link" href="shop-product.html">' . $name . '</a>
                                                                            <div class="order-item__count">
                                                                                <span>' . $new_price . ' ₹</span>
                                                                                <span>x' . $qty . '</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-right">
                                                                        <span class="order-item__remove">
                                                                            <a href="delete.php?id=' . $id . '">
                                                                                <span class="fa fa-remove" style="font-size:20px;color:red;"></span>
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                        }
                                                    }
                                                    $_SESSION['total_amount'] = $total_price;
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="form__fieldset no-margin-bottom">
                                            <div class="cart-totals">
                                                <h6 class="form__title">Cart Total</h6>
                                                <ul class="cart-totals__list">
                                                    <li><span>Quantity</span><span><?php echo $total_qty; ?></span></li>
                                                    <li><span>Total:</span><span><?php echo $total_price; ?></span> ₹</li>
                                                </ul>
                                                <button class="form__submit" name="order" type="submit">&nbsp;Place Order&nbsp;</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
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