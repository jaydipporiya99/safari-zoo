<?php

include "Db/dbConnection.php";

if (isset ($_POST['add'])) {

   $name = $_POST['name'];
   $dob = $_POST['dob'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];

   $q1 = "INSERT INTO `medical`(`name`, `dob`, `email`, `pass`, `phno`, `address`) VALUES ('$name','$dob','$email','$pass','$phone','$address')";

   $res = $con->query($q1);

   if ($res) {
      header("Location: medical-assistant.php");
   }
}

if (isset ($_POST['update'])) {

   $name = $_POST['name'];
   $dob = $_POST['dob'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];

   $q1 = "UPDATE `medical` SET `name`='$name',`dob`='$dob',`email`='$email',`pass`='$pass',`phno`='$phone',`address`='$address' WHERE id = $_GET[edit]";

   $res = $con->query($q1);

   if ($res) {
      header("Location: medical-assistant.php");
   }
}

if (isset ($_GET['edit'])) {
   $select = "select * from medical where id=$_GET[edit]";
   $result = $con->query($select);
   $row = mysqli_fetch_array($result);
}

if (isset ($_GET['del'])) {
   $delete = "DELETE FROM `medical` WHERE id=$_GET[del]";
   $result = $con->query($delete);
   header("location:medical-assistant.php");
}

if (isset ($_POST['clear'])) {
   header("location:medical-assistant.php");
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
   data-template="vertical-menu-template-free">

<head>
   <meta charset="utf-8" />
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
   <title>Medical Data</title>
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

         $currentPage = "medical-assistant";
         include "header.php"

            ?>
         <!-- / Menu -->
         <!-- Layout container -->
         <div class="layout-page">
            <div>
               <h2 class="text-uppercase text-primary fw-bolder text-center mt-5">Medical Assistant</h2>
            </div>
            <!-- ADD EMP -->
            <div class="col-md-8" style="margin-left: 160px;">
               <div class="demo-vertical-spacing demo-only-element">
                  <form id="employeeDataForm" method="POST" class="needs-validation">
                     <div class="mb-3">
                        <label for="employeeName" class="form-label">Name</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-user"></i></span>
                           <input type="text" class="form-control" name="name" value="<?php if (isset ($_GET['edit']))
                              echo $row['name']; ?>" id="employeeName" placeholder="Enter name" required>
                           <div class="invalid-feedback">Please enter a name.</div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="employeeAge" class="form-label">Date Of Birth</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                           <input type="date" class="form-control" name="dob" id="employeeAge"
                              placeholder="Enter Date of Birth" required>
                           <div class="invalid-feedback">Please enter Date of Birth.</div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="employeeEmail" class="form-label">Email</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                           <input type="email" class="form-control" value="<?php if (isset ($_GET['edit']))
                              echo $row['email']; ?>" name="email" id="employeeEmail" placeholder="Enter email"
                              required>
                           <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="employeeEmail" class="form-label">Password</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-key"></i></span>
                           <input type="password" class="form-control" value="<?php if (isset ($_GET['edit']))
                              echo $row['pass']; ?>" name="pass" id="pass" placeholder="Enter password" required>
                           <div class="invalid-feedback">Please enter a valid pass.</div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="employeePhone" class="form-label">Phone</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-phone"></i></span>
                           <input type="tel" class="form-control" value="<?php if (isset ($_GET['edit']))
                              echo $row['phno']; ?>" name="phone" id="employeePhone"
                              placeholder="Enter phone number" required>
                           <div class="invalid-feedback">Please enter a phone number.</div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="employeeAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="employeeAddress" name="address" rows="3" required><?php if (isset ($_GET['edit']))
                           echo $row['address']; ?></textarea>
                        <div class="invalid-feedback">Please enter an address.</div>
                     </div>
                     <div class="mb-5">
                        <?PHP
                        if (isset ($_GET['edit'])) {
                           ?>
                           <button type="submit" class="btn btn-warning" name="update">UPDATE</button>
                           <button type="submit" class="btn btn-secondary" name="clear">CANCEL</button>
                           <?PHP
                        } else {
                           ?>
                           <button type="submit" class="btn btn-primary" name="add">ADD</button>
                           <button type="reset" class="btn btn-secondary">CLEAR</button>
                           <?PHP
                        }
                        ?>
                     </div>
                  </form>
               </div>
            </div>

            <!-- ---------------------------------------------------------------------------------------------- -->

            <!-- TABLE -->
            <div class="col-md-10 mb-lg-5" style="margin-left: 80px;">
               <table id="example" class="table table-striped" width="100%">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DOB</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>ADDRESS</th>
                        <th>ACTION</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $select = "SELECT * FROM `medical`";
                     $result = $con->query($select);
                     while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                           <th>
                              <?php echo $row['id']; ?>
                           </th>
                           <th>
                              <?php echo $row['name']; ?>
                           </th>
                           <th>
                              <?php echo $row['dob']; ?>
                           </th>
                           <th>
                              <?php echo $row['email']; ?>
                           </th>
                           <th>
                              <?php echo $row['phno']; ?>
                           </th>
                           <th>
                              <?php echo $row['address']; ?>
                           </th>
                           <td>
                              <div class="dropdown">
                                 <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item text-warning"
                                       href="medical-assistant.php?edit=<?php echo $row['id'] ?>"><i
                                          class="bx bx-edit-alt me-2"></i>Edit</a>
                                    <a class="dropdown-item text-danger" href="medical-assistant.php?del=<?php echo $row['id'] ?>"
                                       onclick="return confirm('ARE YOU SURE TO DELETE?');"><i
                                          class="bx bx-trash me-2"></i>Delete</a>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     <?php
                     }
                     ?>
                  </tbody>
               </table>
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