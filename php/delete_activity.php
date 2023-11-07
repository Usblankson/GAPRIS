<?php
session_start();
$id= $_POST['id'];
$file_name = $_POST['file']; 
$folder_name = "../uploads";

// Construct the file path
$file_path = $folder_name . '/' . $file_name;
if (@unlink($file_path)) {
   deleteQuery($id);
}
else{
   deleteQuery($id);
}


function deleteQuery($id){
    include "db_config.php";
    $query = mysqli_query($con,"DELETE FROM logbook WHERE id = '$id' ");
    if($query){
        $_SESSION['SuccessMessage']="Activity Deleted";
        header('location:../logbook.php');
    }
    else{
        $_SESSION['ErrorMessage']="Something Went Wrong";
        header('location:../logbook.php');
    }
}
?>