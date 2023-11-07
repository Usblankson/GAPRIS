<?php include "includes/header.php";
include "php/db_config.php";

$userQuery = mysqli_query($con,"SELECT * FROM users WHERE role ='User'");
$numUser = mysqli_num_rows($userQuery);

$videoQuery = mysqli_query($con,"SELECT * FROM videos WHERE status ='Active'");
$numVideo = mysqli_num_rows($videoQuery);

?>
			<div class="row row--grid">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Dashboard</h2>

						<a href="new_video.php" class="main__title-link">add video</a>
					</div>
				</div>
				<!-- end main title -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="stats">
						<span>Total Registered Users</span>
						<p><?php echo $numUser ?></p>
						<i class="icon ion-ios-stats"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="stats">
						<span>Total Active Videos</span>
						<p><?php echo $numVideo ?></p>
						<i class="icon ion-ios-film"></i>
					</div>
				</div>
				<!-- end stats -->


			</div>
<?php include "includes/footer.php" ?>
	