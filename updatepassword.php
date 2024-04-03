<?php
require_once 'config/config.php';
include 'config/dbConnect.php';
session_start();
if (isset($_SESSION['patient_logged_in']) && $_SESSION['patient_logged_in'] == true) {
    header("Location: login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tag      -->
    <?php include("includes/meta.php") ?>
    <!-- link tag  -->
    <?php include("includes/link.php") ?>
    <!-- website title  -->
    <?php include 'includes/websiteinfo.php'; ?>
    <title>Update Password | <?php if ($website_name == "") {
                                    echo "Website Title";
                                } else {
                                    echo $website_name;
                                } ?></title>
</head>
<!-- search bar display none  -->
<style>
    .search-page {
        display: none !important;
    }
</style>

<body>
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->

    <!-- script start  -->
    <?php include("includes/script.php") ?>
    <!-- script end  -->
    <script>
        // jquery ready start 
        $(document).ready(function() {
            // forgetpass php ajax code start
            $("#updatepass-form").on('submit', function(e) {
                e.preventDefault();
                let updateData = $("#updatepass-form").serialize();
                $.ajax({
                    url: "updatepasswordupdate.php",
                    type: "POST",
                    data: updateData,
                    beforeSend: function() {
                        $("#updatepass-btn").prop("disabled", true);
                        $("#updatepass-btn").text("Please wait...");
                    },
                    complete: function() {
                        $("#updatepass-btn").prop("disabled", false);
                        $("#updatepass-btn").text("Update password");
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire({
                                title: "Empty Field",
                                text: "Email is not found",
                                icon: "error"
                            });
                        } else if (data == 4) {
                            Swal.fire({
                                title: "Server Down",
                                text: "Try again later",
                                icon: "error"
                            });
                        } else if (data == 2) {
                            Swal.fire({
                                title: "Password should not be empty",
                                text: "Please check again",
                                icon: "error"
                            });
                        } else if (data == 5) {
                            Swal.fire({
                                title: "Password should be greater than 8 characters",
                                text: "Please try again",
                                icon: "error"
                            });
                        } else if (data == 3) {
                            Swal.fire({
                                icon: "success",
                                title: "Password changed successfully <br> Please try to login",
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setTimeout(() => {
                                window.location.href = "login";
                            }, 3100);
                        }
                    }
                });
            });
        });
    </script>
    <!-- internal script end  -->
    <!-- main start  -->
    <main class="min-height-css" style="background-color: #FF7F50;">
        <?php
        if (isset($_GET['email']) && isset($_GET['resettoken'])) {
            $email = mysqli_real_escape_string($con, $_GET['email']);
            $resettoken = $_GET['resettoken'];
            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d");
            $query = " SELECT * FROM `patient_info` WHERE `email`='$email' AND `resettoken`='$resettoken' AND `resettokenexpire`='$date'";
            $result = mysqli_query($con, $query);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo "
                    <div class='d-flex flex-column align-items-center justify-content-center py-5'>
                        <div class='bg-light p-3 border border-warning shadow-lg p-3 mb-5 bg-body-warning rounded'>
                            <h2 class='text-muted text-center pt-2'>&nbsp;&nbsp; Enter your new password &nbsp;&nbsp;</h2>
                            <form class='p-3' id='updatepass-form' autocomplete='off'>
                                <div class='form-group py-2'>
                                    <div class='input-field'> 
                                        <input type='password' id='password' name='password' placeholder='Enter your new password' required class='form-control px-3 py-2 passtext'> 
                                    </div>
                                    <input type='hidden' name='email' value='$email'> 
                                </div>
                                <div class='form-group py-2'>
                                <label for='showupdatepass'>
                                    <div class='input-field'>
                                        <input type='checkbox' id='showupdatepass' class='showpass'>&nbsp;Show Password
                                    </div>
                                </label>
                            </div>
                                    <button class='btn btn-width btn-outline-warning bg-warning text-dark' id='updatepass-btn'  type='submit'>Update Password</button>
                            </form>
                        </div>
                    </div>
                    <script>
                    const showpassword = document.getElementById('showupdatepass');
                    const passtextword = document.getElementById('password');
                    showpassword.onclick = () => {
                        if (passtextword.type === 'password') {
                            passtextword.type = 'text';
                        } else {
                            passtextword.type = 'password';
                        }
                    };
                    </script>
                    ";
                } else {
                    echo '
                    <script>
                    Swal.fire({
                        title: "Reset Token Expired",
                        text: "Try again later",
                        icon: "error"
                    });
                    setTimeout(() => {
                        window.location.href = "./";
                    }, 2500);
                    </script>
                    ';
                }
            } else {
                echo '
                    <script>
                    Swal.fire({
                        title: "Query Problem",
                        text: "Can not run query",
                        icon: "error"
                    });
                    setTimeout(() => {
                        window.location.href = "./";
                    }, 2500);
                    </script>
                    ';
            }
        } else {
            echo "
            <script>
            window.location.href='./';
            </script>
            ";
        }

        ?>
    </main>
    <!-- main end  -->
    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->
</body>

</html>