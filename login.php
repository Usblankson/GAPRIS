<?php
session_start();
include "php/session.php";

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hotflix.volkovdesign.com/main/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2023 22:59:13 GMT -->
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
	<title>GAPRIS</title>
</head>

<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
				
						<!-- authorization form -->
						<form action="php/login.php" method="POST" class="sign__form">
						<?php echo SuccessMessage();?>
						<?php echo ErrorMessage();?>
							<a href="index.php" class="sign__logo">
								<!-- <img src="img/logo.svg" alt=""> -->
                                 <h3 class="" style="color:orange; font-size:30px;">GAPRIS</h3>

							</a>

							<div class="sign__group">
								<input type="text" name="email" class="sign__input" placeholder="Email">
							</div>

							<div class="sign__group">
								<input type="password" name="password" class="sign__input" placeholder="Password">
							</div>
							
							<button class="sign__btn" type="submit">Sign in</button>

							<span class="sign__delimiter">or</span>

							<span class="sign__text">Don't have an account? <a href="signup.php">Sign up!</a></span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

<!-- Mirrored from hotflix.volkovdesign.com/main/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2023 22:59:13 GMT -->
</html>