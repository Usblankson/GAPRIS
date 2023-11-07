<?php
include "includes/header.php";

// Define the number of records per page and get the current page number
$recordsPerPage = 10;
if (isset($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

// Calculate the starting record for the current page
$startFrom = ($currentPage - 1) * $recordsPerPage;

// Retrieve the total number of records in the database
$totalRecordsQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM videos");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];

// Calculate the total number of pages needed for pagination
$totalPages = ceil($totalRecords / $recordsPerPage);

// Retrieve the records for the current page
$query = mysqli_query($con, "SELECT * FROM videos LIMIT $startFrom, $recordsPerPage");


// Handle search
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($con, $_POST['search']);
    $query = mysqli_query($con, "SELECT * FROM videos WHERE title LIKE '%$search%'");
}

// Handle filter
if (isset($_POST['filter'])) {
    $filter = mysqli_real_escape_string($con, $_POST['filter']);
    if ($filter === 'All') {
        $query = mysqli_query($con, "SELECT * FROM videos");
    } else {
        $query = mysqli_query($con, "SELECT * FROM videos WHERE status = '$filter'");
    }
}
?>


<div class="row">
    <!-- main title -->
    <div class="col-12">
        <div class="main__title">
            <h2>Dashboard</h2>
            <a href="new_video.php" class="main__title-link">add video</a>
            <span class="main__title-stat"><?php echo mysqli_num_rows($query); ?> Total</span>

            <div class="main__title-wrap">
			<!-- Filter Sort -->
			<div class="filter" id="filter__sort">
				<span class="filter__item-label">Filter</span>

				<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<input type="button" value="<?php echo isset($filter) ? $filter : 'All'; ?>">
					<span></span>
				</div>

				<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
					<form method="post">
						<input type="hidden" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
						<li><button type="submit" class="btn btn-link" style="color:white" name="filter" value="All">All</button></li>
						<li><button type="submit" class="btn btn-link" style="color:white" name="filter" value="Active">Active</button></li>
						<li><button type="submit" class="btn btn-link" style="color:white" name="filter" value="Disabled">Disabled</button></li>
					</form>
				</ul>
			</div>
			<!-- End Filter Sort -->

			<!-- Search -->
			<form action="#" class="main__title-form" method="post">
				<input type="text" placeholder="Find movie / tv series.." name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
				<button type="submit">
					<i class="icon ion-ios-search"></i>
				</button>
			</form>
			<!-- End Search -->
            </div>
        </div>
    </div>
    <!-- end main title -->

    <!-- users -->
    <div class="col-12">
        <?php
        echo SuccessMessage();
        echo ErrorMessage();
        ?>
        <div class="main__table-wrap">
            <table class="main__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th>VIEWS</th>
                        <th>STATUS</th>
                        <th>CRAETED DATE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($query)) {
                            $count++;
                            ?>
                            <tr>
                                <td>
                                    <div class="main__table-text"><?php echo $count ?></div>
                                </td>
                                <td>
                                    <div class="main__table-text"><a href="#"><?php echo $row['title']; ?></a></div>
                                </td>
                                <td>
                                    <div class="main__table-text"><?php echo $row['category']; ?></div>
                                </td>
                                <td>
                                    <div class="main__table-text"><?php echo $row['views']; ?></div>
                                </td>
                                <td>
                                    <div class="main__table-text main__table-text--<?php echo $row['status'] === 'Active' ? 'green' : 'red'; ?>"><?php echo $row['status']; ?></div>
                                </td>
                                <td>
                                    <div class="main__table-text"><?php echo $row['createdAt']; ?></div>
                                </td>
                                <td>
                                    <div class="main__table-btns">
                                        <a href="#modal-status" class="main__table-btn main__table-btn--banned open-modal" data-id="<?php echo $row['id']; ?>"
                                            data-mfp-src="#modal-status">
                                            <?php echo $row['status'] === 'Active' ? 'Disable' : 'Activate'; ?></i>
                                        </a>
                                        <!-- modal status -->
                                        <div id="modal-status" class="zoom-anim-dialog mfp-hide modal">
                                            <form action="php/update_video.php" method="POST">
                                                <h6 class="modal__title">Status change</h6>
                                                <p class="modal__text">Are you sure about immediately change status?</p>
                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id" required>
                                                <div class="modal__btns">
                                                    <button class="modal__btn modal__btn--apply" type="submit">Apply</button>
                                                    <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end modal status -->
                                        <a href="../details.php?id=<?php echo $row['id']; ?>" class="main__table-btn main__table-btn--view">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        <a href="#" class="main__table-btn main__table-btn--edit">
                                            <i class="icon ion-ios-create"></i>
                                        </a>
                                        <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                            <i class="icon ion-ios-trash"></i>
                                        </a>
                                        <!-- modal delete -->
                                        <div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
                                            <h6 class="modal__title">Item delete</h6>
                                            <p class="modal__text">Are you sure to permanently delete this item?</p>
                                            <form action="php/delete_video.php" method="POST">
                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id" required>
                                                <input type="hidden" value="<?php echo $row['file'] ?>" name="file" required>
                                                <input type="hidden" value="<?php echo $row['thumbnail'] ?>" name="thumbnail" required>
                                                <div class="modal__btns">
                                                    <button class="modal__btn modal__btn--apply" type="submit">Delete</button>
                                                    <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end modal delete -->
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<p style='color:white'>No Videos Available</p>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end users -->

	<div class="col-12">
    <div class="paginator-wrap">
        <span><?php echo "Page $currentPage of $totalPages"; ?></span>
        <ul class="paginator">
            <?php if ($currentPage > 1): ?>
                <li class="paginator__item paginator__item--prev">
                    <a href="?page=<?php echo $currentPage - 1; ?>"><i class="icon ion-ios-arrow-back"></i></a>
                </li>
            <?php endif; ?>

            <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                <li class="paginator__item <?php echo $page === $currentPage ? 'paginator__item--active' : ''; ?>">
                    <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <li class="paginator__item paginator__item--next">
                    <a href="?page=<?php echo $currentPage + 1; ?>"><i class="icon ion-ios-arrow-forward"></i></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!-- End Paginator -->

<?php include "includes/footer.php"; ?>