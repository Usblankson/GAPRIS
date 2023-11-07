<?php
include "db_config.php";
session_start();

$fname = $_POST['fname'];
$email =$_POST['email'];
$password1 =$_POST['password1'];
$password2 =$_POST['password2'];
$date = date("l jS \of F Y");

if($password1 != $password2){
    $_SESSION['ErrorMessage']="Password does not match";
    header('location:../register.php');
}

else{

    $checkExit = mysqli_query($con, "SELECT * FROM users WHERE email ='$email'");
if(mysqli_num_rows($checkExit)>0){
    header('location:../register.php');
}
else{

    $newPassword = md5($password1);

    $query = mysqli_query($con,"INSERT INTO users (name,email,password,role,createdAt)VALUES('$fname','$email','$newPassword','User','$date')");
    if($query){
        $_SESSION['gaprisEmail'] = $email;
        $_SESSION['loginType'] == "User";
        header('location:../index.php');
    }
    else{
        $_SESSION['ErrorMessage']="Invalid Email and Password";
        header('location:../register.php');
    }

}

}
?>