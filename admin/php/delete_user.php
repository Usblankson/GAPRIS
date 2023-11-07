<?php
session_start();
include "db_config.php";
$id = $_POST['id'];

$query = mysqli_query($con,"DELETE FROM users WHERE id= '$id'");
if($query){
    $_SESSION['SuccessMessage'] = "User Deleted";
    header('location:../users.php');
}
else{
    $_SESSION['ErrorMessage'] = "Something went wrong";
    header('location:../videos.php');
}
?>