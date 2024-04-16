<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
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
    <title>404 Error | <?php if ($website_name == "") {
                            echo "Website Title";
                        } else {
                            echo $website_name;
                        } ?></title>
</head>

<body>
    <!-- main start  -->
    <main>
        <div class="d-flex flex-column gap-4 align-items-center justify-content-center text-center error-pages">
            <i class="fa-regular fa-face-sad-tear"></i>
            <h1>404</h1>
            <h3>Page Not Found</h3>
            <p>The page you are looking for doesn't exist. <br> So go back and choose a new direction.</p>
            <div class="d-inline">
                <a href="./" class="py-2 px-4 bg-warning border rounded-4 text-decoration-none text-dark">Go to home</a>
            </div>
        </div>
    </main>
    <!-- main end  -->
    <!-- script tag  -->
    <?php include("includes/script.php") ?>
</body>

</html>