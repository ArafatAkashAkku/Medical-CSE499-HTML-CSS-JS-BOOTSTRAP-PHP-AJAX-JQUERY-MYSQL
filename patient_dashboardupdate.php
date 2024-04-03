<?php
require_once 'config/config.php';
include 'config/dbConnect.php';
session_start();
$email = $_SESSION['patient_email'];
$id = $_SESSION['patient_id'];
$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$dob = mysqli_real_escape_string($con, $_POST['dob']);
$blood = mysqli_real_escape_string($con, $_POST['blood']);
$nationality = mysqli_real_escape_string($con, $_POST['nationality']);
$maritalstatus = mysqli_real_escape_string($con, $_POST['maritalstatus']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$occupation = mysqli_real_escape_string($con, $_POST['occupation']);
$religion = mysqli_real_escape_string($con, $_POST['religion']);
$user_exist_query = "SELECT * from `patient_info` WHERE `email`='$email' and `id`='$id'";
$result = mysqli_query($con, $user_exist_query);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        if ($_FILES["upload"]["name"] != "") {
            $file = $_FILES['upload'];
            $fileName = $_FILES['upload']['name'];
            $fileTmpName = $_FILES['upload']['tmp_name'];
            $fileSize = $_FILES['upload']['size'];
            $fileError = $_FILES['upload']['error'];
            $fileExtension = explode('.', $fileName);
            $fileActualExtension = strtolower(end($fileExtension));
            $allowed = array('pdf');
            if (in_array($fileActualExtension, $allowed)) {
                if ($fileError == 0) {
                    // 10 mb 
                    if ($fileSize < 10000000) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
                        $fileDestination = "dataimage/patient/$id/" . $fileNameNew;
                        $dir = "dataimage/patient/$id";
                        if (!is_dir($dir)) {
                            mkdir("dataimage/patient/" . $id);
                        }
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $query = "UPDATE `patient_info` SET `fullname`='$fullname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`blood`='$blood',`nationality`='$nationality',`maritalstatus`='$maritalstatus',`address`='$address',`occupation`='$occupation',`religion`='$religion',`prescription`='$fileNameNew', `update_at`=NOW() WHERE `email`='$email' and `id`='$id'";
                        if (mysqli_query($con, $query)) {
                            // Account info updated - Login again;
                            echo 1;
                        } else {
                            // Server Down 
                            echo 2;
                        }
                    } else {
                        // Your file is too big 
                        echo 3;
                    }
                } else {
                    // There was an error uploading your file 
                    echo 4;
                }
            } else {
                // You cant upload a file here 
                echo 5;
            }
        } else {
            $query = "UPDATE `patient_info` SET `fullname`='$fullname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`blood`='$blood',`nationality`='$nationality',`maritalstatus`='$maritalstatus',`address`='$address',`occupation`='$occupation',`religion`='$religion', `update_at`=NOW() WHERE `email`='$email' and `id`='$id'";
            if (mysqli_query($con, $query)) {
                // Account info updated - Login again;
                echo 1;
            } else {
                // Server Down 
                echo 2;
            }
        }
    }
} else {
    // Can not run query 
    echo 6;
}
