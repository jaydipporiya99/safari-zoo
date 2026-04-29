<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "Db/dbConnection.php";

session_start();



$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];

if (isset($_POST['submit'])) {

    $child  = $_POST['child']  ?? 0;
    $adult  = $_POST['adult']  ?? 0;
    $senior = $_POST['senior'] ?? 0;
    $date   = $_POST['date']   ?? '';

    // ✅ FIX 2: persons = child + adult + senior
    $persons = $child + $adult + $senior;

    $new_date = date('d-m-y', strtotime($date));
    $total_amount = ($child * 40) + ($adult * 80) + ($senior * 60);

    $_SESSION['totalTicket']      = $total_amount;
    $_SESSION['persons_tickets']  = $persons;
	$_SESSION['child_tickets']   = $child; 
    $_SESSION['adult_tickets']    = $adult;
    $_SESSION['senior_tickets']   = $senior;
    $_SESSION['date']             = $date;

	
    // ✅ Database insert
    $q1 = "INSERT INTO tickets(`fname`, `lname`, `email`, `persons`, `child`, `adults`, `senior`, `total_amount`, `date`) 
           VALUES ('$fname','$lname','$email','$persons','$child','$adult','$senior','$total_amount','$date')";

    $res = $con->query($q1);

    if ($res) {
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
        <h1 style="color: #0163b2; text-align: center; font-size: 32px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">Congratulations!</h1>
        <h1 style="color: #007ce0; text-align: center; font-size: 28px; text-transform: uppercase; margin-bottom: 20px;">' . $fname . ' ' . $lname . '</h1>
        <p style="color: #696969; line-height: 1.8;">Thank you for booking tickets to the zoo! Your booking details:</p>
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
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">₹40</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">₹' . ($child * 40) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">Adult (12-79 yrs)</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">' . $adult . '</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">₹80</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">₹' . ($adult * 80) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">Senior (80+ yrs)</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">' . $senior . '</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">₹60</td>
                <td style="padding: 10px; border-bottom: 1px solid #ccc;">₹' . ($senior * 60) . '</td>
            </tr>
        </table>
        <p style="color: #696969; line-height: 1.8; margin-top: 20px;">
            Total Persons: <strong style="color: #f2645a;">' . $persons . '</strong><br>
            Total Amount: <strong style="color: #f2645a;">₹' . $total_amount . '</strong>
        </p>
        <div style="text-align: center; margin-top: 30px;">
            <img src="https://cdn.dribbble.com/users/332742/screenshots/4735157/media/146a65a5e9defbce4a719f03d6e7848f.gif" alt="Payment Image" height="250px" style="border-radius: 8px;">
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <button style="padding: 12px 24px; background-color: #f2645a; color: #fff; border: none; border-radius: 5px; font-size: 18px;">
                Visit Date: ' . $new_date . '
            </button>
        </div>
        <p style="color: #696969; line-height: 1.8; margin-top: 20px;">If you have any questions, feel free to give Feedback.</p>
        <a href="http://localhost/safari/feedback.php">
            <h2 style="color: #007ce0; line-height: 1.8; margin-top: 20px; text-align: center;">GIVE FEEDBACK</h2>
        </a>
    </div>
</div>';

        $send = $mail->send();

        if ($send) {
            header("Location: payment-ticket.php");
            exit();
        } else {
            echo "Mail could not be sent. Please try again!";
        }
    } else {
        echo "Database error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket</title>
    <link rel="stylesheet" href="css/styles.min.css" />
    <script>
        WebFontConfig = {
            google: { families: ["Nunito+Sans:300,400,500,700,900", "Quicksand:300,400,500,700"] },
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
    <style>
        .form__field[type="date"] { width: 250px; }
    </style>
</head>

<body>
<div class="page-wrapper">

    <?php include "header.php"; ?>

    <main class="main">
        <!-- promo start -->
        <section class="promo-primary">
            <picture>
                <source srcset="img/tickets.jpg" media="(min-width: 992px)" />
                <img class="img--bg" src="img/tickets.jpg" alt="img" />
            </picture>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="align-container">
                            <div class="align-container__item">
                                <span class="promo-primary__pre-title">SAFARI ZOO</span>
                                <h1 class="promo-primary__title">
                                    <span>Tickets &</span> <span>Prices</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- promo end -->

        <div class="cta-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <p class="cta-block__text">
                            <strong>All tickets can be purchased during opening times: 9:00 AM - 5:00 PM or online.</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <section class="section background--gray">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart">
                            <div class="cart__heading">
                                <div class="row">
                                    <div class="col-lg-4"><h6 class="cart__title">Tickets</h6></div>
                                    <div class="col-lg-2 text-center d-none d-lg-block"><h6 class="cart__title">Price</h6></div>
                                    <div class="col-lg-3 text-center d-none d-lg-block"><h6 class="cart__title">Persons</h6></div>
                                    <div class="col-lg-2 text-center d-none d-lg-block"><h6 class="cart__title">Summary</h6></div>
                                    <div class="col-lg-1"></div>
                                </div>
                            </div>

                            <div class="cart__body">

                                <!-- ✅ FIX 1: Form wraps everything with correct id -->
                                <form method="POST" id="ticketForm">

                                    <!-- ✅ FIX 2: Hidden persons field — auto calculated by JS -->
                                    <input type="hidden" name="persons" id="personsField" value="0" />
                                    <input type="hidden" name="submit" value="1" />

                                    <!-- Child -->
                                    <div class="cart-item">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <div class="cart-item__product">
                                                    <div class="cart-item__product-img">
                                                        <img class="img--contain" src="img/ticket/2.png" alt="img" />
                                                    </div>
                                                    <div class="cart-item__product-name">
                                                        Child <i class="color--orange">(up to 12 years)</i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <div class="cart-item__price"><span>40</span><span>₹</span></div>
                                            </div>
                                            <div class="col-lg-3 text-center">
                                                <div class="cart-item__count">
                                                    <span class="cart-item__minus"></span>
                                                    <input class="cart-item__input" type="number" name="child" value="0" min="0" />
                                                    <span class="cart-item__plus"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <div class="cart-item__summa"><span>0</span><span>₹</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Adult -->
                                    <div class="cart-item">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <div class="cart-item__product">
                                                    <div class="cart-item__product-img">
                                                        <img class="img--contain" src="img/ticket/3.png" alt="img" />
                                                    </div>
                                                    <div class="cart-item__product-name">
                                                        Adults <i class="color--orange">(12-79 years)</i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <div class="cart-item__price"><span>80</span><span>₹</span></div>
                                            </div>
                                            <div class="col-lg-3 text-center">
                                                <div class="cart-item__count">
                                                    <span class="cart-item__minus"></span>
                                                    <input class="cart-item__input" type="number" name="adult" value="0" min="0" />
                                                    <span class="cart-item__plus"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <div class="cart-item__summa"><span>0</span><span>₹</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Senior -->
                                    <div class="cart-item">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <div class="cart-item__product">
                                                    <div class="cart-item__product-img">
                                                        <img class="img--contain" src="img/ticket/4.png" alt="img" />
                                                    </div>
                                                    <div class="cart-item__product-name">
                                                        Senior <i class="color--orange">(80+ years)</i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <div class="cart-item__price"><span>60</span><span>₹</span></div>
                                            </div>
                                            <div class="col-lg-3 text-center">
                                                <div class="cart-item__count">
                                                    <span class="cart-item__minus"></span>
                                                    <input class="cart-item__input" type="number" name="senior" value="0" min="0" />
                                                    <span class="cart-item__plus"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <div class="cart-item__summa"><span>0</span><span>₹</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Date & Total -->
                                    <div class="cart__lower">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="coupon-block">
                                                    <h6 class="cart__title color--orange">Choose Visit Date</h6>
                                                    <input class="form__field w-50" id="date" name="date" type="date" min="" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 text-lg-right">
                                                <div class="cart-totals">
                                                    <h6 class="cart__title color--orange">
                                                        Total: <span id="total" class="color--primary">0</span>
                                                        <span class="color--primary"> ₹</span>
                                                    </h6>
                                                    <!-- <button id="payBtn" class="form__submit" type="button">Confirm</button> -->
													<button class="form__submit" type="submit">Confirm </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <!-- ✅ Form closes here properly -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Events Section -->
        <section class="section">
            <div class="container">
                <div class="row bottom-50 align-items-end">
                    <div class="col-lg-8">
                        <div class="heading heading--primary heading--style-2">
                            <span class="heading__pre-title">Events</span>
                            <h2 class="heading__title no-margin-bottom"><span>Special</span> <span>Events</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right d-none d-lg-block">
                        <a class="button button--primary" href="events.php">More Events</a>
                    </div>
                </div>
                <div class="row offset-margin">
                    <?php
                    $select = "SELECT * FROM events ORDER BY id DESC LIMIT 3";
                    $result = $con->query($select);
                    while ($row = mysqli_fetch_array($result)) {
                        $limited_desc = strlen($row['desc']) > 100 ? substr($row['desc'], 0, 100) . '...' : $row['desc'];
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="events-item">
                            <div class="events-item__img">
                                <div class="events-item__date">
                                    <span><?php echo $row['date']; ?></span>
                                    <span><?php echo $row['month']; ?></span>
                                </div>
                                <img class="img--bg" src="img/events/<?php echo $row['img']; ?>" alt="img" />
                            </div>
                            <h6 class="events-item__title">
                                <a class="events-item__link" href="event-details.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </h6>
                            <p><?php echo $limited_desc; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

    </main>

    <?php include "footer.php"; ?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>

<script>
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("date").min = today;
</script>

<script>
$(document).ready(function () {

    $('.cart-item__summa span:first-child').text('0');

    $('.cart-item__input').on('change input', function () {
        updateSumma($(this).closest('.cart-item'));
    });

    $('.cart-item__minus').click(function () {
        var $input = $(this).siblings('.cart-item__input');
        var currentValue = parseInt($input.val());
        if (!isNaN(currentValue) && currentValue > 0) {
            $input.val(currentValue - 1);
            updateSumma($(this).closest('.cart-item'));
        }
    });

    $('.cart-item__plus').click(function () {
        var $input = $(this).siblings('.cart-item__input');
        var currentValue = parseInt($input.val());
        if (!isNaN(currentValue)) {
            $input.val(currentValue + 1);
            updateSumma($(this).closest('.cart-item'));
        }
    });

    function updateSumma(cartItem) {
        var price    = parseFloat(cartItem.find('.cart-item__price span:first-child').text());
        var quantity = parseInt(cartItem.find('.cart-item__input').val());
        var summa    = price * quantity;
        cartItem.find('.cart-item__summa span:first-child').text(summa.toFixed(0));
        updateTotal();
    }

    function updateTotal() {
        var total = 0;
        $('.cart-item__summa span:first-child').each(function () {
            total += parseFloat($(this).text());
        });
        $('#total').text(total.toFixed(0));

        // ✅ FIX 3: Update hidden persons field
        var persons = 0;
        $('.cart-item__input').each(function () {
            persons += parseInt($(this).val()) || 0;
        });
        $('#personsField').val(persons);
    }

    updateTotal();
});
</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById("payBtn").onclick = function () {

    var total = document.getElementById("total").innerText;
    var date  = document.getElementById("date").value;

    if (parseInt(total) <= 0) {
        alert("Please select at least 1 ticket!");
        return;
    }

    if (!date) {
        alert("Please select a visit date!");
        return;
    }

    var amount = parseInt(total) * 100;

    var options = {
        "key": "rzp_test_RRkhxaUmrEKTtj",
        "amount": amount,
        "currency": "INR",
        "name": "Safari Zoo",
        "description": "Ticket Payment",

        // ✅ FIX 4: Payment success -> form submit karo
        "handler": function (response) {
            alert("Payment Successful! Your tickets are confirmed.");
            document.getElementById("ticketForm").submit();
        },

        "prefill": {
            "name": "<?php echo $fname; ?>",
            "email": "<?php echo $email; ?>"
        },
        "theme": {
            "color": "#f2645a"
        }
    };

    var rzp = new Razorpay(options);
    rzp.open();
};
</script>

</body>
</html>