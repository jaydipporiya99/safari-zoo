<?php

include "Db/dbConnection.php";

if(isset($_POST['add']))
{
   $name = $_POST['name'];
   $type = $_POST['type'];
   $conserve = $_POST['conserve'];
   $size = $_POST['size'];
   $habitat = $_POST['habitat'];
   $diet = $_POST['diet'];
   $desc = $_POST['desc'];
   $life = $_POST['life'];

   $filename1 = $_FILES['img1']['name'];
   $tmp_name1 = $_FILES['img1']['tmp_name'];
   $folder1 = "../../img/animals/" . $filename1;
   move_uploaded_file($tmp_name1, $folder1);

   $filename2 = $_FILES['img2']['name'];
   $tmp_name2 = $_FILES['img2']['tmp_name'];
   $folder2 = "../../img/animals/" . $filename2;
   move_uploaded_file($tmp_name2, $folder2);

   $filename3 = $_FILES['img3']['name'];
   $tmp_name3 = $_FILES['img3']['tmp_name'];
   $folder3 = "../../img/animals/" . $filename3;
   move_uploaded_file($tmp_name3, $folder3);


   $q1 = "INSERT INTO `animals`(`name`, `img1`, `img2`, `img3`, `conservation_status`, `life_span`, `body_size`, `native_habitat`, `diet`, `desc`, `type`) 
   VALUES ('$name','$filename1','$filename2','$filename3','$conserve','$life','$size','$habitat','$diet','$desc','$type')";

   $res = $con->query($q1);

   if($res){
      header("Location: animals-data.php");
   }
}

if (isset ($_POST['update'])) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $conserve = $_POST['conserve'];
   $size = $_POST['size'];
   $habitat = $_POST['habitat'];
   $diet = $_POST['diet'];
   $desc = $_POST['desc'];
   $life = $_POST['life'];

   $filename1 = $_FILES['img1']['name'];
   $tmp_name1 = $_FILES['img1']['tmp_name'];
   $folder1 = "../../img/animals/" . $filename1;
   move_uploaded_file($tmp_name1, $folder1);

   $filename2 = $_FILES['img2']['name'];
   $tmp_name2 = $_FILES['img2']['tmp_name'];
   $folder2 = "../../img/animals/" . $filename2;
   move_uploaded_file($tmp_name2, $folder2);

   $filename3 = $_FILES['img3']['name'];
   $tmp_name3 = $_FILES['img3']['tmp_name'];
   $folder3 = "../../img/animals/" . $filename3;
   move_uploaded_file($tmp_name3, $folder3);


   $q1 = "UPDATE `animals` 
   SET 
    `name`='$name',
    `img1`='$filename1',
    `img2`='$filename2',
    `img3`='$filename3',
    `conservation_status`='$conserve',
    `life_span`='$life',
    `body_size`='$size',
    `native_habitat`='$habitat',
    `diet`='$diet',
    `desc`='$desc',
    `type`='$type' 
   WHERE 
    `id`=$_GET[edit]";

   $res = $con->query($q1);

   if ($res) {
      header("Location: animals-data.php");
   }
}

if (isset ($_GET['edit'])) {
   $select = "select * from animals where id=$_GET[edit]";
   $result = $con->query($select);
   $row = mysqli_fetch_array($result);
}

if (isset ($_GET['del'])) {
   $delete = "DELETE FROM `animals` WHERE id=$_GET[del]";
   $result = $con->query($delete);
   header("location:animals-data.php");
}

