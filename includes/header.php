<?php
session_start();
include "php/session.php";
include "php/security.php";
$current_page = basename($_SERVER['PHP_SELF']);
include "php/db_config.php";


$email = $_SESSION['gaprisEmail'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hotflix.volkovdesign.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2023 22:46:28 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>Online Goat and Pig Rearing</title>
</head>

<body class="body">
	<!-- header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
							<!-- <img src="img/logo.svg" alt=""> -->
							<h3 class="" style="color:orange; font-size:30px;">GAPRIS</h3>
						<!-- end header logo -->

						<!-- header nav -->
						<ul class="header__nav">
							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link  <?php if($current_page == 'index.php') echo 'header__nav-link--active'?> " href="index.php">Home</a>
							</li>

							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link <?php if($current_page == 'videos.php') echo 'header__nav-link--active'?>" href="videos.php">Videos</a>
							</li>

							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link <?php if($current_page == 'profile.php') echo 'header__nav-link--active'?>" href="profile.php">Profile</a>
							</li>

							<!-- end dropdown -->
						</ul>
						<!-- end header nav -->

						<!-- header auth -->
						<div class="header__auth">

							<form action="php/logout.php" method="POST">
								<button name="logout" type="submit" class="header__sign-in" >
									<i class="icon ion-ios-log-in"></i>
									<span>Logout</span>
								</button>
							</form>
						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->

