<?php
require_once 'includes/config.php';
include 'includes/dbConnect.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
    $user_exist_query = "SELECT * from `patient` WHERE `email`='$email'";
    $result = mysqli_query($con, $user_exist_query);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <script>
        alert('Email already taken');
        window.location.href='signup';
        </script>
        ";
    } else {
        $query = "INSERT INTO `patient`(`email`, `password`,`fullname`,`verified`) VALUES ('$email', '$password','$fullname','1')";
        $save = mysqli_query($con, $query);
        if ($save) {
            echo "
            <script>
            alert('Email registered');
            window.location.href='login';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Server Down');
            window.location.href='signup';
            </script>
            ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- external css link  -->
    <link rel="stylesheet" href="external/css/style.css">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>Medical Health Care</title>
</head>

<body>

    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end -->

    <!-- main start  -->
    <main>
        <div class="d-flex flex-column align-items-center justify-content-center p-5" style="background-color: #FF7F50;">
            <div class="bg-light p-3 res-width">
                <h2 class="text-muted text-center pt-2">Enter patient signup details</h2>
                <form class="p-3" action="" method="POST" autocomplete="off">
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
                    <button class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" type="submit">Sign Up</button>
                    <div class="text-center mt-3 text-muted">Already a member? <a href="login.php">Sign In</a></div>
                    <div class="text-center mt-3 text-muted">
                        <a href="forgetpassword.php">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>


    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="external/js/script.js"></script>
    <!-- internal script link  -->
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