if (isset ($_POST['clear'])) {
   header("location: animals-data.php");
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
                  <h2 class="text-uppercase text-primary fw-bolder text-center mt-5">Animals Data</h2>
               </div>
               <!-- ADD ANIMAL -->
               <div class="col-md-8" style="margin-left: 160px;">
                  <div class="demo-vertical-spacing demo-only-element">
                     <form id="animalForm" method="POST" class="needs-validation" enctype="multipart/form-data">
                           <div class="mb-3">
                              <label for="animalName" class="form-label">Animal Name</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bxl-mailchimp"></i></span>
                                 <input type="text" class="form-control" name="name" id="animalName" value="<?php if (isset ($_GET['edit']))
                                    echo $row['name']; ?>" placeholder="Enter animal name" required>
                                 <div class="invalid-feedback">Please enter an animal name.</div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="mb-4 col">
                                 <label for="animalImage" class="form-label">Animal Image</label>
                                 <div class="input-group">
                                       <input class="form-control" name="img1" type="file" id="animalImage" required>
                                       <div class="invalid-feedback">Please select an animal image.</div>
                                 </div>
                              </div>
                              <div class="mb-4 col">
                                 <label for="animalIcon" class="form-label">Animal Banner</label>
                                 <div class="input-group">
                                       <input class="form-control" name="img2" type="file" id="animalBanner" required>
                                       <div class="invalid-feedback">Please select an animal icon.</div>
                                 </div>
                              </div>
                              <div class="mb-4 col">
                                 <label for="animalIcon" class="form-label">Animal Icon</label>
                                 <div class="input-group">
                                       <input class="form-control" name="img3" type="file" id="animalIcon" required>
                                       <div class="invalid-feedback">Please select an animal icon.</div>
                                 </div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="animalType" class="form-label">Animal Type</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-category"></i></span>
                                 <select class="form-select" name="type" id="animalType" required>
                                       <option disabled selected>Select animal type</option>
                                       <option value="birds">Birds</option>
                                       <option value="fish">Fish</option>
                                       <option value="mammals">Mammals</option>
                                       <option value="reptiles">Reptiles</option>
                                       <option value="amphibians">Amphibians</option>
                                       <option value="insects">Insects</option>
                                 </select>
                                 <div class="invalid-feedback">Please select an animal type.</div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="conservationStatus" class="form-label">Conservation Status</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-shield"></i></span>
                                 <select class="form-select" name="conserve" id="conservationStatus" required>
                                       <option disabled selected>Select conservation status</option>
                                       <option value="endangered">Endangered</option>
                                       <option value="Least Concern">Least Concern</option>
                                       <option value="Not Evaluated">Not Evaluated</option>
                                       <option value="Vulnerable">Vulnerable</option>
                                       <option value="Critically Endangered">Critically Endangered</option>
                                 </select>
                                 <div class="invalid-feedback">Please select a conservation status.</div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="bodySize" class="form-label">Body Size</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-line-chart"></i></span>
                                 <input type="text" class="form-control" name="size" value="<?php if (isset ($_GET['edit']))
                                    echo $row['body_size']; ?>" id="bodySize" placeholder="Enter body size" required>
                                 <div class="invalid-feedback">Please enter body size.</div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="bodySize" class="form-label">Life Span</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-line-chart"></i></span>
                                 <input type="text" class="form-control" name="life" id="life" value="<?php if (isset ($_GET['edit']))
                                    echo $row['life_span']; ?>" placeholder="Enter Life Span" required>
                                 <div class="invalid-feedback">Please enter  Life Span.</div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="habitat" class="form-label">Habitat</label>
                              <textarea class="form-control" id="habitat" name="habitat" rows="2" required><?php if (isset ($_GET['edit']))
                                 echo $row['native_habitat']; ?></textarea>
                              <div class="invalid-feedback">Please enter habitat information.</div>
                           </div>
                           <div class="mb-3">
                              <label for="diet" class="form-label">Diet</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-food-menu"></i></span>
                                 <input type="text" class="form-control" name="diet" id="diet" value="<?php if (isset ($_GET['edit']))
                                    echo $row['diet']; ?>" placeholder="Enter diet information" required>
                                 <div class="invalid-feedback">Please enter diet information.</div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="animalDescription" class="form-label">Description</label>
                              <textarea class="form-control" id="animalDescription" name="desc" rows="5" required><?php if (isset ($_GET['edit']))
                                 echo $row['desc']; ?></textarea>
                              <div class="invalid-feedback">Please enter a description for the animal.</div>
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
               
               <form method="POST">
               <div class="row justify-content-end mx-4 mb-3">
                  <div class="col-auto">
                     <div class="input-group">
                        <input type="text" class="form-control" name="find" id="search" placeholder="Search">
                        <button type="submit" class="btn btn-primary" name="search"><i class="bx bx-search"></i></button>
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
                                    <li class="nav-item">
                                       <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                          data-bs-target="#navs-top-action<?php echo $row['id']; ?>" aria-controls="navs-top-action"
                                          aria-selected="false">
                                          Action
                                       </button>
                                    </li>
                                 </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-top-name<?php echo $row['id']; ?>" role="tabpanel">
                                       <p class="fw-bold fs-6">ID:
                                          <?php echo $row['id']; ?>
                                       </p>
                                       <h3 class="fw-bold text-primary">
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
                                       <h6>Conservation Status: <span class="fw-bold text-primary">
                                             <?php echo $row['conservation_status']; ?>
                                          </span></h6>
                                       <h6>Life Span: <span class="fw-bold text-primary">
                                             <?php echo $row['life_span']; ?>
                                          </span></h6>
                                       <h6>Body Size: <span class="fw-bold text-primary">
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
                                    <div class="tab-pane fade" id="navs-top-action<?php echo $row['id']; ?>" role="tabpanel">
                                       <a href="animals-data.php?edit=<?php echo $row['id'] ?>" class="me-3 text-warning">
                                          <i class="bx bx-edit-alt me-2"></i>Edit
                                       </a>
                                       <a href="animals-data.php?del=<?php echo $row['id'] ?>" onclick="return confirm('ARE YOU SURE TO DELETE?');"
                                          class="text-danger">
                                          <i class="bx bx-trash me-2"></i>Delete
                                       </a>
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
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                       data-bs-target="#navs-top-action<?php echo $row['id']; ?>" aria-controls="navs-top-action"
                                       aria-selected="false">
                                       Action
                                    </button>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade show active" id="navs-top-name<?php echo $row['id']; ?>" role="tabpanel">
                                    <p class="fw-bold fs-6">ID:
                                       <?php echo $row['id']; ?>
                                    </p>
                                    <h3 class="fw-bold text-primary">
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
                                    <h6>Conservation Status: <span class="fw-bold text-primary">
                                          <?php echo $row['conservation_status']; ?>
                                       </span></h6>
                                    <h6>Life Span: <span class="fw-bold text-primary">
                                          <?php echo $row['life_span']; ?>
                                       </span></h6>
                                    <h6>Body Size: <span class="fw-bold text-primary">
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
                                 <div class="tab-pane fade" id="navs-top-action<?php echo $row['id']; ?>" role="tabpanel">
                                    <a href="animals-data.php?edit=<?php echo $row['id'] ?>" class="me-3 text-warning">
                                       <i class="bx bx-edit-alt me-2"></i>Edit
                                    </a>
                                    <a href="animals-data.php?del=<?php echo $row['id'] ?>" onclick="return confirm('ARE YOU SURE TO DELETE?');"
                                       class="text-danger">
                                       <i class="bx bx-trash me-2"></i>Delete
                                    </a>
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