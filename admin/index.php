<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    header("Location: admin_dashboard");
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
    <title>Admin Log In | <?php if ($website_name == "") {
                                echo "Website Title";
                            } else {
                                echo $website_name;
                            } ?></title>
</head>

<body class="overflow-x-hidden">
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end -->
    <!-- main start  -->
    <main class="min-height-css" style="background-color: #6495ED;">
        <div class="d-flex flex-column align-items-center justify-content-center p-5">
            <div class="bg-light p-3 res-width">
                <h2 class="text-muted text-center pt-2">Enter admin login details</h2>
                <form class="p-3" id="log-in-form" autocomplete="off">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input value="<?php if (isset($_COOKIE['adminemail'])) {
                                                echo $_COOKIE['adminemail'];
                                            }  ?>" type="email" name="email" placeholder="Enter your Email" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="password" value="<?php if (isset($_COOKIE['adminpassword'])) {
                                                                echo $_COOKIE['adminpassword'];
                                                            }  ?>" id="myInput" name="password" placeholder="Enter your Password" required class="form-control px-3 py-2 ">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label for="showpass">
                            <div class="input-field">
                                <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;Show Password
                            </div>
                        </label>
                    </div>
                    <?php if (!isset($_COOKIE['adminemail']) || !isset($_COOKIE['adminpassword'])) {
                        echo '
                        <div class="form-group my-3 d-flex justify-content-center">
                        <label for="remember">
                            <div class="input-field">
                                <input type="checkbox" id="remember" name="remember">&nbsp;Remember me
                                </div>
                            </label>
                        </div>
                        ';
                    } ?>
                    <button class="btn btn-width btn-outline-warning bg-warning text-dark" id="log-in-btn" name="submit" type="submit">Log in</button>
                </form>
            </div>
        </div>
    </main>
    <!-- main end  -->
    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->
    <!-- script tag  -->
    <?php include("includes/script.php") ?>
    <!-- internal script link  -->
    <script>
        // jquery ready start 
        $(document).ready(function() {
            // login php ajax code start
            $("#log-in-form").on('submit', function(e) {
                e.preventDefault();
                let loginData = $("#log-in-form").serialize();
                $.ajax({
                    url: "indexupdate.php",
                    type: "POST",
                    data: loginData,
                    beforeSend: function() {
                        $("#log-in-btn").prop("disabled", true);
                        $("#log-in-btn").text("Please wait...");
                    },
                    complete: function() {
                        $("#log-in-btn").prop("disabled", false);
                        $("#log-in-btn").text("Log In");
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire({
                                title: "Empty Field",
                                text: "Email or Password should not be empty",
                                icon: "error"
                            });
                        } else if (data == 6) {
                            Swal.fire({
                                title: "Query Problem",
                                text: "Can not run query",
                                icon: "error"
                            });
                        } else if (data == 5) {
                            Swal.fire({
                                title: "Email not registered yet?",
                                text: "Please check your email",
                                icon: "question"
                            });
                        } else if (data == 4) {
                            Swal.fire({
                                title: "Email not verified",
                                text: "Please contact administrator",
                                icon: "error"
                            });
                        } else if (data == 3) {
                            Swal.fire({
                                title: "Incorrect Password",
                                text: "Try again",
                                icon: "error"
                            });
                        } else if (data == 2) {
                            Swal.fire({
                                icon: "success",
                                title: "Login Successful",
                                showConfirmButton: false,
                                timer: 2000
                            });
                            setTimeout(() => {
                                window.location.href = "admin_dashboard";
                            }, 2100);
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function myFunction() {
            let x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>