<?php

include "Db/dbConnection.php";

if (isset ($_POST['add'])) {

   $name = $_POST['name'];
   $desc = $_POST['desc'];
   $date = $_POST['date'];
   $month = $_POST['month'];

   $filename1 = $_FILES['img1']['name'];
   $tmp_name1 = $_FILES['img1']['tmp_name'];
   $folder1 = "../../img/events/" . $filename1;
   move_uploaded_file($tmp_name1, $folder1);

   $q1 = "INSERT INTO `events`(`title`, `desc`, `date`, `month`, `img`) VALUES ('$name','$desc','$date','$month','$filename1')";
   $res = $con->query($q1);
   if ($res) {
      header("Location: events-data.php");
   }
}

if (isset ($_POST['update'])) {

   $name = $_POST['name'];
   $desc = $_POST['desc'];
   $date = $_POST['date'];
   $month = $_POST['month'];

   $filename1 = $_FILES['img1']['name'];
   $tmp_name1 = $_FILES['img1']['tmp_name'];
   $folder1 = "../../img/events/" . $filename1;
   move_uploaded_file($tmp_name1, $folder1);

   $q1 = "UPDATE `events` SET `title`='$name',`desc`='$desc',`date`='$date',`month`='$month',`img`='$filename1' WHERE id = $_GET[edit]";
   $res = $con->query($q1);
   if ($res) {
      header("Location: events-data.php");
   }
}

if (isset ($_GET['edit'])) {
   $select = "select * from events where id=$_GET[edit]";
   $result = $con->query($select);
   $row = mysqli_fetch_array($result);
}

if (isset ($_GET['del'])) {
   $delete = "DELETE FROM `events` WHERE id=$_GET[del]";
   $result = $con->query($delete);
   header("location:events-data.php");
}

if (isset ($_POST['clear'])) {
   header("location:events-data.php");
}

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
      <title>Events Data</title>
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

            $currentPage = "events-data";
            include "header.php"

            ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
               <div>
                  <h2 class="text-uppercase text-primary fw-bolder text-center mt-5">Events</h2>
               </div>
               <!-- ADD Events -->
               <div class="col-md-8" style="margin-left: 160px;">
                  <div class="demo-vertical-spacing demo-only-element">
                     <form id="eventForm" method="POST" class="needs-validation" enctype="multipart/form-data">
                        <div class="mb-3">
                           <label for="eventTitle" class="form-label">Title</label>
                           <div class="input-group">
                              <span class="input-group-text"><i class="bx bx-calendar-event"></i></span>
                              <input type="text" class="form-control" name="name" id="eventTitle" value="<?php if (isset ($_GET['edit']))
                                 echo $row['title']; ?>" placeholder="Enter event title" required>
                              <div class="invalid-feedback">Please enter an event title.</div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="eventDescription" class="form-label">Description</label>
                           <textarea class="form-control" name="desc" id="eventDescription" rows="5" required><?php if (isset ($_GET['edit']))
                              echo $row['desc']; ?></textarea>
                           <div class="invalid-feedback">Please enter a description for the event.</div>
                        </div>
                        <div class="row">
                           <div class="mb-3 col">
                              <label for="eventDate" class="form-label">Date</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                 <input type="number" class="form-control" name="date" value="<?php if (isset ($_GET['edit']))
                                    echo $row['date']; ?>" id="eventDate" placeholder="Enter date" required>
                                 <div class="invalid-feedback">Please enter the date.</div>
                              </div>
                           </div>
                           <div class="mb-3 col">
                              <label for="eventMonth" class="form-label">Month</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                 <select class="form-select" name="month" id="eventMonth" required>
                                    <option disabled selected>Select month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                 </select>
                                 <div class="invalid-feedback">Please select a month.</div>
                              </div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="eventImage" class="form-label">Image</label>
                           <div class="input-group">
                              <input class="form-control" type="file" name="img1" id="eventImage" required>
                              <div class="invalid-feedback">Please select an event image.</div>
                           </div>
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
                              <th>Title</th>
                              <th>Description</th>
                              <th>Date</th>
                              <th>Month</th>
                              <th>IMAGE</th>
                              <th>ACTION</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $select = "SELECT * FROM `events`";
                           $result = $con->query($select);
                           while ($row = mysqli_fetch_array($result)) {

                              ?>
                              <tr>
                                 <td>
                                    <?php echo $row['id']; ?>
                                 </td>
                                 <td>
                                    <?php echo $row['title']; ?>
                                 </td>
                                 <td>
                                    <?php echo $row['desc']; ?>
                                 </td>
                                 <td>
                                    <?php echo $row['date']; ?>
                                 </td>
                                 <td>
                                    <?php echo $row['month']; ?>
                                 </td>
                                 <td><img src="../../img/events/<?php echo $row['img']; ?>" alt="" class="rounded" height="50px"></td>
                                 <td>
                                    <div class="dropdown">
                                       <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                             class="bx bx-dots-vertical-rounded"></i></button>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item text-warning" href="events-data.php?edit=<?php echo $row['id'] ?>"><i class="bx bx-edit-alt me-2"></i>Edit</a>
                                          <a class="dropdown-item text-danger" href="events-data.php?del=<?php echo $row['id'] ?>" onclick="return confirm('ARE YOU SURE TO DELETE?');"><i class="bx bx-trash me-2"></i>Delete</a>
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