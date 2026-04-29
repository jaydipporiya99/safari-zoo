<?php

include "Db/dbConnection.php";

if (isset ($_POST['add'])) {
  $animalId = $_POST['animalId'];
  $medicalAssistantId = $_POST['medicalAssistantId'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $temperature = $_POST['temperature'];
  $heartRate = $_POST['heartRate'];
  $weight = $_POST['weight'];
  $bodyConditionScore = $_POST['bodyConditionScore'];
  $appearance = $_POST['appearance'];
  $appetite = $_POST['appetite'];
  $urineFrequency = $_POST['urineFrequency'];
  $urineConsistency = $_POST['urineConsistency'];
  $urineColor = $_POST['urineColor'];
  $activityLevel = $_POST['activityLevel'];
  $behaviorDescription = $_POST['behaviorDescription'];
  $vaccinationName = $_POST['vaccinationName'];
  $vaccinationDate = $_POST['vaccinationDate'];
  $treatmentRequirement = $_POST['treatmentRequirement'];
  $notes = $_POST['notes'];

  $q1 = "INSERT INTO checkup (animalId, medicalAssistantId, sex, age, temperature, heartRate, weight, bodyConditionScore, appearance, appetite, urineFrequency, urineConsistency, urineColor, activityLevel, behaviorDescription, vaccinationName, vaccinationDate, treatmentRequirement, notes)
VALUES ('$animalId', '$medicalAssistantId', '$sex', $age, '$temperature', '$heartRate', '$weight', '$bodyConditionScore', '$appearance', '$appetite', '$urineFrequency', '$urineConsistency', '$urineColor', '$activityLevel', '$behaviorDescription', '$vaccinationName', '$vaccinationDate', '$treatmentRequirement', '$notes')";

  $res = $con->query($q1);

  if ($res) {

    header("Location: checkup.php");
  }

}

?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Animal CheckUp</title>

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

      $currentPage = "index";
      include "header.php"

        ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <div>
          <h2 class="text-uppercase text-info fw-bolder text-center mt-5">Animal CheckUp</h2>
        </div>
        <div class="m-3">
          <div class="col-md-8" style="margin-left: 160px;">
            <div class="demo-vertical-spacing demo-only-element">
              <form id="animalCheckupForm" method="POST" class="needs-validation" enctype="multipart/form-data">
                <fieldset class="border p-4 rounded-3 mb-2">
                  <legend class="w-auto fw-bold fs-4 text-info">Information</legend>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="animalId" class="form-label">Animal ID</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bxl-github"></i></span>
                        <input type="text" class="form-control" name="animalId" id="animalId" placeholder="Animal ID"
                          required>
                        <div class="invalid-feedback">Please enter the Animal ID.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="medicalAssistantId" class="form-label">Medical Assistant ID</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bxs-user"></i></span>
                        <input type="text" class="form-control" name="medicalAssistantId" id="medicalAssistantId"
                          placeholder="Medical Assistant ID" required>
                        <div class="invalid-feedback">Please enter the Medical Assistant ID.</div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-4">
                      <label for="sex" class="form-label">Sex</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="Male" required>
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                      <div class="invalid-feedback">Please select the sex.</div>
                    </div>
                    <div class="col-md-4">
                      <label for="age" class="form-label">Age</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Age" required>
                        <div class="invalid-feedback">Please enter the age.</div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <fieldset class="border p-4 rounded-3 mb-2">
                  <legend class="w-auto fw-bold fs-4 text-info">General Observations</legend>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="temperature" class="form-label">Body Temperature</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bxs-thermometer"></i></span>
                        <input type="text" class="form-control" name="temperature" id="temperature"
                          placeholder="Body Temperature" required>
                        <div class="invalid-feedback">Please enter the body temperature.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="heartRate" class="form-label">Heart Rate</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bx-heart"></i></span>
                        <input type="text" class="form-control" name="heartRate" id="heartRate" placeholder="Heart Rate"
                          required>
                        <div class="invalid-feedback">Please enter the heart rate.</div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="weight" class="form-label">Weight</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bx-body"></i></span>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight" required>
                        <div class="invalid-feedback">Please enter the weight.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="bodyConditionScore" class="form-label">Body Condition Score (BCS)</label>
                      <select class="form-select" name="bodyConditionScore" id="bodyConditionScore" required>
                        <option value="">Select</option>
                        <option value="Underweight">Underweight</option>
                        <option value="Ideal">Ideal</option>
                        <option value="Overweight">Overweight</option>
                      </select>
                      <div class="invalid-feedback">Please select the body condition score.</div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="appearance" class="form-label">Appearance</label>
                      <select class="form-select" name="appearance" id="appearance" required>
                        <option value="">Select</option>
                        <option value="Healthy">Healthy</option>
                        <option value="Lethargic">Lethargic</option>
                        <option value="Injuries">Injuries</option>
                      </select>
                      <div class="invalid-feedback">Please select the appearance.</div>
                    </div>
                    <div class="col-md-6">
                      <label for="appetite" class="form-label">Appetite</label>
                      <select class="form-select" name="appetite" id="appetite" required>
                        <option value="">Select</option>
                        <option value="Normal">Normal</option>
                        <option value="Decreased">Decreased</option>
                        <option value="Increased">Increased</option>
                      </select>
                      <div class="invalid-feedback">Please select the appetite.</div>
                    </div>
                  </div>
                </fieldset>
                <fieldset class="border p-4 rounded-3 mb-2">
                  <legend class="w-auto fw-bold fs-4 text-info">Elimination</legend>
                  <div class="row mb-3">
                    <div class="col-md-4">
                      <label for="urineFrequency" class="form-label">Urine Frequency</label>
                      <input type="text" class="form-control" name="urineFrequency" id="urineFrequency"
                        placeholder="Urine Frequency">
                    </div>
                    <div class="col-md-4">
                      <label for="urineConsistency" class="form-label">Urine Consistency</label>
                      <input type="text" class="form-control" name="urineConsistency" id="urineConsistency" placeholder="Urine Consistency">
                    </div>
                    <div class="col-md-4">
                      <label for="urineColor" class="form-label">Urine Color</label>
                      <input type="text" class="form-control" name="urineColor" id="urineColor"
                        placeholder="Urine Color">
                    </div>
                  </div>
                </fieldset>
                <fieldset class="border p-4 rounded-3 mb-2">
                  <legend class="w-auto fw-bold fs-4 text-info">Behavior</legend>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="activityLevel" class="form-label">Activity Level</label>
                      <select class="form-select" name="activityLevel" id="activityLevel" required>
                        <option value="">Select</option>
                        <option value="Normal">Normal</option>
                        <option value="Decreased">Decreased</option>
                        <option value="Increased">Increased</option>
                      </select>
                      <div class="invalid-feedback">Please select the activity level.</div>
                    </div>
                    <div class="col-md-6">
                      <label for="behaviorDescription" class="form-label">Behavior Description</label>
                      <select class="form-select" name="behaviorDescription" id="behaviorDescription" required>
                        <option value="">Select</option>
                        <option value="Active">Active</option>
                        <option value="Alert">Alert</option>
                        <option value="Aggressive">Aggressive</option>
                        <option value="Social">Social</option>
                        <option value="Vocal">Vocal</option>
                        <option value="Withdrawn">Withdrawn</option>
                      </select>
                      <div class="invalid-feedback">Please select the behavior description.</div>
                    </div>
                  </div>
                </fieldset>
                <fieldset class="border p-4 rounded-3 mb-2">
                  <legend class="w-auto fw-bold fs-4 text-info">Vaccinations</legend>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="vaccinationName" class="form-label">Vaccination Name</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bxs-vial"></i></span>
                        <input type="text" class="form-control" name="vaccinationName" id="vaccinationName"
                          placeholder="Vaccination Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="vaccinationDate" class="form-label">Vaccination Date</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                        <input type="date" class="form-control" name="vaccinationDate" id="vaccinationDate"
                          placeholder="Vaccination Date">
                      </div>
                    </div>
                  </div>
                </fieldset>
                <fieldset class="border p-4 rounded-3 mb-2">
                  <legend class="w-auto fw-bold fs-4 text-info">Notes</legend>
                  <div class="row mb-3">
                    <div class="">
                      <label for="treatmentRequirement" class="form-label">Treatment Requirement</label>
                      <select class="form-select" name="treatmentRequirement" id="treatmentRequirement" required>
                        <option value="">Select</option>
                        <option value="High">High</option>
                        <option value="Low">Low</option>
                        <option value="None">None</option>
                      </select>
                      <div class="invalid-feedback">Please select the treatment requirement.</div>
                    </div>
                    <div class="mt-3">
                      <label for="notes" class="form-label">Notes</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bx bx-note"></i></span>
                        <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Notes"></textarea>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="mb-5">
                  <button type="submit" class="btn btn-info" name="add">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
            </div>
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