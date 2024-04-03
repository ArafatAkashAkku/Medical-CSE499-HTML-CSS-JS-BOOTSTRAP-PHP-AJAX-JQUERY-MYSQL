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
    <title>Appointment Page | <?php if ($website_name == "") {
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
    <main class="mx-4 my-3 min-height-css overflow-x-scroll">
        <table id="example" class="table table-striped data-table-width">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">PatientName</th>
                    <th scope="col">PatientEmail</th>
                    <th scope="col">PatientPhone</th>
                    <th scope="col">DoctorName</th>
                    <th scope="col">DoctorEmail</th>
                    <th scope="col">DoctorPhone</th>
                    <th scope="col">DoctorSpeciality</th>
                    <th scope="col">AppointmentTime</th>
                    <th scope="col">VideoLink</th>
                    <th scope="col">Action</th>
                    <th scope="col">CreateAt</th>
                    <th scope="col">UpdateAt</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM `appointment_info`");
                $serial = 0;
                while ($row = mysqli_fetch_array($ret)) {
                    $serial = $serial + 1;
                ?>
                    <tr>
                        <th scope="row"><?php echo $serial ?> </th>
                        <td style="display:none;"><?php
                                                    echo htmlentities($row["id"]);
                                                    ?> </td>
                        <td><?php
                            echo htmlentities($row["patientname"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["patientemail"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["patientphone"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["doctorname"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["doctoremail"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["doctorphone"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["doctorspeciality"]);
                            ?> </td>
                        <form class="appointment-form" autocomplete="off">
                            <td>
                                <input type="hidden" name="id" value="<?php
                                                                        echo htmlentities($row["id"]);
                                                                        ?>">
                                <input type="datetime-local" name="time" id="time" value="<?php
                                                                                            echo htmlentities($row["time"]);
                                                                                            ?>">
                            </td>

                            <td>
                                <input type="text" name="video" id="video" value="<?php
                                                                                    echo htmlentities($row["video"]);
                                                                                    ?>">
                            </td>
                            <td><button class="btn btn-outline-warning bg-warning text-dark px-2 py-1 appointment-form-btn" type="submit" name="submit">Update</button></td>
                        </form>
                        <td><?php
                            echo htmlentities($row["create_at"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["update_at"]);
                            ?> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">PatientName</th>
                    <th scope="col">PatientEmail</th>
                    <th scope="col">PatientPhone</th>
                    <th scope="col">DoctorName</th>
                    <th scope="col">DoctorEmail</th>
                    <th scope="col">DoctorPhone</th>
                    <th scope="col">DoctorSpeciality</th>
                    <th scope="col">AppointmentTime</th>
                    <th scope="col">VideoLink</th>
                    <th scope="col">Action</th>
                    <th scope="col">CreateAt</th>
                    <th scope="col">UpdateAt</th>
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
                                url: "appointment_pageupdate.php",
                                type: "POST",
                                data: appointmentData,
                                beforeSend: function() {
                                    $(".appointment-form-btn").prop("disabled", true);
                                    $(".appointment-form-btn").text("Wait..");
                                },
                                complete: function() {
                                    $(".appointment-form-btn").prop("disabled", false);
                                    $(".appointment-form-btn").text("Update");
                                },
                                success: function(data) {
                                    if (data == 1) {
                                        Swal.fire({
                                            title: "Empty Field",
                                            text: "Time or video link should not be empty",
                                            icon: "error"
                                        });
                                    } else if (data == 3) {
                                        Swal.fire({
                                            title: "Server Down",
                                            text: "Appointment not updated",
                                            icon: "error"
                                        });
                                    } else if (data == 2) {
                                        Swal.fire({
                                            icon: "success",
                                            title: "Appointment updated",
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
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