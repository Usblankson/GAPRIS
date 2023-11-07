<?php
include "includes/header.php";
include "php/db_config.php";

// Pagination settings
$recordsPerPage = 10;
if (isset($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}
$startFrom = ($currentPage - 1) * $recordsPerPage;

// Search filter
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = empty($searchTerm) ? '' : "WHERE name LIKE '%$searchTerm%'";

// Query to fetch users with optional search
$query = mysqli_query($con, "SELECT * FROM users WHERE role = 'User' AND name LIKE '%$searchTerm%'");

$num = mysqli_num_rows($query);

// Paginator
$totalRecords = mysqli_num_rows($query);
$totalPages = ceil($totalRecords / $recordsPerPage);

?>

<div class="row">
    <!-- main title -->
    <div class="col-12">
        <div class="main__title">
            <h2>Users</h2>
            <span class="main__title-stat"><?php echo $num; ?> Total</span>
            <div class="main__title-wrap">
                <!-- search form -->
                <form action="#" class="main__title-form">
                    <input type="text" name="search" placeholder="Search a user by name" value="<?php echo $searchTerm; ?>">
                    <button type="submit">
                        <i class="icon ion-ios-search"></i>
                    </button>
                </form>
                <!-- end search form -->
            </div>
        </div>
    </div>
    <!-- end main title -->

    <!-- users -->
    <div class="col-12">
        <?php echo SuccessMessage();
        echo ErrorMessage();
        ?>
        <div class="main__table-wrap">
            <table class="main__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>CRAETED DATE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $count = ($currentPage - 1) * $recordsPerPage;
                    while ($row = mysqli_fetch_assoc($query)) {
                        $count++;
                    ?>
                        <tr>
                            <td>
                                <div class="main__table-text"><?php echo $count; ?></div>
                            </td>
                            <td>
                                <div class="main__table-text"><a href="#"><?php echo $row['name']; ?></a></div>
                            </td>
                            <td>
                                <div class="main__table-text"><?php echo $row['email']; ?></div>
                            </td>
                            <td>
                                <div class="main__table-text"><?php echo $row['password']; ?></div>
                            </td>
                            <td>
                                <div class="main__table-text"><?php echo $row['createdAt']; ?></div>
                            </td>
                            <td>
                                <div class="main__table-btns">
                                    <a href="#modal-edit" class="main__table-btn main__table-btn--edit open-modal">
                                        <i class="icon ion-ios-create"></i>
                                    </a>
                                    <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                        <i class="icon ion-ios-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end users -->

    <!-- paginator -->
    <div class="col-12">
        <div class="paginator-wrap">
            <span><?php echo "Page $currentPage of $totalPages"; ?></span>
            <ul class="paginator">
                <?php if ($currentPage > 1) : ?>
                    <li class="paginator__item paginator__item--prev">
                        <a href="?page=<?php echo $currentPage - 1; ?>&search=<?php echo $searchTerm; ?>"><i class="icon ion-ios-arrow-back"></i></a>
                    </li>
                <?php endif; ?>

                <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                    <li class="paginator__item <?php echo $page === $currentPage ? 'paginator__item--active' : ''; ?>">
                        <a href="?page=<?php echo $page; ?>&search=<?php echo $searchTerm; ?>"><?php echo $page; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <li class="paginator__item paginator__item--next">
                        <a href="?page=<?php echo $currentPage + 1; ?>&search=<?php echo $searchTerm; ?>"><i class="icon ion-ios-arrow-forward"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- end paginator -->
</div>
<?php include "includes/footer.php"; ?>
