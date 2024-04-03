<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$query = "SELECT * FROM `admin_info` WHERE `email`='$email'";
$result = mysqli_query($con, $query);
if (empty(trim($email)) || empty(trim($password))) {
    // echo "Email or Password should not be empty";
    echo 1;
} else {
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 1) {
                if ($result_fetch['password'] == $password) {
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_email'] = $result_fetch['email'];
                    $_SESSION['admin_id'] = $result_fetch['id'];
                    if (isset($_POST['remember'])) {
                        setcookie("adminemail", $result_fetch['email'], time() + (86400 * 30), "/");
                        setcookie("adminpassword", $result_fetch['password'], time() + (86400 * 30), "/");
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
