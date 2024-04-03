<?php
session_start();
require_once 'config/config.php';
include 'config/dbConnect.php';
$email = mysqli_real_escape_string($con, $_POST['email']);
$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$query = "INSERT INTO `quote_info`(`email`,`fullname`,`message`,`create_at`) VALUES ('$email','$fullname','$message',NOW())";
$save = mysqli_query($con, $query);
if ($save) {
    // insert to database 
    echo 1;
} else {
    // failed to insert 
    echo 2;
}
