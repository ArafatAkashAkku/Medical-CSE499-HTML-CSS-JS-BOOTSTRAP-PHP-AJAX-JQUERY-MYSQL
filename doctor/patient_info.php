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
    <title>Patient Info | <?php if ($website_name == "") {
                            echo "Website Title";
                        } else {
                            echo $website_name;
                        } ?></title>
</head>

<body>
    <?php
    if (isset($_SESSION['doctor_logged_in']) && $_SESSION['doctor_logged_in'] == true) {
    ?>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">BloodGroup</th>
                    <th scope="col">Dob</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">MaritalStatus</th>
                    <th scope="col">Address</th>
                    <th scope="col">MedicalReport</th>
                    <th scope="col">CreateAt</th>
                    <th scope="col">UpdateAt</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM `patient_info`");
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
                            echo htmlentities($row["fullname"]);
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["email"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["phone"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["gender"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["blood"]);
                            ?></td>

                        <td><?php
                            echo htmlentities($row["dob"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["religion"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["occupation"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["nationality"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["maritalstatus"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["address"]);
                            ?></td>
                        <td>
                            <?php
                            if (htmlentities($row['prescription']) == '') {
                            ?>
                            <p>Not Available</p>
                                

                            <?php
                            } else {
                            ?> 
                            <a href='../dataimage/patient/<?php echo htmlentities($row["id"]); ?>/<?php echo htmlentities($row["prescription"]); ?>' download="Patient_Prescription_of_<?php echo htmlentities($row["fullname"]); ?>.pdf">
                                            Download
                                        </a>
                            <?php
                            }
                            ?>
                        </td>
                        <td><?php
                            echo htmlentities($row["create_at"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["update_at"]);
                            ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">BloodGroup</th>
                    <th scope="col">Dob</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">MaritalStatus</th>
                    <th scope="col">Address</th>
                    <th scope="col">MedicalReport</th>
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
    <?php
    } else {
        echo "
        <script>
        alert('You need to log in first');
        window.location.href='index';
        </script>
        ";
    }
    ?>


    <!-- script tag  -->
    <?php include("includes/script.php") ?>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>