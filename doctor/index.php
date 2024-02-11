<?php
require_once '../includes/config.php';
include '../includes/dbConnect.php';
session_start();
if (isset($_POST['submit'])) {
    $query = " SELECT * FROM `doctor` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 1) {
                if ($result_fetch['password'] == $_POST['password']) {
                    $_SESSION['doctor_logged_in'] = true;
                    $_SESSION['doctor_email'] = $result_fetch['email'];
                    $_SESSION['doctor_id'] = $result_fetch['id'];
                    $_SESSION['doctor_fullname'] = $result_fetch['fullname'];
                    $_SESSION['doctor_phone'] = $result_fetch['phone'];
                    setcookie("doctoremail", $result_fetch['email'], time() + (86400 * 30), "/");
                    header("location:doctor_dashboard?email=$_SESSION[doctor_email]&id=$_SESSION[doctor_id]");
                } else {
                    echo "
                    <script>
                    alert('Password not matched');
                    window.location.href='index';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('Email not verified');
                window.location.href='index';
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
        window.location.href='index';
        </script>
        ";
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
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>Medical Health Care</title>
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