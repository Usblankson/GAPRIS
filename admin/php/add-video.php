<?php
session_start();

$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$createdAt = date("l jS \of F Y");

if (isset($_FILES['videoFile']) && isset($_FILES['thumbnailFile'])) {
    $videoDirectory = '../../uploads/videos/';
    $thumbnailDirectory = '../../uploads/thumbnails/';

    $uniqueVideoFileName = uniqid() . '.' . pathinfo($_FILES['videoFile']['name'], PATHINFO_EXTENSION);
    $videoFile = $videoDirectory . $uniqueVideoFileName;

    $uniqueThumbnailFileName = uniqid() . '.' . pathinfo($_FILES['thumbnailFile']['name'], PATHINFO_EXTENSION);
    $thumbnailFile = $thumbnailDirectory . $uniqueThumbnailFileName;

    if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $videoFile) && move_uploaded_file($_FILES['thumbnailFile']['tmp_name'], $thumbnailFile)) {
        // Both files were successfully uploaded
        addActivity($title, $description, $category, $uniqueVideoFileName, $uniqueThumbnailFileName, $createdAt);
    } else {
        $_SESSION['ErrorMessage'] = "File upload failed";
        header('location:../videos.php');
    }
} else {
    echo "error";
}

function addActivity($title, $description, $category, $uniqueVideoFileName, $uniqueThumbnailFileName, $createdAt) {
    include "db_config.php";
    $email = $_SESSION['logbookEmail'];
    $query = mysqli_query($con, "INSERT INTO videos (title, description, category, views, file, thumbnail, status, createdAt) VALUES ('$title', '$description', '$category', 0, '$uniqueVideoFileName', '$uniqueThumbnailFileName', 'Active', '$createdAt')");
    if ($query) {
        $_SESSION['SuccessMessage'] = "Video Added";
        header('location:../videos.php');
    } else {
        $_SESSION['ErrorMessage'] = "Something Went Wrong";
        header('location:../videos.php');
    }
}
?>
