<?php
require_once 'config/config.php';
include 'config/dbConnect.php';
session_start();
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$query = "SELECT * FROM `patient_info` WHERE `email`='$email'";
$result = mysqli_query($con, $query);
if (empty(trim($email)) || empty(trim($password))) {
    // echo "Email or Password should not be empty";
    echo 1;
} else {
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user_fetch = mysqli_fetch_assoc($result);
            if ($user_fetch['verified'] == 1) {
                if (password_verify($password, $user_fetch['password'])) {
                    $_SESSION['patient_logged_in'] = true;
                    $_SESSION['patient_id'] = $user_fetch['id'];
                    $_SESSION['patient_email'] = $user_fetch['email'];
                    $_SESSION['patient_fullname'] = $user_fetch['fullname'];
                    $_SESSION['patient_token'] = $user_fetch['v_code'];
                    if (isset($_POST['remember'])) {
                        setcookie("patientemail", $user_fetch['email'], time() + (86400 * 30), "/");
                        setcookie("patientpassword", $password, time() + (86400 * 30), "/");
                    }
                    // echo "Log in success";
                    echo 2;
                } else {
                    // echo "Incorrect Password";
                    echo 3;
                }
            } else {
                // echo "Email not verified";
                echo 4;
            }
        } else {
            // echo "Email not registered";
            echo 5;
        }
    } else {
        // echo "Can not run query";
        echo 6;
    }
}
