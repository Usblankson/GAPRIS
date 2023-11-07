<?php include "includes/header.php";
$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM videos WHERE id ='$id' AND status='Active'");

$row = mysqli_fetch_assoc($query);
$views = $row['views'];

$views +=1;
$insert  = mysqli_query($con, "UPDATE videos SET views = '$views' WHERE id ='$id' AND status='Active'");

?>
	<!-- details -->
	<section class="section section--details section--bg" data-bg="img/section/details.jpg">
		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="section__title section__title--mb"><?php echo $row['title'] ?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="uploads/thumbnails/<?php echo $row['thumbnail']?>" alt="">
									<span class="card__rate card__rate--green"><?php echo $views?></span>
								</div>
								<a href="uploads/videos/<?php echo $row['file'];?>" class="card__trailer"><i class="icon ion-ios-play-circle"></i> Watch Now</a>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<ul class="card__meta">
										<li><span style="color:orange;">Total Views:</span> <?php echo $views?></li>
										<li><span style="color:orange;">Description:</span> <?php echo $row['description']?>
									</li>
										<li><span style="color:orange;">Time:</span> <?php echo $row['createdAt']?></li>
									</ul>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
					
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<video controls crossorigin playsinline poster="../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
						<!-- Video files -->
						<source src="uploads/videos/<?php echo $row['file'];?>" type="video/mp4" size="576">
						<source src="uploads/videos/<?php echo $row['file'];?>" type="video/mp4" size="720">
						<source src="uploads/videos/<?php echo $row['file'];?>" type="video/mp4" size="1080">

						<!-- Caption files -->
						<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
						    default>
						<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

						<!-- Fallback for browsers that don't support the <video> element -->
						<a href="uploads/videos/<?php echo $row['file'];?>" download>Download</a>
					</video>
				</div>
				<!-- end player -->
			</div>
		</div>


<!-- Comment Section -->
<div class="container">
    <h3 style="color: white;">Comments</h3>
    <div class="comment-container">
        <!-- Fetch and display comments here -->
        <?php
        // Include your database connection file (e.g., db_config.php)
        include "php/db_config.php";

        // Get the video ID from the URL or wherever it is coming from
        $videoId = $_GET['id']; // You can change this based on your URL parameter

        // Query to fetch comments and sender names from the "comment" and "users" tables
        $query = "SELECT comments.comment, comments.createdAt, users.name FROM comments
                  JOIN users ON comments.senderEmail = users.email
                  WHERE comments.videoId = ?
                  ORDER BY comments.createdAt DESC";

        // Use prepared statements to avoid SQL injection
        if ($stmt = mysqli_prepare($con, $query)) {
            // Bind the video ID as a parameter
            mysqli_stmt_bind_param($stmt, "i", $videoId);

            // Execute the query
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            // Check if there are any comments
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output the comments and sender names
                    $senderName = $row['name'];
                    $comment = $row['comment'];
                    $createdAt = $row['createdAt'];

                    echo '<div class="comment">';
                    echo '<div class="comment-author" style="color: white;"><strong style="color: white;">' . $senderName . '</strong> said:</div>';
                    echo '<div class="comment-content" style="color: orange;">' . $comment . '</div>';
                    echo '<small class="comment-content" style="color: white;">' . $createdAt . '</small>';
                    echo '</div>';
                }
            } else {
                echo '<p style="color:white">No comments found for this video.</p>';
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Handle the error if the prepared statement fails
            echo "Error in the SQL statement: " . mysqli_error($con);
        }

        // Close the database connection
        mysqli_close($con);
        ?>
        <!-- End fetched comments -->
    </div>

    <!-- Comment Form -->
    <div class="comment-form col-md-6">
        <form action="php/comment.php" method="POST">
            <div class="form-group">
                <label for="comment-text">Your Comment</label>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<textarea cols="30" rows="10" id="comment-text" name="comment"></textarea>
            </div>
            <button type="submit">Submit Comment</button>
        </form>
    </div>
</div>


<style>
	/* Comment Section Styles */
.comment-container {
    background: rgba(255, 255, 255, 0.1); /* Transparent white background */
    padding: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    margin-top: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
}

.comment-form {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.1); /* Transparent white background */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
}

.comment-form h4 {
    font-size: 18px;
    margin: 10px 0;
    color: white;
}

.comment {
    margin-bottom: 15px;
    padding: 10px;
    background: rgba(255, 255, 255, 0.1); /* Transparent white background for comments */
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Add a subtle shadow to comments */
}

.comment-author {
    font-weight: bold;
    color: #fff; /* Change text color to white */
}

.comment-content {
    color: #eee; /* Change text color to a lighter color */
}

.comment-form form {
    margin: 0;
}

.comment-form .form-group {
    margin-bottom: 15px;
}

.comment-form label {
    font-weight: bold;
    color: #fff; /* Change label text color to white */
}

.comment-form input[type="text"],
.comment-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    font-size: 14px;
    background: rgba(255, 255, 255, 0.1); /* Transparent white background for inputs */
    color: #fff; /* Change text color to white */
}

.comment-form button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.2s; /* Add a hover transition effect */
}

.comment-form button:hover {
    background-color: #0056b3;
}

</style>

		<?php include "includes/footer.php"?>
