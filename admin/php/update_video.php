<?php
session_start();
include "db_config.php";
$id = $_POST['id'];
$chk = mysqli_query($con,"SELECT * FROM videos WHERE id ='$id'");
$row = mysqli_fetch_assoc($chk);
$status = $row['status'];
if($status =='Active'){
    $status ='Disabled';
}
else{
    $status = 'Active';
}
$query = mysqli_query($con,"UPDATE videos SET status ='$status' WHERE id= '$id'");
if($query){
    $_SESSION['SuccessMessage'] = "Video Status Changed";
    header('location:../videos.php');
}
else{
    $_SESSION['ErrorMessage'] = "Something went wrong";
    header('location:../videos.php');
}
?>