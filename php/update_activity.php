<?php
session_start();

$week = $_POST['week'];
$date = $_POST['date'];
$description = $_POST['description'];
$id = $_POST['id'];
$oldFile = $_POST['oldFile'];


$folder_name = "../uploads";

// Construct the file path
$file_path = $folder_name . '/' . $oldFile;

 

if(!empty($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
  @unlink($file_path);
    if (isset($_FILES['file'])) {
        $targetDirectory = '../uploads/'; // Create this directory to store the uploaded files
       
        $uniqueFileName = uniqid() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $targetFile = $targetDirectory . $uniqueFileName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            // $imagePath = $targetFile;
            updateQuery($id,$week, $date,$description,$uniqueFileName);
        }
    }
}
else{
    updateQuery($id,$week, $date,$description,$oldFile);
}





function updateQuery($id,$week, $date, $description, $file){
    include "db_config.php";
    $query = mysqli_query($con,"UPDATE logbook SET week ='$week', day = '$date', description = '$description', file ='$file', status='Pending' WHERE id = '$id'");

    if($query){
        $_SESSION['SuccessMessage']="Activity Updated";
        header('location:../logbook.php');
    }
    else{
        $_SESSION['ErrorMessage']="Something Went Wrong";
        header('location:../logbook.php');
    }

}
?>