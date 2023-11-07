<?php include "includes/header.php";

$query = mysqli_query($con, "SELECT * FROM users WHERE email ='$email'");

$row = mysqli_fetch_assoc($query);


?>

	<!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">My Account</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="index.php">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Profile</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- End Page Title -->
    <section class="container" style="color: white">
        <div class="row">
            <div>
                <img src="https://th.bing.com/th/id/OIP.audMX4ZGbvT2_GJTx2c4GgHaHw?pid=ImgDet&rs=1" alt="" style="width: 150px; height: 150px; border-radius: 50%">
            </div>
            <div class="ml-3">
                <h3><?php echo $row['name'] ?></h3>
                <h3><?php echo $row['email'] ?></h3>
                <button class="header__sign-in" style="color: white">Edit</button>
            </div>
        </div>
    </section>




<?php include "includes/footer.php"?>