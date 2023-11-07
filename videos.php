<?php include "includes/header.php";
$videoQuery = mysqli_query($con,"SELECT * FROM videos WHERE status='Active' ORDER BY id DESC");


?>


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
						while($row = mysqli_fetch_assoc($videoQuery)){
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
	<!-- end content --
    

<?php include "includes/footer.php";?>