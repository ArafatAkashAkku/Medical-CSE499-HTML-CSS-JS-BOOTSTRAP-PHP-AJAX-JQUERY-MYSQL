<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
if (isset($_SESSION['doctor_logged_in']) && $_SESSION['doctor_logged_in'] == true) {
    header("Location: doctor_dashboard");
} 
if (isset($_POST['submit'])) {
    $query = " SELECT * FROM `doctor_info` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 1) {
                if ($result_fetch['password'] == $_POST['password']) {
                    $_SESSION['doctor_logged_in'] = true;
                    $_SESSION['doctor_email'] = $result_fetch['email'];
                    $_SESSION['doctor_id'] = $result_fetch['id'];
                    setcookie("doctoremail", $result_fetch['email'], time() + (86400 * 30), "/");
                    header("location:doctor_dashboard");
                } else {
                    echo "
                    <script>
                    alert('Password not matched');
                    window.location.href='./';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('Email not verified');
                window.location.href='./';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Email not registered');
            window.location.href='signup';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Can not run query');
        window.location.href='./';
        </script>
        ";
    }
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
    <title>Doctor Log In | <?php if ($website_name == "") {
                            echo "Website Title";
                        } else {
                            echo $website_name;
                        } ?></title>
</head>

<body>

    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end -->

    <!-- main start  -->
    <main>
        <div class="d-flex flex-column align-items-center justify-content-center p-5" style="background-color: #FFBF00;">
            <div class="bg-light p-3 res-width">
                <h2 class="text-muted text-center pt-2">Enter doctor login details</h2>
                <form class="p-3" action="" method="POST" autocomplete="off">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="email" value="<?php if (isset($_COOKIE['doctoremail'])) {
                                                            echo $_COOKIE['doctoremail'];
                                                        }  ?>" name="email" placeholder="Enter your Email" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="password" id="myInput" name="password" placeholder="Enter your Password" required class="form-control px-3 py-2 ">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label for="showpass">
                            <div class="input-field">
                                <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;Show Password
                            </div>
                        </label>
                    </div>
                    <button class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" type="submit">Log in</button>
                    <div class="text-center mt-3 text-muted">Not a member? <a href="signup.php">Sign up</a></div>
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

    <!-- script tag  -->
    <?php include("includes/script.php") ?>
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