<?php

include "Db/dbConnection.php";
session_start();

?>

<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Home</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php

        $currentPage = "index";
        include "header.php"

          ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <h1 class="text-center text-secondary fw-bolder mt-lg-5">Welcome, <span class="text-primary"> <?php

            if (isset ($_SESSION['name'])) {
              echo $_SESSION['name'];
            } else {
              echo "Admin";
            }

            ?></span></h1>
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/ticket.svg" alt="chart success" class="rounded">
                                  </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Ticket Revenue</span>
                              <h3 class="card-title text-success mb-2">₹
                              <?php
                              $select = "SELECT SUM(total_amount) AS total_revenue FROM tickets;";
                              $result = $con->query($select);

                              if ($result) {
                                $row = $result->fetch_assoc();
                                $totalRevenue = $row['total_revenue'];

                                echo $totalRevenue;
                              }
                              ?>

                            </h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/star.svg" alt="Credit Card" class="rounded">
                                  </div>
                              </div>
                              <span class="d-block mb-1">Avg. Feedback Rating</span>
                              <h3 class="card-title text-nowrap text-danger mb-2">
                                <?php
                                // Assuming $con represents the database connection
                                $select = "SELECT AVG(feedback) AS average_feedback FROM feedback;";
                                $result = $con->query($select);

                                if ($result) {
                                  $row = $result->fetch_assoc();
                                  $averageFeedback = $row['average_feedback'];

                                  echo round($averageFeedback, 2); // Round to two decimal places
                                } else {
                                  echo "Error in query: " . $con->error;
                                }
                                ?>

                              </h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/donate.svg" alt="Credit Card" class="rounded">
                                  </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Donations</span>
                              <h3 class="card-title text-primary mb-2">₹
                              <?php
                              $select = "SELECT SUM(amount) AS total_revenue FROM donate;";
                              $result = $con->query($select);

                              if ($result) {
                                $row = $result->fetch_assoc();
                                $totalRevenue = $row['total_revenue'];

                                echo $totalRevenue;
                              } 
                              ?></h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/child.svg" alt="chart success" class="rounded">
                                  </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Total Child Visit</span>
                              <h3 class="card-title text-info mb-2">
                              <?php
                              $select = "SELECT SUM(child) AS total_revenue FROM tickets;";
                              $result = $con->query($select);

                              if ($result) {
                                $row = $result->fetch_assoc();
                                $totalRevenue = $row['total_revenue'];

                                echo $totalRevenue;
                              }
                              ?>

                            </h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/adult.svg" alt="Credit Card" class="rounded">
                                  </div>
                              </div>
                              <span class="d-block mb-1">Total Adult Visit</span>
                              <h3 class="card-title text-nowrap text-warning mb-2">
                                <?php
                                $select = "SELECT SUM(adults) AS total_revenue FROM tickets;";
                                $result = $con->query($select);

                                if ($result) {
                                  $row = $result->fetch_assoc();
                                  $totalRevenue = $row['total_revenue'];

                                  echo $totalRevenue;
                                }
                                ?>

                              </h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/senior.svg" alt="Credit Card" class="rounded">
                                  </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Total Senior Visit</span>
                              <h3 class="card-title text-success mb-2">
                              <?php
                              $select = "SELECT SUM(senior) AS total_revenue FROM tickets;";
                              $result = $con->query($select);

                              if ($result) {
                                $row = $result->fetch_assoc();
                                $totalRevenue = $row['total_revenue'];

                                echo $totalRevenue;
                              }
                              ?></h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/user.svg" alt="chart success" class="rounded">
                                  </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Total Users</span>
                              <h3 class="card-title text-success mb-2">
                              <?php
                              $select = "SELECT COUNT(*) AS total_rows FROM user";
                              $result = $con->query($select);

                              if ($result) {
                                $row = $result->fetch_assoc();
                                $totalCount = $row['total_rows'];
                                echo $totalCount;
                              } else {
                                echo "Error executing query: " . $con->error;
                              }
                              ?>
                            </h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/animals.svg" alt="Credit Card" class="rounded">
                                  </div>
                              </div>
                              <span class="d-block mb-1">Total Animals</span>
                              <h3 class="card-title text-nowrap text-danger mb-2">
                                <?php
                                $select = "SELECT COUNT(*) AS total_rows FROM animals";
                                $result = $con->query($select);

                                if ($result) {
                                  $row = $result->fetch_assoc();
                                  $totalCount = $row['total_rows'];
                                  echo $totalCount;
                                } else {
                                  echo "Error executing query: " . $con->error;
                                }
                                ?>
                              </h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">
                                      <img src="../assets/img/icons/unicons/shirt.svg" alt="Credit Card" class="rounded">
                                  </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Total Products</span>
                              <h3 class="card-title text-primary mb-2">
                              <?php
                              $select = "SELECT COUNT(*) AS total_rows FROM products";
                              $result = $con->query($select);

                              if ($result) {
                                $row = $result->fetch_assoc();
                                $totalCount = $row['total_rows'];
                                echo $totalCount;
                              } else {
                                echo "Error executing query: " . $con->error;
                              }
                              ?>
                              </h3>
                          </div>
                      </div>
                  </div>
              </div>
            </div>

            <!-- / Content -->

            <!-- Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>