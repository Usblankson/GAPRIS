<?php include "includes/header.php";
include "php/db_config.php";

$mostViewQuery = mysqli_query($con,"SELECT * FROM videos WHERE status='Active' ORDER BY views DESC LIMIT 5");

// Create an array to store the video data
$mostViewedVideos = [];
while ($row = mysqli_fetch_assoc($mostViewQuery)) {
    $mostViewedVideos[] = $row;
}

$latestMovieQuery = mysqli_query($con,"SELECT * FROM videos  WHERE status='Active' ORDER BY id DESC LIMIT 5");

?>
	

	<section class="home">
    <!-- home bg -->
    <div class="owl-carousel home__bg">
        <div class="item home__cover" data-bg="img/pig_bg.jpg"></div>
        <div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
        <div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
        <div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
        <div class="item home__cover" data-bg="img/home/home__bg5.jpg"></div>
    </div>
    <!-- end home bg -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title"><b>MOST WATCHED</b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel home__carousel--bg">
                    <?php
                    // Loop through the most viewed videos and generate carousel items
                    foreach ($mostViewedVideos as $video) {
                        echo '<div class="card card--big">';
                        echo '<div class="card__cover">';
                        echo '<img src="uploads/thumbnails/' . $video['thumbnail'] . '" alt="' . $video['title'] . '">';
                        echo '<a href="details.php?id='.$video['id'].'" class="card__play">';
                        echo '<i class="icon ion-ios-play"></i>';
                        echo '</a>';
                        echo '<span class="card__rate card__rate--green">' . $video['views'] . '</span>';
                        echo '</div>';
                        echo '<div class="card__content">';
                        echo '<h3 class="card__title"><a href="details.php?id='.$video['id'].'">' . $video['title'] . '</a></h3>';
                        echo '<span class="card__category">';
                        // You can loop through video categories here if needed
                        // Example: foreach ($video['categories'] as $category) {
                        //            echo '<a href="#">' . $category . '</a>';
                        //         }
                        echo '</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->


	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
                        <div class="d-flex justify-content-between">
                            <h2 class="content__title">Latest Release</h2>

                            <a href="videos.php" style="color:white;">See all</a>
                        </div>						<!-- end content title -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="New releases">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">NEW RELEASES</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">MOVIES</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">TV SERIES</a></li>

									<li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">CARTOONS</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content">
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
					<div class="row row--grid">
						<?php 
						while($row = mysqli_fetch_assoc($latestMovieQuery)){
							$img =$row['thumbnail'];
							?>
						<!-- card -->
						<div class="col-6 col-sm-4 col-md-4 col-xl-4">
							<div class="card">
								<div class="card__cover">
									<img src="uploads/thumbnails/<?php echo $img;?>" alt="">
									<a href="details.php?id=<?php echo $row['id'];?>" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
									<span class="card__rate card__rate--green"><?php echo $row['views']?><i class="icon ion-ios-eye"></i></span>
									
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="details.php?id=<?php echo $row['id'];?>"><?php echo $row['title']?></a></h3>
									<span class="card__category">
										<a href="#"><?php echo $row['createdAt']?></a>
									</span>
								</div>
							</div>
						</div>
						<!-- end card -->
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end content -->


<?php include "includes/footer.php"?>
	