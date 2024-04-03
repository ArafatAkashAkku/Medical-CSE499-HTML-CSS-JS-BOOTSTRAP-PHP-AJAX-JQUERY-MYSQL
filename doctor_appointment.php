<?php
require_once 'config/config.php';
include 'config/dbConnect.php';
session_start();
if (isset($_SESSION['patient_logged_in']) && $_SESSION['patient_logged_in'] == true) {
    $email = $_SESSION['patient_email'];
    $id = $_SESSION['patient_id'];
    $token = $_SESSION['patient_token'];
} else {
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
    <title>Doctor Appointment | <?php if ($website_name == "") {
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
    <main class="mx-4 my-3 min-height-css overflow-x-scroll">
        <table id="example" class="table table-striped data-table-width">
            <thead>
                <tr>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Appointment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM `doctor_info` WHERE `verified`='1'");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <tr>
                        <td style="display:none;"><?php
                                                    echo htmlentities($row["id"]);
                                                    ?> </td>
                        <td><?php
                            echo htmlentities($row["fullname"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["email"]);
                            ?></td>
                        <td><?php
                            echo $row['gender'];
                            ?></td>
                        <td><?php
                            echo $row['speciality'];
                            ?></td>
                        <td>
                            <form class="appointment-form">
                                <input type="hidden" name="fullname" value="<?php
                                                                            echo htmlentities($row["fullname"]);
                                                                            ?>">
                                <input type="hidden" name="email" value="<?php
                                                                            echo htmlentities($row["email"]);
                                                                            ?>">
                                <input type="hidden" name="speciality" value="<?php
                                                                                echo htmlentities($row["speciality"]);
                                                                                ?>">
                                <input type="hidden" name="phone" value="<?php
                                                                            echo htmlentities($row["phone"]);
                                                                            ?>">
                                <input type="hidden" name="active" value="<?php
                                                                            echo htmlentities($row["active"]);
                                                                            ?>">
                                <?php
                                if ($row["active"] == 1) {
                                    echo "<button class='btn btn-width btn-outline-warning bg-success text-light' name='submit' class='appointment-form-btn' type='submit'>Click For Appointment</button>";
                                } else {
                                    echo "<button style='pointer-events: none;' class='btn btn-width btn-outline-danger bg-danger text-light'>Currently Offline</button> ";
                                }
                                ?>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Appointment</th>
                </tr>
            </tfoot>
        </table>
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
            // appointment form 
            $(".appointment-form").each(function() {
                $(this).on("submit", function(e) {
                    e.preventDefault();
                    let appointmentData = $(this).serialize();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, confirm it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "doctor_appointmentupdate.php",
                                type: "POST",
                                data: appointmentData,
                                beforeSend: function() {
                                    $(".appointment-form-btn").prop("disabled", true);
                                    $(".appointment-form-btn").text("Please wait...");
                                },
                                complete: function() {
                                    $(".appointment-form-btn").prop("disabled", false);
                                    $(".appointment-form-btn").text("Click For Appointment");
                                },
                                success: function(data) {
                                    if (data == 1) {
                                        Swal.fire({
                                            title: "Empty Field",
                                            text: "Name or phone number should not be empty",
                                            icon: "error"
                                        });
                                        setTimeout(() => {
                                            window.location.href = "patient_dashboard";
                                        }, 2100);
                                    } else if (data == 3) {
                                        Swal.fire({
                                            title: "Server Down",
                                            text: "Please try again later",
                                            icon: "error"
                                        });
                                    } else if (data == 2) {
                                        Swal.fire({
                                            icon: "success",
                                            title: "Appointment Successful Wait for time",
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
                                        setTimeout(() => {
                                            window.location.href = "appointment_schedule";
                                        }, 2100);
                                    }
                                }
                            });
                        }
                    });
                });
            });
        });
    </script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>