<?php

include "Db/dbConnection.php";

?>


<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
   data-template="vertical-menu-template-free">

<head>
   <meta charset="utf-8" />
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
   <title>Animals Data</title>
   <meta name="description" content="" />
   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
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

         $currentPage = "checkup";
         include "header.php"

            ?>
         <!-- / Menu -->
         <!-- Layout container -->
         <div class="layout-page">
            <div>
               <h2 class="text-uppercase text-info fw-bolder text-center mt-5">CheckUp Data</h2>
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
                     $select = "SELECT * FROM checkup WHERE id LIKE '%$find%' OR animalId LIKE '%$find%' OR medicalAssistantId LIKE '%$find%' ORDER BY id";
                     $result = $con->query($select);
                     if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                           ?>
                           <div class="nav-align-top mb-4">
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                 <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-id<?php echo $row['id']; ?>" aria-controls="navs-top-name" aria-selected="true">
                                       ID
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-general<?php echo $row['id']; ?>" aria-controls="navs-top-general"
                                       aria-selected="false">
                                       General
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-elimi<?php echo $row['id']; ?>" aria-controls="navs-top-info"
                                       aria-selected="false">
                                       Eliminations
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-behave<?php echo $row['id']; ?>" aria-controls="navs-top-habitat"
                                       aria-selected="false">
                                       Behavior
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-vacci<?php echo $row['id']; ?>" aria-controls="navs-top-diet"
                                       aria-selected="false">
                                       Vaccination
                                    </button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-note<?php echo $row['id']; ?>" aria-controls="navs-top-description"
                                       aria-selected="false">
                                       Notes
                                    </button>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade show active" id="navs-top-id<?php echo $row['id']; ?>" role="tabpanel">
                                    <h3 class="fw-bold text-info">
                                       CheckUp ID: <span class="text-secondary">
                                          <?php echo $row['id']; ?>
                                       </span>
                                    </h3>
                                    <h3 class="fw-bold text-info">
                                       Animal ID: <span class="text-secondary">
                                          <?php echo $row['animalId']; ?>
                                       </span>
                                    </h3>
                                    <h3 class="fw-bold text-info">
                                       Medical Assistant ID: <span class="text-secondary">
                                          <?php echo $row['medicalAssistantId']; ?>
                                       </span>
                                    </h3>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-general<?php echo $row['id']; ?>" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <h5 class="info-text text-info">
                                             Sex:
                                             <span class="text-secondary">
                                                <?php echo $row['sex']; ?>
                                             </span>
                                          </h5>
                                          <h5 class="info-text text-info">
                                             Age:
                                             <span class="text-secondary">
                                                <?php echo $row['age']; ?>
                                             </span>
                                          </h5>
                                          <h5 class="info-text text-info">
                                             Temperature:
                                             <span class="text-secondary">
                                                <?php echo $row['temperature']; ?>
                                             </span>
                                          </h5>
                                          <h5 class="info-text text-info">
                                             Appearance:
                                             <span class="text-secondary">
                                                <?php echo $row['appearance']; ?>
                                             </span>
                                          </h5>
                                       </div>
                                       <div class="col-md-6">
                                          <h5 class="info-text text-info">
                                             Heart Rate:
                                             <span class="text-secondary">
                                                <?php echo $row['heartRate']; ?>
                                             </span>
                                          </h5>
                                          <h5 class="info-text text-info">
                                             Weight:
                                             <span class="text-secondary">
                                                <?php echo $row['weight']; ?>
                                             </span>
                                          </h5>
                                          <h5 class="info-text text-info">
                                             Body Condition Score:
                                             <span class="text-secondary">
                                                <?php echo $row['bodyConditionScore']; ?>
                                             </span>
                                          </h5>
                                          <h5 class="info-text text-info">
                                             Appetite:
                                             <span class="text-secondary">
                                                <?php echo $row['appetite']; ?>
                                             </span>
                                          </h5>
                                       </div>
                                    </div>
                           
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-elimi<?php echo $row['id']; ?>" role="tabpanel">
                                    <h5>Urine Frequency: <span class="fw-bold text-info">
                                          <?php echo $row['urineFrequency']; ?>
                                       </span></h5>
                                    <h5>Urine Consistency: <span class="fw-bold text-info">
                                          <?php echo $row['urineConsistency']; ?>
                                       </span></h5>
                                    <h5>Urine Color: <span class="fw-bold text-info">
                                          <?php echo $row['urineColor']; ?>
                                       </span>
                                    </h5>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-behave<?php echo $row['id']; ?>" role="tabpanel">
                                    <h5>
                                       Activity Level:<span class="fw-bold text-info">
                                          <?php echo $row['activityLevel']; ?>
                                       </span>
                                    </h5>
                                    <h5>
                                       Behavior Description:<span class="fw-bold text-info">
                                          <?php echo $row['behaviorDescription']; ?>
                                       </span>
                                    </h5>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-vacci<?php echo $row['id']; ?>" role="tabpanel">
                                    <h5>
                                       Vaccination Name:<span class="fw-bold text-info">
                                          <?php echo $row['vaccinationName']; ?>
                                       </span>
                                    </h5>
                                    <h5>
                                       Vaccination Date:<span class="fw-bold text-info">
                                          <?php echo $row['vaccinationDate']; ?>
                                       </span>
                                    </h5>
                                 </div>
                                 <div class="tab-pane fade" id="navs-top-note<?php echo $row['id']; ?>" role="tabpanel">
                                    <h5>
                                       Treatment Requirement:
                                       <span class="fw-bold text-info">
                                          <?php echo $row['treatmentRequirement']; ?>
                                       </span>
                                    </h5>
                                    <p>
                                       Note:
                                       <span class="fw-bold text-info">
                                          <?php echo $row['notes']; ?>
                                       </span>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <?php
                        }
                     } else {
                        echo '<h3 class="text-danger fw-bold text-center mb-5">Record Not Found</h3>';
                     }
                  } else {
                     $select = "SELECT * FROM checkup ORDER BY id";
                     $result = $con->query($select);
                     while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="nav-align-top mb-4">
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                 <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-id<?php echo $row['id']; ?>" aria-controls="navs-top-name"
                                    aria-selected="true">
                                    ID
                                 </button>
                              </li>
                              <li class="nav-item">
                                 <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-general<?php echo $row['id']; ?>"
                                    aria-controls="navs-top-general" aria-selected="false">
                                    General
                                 </button>
                              </li>
                              <li class="nav-item">
                                 <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-elimi<?php echo $row['id']; ?>" aria-controls="navs-top-info"
                                    aria-selected="false">
                                    Eliminations
                                 </button>
                              </li>
                              <li class="nav-item">
                                 <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-behave<?php echo $row['id']; ?>"
                                    aria-controls="navs-top-habitat" aria-selected="false">
                                    Behavior
                                 </button>
                              </li>
                              <li class="nav-item">
                                 <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-vacci<?php echo $row['id']; ?>" aria-controls="navs-top-diet"
                                    aria-selected="false">
                                    Vaccination
                                 </button>
                              </li>
                              <li class="nav-item">
                                 <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-note<?php echo $row['id']; ?>"
                                    aria-controls="navs-top-description" aria-selected="false">
                                    Notes
                                 </button>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane fade show active" id="navs-top-id<?php echo $row['id']; ?>"
                                 role="tabpanel">
                                 <h3 class="fw-bold text-info">
                                    CheckUp ID: <span class="text-secondary">
                                       <?php echo $row['id']; ?>
                                    </span>
                                 </h3>
                                 <h3 class="fw-bold text-info">
                                    Animal ID: <span class="text-secondary">
                                       <?php echo $row['animalId']; ?>
                                    </span>
                                 </h3>
                                 <h3 class="fw-bold text-info">
                                    Medical Assistant ID: <span class="text-secondary">
                                       <?php echo $row['medicalAssistantId']; ?>
                                    </span>
                                 </h3>
                              </div>
                              <div class="tab-pane fade" id="navs-top-general<?php echo $row['id']; ?>" role="tabpanel">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <h5 class="info-text text-info">
                                          Sex:
                                          <span class="text-secondary">
                                             <?php echo $row['sex']; ?>
                                          </span>
                                       </h5>
                                       <h5 class="info-text text-info">
                                          Age:
                                          <span class="text-secondary">
                                             <?php echo $row['age']; ?>
                                          </span>
                                       </h5>
                                       <h5 class="info-text text-info">
                                          Temperature:
                                          <span class="text-secondary">
                                             <?php echo $row['temperature']; ?>
                                          </span>
                                       </h5>
                                       <h5 class="info-text text-info">
                                          Appearance:
                                          <span class="text-secondary">
                                             <?php echo $row['appearance']; ?>
                                          </span>
                                       </h5>
                                    </div>
                                    <div class="col-md-6">
                                       <h5 class="info-text text-info">
                                          Heart Rate:
                                          <span class="text-secondary">
                                             <?php echo $row['heartRate']; ?>
                                          </span>
                                       </h5>
                                       <h5 class="info-text text-info">
                                          Weight:
                                          <span class="text-secondary">
                                             <?php echo $row['weight']; ?>
                                          </span>
                                       </h5>
                                       <h5 class="info-text text-info">
                                          Body Condition Score:
                                          <span class="text-secondary">
                                             <?php echo $row['bodyConditionScore']; ?>
                                          </span>
                                       </h5>
                                       <h5 class="info-text text-info">
                                          Appetite:
                                          <span class="text-secondary">
                                             <?php echo $row['appetite']; ?>
                                          </span>
                                       </h5>
                                    </div>
                                 </div>

                              </div>
                              <div class="tab-pane fade" id="navs-top-elimi<?php echo $row['id']; ?>" role="tabpanel">
                                 <h5>Urine Frequency: <span class="fw-bold text-info">
                                       <?php echo $row['urineFrequency']; ?>
                                    </span></h5>
                                 <h5>Urine Consistency: <span class="fw-bold text-info">
                                       <?php echo $row['urineConsistency']; ?>
                                    </span></h5>
                                 <h5>Urine Color: <span class="fw-bold text-info">
                                       <?php echo $row['urineColor']; ?>
                                    </span>
                                 </h5>
                              </div>
                              <div class="tab-pane fade" id="navs-top-behave<?php echo $row['id']; ?>" role="tabpanel">
                                 <h5>
                                    Activity Level:<span class="fw-bold text-info">
                                       <?php echo $row['activityLevel']; ?>
                                    </span>
                                 </h5>
                                 <h5>
                                    Behavior Description:<span class="fw-bold text-info">
                                       <?php echo $row['behaviorDescription']; ?>
                                    </span>
                                 </h5>
                              </div>
                              <div class="tab-pane fade" id="navs-top-vacci<?php echo $row['id']; ?>" role="tabpanel">
                                 <h5>
                                    Vaccination Name:<span class="fw-bold text-info">
                                       <?php echo $row['vaccinationName']; ?>
                                    </span>
                                 </h5>
                                 <h5>
                                    Vaccination Date:<span class="fw-bold text-info">
                                       <?php echo $row['vaccinationDate']; ?>
                                    </span>
                                 </h5>
                              </div>
                              <div class="tab-pane fade" id="navs-top-note<?php echo $row['id']; ?>" role="tabpanel">
                                 <h5>
                                    Treatment Requirement:
                                    <span class="fw-bold text-info">
                                       <?php echo $row['treatmentRequirement']; ?>
                                    </span>
                                 </h5>
                                 <p>
                                    Note:
                                    <span class="fw-bold text-info">
                                       <?php echo $row['notes']; ?>
                                    </span>
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