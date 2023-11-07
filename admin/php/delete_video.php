<?php
session_start();
include "db_config.php";
$id = $_POST['id'];
$file_name = $_POST['file'];
$thumbnail_name = $_POST['thumbnail'];
$file_folder = '../../uploads/videos/';
$thumbnail_folder = '../../uploads/thumbnails/';

unlink($file_folder.$file_name);
unlink($thumbnail_folder.$thumbnail_name);

$query = mysqli_query($con,"DELETE FROM videos WHERE id= '$id'");
if($query){
    $_SESSION['SuccessMessage'] = "Video Deleted";
    header('location:../videos.php');
}
else{
    $_SESSION['ErrorMessage'] = "Something went wrong";
    header('location:../videos.php');
}
?>