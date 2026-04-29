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
    <title>Feedback</title>
    <!-- styles-->
    <link rel="stylesheet" href="css/styles.min.css" />

    <!-- Feedback -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    
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
        div.stars {
  width: 270px;
  display: inline-block;
}
input.star { display: none; }
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #a3a3a3;
  transition: all .2s;
}
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 10px rgb(247, 247, 152);
}
input.star-1:checked ~ label.star:before { color: rgb(255, 34, 34); }
label.star:hover { transform: rotate(-15deg) scale(1.3); }
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
    </style>
</head>

<body>
    <div class="page-wrapper">
        <main class="main">
            <!-- promo start-->
            <section class="promo-primary">
                <picture>
                    <source srcset="img/contacts.jpg" media="(min-width: 992px)" /><img class="img--bg"
                        src="img/contacts.jpg" alt="img" />
                </picture>
                <div class="container">
                    <div class="row">
                        <div class="col-auto">
                            <div class="align-container">
                                <div class="align-container__item"><span class="promo-primary__pre-title">SAFARI
                                        ZOO</span>
                                    <h1 class="promo-primary__title"><span>Your</span> <span>Feedback</span></h1>
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
                    <div class="row bottom-50">
                        <div class="col-12">
                            <div class="heading heading--primary heading--center">
                                <h2 class="heading__title no-margin-bottom"><span>GIVE YOUR</span> <span>FEEDBACK</span></h2>
                            </div>
                        </div>
                    </div>

                    <?php 

                    include "Db/dbConnection.php";

                    session_start();
                    
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){

                        $rating = $_POST['star'];
                        $massage = $_POST['feedback'];
                        $email = $_SESSION['email'];

                        $q1 = "INSERT INTO `feedback`(`email`, `feedback`, `message`) VALUES ('$email','$rating','$massage')";

                        $res = $con->query($q1);

                        if($res){
                            header("Location: index.php");
                        }
                        else{
                            echo "Somthing Went Wrong!...";
                        }


                    }
                    
                    ?>

                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                            <form class="form feedback-form" method="POST">
                                <div class="stars ">
                                    <input class="star star-5" id="star-5" value="5" type="radio" name="star" />
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" value="4" type="radio" name="star" />
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" value="3" type="radio" name="star" />
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" value="2" type="radio" name="star" />
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" value="1 " type="radio" name="star" />
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form__field" name="feedback" placeholder="Enter your feedback here"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button class="form__submit" type="submit">Submit Feedback</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end-->
        </main>
    </div>
    <!-- libs-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/libs.min.js"></script>
    <!-- scripts-->
    <script src="js/common.js"></script>
</body>
</html>