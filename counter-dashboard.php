<?php

include "Db/dbConnection.php";
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="description" content="description" />
	<meta name="keywords" content="keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon//favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon//favicon-16x16.png" />
	<link rel="manifest" href="img/favicon/site.webmanifest" />
	<title>Counter Dashboard</title>
	<!-- styles-->
	<link rel="stylesheet" href="css/styles.min.css" />

	<!-- DataTable -->
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.uikit.css">
	
	<!-- web-font loader-->
	<script>
		WebFontConfig = {
			google: {
				families: [
					"Nunito+Sans:300,400,500,700,900",
					"Quicksand:300,400,500,700",
				],
			},
		};

		function font() {
			var wf = document.createElement("script");

			wf.src =
				("https:" == document.location.protocol ? "https" : "http") +
				"://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js";
			wf.type = "text/javascript";
			wf.async = "true";

			var s = document.getElementsByTagName("script")[0];

			s.parentNode.insertBefore(wf, s);
		}

		font();

		new DataTable('#example');
	</script>
</head>

<body>
	<div class="page-wrapper">
		<!-- header start-->
		<header class="header header-common">
			<div class="header__top">
				<div class="row align-items-center">
					<div class="col-6 col-lg-4">
						<a class="logo" href="counter-index.php"><img class="logo__img" src="img/logo_zoo_black.png"
								alt="logo" /></a>
					</div>
					<div class="col-6 col-lg-8 d-flex justify-content-end">
						<!-- main menu start-->
						<ul class="main-menu">
							<li class="main-menu__item">
								<a class="main-menu__link" href="counter-index.php"><span>HOME</span></a>
							</li>
							<li class="main-menu__item">
								<a class="main-menu__link" href="counter-dashboard.php"><span>DASHBOARD</span></a>
							</li>
							<li class="main-menu__item">
								<a class="main-menu__link" href="logout.php"><span>LOGOUT</span></a>
							</li>
						</ul>
						<span class="header__button">EMPID: <span><?php if (isset ($_SESSION['id'])) {
							echo $_SESSION['id'];
						} else {
							echo "NO ID";
						} ?></span></span>
					</div>
				</div>
			</div>
		</header>
		<!-- header end-->
		<main class="main ">
			<section class="section background--gray">
				<div class="container" style="margin-left: 270px;">
					<div class="row">
						<table id="example" class="uk-table uk-table-hover uk-table-striped">
							<thead>
                    <tr>
                        <th>ID</th>
                        <th>FNAME</th>
                        <th>LNAME</th>
                        <th>EMAIL</th>
                        <th>CHILD</th>
                        <th>ADULT</th>
                        <th>SENIOR</th>
                        <th>DATE</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
								$select = "SELECT * FROM `tickets`";
								$result = $con->query($select);
								while ($row = mysqli_fetch_array($result)) {
									?>
									<tr>
										<td>
											<?php echo $row['id']; ?>
										</td>
										<td>
											<?php echo $row['fname']; ?>
										</td>
										<td>
											<?php echo $row['lname']; ?>
										</td>
										<td>
											<?php echo $row['email']; ?>
										</td>
										<td>
											<?php echo $row['child']; ?>
										</td>
										<td>
											<?php echo $row['adults']; ?>
										</td>
										<td>
											<?php echo $row['senior']; ?>
										</td>
										<td>
											<?php echo $row['date']; ?>
										</td>
										<td>
											<?php echo $row['total_amount']; ?>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</main>
	</div>
	<!-- libs-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="js/libs.min.js"></script>
	<!-- scripts-->
	<script src="js/common.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/js/uikit.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.2/js/dataTables.uikit.js"></script>

	<script>
		$(document).ready(function () {
			new DataTable('#example');
		});
	</script>

</body>

</html>