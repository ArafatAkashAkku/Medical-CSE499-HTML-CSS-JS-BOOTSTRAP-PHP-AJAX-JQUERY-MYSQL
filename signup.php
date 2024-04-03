<?php
require_once 'config/config.php';
include 'config/dbConnect.php';
session_start();
if (isset($_SESSION['patient_logged_in']) && $_SESSION['patient_logged_in'] == true) {
    header("Location: ./");
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
    <title>Sign Up | <?php if ($website_name == "") {
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
    <!-- header end -->
    <!-- main start  -->
    <main style="background-color: #FF7F50;">
        <div class="d-flex flex-column align-items-center justify-content-center p-5">
            <div class="bg-light p-3 res-width">
                <h2 class="text-muted text-center pt-2">Enter patient signup details</h2>
                <form class="p-3" id="sign-up-form" autocomplete="off">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="text" name="fullname" placeholder="Enter your full name" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="email" name="email" placeholder="Enter your email" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="password" name="password" id="myInput" placeholder="Enter your password" required class="form-control px-3 py-2 ">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label for="showpass">
                            <div class="input-field">
                                <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;Show Password
                            </div>
                        </label>
                    </div>
                    <button class="btn btn-width btn-outline-warning bg-warning text-dark" id="sign-up-btn" name="submit" type="submit">Sign Up</button>
                    <div class="text-center mt-3 text-muted">Already a member? <a href="login">Sign In</a></div>
                    <div class="text-center mt-3 text-muted">
                        <a href="forgetpassword">Forgot Password?</a>
                    </div>
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
            // sign up form 
            $("#sign-up-form").on("submit", function(e) {
                e.preventDefault();
                let signupData = $("#sign-up-form").serialize();
                $.ajax({
                    url: "signupupdate.php",
                    type: "POST",
                    data: signupData,
                    beforeSend: function() {
                        $("#sign-up-btn").prop("disabled", true);
                        $("#sign-up-btn").text("Please wait...");
                    },
                    complete: function() {
                        $("#sign-up-btn").prop("disabled", false);
                        $("#sign-up-btn").text("Sign up");
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire({
                                title: "Empty Field",
                                text: "Email, Password or name should not be empty",
                                icon: "error"
                            });
                        } else if (data == 5) {
                            Swal.fire({
                                title: "Query Problem",
                                text: "Can not run query",
                                icon: "error"
                            });
                        } else if (data == 2) {
                            $("#sign-up-form").trigger("reset");
                            Swal.fire({
                                title: "Email already taken",
                                text: "Signup with different email",
                                icon: "question"
                            });
                        } else if (data == 4) {
                            Swal.fire({
                                title: "Server Down",
                                text: "Please try again later",
                                icon: "error"
                            });
                            nnnnnn
                        } else if (data == 6) {
                            Swal.fire({
                                title: "Name should be greater than 5 character",
                                text: "Provide your full name",
                                icon: "error"
                            });
                        } else if (data == 7) {
                            Swal.fire({
                                title: "Password should be greater than 8 character",
                                text: "Signup with strong password and no extra spaces",
                                icon: "error"
                            });
                        } else if (data == 8) {
                            Swal.fire({
                                title: "Provide valid email",
                                text: "Signup with your valid email address",
                                icon: "error"
                            });
                        } else if (data == 3) {
                            $("#sign-up-form").trigger("reset");
                            Swal.fire({
                                icon: "success",
                                title: "Registration successful. Please check your email",
                                showConfirmButton: false,
                                timer: 10000
                            });
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