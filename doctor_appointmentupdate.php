<?php
require_once 'config/config.php';
include 'config/dbConnect.php';
session_start();
$email = $_SESSION['patient_email'];
$id = $_SESSION['patient_id'];
$user_exist_query = "SELECT * from `patient_info` WHERE `email`='$email' and `id`='$id'";
$result = mysqli_query($con, $user_exist_query);
$row = mysqli_fetch_assoc($result);
if ($row) {
    $patientemail = $row['email'];
    $patientname = $row['fullname'];
    $patientphone = $row['phone'];
}
$doctorname = mysqli_real_escape_string($con, $_POST['fullname']);
$doctoremail = mysqli_real_escape_string($con, $_POST['email']);
$doctorphone = mysqli_real_escape_string($con, $_POST['phone']);
$doctorspeciality = mysqli_real_escape_string($con, $_POST['speciality']);
$doctoractive = mysqli_real_escape_string($con, $_POST['active']);
if (empty(trim($patientname)) || empty(trim($patientphone))) {
    // echo "Name or phone number should not be empty";
    echo 1;
} elseif ($doctoractive == 0) {
    // Try again later
    echo 3;
} else {
    $query = "INSERT INTO `appointment_info`(`patientname`, `patientemail`,`patientphone`,`doctorname`,`doctoremail`, `doctorphone`,`doctorspeciality`,`time`,`create_at`) VALUES ('$patientname','$patientemail','$patientphone','$doctorname','$doctoremail', '$doctorphone','$doctorspeciality','waiting',NOW())";
    $save = mysqli_query($con, $query);
    if ($save) {
        // Appointment Successful Wait for time
        echo 2;
    } else {
        // Try again later
        echo 3;
    }
}
