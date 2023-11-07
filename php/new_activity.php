<?php
session_start();

$week = $_POST['week'];
$date = $_POST['date'];
$description = $_POST['description'];
$createdAt = date("l jS \of F Y");
$imagePath = '';


if(!empty($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
    if (isset($_FILES['file'])) {
        $targetDirectory = '../uploads/'; // Create this directory to store the uploaded files
       
        $uniqueFileName = uniqid() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $targetFile = $targetDirectory . $uniqueFileName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            // $imagePath = $targetFile;
            addActivity($week, $date,$description,$createdAt,$uniqueFileName);
        }
    }
}
else{
    addActivity($week, $date,$description,$createdAt,$uniqueFileName);
}



function addActivity($week, $date,$description,$createdAt,$imagePath){
    include "db_config.php";
    $email = $_SESSION['logbookEmail'];
    $query = mysqli_query($con, "INSERT INTO logbook(student_email,week,day,description,review,file,status,createdAt)VALUES('$email','$week','$date','$description','','$imagePath','Pending','$createdAt')");
    if($query){
        $_SESSION['SuccessMessage']="Activity Added";
        header('location:../logbook.php');
    }
    else{
        $_SESSION['ErrorMessage']="Something Went Wrong";
        header('location:../logbook.php');
    }
};

?>