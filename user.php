<?php

include "Db/dbConnection.php";

session_start();


if(isset($_POST['logout'])){

    session_destroy();
    header("Location: login.php");

}


if(isset($_POST['update']))
{

    $id = $_SESSION['id']; 

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phno = $_POST['phno'];
    $city = $_POST['city'];
    
    $q2 = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`email`='$email',`pass`='$pass',`phno`='$phno',`city`='$city' WHERE `id`=$id";

    $res2 = $con->query($q2);

    if($res2){
        header("Location: user.php");
    }
    else{
        echo "<script>alert('Update Failed');</script>";
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
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png" />
    <link rel="manifest" href="img/favicon/site.webmanifest" />
    <title>USER</title>
    <!-- styles-->
    <link rel="stylesheet" href="css/styles.min.css" />
    <!-- web-font loader-->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    "Nunito+Sans:300,400,500,700,900",
                    "Quicksand:300,400,500,700",
                ],
            },
        };

        function font() {
            var wf = document.createElement("script");

            wf.src =
                ("https:" == document.location.protocol ? "https" : "http") +
                "://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js";
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
        <!-- menu dropdown start-->
        <?php
        $currentPage = "user";
        include "header.php";

        ?>
        <!-- header end-->
        <main class="main">
            <!-- section start-->
            <section class="section donation-details">
                <div class="container">
                    <?php

                    $email = $_SESSION['email'];

                    $q1 = "SELECT * FROM `user` WHERE `email`='" . $email . "'";

                    $res = $con->query($q1);

                    if ($res->num_rows > 0) {

                        while ($row = $res->fetch_assoc()) {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['email'] = $row['email'];

                    ?>
                    <form class="form donation-form" method="POST">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="donation-details__title bottom-50 no-margin-top">
                                    <strong>User ID:</strong>
                                    <?php echo $row["id"]; ?>
                                </h3>
                            </div>
                            <div class="col-md-4">
                                <label for="first-name">First Name:</label>
                                <input class="form__field" type="text" id="first-name" name="fname"
                                    value="<?php echo $row["fname"]; ?>" placeholder="First Name" />
                            </div>

                            <div class="col-md-4">
                                <label for="last-name">Last Name:</label>
                                <input class="form__field" type="text" id="last-name" name="lname"
                                    value="<?php echo $row["lname"]; ?>" placeholder="Last Name" />
                            </div>

                            <div class="col-md-4">
                                <label for="email">Email:</label>
                                <input class="form__field" type="email" id="email" name="email"
                                    value="<?php echo $row["email"]; ?>" placeholder="Email" />
                            </div>

                            <div class="col-md-4">
                                <label for="password">Password:</label>
                                <input class="form__field" type="text" id="password" name="pass"
                                    value="<?php echo $row["password"]; ?>" placeholder="Password" />
                            </div>

                            <div class="col-md-4">
                                <label for="phno">Phone Number:</label>
                                <input class="form__field" type="text" id="phno" name="phno"
                                    value="<?php echo $row["phno"]; ?>" placeholder="Phone Number" />
                            </div>

                            <div class="col-md-4">
                                <label for="city">City:</label>
                                <input class="form__field" type="text" id="city" name="city"
                                    value="<?php echo $row["city"]; ?>" placeholder="City" />
                            </div>
                            <div class="col-12 text-center">
                                <button class="form__submit" name="update" type="submit" id="payment">
                                    UPDATE
                                </button>
                                <button class="form__submit" name="logout" type="submit" id="logout">
                                    LOGOUT
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php
                        }
                    }
                    
                    ?>
                </div>
            </section>
            <!-- section end-->
        </main>
        <!-- footer start-->
        <?php

        include "footer.php"

        ?>
        <!-- footer end-->
    </div>
    <!-- libs-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/libs.min.js"></script>
    <!-- scripts-->
    <script src="js/common.js"></script>

</body>

</html>