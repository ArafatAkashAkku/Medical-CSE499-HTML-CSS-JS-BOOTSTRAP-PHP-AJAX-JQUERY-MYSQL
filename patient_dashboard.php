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
    <title>Patient Dashboard | <?php if ($website_name == "") {
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
    <main class="px-3">
        <div class="text-end mt-4">
            <a href="./" class="text-decoration-none bg-warning text-light px-3 py-1 border border-warning rounded">Back</a>
        </div>
        <h1 class="text-center">Patient Profile</h1>
        <?php
        $ret = mysqli_query($con, "select * from patient_info where email='$email' and id='$id'");
        $row = mysqli_fetch_array($ret);
        if ($row) {
        ?>
            <form id="account-form-update" autocomplete="off">
                <div class="row gap-2 d-flex justify-content-center">
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Email</h5>
                                <input type="email" name="email" readonly placeholder="Enter your email" value="<?php
                                                                                                                echo htmlentities($row["email"]);
                                                                                                                ?>" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Full Name</h5>
                                <input type="text" name="fullname" value="<?php
                                                                            echo htmlentities($row["fullname"]);
                                                                            ?>" placeholder="Enter your full name" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Gender</h5>
                                <select name="gender" class="border border-primary form-control px-3 py-2">
                                    <option value="" <?php if ($row["gender"] == '') {
                                                            echo "selected";
                                                        } ?>>Select</option>
                                    <option value="male" <?php if ($row["gender"] == 'male') {
                                                                echo "selected";
                                                            } ?>>Male</option>
                                    <option value="female" <?php if ($row["gender"] == 'female') {
                                                                echo "selected";
                                                            } ?>>Female</option>
                                    <option value="other" <?php if ($row["gender"] == 'other') {
                                                                echo "selected";
                                                            } ?>>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Date of Birth</h5>
                                <input type="date" name="dob" placeholder="Enter your date of birth" value="<?php
                                                                                                            echo htmlentities($row["dob"]);
                                                                                                            ?>" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Phone Number</h5>
                                <input type="number" name="phone" value="<?php
                                                                            echo htmlentities($row["phone"]);
                                                                            ?>" placeholder="Enter your phone no" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Blood Group</h5>
                                <select name="blood" class="border border-primary form-control px-3 py-2">
                                    <option value="" <?php if ($row["blood"] == '') {
                                                            echo "selected";
                                                        } ?>>Select</option>
                                    <option value="A+" <?php if ($row["blood"] == 'A+') {
                                                            echo "selected";
                                                        } ?>>A+</option>
                                    <option value="A-" <?php if ($row["blood"] == 'A-') {
                                                            echo "selected";
                                                        } ?>>A-</option>
                                    <option value="B+" <?php if ($row["blood"] == 'B+') {
                                                            echo "selected";
                                                        } ?>>B+</option>
                                    <option value="B-" <?php if ($row["blood"] == 'B-') {
                                                            echo "selected";
                                                        } ?>>B-</option>
                                    <option value="O+" <?php if ($row["blood"] == 'O+') {
                                                            echo "selected";
                                                        } ?>>O+</option>
                                    <option value="O-" <?php if ($row["blood"] == 'O-') {
                                                            echo "selected";
                                                        } ?>>O-</option>
                                    <option value="AB+" <?php if ($row["blood"] == 'AB+') {
                                                            echo "selected";
                                                        } ?>>AB+</option>
                                    <option value="AB-" <?php if ($row["blood"] == 'AB-') {
                                                            echo "selected";
                                                        } ?>>AB-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Religion</h5>
                                <input type="text" name="religion" value="<?php
                                                                            echo htmlentities($row["religion"]);
                                                                            ?>" placeholder="Enter your religion" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Occupation</h5>
                                <input type="text" name="occupation" value="<?php
                                                                            echo htmlentities($row["occupation"]);
                                                                            ?>" placeholder="Enter your occupation" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Nationality</h5>
                                <input type="text" name="nationality" value="<?php
                                                                                echo htmlentities($row["nationality"]);
                                                                                ?>" placeholder="Enter your nationality" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Marital Status</h5>
                                <select name="maritalstatus" class="border border-primary form-control px-3 py-2">
                                    <option value="" <?php if ($row["maritalstatus"] == '') {
                                                            echo "selected";
                                                        } ?>>Select</option>
                                    <option value="married" <?php if ($row["maritalstatus"] == 'married') {
                                                                echo "selected";
                                                            } ?>>Married</option>
                                    <option value="notmarried" <?php if ($row["maritalstatus"] == 'notmarried') {
                                                                    echo "selected";
                                                                } ?>>Not Married</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Address</h5>
                                <input type="text" name="address" value="<?php
                                                                            echo htmlentities($row["address"]);
                                                                            ?>" placeholder="Enter your address" class="border border-primary form-control px-3 py-2">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <?php
                                if ($row['prescription'] == '') {
                                ?>
                                    <h5 class="text-muted">Medical Prescription (upload)</h5>
                                    <input type="file" name="upload" class="border border-primary form-control px-3 py-2" accept=".pdf">
                                <?php
                                } else {
                                ?>
                                    <h5 class="text-muted">Medical Prescription (update)</h5>
                                    <div class="d-flex align-items-center">
                                        <a class="me-4" href='dataimage/patient/<?php echo htmlentities($row["id"]); ?>/<?php echo htmlentities($row["prescription"]); ?>' download="Patient_Prescription_of_<?php echo htmlentities($row["fullname"]); ?>.pdf">
                                            Download
                                        </a>
                                        <input type="file" name="upload" class="border border-primary form-control px-3 py-2" accept=".pdf">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted text-center">Update Info</h5>
                                <button id="account-form-btn" class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>
    </main>
    <!-- main end  -->
    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->
    <!-- script tag  -->
    <?php include("includes/script.php") ?>
    <!-- internal script  -->
    <script>
        // jquery ready start 
        $(document).ready(function() {
            // login php ajax code start
            $("#account-form-update").on('submit', function(e) {
                e.preventDefault();
                let accountupdateData = new FormData(this);
                $.ajax({
                    url: "patient_dashboardupdate.php",
                    type: "POST",
                    data: accountupdateData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $("#account-form-btn").prop("disabled", true);
                        $("#account-form-btn").text("Please wait...");
                    },
                    complete: function() {
                        $("#account-form-btn").prop("disabled", false);
                        $("#account-form-btn").text("Update");
                    },
                    success: function(data) {
                        if (data == 6) {
                            Swal.fire({
                                title: "Can not run query",
                                text: "Try again later",
                                icon: "error"
                            });
                        } else if (data == 5) {
                            Swal.fire({
                                title: "You cant upload a file here",
                                text: "Try again later",
                                icon: "error"
                            });
                        } else if (data == 4) {
                            Swal.fire({
                                title: "There was an error uploading your file",
                                text: "Try again later",
                                icon: "error"
                            });
                        } else if (data == 3) {
                            Swal.fire({
                                title: "File is too big",
                                text: "Try again later",
                                icon: "error"
                            });
                        } else if (data == 2) {
                            Swal.fire({
                                title: "Server Down",
                                text: "Try again later",
                                icon: "error"
                            });
                        } else if (data == 1) {
                            Swal.fire({
                                icon: "success",
                                title: "Account info updated - Login again",
                                showConfirmButton: false,
                                timer: 2000
                            });
                            setTimeout(() => {
                                window.location.href = "logout";
                            }, 2100);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>