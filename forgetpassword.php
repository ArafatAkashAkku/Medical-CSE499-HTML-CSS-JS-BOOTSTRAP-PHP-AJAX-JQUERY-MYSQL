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
    <title>Forget Password | <?php if ($website_name == "") {
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
    <!-- main start  -->
    <main class="min-height-css" style="background-color: #FF7F50;">
        <div class="d-flex flex-column align-items-center justify-content-center py-5">
            <div class="bg-light p-3 border border-warning shadow-lg p-3 mb-5 bg-body-warning rounded">
                <h2 class="text-muted text-center pt-2">&nbsp;&nbsp; Enter your email address &nbsp;&nbsp;</h2>
                <form class="p-3" autocomplete="off" id="forget-form">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="email" id="email" name="email" value="<?php if (isset($_COOKIE['patientemail'])) {
                                                                                    echo $_COOKIE['patientemail'];
                                                                                }  ?>" placeholder="Enter your Email" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <button class="btn btn-width bg-success text-light" id="forget-form-btn" type="submit">Send Reset
                        Link</button>
                </form>
            </div>
        </div>
    </main>
    <!-- main end  -->
    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->
    <!-- script start  -->
    <?php include("includes/script.php") ?>
    <!-- script end  -->
    <!-- internal script start  -->
    <script>
        // jquery ready start 
        $(document).ready(function() {
            // forgetpass php ajax code start
            $("#forget-form").on('submit', function(e) {
                e.preventDefault();
                let forgetData = $("#forget-form").serialize();
                $.ajax({
                    url: "forgetpasswordupdate.php",
                    type: "POST",
                    data: forgetData,
                    beforeSend: function() {
                        $("#forget-form-btn").prop("disabled", true);
                        $("#forget-form-btn").text("Please wait...");
                    },
                    complete: function() {
                        $("#forget-form-btn").prop("disabled", false);
                        $("#forget-form-btn").text("Send reset link");
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire({
                                title: "Empty Field",
                                text: "Email should not be empty",
                                icon: "error"
                            });
                        } else if (data == 5) {
                            Swal.fire({
                                title: "Query Problem",
                                text: "Can not run query",
                                icon: "error"
                            });
                        } else if (data == 3) {
                            Swal.fire({
                                title: "Server down",
                                text: "Try again later",
                                icon: "error"
                            });
                        } else if (data == 4) {
                            Swal.fire({
                                title: "Email not found",
                                text: "Please sign up",
                                icon: "error"
                            });
                        } else if (data == 2) {
                            Swal.fire({
                                title: "Password reset link sent to mail",
                                icon: "success"
                            });
                            setTimeout(() => {
                                window.location.href = "./";
                            }, 5000);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>