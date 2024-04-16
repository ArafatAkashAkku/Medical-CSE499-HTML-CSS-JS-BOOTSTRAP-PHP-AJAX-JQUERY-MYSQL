<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
if (isset($_SESSION['doctor_logged_in']) && $_SESSION['doctor_logged_in'] == true) {
    $email = $_SESSION['doctor_email'];
    $id = $_SESSION['doctor_id'];
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
    <title>Appointment Schedule | <?php if ($website_name == "") {
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
        <table id="example" class="table table-striped data-table-width">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">PatientName</th>
                    <th scope="col">PatientEmail</th>
                    <th scope="col">PatientPhone</th>
                    <th scope="col">AppointmentTime</th>
                    <th scope="col">JoinMeet</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM `appointment_info` WHERE `doctoremail`='$email'");
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
                            ?></td>
                        <td><?php
                            echo htmlentities($row['patientphone']);
                            ?></td>
                        <td>
                            <?php
                            if ($row['time'] == 'waiting') {
                                echo "Please wait";
                            } else {
                                echo htmlentities($row['time']);
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row['video'] == '') {
                            ?>
                                <a style="pointer-events: none;" class="text-decoration-none px-3 py-2 bg-danger text-white border rounded">Please Wait&nbsp;&nbsp;</a>
                            <?php
                            } else {
                            ?>
                                <a href="<?php
                                            echo $row['video'];
                                            ?>" target="_blank" class="text-decoration-none px-3 py-2 bg-success text-white border rounded">Join Meeting</a>
                            <?php
                            }
                            ?>
                        </td>
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
                    <th scope="col">AppointmentTime</th>
                    <th scope="col">JoinMeet</th>
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
        new DataTable('#example');
    </script>

</body>

</html>