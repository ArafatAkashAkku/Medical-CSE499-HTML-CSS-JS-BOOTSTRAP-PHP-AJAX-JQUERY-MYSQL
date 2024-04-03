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
    <title>Doctor Info | <?php if ($website_name == "") {
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
    <main class="mx-4 my-3 min-height-css overflow-scroll">
        <table id="example" class="table table-striped data-table-width">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM `doctor_info`");
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
                            ?> </td>
                        <td><?php
                            echo htmlentities($row["gender"]);
                            ?></td>
                        <td><?php
                            echo htmlentities($row["speciality"]);
                            ?></td>
                        <td><?php
                            if ($row["active"] == 1) {
                                echo "Online";
                            } else {
                                echo "Offline";
                            }
                            ?></td>
                        <td>
                            <?php
                            if ($row['verified'] == '1') {
                            ?>
                                <a onclick="return update()" href="doctor_unverified?id=<?php echo htmlentities($row['id']);
                                                                                        ?>">Unverified?</a>
                            <?php
                            } else {
                            ?>
                                <a onclick="return update()" href="doctor_verified?id=<?php echo htmlentities($row['id']);
                                                                                        ?>">Verified?</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
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
    <!-- internal js script  -->
    <script>
        new DataTable('#example');
    </script>
    <script>
        function update() {
            return confirm('Are you sure want to update?')
        }
    </script>
</body>

</html>