<?php
require_once 'includes/config.php';
include 'includes/dbConnect.php';
session_start();

if (isset($_POST['submit'])) {
    $query = "INSERT INTO `appointment`(`patientname`, `patientemail`,`patientphone`,`doctorname`,`doctoremail`, `doctorphone`,`doctorspeciality`,`time`) VALUES ('$_SESSION[patient_fullname]','$_SESSION[patient_email]','$_SESSION[patient_phone]','$_POST[fullname]','$_POST[email]', '$_POST[phone]','$_POST[speciality]','waiting')";
    $save = mysqli_query($con, $query);
    if ($save) {
        echo "
        <script>
        alert('Appointment Successful Wait for time');
        window.location.href='doctor_appointment';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Try again later');
        window.location.href='doctor_appointment';
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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- website title  -->
    <title>Medical Health Care</title>
</head>

<body>
    <?php
    if (isset($_SESSION['patient_logged_in']) && $_SESSION['patient_logged_in'] == true) {
    ?>
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">Active Status</th>
                        <th scope="col">Appointment Apply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM `doctor`");
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
                                echo $row['gender'];
                                ?></td>
                            <td><?php
                                echo $row['speciality'];
                                ?></td>
                            <td><?php
                                if ($row["active"] == 1) {
                                    echo "Online";
                                } else {
                                    echo "Offline";
                                }
                                ?></td>
                            <td>
                                <form action="" method="post">
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
                                    <?php
                                    if ($row["active"] == 1) {
                                        echo "<button onclick='return update()' class='btn btn-width btn-outline-warning bg-success text-light' name='submit' type='submit'>Click For Appointment</button>";
                                    } else {
                                        echo "<button class='btn btn-width btn-outline-danger bg-danger text-light' disabled>Currently Offline</button> ";
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
                        <th scope="col">Serial</th>
                        <th scope="col" style="display:none;">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">Active Status</th>
                        <th scope="col">Appointment Apply</th>
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
        window.location.href='login';
        </script>
        ";
    }
    ?>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jquery js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- datatables net  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
    <!-- external js link  -->
    <script src="external/js/script.js"></script>
    <!-- internal script link  -->
    <script>
        function update() {
            return confirm('Are you sure want to update?')
        }
    </script>
</body>

</html>