<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    $email = $_SESSION['admin_email'];
    $id = $_SESSION['admin_id'];
} else {
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
    <title>Admin Dashboard | <?php if ($website_name == "") {
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
    <main class="mx-4 my-3 min-height-css">
        <div class="row d-flex justify-content-center px-2 py-3 gap-3 text-center">
            <div class="card col-lg-3 col-12 border border-warning shadow-lg">
                <div class="card-body d-flex flex-column align-items-center justify-content-between">
                    <h1 class="card-title">Total Doctors</h1>
                    <h2 class="card-text">
                        <?php
                        $totalDoctors = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `doctor_info` WHERE `verified`='1'"));
                        echo $totalDoctors;
                        ?>
                    </h2>
                </div>
            </div>
            <div class="card col-lg-3 col-12 border border-warning shadow-lg">
                <div class="card-body d-flex flex-column align-items-center justify-content-between">
                    <h1 class="card-title">Total Patients</h1>
                    <h2 class="card-text">
                        <?php
                        $totalPatients = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `patient_info` WHERE `verified`='1'"));
                        echo $totalPatients;
                        ?>
                    </h2>
                </div>
            </div>
            <div class="card col-lg-3 col-12 border border-warning shadow-lg">
                <div class="card-body d-flex flex-column align-items-center justify-content-between">
                    <h1 class="card-title">Total Appointments</h1>
                    <h2 class="card-text">
                        <?php
                        $totalAppointments = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `appointment_info`"));
                        echo $totalAppointments;
                        ?>
                    </h2>
                </div>
            </div>
            <div class="card col-lg-3 col-12 border border-warning shadow-lg">
                <div class="card-body d-flex flex-column align-items-center justify-content-between">
                    <h1 class="card-title">Total Admins</h1>
                    <h2 class="card-text">
                        <?php
                        $totalAdmins = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `admin_info` WHERE `verified`='1'"));
                        echo $totalAdmins;
                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </main>
    <!-- main end  -->
    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->
    <!-- script tag  -->
    <?php include("includes/script.php") ?>
</body>

</html>