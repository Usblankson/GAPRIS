<?php
session_start();
include "db_config.php";
$id = $_POST['id'];
$fname = $_POST['fname'];
$password= $_POST['password'];
$newPassword = $_POST['newPassword'];
$pass ='';
if($password == $newPassword){
    $pass = $password;
}
else{
    $pass = md5($newPassword);
}
$query = mysqli_query($con,"UPDATE users SET name ='$fname', password='$pass' WHERE id= '$id'");
if($query){
    $_SESSION['SuccessMessage'] = "Profile Updated";
    header('location:../users.php');
}
else{
    $_SESSION['ErrorMessage'] = "Something went wrong";
    header('location:../users.php');
}
?>