<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
$id = mysqli_real_escape_string($con, $_POST['id']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$video = mysqli_real_escape_string($con, $_POST['video']);
if (empty(trim($time)) || empty(trim($video))) {
    // echo "Time or video link should not be empty";
    echo 1;
} else {
    $sql = "UPDATE `appointment_info` SET `time`='$time' , `video`='$video' , `update_at`=NOW() where `id`='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // Appointment updated
        echo 2;
    } else {
        // Appointment not updated
        echo 3;
    }
}
