<?php
session_start();
include "db_config.php";
$email =$_POST['email'];
$password =md5($_POST['password']);

$query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' && password = '$password'");
$num = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);

if($num==1){
    $type = $row['role'];
    $_SESSION['gaprisEmail'] = $email;
    $_SESSION['loginType'] == $type;
    if($type=='User'){
        header('location:../index.php');
    }
    else{
        header('location:../admin/');
    }
}
else{
    $_SESSION['ErrorMessage']="Invalid Email and Password";
    header('location:../login.php');
}

?>