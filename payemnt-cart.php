<?php
session_start();
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
    <title>Pay Now</title>
    <!-- styles-->
    <link rel="stylesheet" href="css/styles.min.css" />
    <!-- web-font loader-->
    <script>
        WebFontConfig = {

            google: {

                families: ['Nunito+Sans:300,400,500,700,900', 'Quicksand:300,400,500,700'],

            }

        }

        function font() {

            var wf = document.createElement('script')

            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
            wf.type = 'text/javascript'
            wf.async = 'true'

            var s = document.getElementsByTagName('script')[0]

            s.parentNode.insertBefore(wf, s)

        }

        font()
    </script>
    <style>
        button.button.button--primary.form__submit.color--orange:hover {
            color: #282f34 !important;
        }
    </style>
</head>

<body class="background--dark">
    <div class="page-wrapper d-flex align-items-center justify-content-center">
        <main class="main">
            <!-- section start-->
            <section class="section elements button-elements">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 text-center"> <!-- Centering content -->
                            <h4 class="elements__title color--white">Purchased Payment</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 text-center"> <!-- Centering content -->
                            <button class="button button--primary form__submit color--orange" type="submit"
                                id="payment">PAY</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- libs-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="js/libs.min.js"></script>
    <!-- scripts-->
    <script src="js/common.js"></script>
    <script>
    var options = {
        "key": "rzp_test_paIUk4G9hyJfnK",
        "amount": <?php echo $_SESSION['total_amount'] * 100; ?>, // Initial amount
            "currency": "INR",
            "name": "SAFARI",
            "description": "Product Payment",
            "image": "img/slogo.svg",
            "handler": function (response) {
                window.location.href = "email-cart.php";
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
        });

        <?php if (isset ($_SESSION["email"])): ?>
            document.getElementById('payment').onclick = function (e) {
                rzp1.open();
                e.preventDefault();
            };
        <?php else: ?>
            alert("Not Login");
        <?php endif; ?>
    </script>
</body>

</html>