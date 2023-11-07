<?php
session_start();
include "php/session.php";
include "php/security.php";
$current_page = basename($_SERVER['PHP_SELF']);
include "php/db_config.php";


$email = $_SESSION['gaprisEmail'];


$query = mysqli_query($con,"SELECT * FROM users WHERE email ='$email'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hotflix.volkovdesign.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2023 23:05:21 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/admin.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>GAPRIS Admin</title>

</head>
<body>
	<!-- header -->
	<header class="header">
		<div class="header__content">
			<!-- header logo -->
			<a href="index.php" class="header__logo">
				<img src="img/logo.svg" alt="">
			</a>
			<!-- end header logo -->

			<!-- header menu btn -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- end header menu btn -->
		</div>
	</header>
	<!-- end header -->

	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="index.php" class="sidebar__logo">
			<!-- <img src="img/logo.svg" alt=""> -->
            <h3 class="" style="color:orange; font-size:30px;">GAPRIS</h3>
		</a>
		<!-- end sidebar logo -->
		
		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="img/user.svg" alt="">
			</div>

			<div class="sidebar__user-title">
				<span>Admin</span>
				<p><?php echo $row['name']?></p>
			</div>

			<form action="php/logout.php" method="POST" class="sidebar__user-btn">
				<button class="sidebar__user-btn" name="logout" type="submit">
					<i class="icon ion-ios-log-out"></i>
				</button>
			</form>
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<div class="sidebar__nav-wrap">
			<ul class="sidebar__nav">
				<li class="sidebar__nav-item">
					<a href="index.php" class="sidebar__nav-link <?php if($current_page == 'index.php') echo 'sidebar__nav-link--active'?>"><i class="icon ion-ios-keypad"></i> <span>Dashboard</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="videos.php" class="sidebar__nav-link <?php if($current_page == 'videos.php') echo 'sidebar__nav-link--active'?>"><i class="icon ion-ios-film"></i> <span>Videos</span></a>
				</li>
				<li class="sidebar__nav-item">
					<a href="users.php" class="sidebar__nav-link <?php if($current_page == 'users.php') echo 'sidebar__nav-link--active'?>"><i class="icon ion-ios-contacts"></i> <span>Users</span></a>
				</li>
			</ul>
		</div>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright"><span class="footer__copyright">DESIGN AND IMPLEMENTATION OF ONLINE GOAT AND PIG REARING INFORMATION SYSTEM<br> BUILT by <a> BLANKSON, UYOHOINI SATURDAY 18/CSC/049</a></span></div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">