<?php

include "Db/dbConnection.php";

if (isset ($_POST['add'])) {
   $name = $_POST['name'];
   $category = $_POST['category'];
   $oldprice = $_POST['oldprice'];
   $newprice = $_POST['newprice'];
   $material = $_POST['material'];
   $size = $_POST['size'];
   $color = $_POST['color'];
   $desc = $_POST['desc'];

   $filename1 = $_FILES['img1']['name'];
   $tmp_name1 = $_FILES['img1']['tmp_name'];
   $folder1 = "../../img/product/" . $filename1;
   move_uploaded_file($tmp_name1, $folder1);

   $filename2 = $_FILES['img2']['name'];
   $tmp_name2 = $_FILES['img2']['tmp_name'];
   $folder2 = "../../img/product/" . $filename2;
   move_uploaded_file($tmp_name2, $folder2);

   $filename3 = $_FILES['img3']['name'];
   $tmp_name3 = $_FILES['img3']['tmp_name'];
   $folder3 = "../../img/product/" . $filename3;
   move_uploaded_file($tmp_name3, $folder3);

   $q1 = "INSERT INTO `products`(`category`, `name`, `old_price`, `new_price`, `material`, `color`, `desc`, `img1`, `img2`, `img3`, `size`) 
   VALUES ('$category','$name','$oldprice','$newprice','$material','$color','$desc','$filename1','$filename2','$filename3','$size')";

   $res = $con->query($q1);

   if ($res) {

      header("Location: product-data.php");
   }

}

if (isset ($_POST['update'])) {
   $name = $_POST['name'];
   $category = $_POST['category'];
   $oldprice = $_POST['oldprice'];
   $newprice = $_POST['newprice'];
   $material = $_POST['material'];
   $size = $_POST['size'];
   $color = $_POST['color'];
   $desc = $_POST['desc'];

   $filename1 = $_FILES['img1']['name'];
   $tmp_name1 = $_FILES['img1']['tmp_name'];
   $folder1 = "../../img/product/" . $filename1;
   move_uploaded_file($tmp_name1, $folder1);

   $filename2 = $_FILES['img2']['name'];
   $tmp_name2 = $_FILES['img2']['tmp_name'];
   $folder2 = "../../img/product/" . $filename2;
   move_uploaded_file($tmp_name2, $folder2);

   $filename3 = $_FILES['img3']['name'];
   $tmp_name3 = $_FILES['img3']['tmp_name'];
   $folder3 = "../../img/product/" . $filename3;
   move_uploaded_file($tmp_name3, $folder3);

   $q1 = "UPDATE `products` SET `category`='$category', `name`='$name', `old_price`='$oldprice', `new_price`='$newprice', `material`='$material', `color`='$color', `desc`='$desc', `img1`='$filename1', `img2`='$filename2', `img3`='$filename3', `size`='$size' WHERE id =  $_GET[edit]";

   $res = $con->query($q1);

   if ($res) {
      header("Location: product-data.php");
   }
}

if (isset ($_GET['edit'])) {
   $select = "select * from products where id=$_GET[edit]";
   $result = $con->query($select);
   $row = mysqli_fetch_array($result);
}

if (isset ($_GET['del'])) {
   $delete = "DELETE FROM `products` WHERE id=$_GET[del]";
   $result = $con->query($delete);
   header("location:product-data.php");
}

