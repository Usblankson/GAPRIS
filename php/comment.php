<?php
include "db_config.php";
session_start();
$email = $_SESSION['gaprisEmail'];

$id=$_POST['id'];
$comment=$_POST['comment'];
$date = date("l jS \of F Y");

$query = mysqli_query($con,"INSERT INTO comments(senderEmail,videoId,comment,createdAt)VALUES('$email','$id','$comment','$date')");
if($query){
    $_SESSION['SuccessMessage'] ="Comment Added";
    header('location:../details.php?id='.$id);
}
else{
    $_SESSION['ErrorMessage'] ="Something went wront";
    header('location:../details.php?id='.$id);
}
?>