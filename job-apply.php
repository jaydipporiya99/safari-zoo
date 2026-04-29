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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Job Apply</title>
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
</head>

<?php

include "Db/dbConnection.php";

session_start();

$id = $_GET['id'];

$q1 = "SELECT * FROM `job` WHERE `id`=$id"; // for get job by id

$res = $con->query($q1);

if ($res->num_rows > 0) {

    while ($row = $res->fetch_assoc()) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['title'] = $row['title'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['des'] = $row['des'];
        $_SESSION['img'] = $row['img'];
    }
} else {
    echo "We Have Not Find Selected Vacancy Yet...";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $job_title = $_SESSION['title'];
    $applicant = $_SESSION['fname'];
    $email = $_SESSION['email'];
    $phno = $_SESSION['phno'];
    $message = $_POST['message'];
    $address = $_POST['address'];

    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $folder = "jobApplications/" . $filename;

    move_uploaded_file($tmp_name, $folder);

    $q2 = "INSERT INTO `job_apply`(`job_title`, `file`, `message`, `applicant`, `email`, `phno`, `address`) VALUES ('$job_title','$filename','$message','$applicant','$email','$phno','$address')";

    $res2 = $con->query($q2);

    if ($res2) {
        header("Location: index.php");
    } else {
        echo "Please Try Again!";
    }
}

?>

<body>
    <div class="page-wrapper">
        <!-- menu dropdown start-->
        <?php

        include "header.php";

        ?>
        <!-- header end-->
        <main class="main">
            <!-- promo start-->
            <section class="promo-primary">
                <picture>
                    <source srcset="img/foundation.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/foundation.jpg" alt="img" />
                </picture>
                <div class="container">
                    <div class="row">
                        <div class="col-auto">
                            <div class="align-container">
                                <div class="align-container__item"><span class="promo-primary__pre-title">SAFARI
                                        ZOO</span>
                                    <h1 class="promo-primary__title"><span>Apply</span> <span>Now</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- promo end-->
            <!-- section start-->
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading heading--primary heading--center"><span class="heading__pre-title">Apply Now</span>
                                <h2 class="heading__title"><span><?php echo $_SESSION['title']; ?></span></h2>
                                <p class="no-margin-bottom"><?php echo $_SESSION['des']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end-->
            <!-- section start-->
            <section class="section background--gray">
                <div class="container">
                    <div class="row offset-70">
                        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                            <form class="form" id="job-application-form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form__field" type="text" name="name" value="<?php echo $_SESSION['fname']; ?>" readonly />
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form__field" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly />
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form__field" type="tel" name="phone" value="<?php echo $_SESSION['phno']; ?>" readonly />
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form__field" type="text" name="address" placeholder="Your Address" />
                                    </div>
                                    <div class="col-12">
                                        <input class="form__field" type="file" name="file" accept=".pdf,.doc,.docx" />
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form__field form__message" name="message" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <input class="form__submit" type="submit" value="Apply" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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