if (isset ($_POST['clear'])) {
   header("location:product-data.php");
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
   data-template="vertical-menu-template-free">

<head>
   <meta charset="utf-8" />
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
   <title>Products Data</title>
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

         $currentPage = "product-data";
         include "header.php"

            ?>
         <!-- / Menu -->
         <!-- Layout container -->
         <div class="layout-page">
            <div>
               <h2 class="text-uppercase text-primary fw-bolder text-center mt-5">Product Data</h2>
            </div>
            <!-- ADD PRODUCT -->
            <div class="col-md-8" style="margin-left: 160px;">
               <div class="demo-vertical-spacing demo-only-element">
                  <form id="productForm" method="POST" class="needs-validation" enctype="multipart/form-data">
                     <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-package"></i></span>
                           <input type="text" class="form-control" id="productName" name="name"
                              placeholder="Enter product name" value="<?php if (isset ($_GET['edit']))
                                 echo $row['name']; ?>" required>
                           <div class="invalid-feedback">Please enter a product name.</div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-category"></i></span>
                           <select class="form-select" name="category" id="category" required>
                              <option disabled selected>Select category</option>
                              <option value="clothes">Clothes</option>
                              <option value="accessories">Accessories</option>
                              <option value="toys">Toys</option>
                           </select>
                           <div class="invalid-feedback">Please select a category.</div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label for="oldPrice" class="form-label">Old Price</label>
                              <div class="input-group">
                                 <span class="input-group-text">₹</span>
                                 <input type="number" class="form-control" name="oldprice" id="oldPrice"
                                    placeholder="Enter old price" value="<?php if (isset ($_GET['edit']))
                                       echo $row['old_price']; ?>" required>
                                 <span class="input-group-text">.00</span>
                                 <div class="invalid-feedback">Please enter a valid old price.</div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label for="newPrice" class="form-label">New Price</label>
                              <div class="input-group">
                                 <span class="input-group-text">₹</span>
                                 <input type="number" class="form-control" name="newprice" id="newPrice"
                                    placeholder="Enter new price" value="<?php if (isset ($_GET['edit']))
                                       echo $row['new_price']; ?>" required>
                                 <span class="input-group-text">.00</span>
                                 <div class="invalid-feedback">Please enter a valid new price.</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="material" class="form-label">Material</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="bx bx-layer"></i></span>
                           <input type="text" class="form-control" name="material" id="material"
                              placeholder="Enter material" value="<?php if (isset ($_GET['edit']))
                                 echo $row['material']; ?>" required>
                           <div class="invalid-feedback">Please enter material.</div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label for="size" class="form-label">Size</label>
                              <div class="input-group">
                                 <span class="input-group-text"><i class="bx bx-collapse"></i></span>
                                 <select class="form-select" name="size" id="size" required>
                                    <option value="">Select size</option>
                                    <option value="XXL">XXL</option>
                                    <option value="L">L</option>
                                    <option value="S">S</option>
                                    <option value="None">None</option>
                                 </select>
                                 <div class="invalid-feedback">Please select a size.</div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label for="color" class="form-label">Color</label>
                              <div class="input-group">
                                 <div class="input-group-text">
                                    <input class="form-check-input" type="radio" name="color" id="green" value="Green"
                                       style="background-color: #30d158;">
                                    <label class="form-check-label" for="green"></label>
                                 </div>
                                 <div class="input-group-text">
                                    <input class="form-check-input" type="radio" name="color" id="purple"
                                       value="Purple" style="background-color: #5e5ce6;">
                                    <label class="form-check-label" for="purple"></label>
                                 </div>
                                 <div class="input-group-text">
                                    <input class="form-check-input" type="radio" name="color" id="orange" value="Orange"
                                       style="background-color: #ff9f0b;">
                                    <label class="form-check-label" for="orange"></label>
                                 </div>
                                 <div class="input-group-text">
                                    <input class="form-check-input" type="radio" name="color" id="pink" value="Pink"
                                       style="background-color: #ff3760;">
                                    <label class="form-check-label" for="pink"></label>
                                 </div>
                                 <div class="input-group-text">
                                    <input class="form-check-input" type="radio" name="color" id="blue" value="Blue"
                                       style="background-color: #65d3ff;">
                                    <label class="form-check-label" for="blue"></label>
                                 </div>
                              </div>
                              <div class="invalid-feedback">Please select a color.</div>
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="longDescription" class="form-label">Long Description</label>
                        <textarea class="form-control" name="desc" id="longDescription" rows="" required><?php if (isset ($_GET['edit']))
                           echo $row['desc']; ?></textarea>
                        <div class="invalid-feedback">Please enter a long description.</div>
                     </div>
                     <div class="row">
                        <div class="mb-3 col">
                           <label for="image1" class="form-label">Image 1</label>
                           <div class="input-group">
                              <input class="form-control" type="file" name="img1" id="image1" required>
                              <div class="invalid-feedback">Please select an image.</div>
                           </div>
                        </div>
                        <div class="mb-3 col">
                           <label for="image2" class="form-label">Image 2</label>
                           <div class="input-group">
                              <input class="form-control" type="file" name="img2" id="image2" required>
                              <div class="invalid-feedback">Please select an image.</div>
                           </div>
                        </div>
                        <div class="mb-3 col">
                           <label for="image3" class="form-label">Image 3</label>
                           <div class="input-group">
                              <input class="form-control" type="file" name="img3" id="image3" required>
                              <div class="invalid-feedback">Please select an image.</div>
                           </div>
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
                     $select = "SELECT * FROM products WHERE name LIKE '%$find%' OR category LIKE '%$find%' ORDER BY id";
                     $result = $con->query($select);
                     if (mysqli_num_rows($result) > 0) 
                     {
                        while ($row = mysqli_fetch_array($result)) {
                     ?>
                     <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item">
                              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                 data-bs-target="#navs-top-name<?php echo $row['id']; ?>" aria-controls="navs-top-name"
                                 aria-selected="true">
                                 Name
                              </button>
                           </li>
                           <li class="nav-item">
                              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                 data-bs-target="#navs-top-price<?php echo $row['id']; ?>" aria-controls="navs-top-price"
                                 aria-selected="false">
                                 Price
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
                                 data-bs-target="#navs-top-long<?php echo $row['id']; ?>" aria-controls="navs-top-long"
                                 aria-selected="false">
                                 Long Description
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
                           <div class="tab-pane fade show active" id="navs-top-name<?php echo $row['id']; ?>"
                              role="tabpanel">
                              <div class="row">
                                 <div class="col-md-6">
                                    <p class="fw-bold fs-6">
                                       <?php echo $row['id']; ?>
                                    </p>
                                    <h3 class="fw-bold text-primary">
                                       <?php echo $row['name']; ?>
                                    </h3>
                                    <p class="m-0">
                                       <?php echo $row['category']; ?>
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="row">
                                       <div class="col-4">
                                          <img class="d-block w-100 rounded"
                                             src="../../img/product/<?php echo $row['img1']; ?>" alt="First image">
                                       </div>
                                       <div class="col-4">
                                          <img class="d-block w-100 rounded"
                                             src="../../img/product/<?php echo $row['img2']; ?>" alt="Second image">
                                       </div>
                                       <div class="col-4">
                                          <img class="d-block w-100 rounded"
                                             src="../../img/product/<?php echo $row['img3']; ?>" alt="Third image">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="navs-top-price<?php echo $row['id']; ?>" role="tabpanel">
                              <div class="demo-inline-spacing">
                                 <span>Old Price</span><span class="badge bg-danger">
                                    <?php echo $row['old_price']; ?> ₹
                                 </span>
                                 <span>New Price</span><span class="badge bg-success">
                                    <?php echo $row['new_price']; ?> ₹
                                 </span>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="navs-top-info<?php echo $row['id']; ?>" role="tabpanel">
                              <h6>Material: <span class="fw-bold text-primary">
                                    <?php echo $row['material']; ?>
                                 </span></h6>
                              <h6>Size: <span class="fw-bold text-primary">
                                    <?php echo $row['size']; ?>
                                 </span></h6>
                              <h6>Color: <span class="fw-bold text-primary">
                                    <?php echo $row['color']; ?>
                                 </span></h6>
                           </div>
                           <div class="tab-pane fade" id="navs-top-long<?php echo $row['id']; ?>" role="tabpanel">
                              <p>
                                 <?php echo $row['desc']; ?>
                              </p>
                           </div>
                           <div class="tab-pane fade" id="navs-top-action<?php echo $row['id']; ?>" role="tabpanel">
                              <a href="product-data.php?edit=<?php echo $row['id'] ?>" class="me-3 text-warning">
                                 <i class="bx bx-edit-alt me-2"></i>Edit
                              </a>
                              <a href="product-data.php?del=<?php echo $row['id'] ?>" onclick="return confirm('ARE YOU SURE TO DELETE?');" class="text-danger">
                                 <i class="bx bx-trash me-2"></i>Delete
                              </a>
                           </div>
                        </div>
                     </div>
                     <?php 
                     }
                        } else {
                        echo '<h3 class="text-danger fw-bold text-center mb-5">Product Not Found</h3>';
                        }
                        } else {
                        $select = "SELECT * FROM products ORDER BY id";
                        $result = $con->query($select);
                        while ($row = mysqli_fetch_array($result)) {
                     ?>
                     <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item">
                              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                 data-bs-target="#navs-top-name<?php echo $row['id']; ?>" aria-controls="navs-top-name" aria-selected="true">
                                 Name
                              </button>
                           </li>
                           <li class="nav-item">
                              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                 data-bs-target="#navs-top-price<?php echo $row['id']; ?>" aria-controls="navs-top-price"
                                 aria-selected="false">
                                 Price
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
                                 data-bs-target="#navs-top-long<?php echo $row['id']; ?>" aria-controls="navs-top-long"
                                 aria-selected="false">
                                 Long Description
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
                              <div class="row">
                                 <div class="col-md-6">
                                    <p class="fw-bold fs-6">
                                       <?php echo $row['id']; ?>
                                    </p>
                                    <h3 class="fw-bold text-primary">
                                       <?php echo $row['name']; ?>
                                    </h3>
                                    <p class="m-0">
                                       <?php echo $row['category']; ?>
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="row">
                                       <div class="col-4">
                                          <img class="d-block w-100 rounded" src="../../img/product/<?php echo $row['img1']; ?>"
                                             alt="First image">
                                       </div>
                                       <div class="col-4">
                                          <img class="d-block w-100 rounded" src="../../img/product/<?php echo $row['img2']; ?>"
                                             alt="Second image">
                                       </div>
                                       <div class="col-4">
                                          <img class="d-block w-100 rounded" src="../../img/product/<?php echo $row['img3']; ?>"
                                             alt="Third image">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     
                           <div class="tab-pane fade" id="navs-top-price<?php echo $row['id']; ?>" role="tabpanel">
                              <div class="demo-inline-spacing">
                                 <span>Old Price</span><span class="badge bg-danger">
                                    <?php echo $row['old_price']; ?> ₹
                                 </span>
                                 <span>New Price</span><span class="badge bg-success">
                                    <?php echo $row['new_price']; ?> ₹
                                 </span>
                              </div>
                           </div>
                     
                           <div class="tab-pane fade" id="navs-top-info<?php echo $row['id']; ?>" role="tabpanel">
                              <h6>Material: <span class="fw-bold text-primary">
                                    <?php echo $row['material']; ?>
                                 </span></h6>
                              <h6>Size: <span class="fw-bold text-primary">
                                    <?php echo $row['size']; ?>
                                 </span></h6>
                              <h6>Color: <span class="fw-bold text-primary">
                                    <?php echo $row['color']; ?>
                                 </span></h6>
                           </div>
                           <div class="tab-pane fade" id="navs-top-long<?php echo $row['id']; ?>" role="tabpanel">
                              <p>
                                 <?php echo $row['desc']; ?>
                              </p>
                           </div>
                           <div class="tab-pane fade" id="navs-top-action<?php echo $row['id']; ?>" role="tabpanel">
                              <a href="product-data.php?edit=<?php echo $row['id'] ?>" class="me-3 text-warning">
                                 <i class="bx bx-edit-alt me-2"></i>Edit
                              </a>
                              <a href="product-data.php?del=<?php echo $row['id'] ?>" onclick="return confirm('ARE YOU SURE TO DELETE?');"
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