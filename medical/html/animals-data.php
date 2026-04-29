<?php

include "Db/dbConnection.php";

?>


<!DOCTYPE html>

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
      <title>Animals Data</title>
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
      <!-- jQuery Table CSS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
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

            $currentPage = "animals-data";
            include "header.php"

            ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
               <div>
                  <h2 class="text-uppercase text-info fw-bolder text-center mt-5">Animals Data</h2>
               </div>
               <!-- ADD ANIMAL -->
               <!-- ---------------------------------------------------------------------------------------------- -->
               
               <form method="POST">
               <div class="row justify-content-end mx-4 mb-3">
                  <div class="col-auto">
                     <div class="input-group">
                        <input type="text" class="form-control" name="find" id="search" placeholder="Search">
                        <button type="submit" class="btn btn-info" name="search"><i class="bx bx-search"></i></button>
                        <button type="submit" class="btn btn-secondary" name="clear">&#10227;</button>
                     </div>
                  </div>
               </div>
            </form>
               <div>
                  <div class="col-xl-11 mx-lg-5">
                     <?php
                     if (isset ($_POST['search'])) {
                        $find = $_POST['find'];
                        $select = "SELECT * FROM animals WHERE name LIKE '%$find%' OR type LIKE '%$find%' ORDER BY id";
                        $result = $con->query($select);
                        if (mysqli_num_rows($result) > 0) {
                           while ($row = mysqli_fetch_array($result)) {
                              ?>
                              <div class="nav-align-top mb-4">
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                 <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-name<?php echo $row['id']; ?>" aria-controls="navs-top-name" aria-selected="true">
                                          Name
                                       </button>
                                    </li>
                                    <li class="nav-item">
                                       <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                          data-bs-target="#navs-top-image<?php echo $row['id']; ?>" aria-controls="navs-top-image"
                                          aria-selected="false">
                                          Image
                                       </button>
                                    </li>
                                    <li class="nav-item">
                                       <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                          data-bs-target="#navs-top-info<?php echo $row['id']; ?>" aria-controls="navs-top-info"
                                          aria-selected="false">
                                          Info
                                       </button>
                                    </li>
                                    <li class="nav-item">
                                       <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                          data-bs-target="#navs-top-habitat<?php echo $row['id']; ?>" aria-controls="navs-top-habitat"
                                          aria-selected="false">
                                          Habitat
                                       </button>
                                    </li>
                                    <li class="nav-item">
                                       <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                          data-bs-target="#navs-top-diet<?php echo $row['id']; ?>" aria-controls="navs-top-diet"
                                          aria-selected="false">
                                          Diet
                                       </button>
                                    </li>
                                    <li class="nav-item">
                                       <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                          data-bs-target="#navs-top-description<?php echo $row['id']; ?>" aria-controls="navs-top-description"
                                          aria-selected="false">
                                          Description
                                       </button>
                                    </li>
                                 </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-top-name<?php echo $row['id']; ?>" role="tabpanel">
                                       <p class="fw-bold fs-6">ID:
                                          <?php echo $row['id']; ?>
                                       </p>
                                       <h3 class="fw-bold text-info">
                                          <?php echo $row['name']; ?>
                                       </h3>
                                       <p class="m-0">
                                          <?php echo $row['type']; ?>
                                       </p>
                                    </div>
                                    <div class="tab-pane fade" id="navs-top-image<?php echo $row['id']; ?>" role="tabpanel">
                                       <img src="../../img/animals/<?php echo $row['img1']; ?>" alt="" class="rounded" height="150px">
                                       <img src="../../img/animals/<?php echo $row['img2']; ?>" alt="" class="rounded mx-2" height="150px">
                                       <img src="../../img/animals/<?php echo $row['img3']; ?>" alt="" class="rounded mx-2" height="150px">
                                    </div>
                                    <div class="tab-pane fade" id="navs-top-info<?php echo $row['id']; ?>" role="tabpanel">
                                       <h6>Conservation Status: <span class="fw-bold text-info">
                                             <?php echo $row['conservation_status']; ?>
                                          </span></h6>
                                       <h6>Life Span: <span class="fw-bold text-info">
                                             <?php echo $row['life_span']; ?>
                                          </span></h6>
                                       <h6>Body Size: <span class="fw-bold text-info">
                                             <?php echo $row['body_size']; ?>
                                          </span></h6>
                                    </div>
                                    <div class="tab-pane fade" id="navs-top-habitat<?php echo $row['id']; ?>" role="tabpanel">
                                       <p>
                                          <?php echo $row['native_habitat']; ?>
                                       </p>
                                    </div>
                                    <div class="tab-pane fade" id="navs-top-diet<?php echo $row['id']; ?>" role="tabpanel">
                                       <p>
                                          <?php echo $row['diet']; ?>
                                       </p>
                                    </div>
                                    <div class="tab-pane fade" id="navs-top-description<?php echo $row['id']; ?>" role="tabpanel">
                                       <p>
                                          <?php echo $row['desc']; ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           <?php
                           }
                        } else {
                           echo '<h3 class="text-danger fw-bold text-center mb-5">Animal Not Found</h3>';
                        }
                     } else {
                        $select = "SELECT * FROM animals ORDER BY id";
                        $result = $con->query($select);
                        while ($row = mysqli_fetch_array($result)) {
                           ?>
                           <div class="nav-align-top mb-4">
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                 <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-name<?php echo $row['id']; ?>" aria-controls="navs-top-name" aria-selected="true">
                                       Name
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-image<?php echo $row['id']; ?>" aria-controls="navs-top-image"
                                       aria-selected="false">
                                       Image
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-info<?php echo $row['id']; ?>" aria-controls="navs-top-info"
                                       aria-selected="false">
                                       Info
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-habitat<?php echo $row['id']; ?>" aria-controls="navs-top-habitat"
                                       aria-selected="false">
                                       Habitat
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-diet<?php echo $row['id']; ?>" aria-controls="navs-top-diet"
                                       aria-selected="false">
                                       Diet
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-description<?php echo $row['id']; ?>" aria-controls="navs-top-description"
                                       aria-selected="false">
                                       Description
                                    </button>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade show active" id="navs-top-name<?php echo $row['id']; ?>" role="tabpanel">
                                    <p class="fw-bold fs-6">ID:
                                       <?php echo $row['id']; ?>
                                    </p>
                                    <h3 class="fw-bold text-info">
                                       <?php echo $row['name']; ?>
                                    </h3>
                                    <p class="m-0">
                                       <?php echo $row['type']; ?>
                                    </p>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-image<?php echo $row['id']; ?>" role="tabpanel">
                                    <img src="../../img/animals/<?php echo $row['img1']; ?>" alt="" class="rounded" height="150px">
                                    <img src="../../img/animals/<?php echo $row['img2']; ?>" alt="" class="rounded mx-2" height="150px">
                                    <img src="../../img/animals/<?php echo $row['img3']; ?>" alt="" class="rounded mx-2" height="150px">
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-info<?php echo $row['id']; ?>" role="tabpanel">
                                    <h6>Conservation Status: <span class="fw-bold text-info">
                                          <?php echo $row['conservation_status']; ?>
                                       </span></h6>
                                    <h6>Life Span: <span class="fw-bold text-info">
                                          <?php echo $row['life_span']; ?>
                                       </span></h6>
                                    <h6>Body Size: <span class="fw-bold text-info">
                                          <?php echo $row['body_size']; ?>
                                       </span></h6>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-habitat<?php echo $row['id']; ?>" role="tabpanel">
                                    <p>
                                       <?php echo $row['native_habitat']; ?>
                                    </p>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-diet<?php echo $row['id']; ?>" role="tabpanel">
                                    <p>
                                       <?php echo $row['diet']; ?>
                                    </p>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-description<?php echo $row['id']; ?>" role="tabpanel">
                                    <p>
                                       <?php echo $row['desc']; ?>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        <?php
                        }
                     }
                     ?>
                  </div>
               </div>
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
      <!-- jQuery Table -->
      <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
      <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
      <script>
        $(document).ready(function () {
          new DataTable('#example');
        });
      </script>
      <!-- Place this tag in your head or just before your close body tag. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
   </body>
</html>