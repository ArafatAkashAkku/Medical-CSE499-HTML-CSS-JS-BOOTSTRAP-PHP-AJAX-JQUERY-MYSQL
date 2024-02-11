<?php
require_once 'includes/config.php';
include 'includes/dbConnect.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $query = "INSERT INTO `quote`(`email`,`fullname`,`message`) VALUES ('$email','$fullname','$message')";
    $save = mysqli_query($con, $query);
    if ($save) {
        echo "
        <script>
        alert('Message Sent Successfully');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Message failed to send');
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
    <!-- website title  -->
    <title>Medical Health Care</title>
</head>

<body class="overflow-x-hidden">

    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end -->

    <!-- main start  -->
    <main>

        <!-- top header section start  -->
        <section id="home">
            <div class="row d-flex flex-column gap-3 justify-content-center align-items-center top-header px-2 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-light">Your source for Multiple Solutions</h1>
                </div>
                <div class="col-12 text-center">
                    <p class="text-light"><i class="fa-solid fa-circle-check text-danger pe-2"></i>Equipment repair and PM Service</p>
                </div>
                <div class="col-12 text-center">
                    <p class="text-light"><i class="fa-solid fa-circle-check text-danger pe-2"></i>Guaranteed Cost Savings vs. OEM</p>
                </div>
                <div class="col-12 text-center">
                    <p class="text-light"><i class="fa-solid fa-circle-check text-danger pe-2"></i>Support for "End of life" Equipment</p>
                </div>
                <div class="col-12 text-center">
                    <p class="text-light"><i class="fa-solid fa-circle-check text-danger pe-2"></i>Replacement Equipment Available</p>
                </div>
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary">View Products</button>
                </div>
            </div>
        </section>
        <!-- top header section end  -->

        <!-- header product image section start  -->
        <section>
            <div class="row d-flex justify-content-center align-items-center px-4 py-5 bg-primary">
                <div class="col-sm-3 col-6 text-center">
                    <img src="images/Rectangle 1.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                </div>
                <div class="col-sm-3 col-6 text-center">
                    <img src="images/Rectangle 2.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">

                </div>
                <div class="col-sm-3 col-6 text-center">
                    <img src="images/Rectangle 3.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">

                </div>
                <div class="col-sm-3 col-6 text-center">
                    <img src="images/Rectangle 4.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">

                </div>
            </div>
        </section>
        <!-- header product image section end  -->

        <!-- serve section start  -->
        <section>
            <div class="row d-flex gap-3 justify-content-center align-items-center px-4 py-5 bg-light">
                <div class="col-12 text-center mb-3">
                    <h1>WHO WE SERVE</h1>
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center serve-bg p-3">
                    <i class="fa-solid fa-gear h1"></i>
                    <h4>BIOMEDICAL (HTM)</h4>
                    <p>We provide reliable, honest repair services ranging from simple preventative maintenance and troubleshooting, to more complicated component level and software related issues</p>
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center serve-bg p-3">
                    <i class="fa-solid fa-pills h1"></i>
                    <h4>HOME PHARMACY</h4>
                    <p>We provide pharmacists a comprehensive service that includes regular PM service, repair programs, and rental options to ensure every patient has a safe and effective home infusion device
                    </p>
                </div>
                <div class="col-sm-3 col-12 d-flex flex-column gap-3 text-center serve-bg p-3">
                    <i class="fa-solid fa-scissors h1"></i>
                    <h4>SURGERY CENTERS</h4>
                    <p>We provide complete maintenance programs and equipment repair services that keep your Operating Rooms functioning efficiently and running at full capacity
                    </p>
                </div>
            </div>
        </section>
        <!-- serve section end  -->

        <!-- what do we do section start  -->
        <section>
            <div class="row px-4 py-5 d-flex justify-content-center align-items-center">
                <div class="col-12 text-center mb-3">
                    <h1>What We Do</h1>
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center p-3">
                    <img src="images/Rectangle 5.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center p-3">
                    <h4>ON-SITE MAINTENANCE</h4>
                    <p>Authorized service by certified technicians who can repair a wide range of medical equipment. </p>
                </div>
                <div class="col-sm-3 col-12 d-flex flex-column gap-3 text-center p-3">
                    <img src="images/Rectangle 6.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center p-3">
                    <h4>SALES & RENTALS</h4>
                    <p>Authorized service by certified technicians who can repair a wide range of medical equipment. </p>
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center p-3">
                    <h4>ON-SITE MAINTENANCE</h4>
                    <p>Authorized service by certified technicians who can repair a wide range of medical equipment. </p>
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center p-3">
                    <img src="images/Rectangle 7.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                </div>
                <div class="col-sm-3 d-flex flex-column gap-3 col-12 text-center p-3">
                    <h4>SALES & RENTALS</h4>
                    <p>Authorized service by certified technicians who can repair a wide range of medical equipment. </p>
                </div>
                <div class="col-sm-3 col-12 d-flex flex-column gap-3 text-center p-3">
                    <img src="images/Rectangle 8.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                </div>
            </div>
        </section>
        <!-- what do we do section end  -->

        <!-- work with section start  -->
        <section>
            <div class="row gap-2 px-4 py-5 d-flex justify-content-center align-items-center">
                <div class="col-12 text-center mb-3">
                    <h1>We work with the best manufactures in the market</h1>
                </div>
                <div class="col-sm-2 col-5 text-center p-3">
                    <img src="images/Work 1.png" class="img-fluid" alt="Work" loading="lazy">
                </div>
                <div class="col-sm-2 col-5 text-center p-3">
                    <img src="images/Work 2.png" class="img-fluid" alt="Work" loading="lazy">
                </div>
                <div class="col-sm-2 col-5 text-center p-3">
                    <img src="images/Work 3.png" class="img-fluid" alt="Work" loading="lazy">
                </div>
                <div class="col-sm-2 col-5 text-center p-3">
                    <img src="images/Work 4.png" class="img-fluid" alt="Work" loading="lazy">
                </div>
                <div class="col-sm-2 col-5 text-center p-3">
                    <img src="images/Work 5.png" class="img-fluid" alt="Work" loading="lazy">
                </div>
            </div>
        </section>
        <!-- work with section end  -->

        <!-- doctor section start  -->
        <section>
            <div class="row gap-3 px-4 py-5 d-flex justify-content-center align-items-center">
                <div class="col-12 text-center mb-3">
                    <h1>Our Doctors</h1>
                </div>
                <?php
                $ret = mysqli_query($con, "select * from doctor");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="col-12 col-sm-3 gap-2 d-flex align-items-center text-center flex-column flex-sm-row">
                        <div>
                            <?php
                            if ($row['image'] == '') {
                            ?>
                                <img src="images/user.jpg" width="150" height="150" class="border rounded-circle" alt="No Image" loading="lazy">
                            <?php
                            } else {
                            ?>
                                <img src="dataimage/doctor/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['image']); ?>" width="150" height="150" class="border rounded-circle" alt="<?php echo htmlentities($row['fullname']); ?>" loading="lazy">
                            <?php
                            }
                            ?>
                        </div>
                        <div>
                            <h3><?php echo htmlentities($row['fullname']); ?></h3>
                            <p><?php echo htmlentities($row['speciality']); ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <!-- doctor section end  -->

        <!-- contact us section start  -->
        <section>
            <div class="row gap-2 px-4 py-5 d-flex flex-column justify-content-center align-items-center">
                <div class="col-12 text-center mb-3">
                    <h1>Get A Quote</h1>
                </div>
                <form action="" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                        <input type="name" name="fullname" class="form-control" id="exampleFormControlInput1" placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter your email address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Send</button>
                </form>
            </div>
        </section>
        <!-- contact us section end  -->

        <!-- special features section start  -->
        <section class="px-4 py-5 d-flex align-items-center justify-content-center gap-2 flex-wrap">
            <div class="card" style="width: 18rem;">
                <img src="images/Rectangle 5.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                <div class="card-body">
                    <h5 class="card-title">Helping your pharmacy</h5>
                    <p class="card-text">Siella helps your pharmacy embrace & manage all of the elements which can effect a successful outcome.</p>
                </div>
            </div>


            <div class="card" style="width: 18rem;">
                <img src="images/Rectangle 6.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                <div class="card-body">
                    <h5 class="card-title">Competitive pricing</h5>
                    <p class="card-text">Siella helps your pharmacy embrace & manage all of the elements which can effect a successful outcome.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="images/Rectangle 7.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                <div class="card-body">
                    <h5 class="card-title">Excellent customer service</h5>
                    <p class="card-text">Siella helps your pharmacy embrace & manage all of the elements which can effect a successful outcome.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="images/Rectangle 8.jpg" class="img-fluid error-img" alt="Rectangle" loading="lazy">
                <div class="card-body">
                    <h5 class="card-title">We make it simple</h5>
                    <p class="card-text">Siella helps your pharmacy embrace & manage all of the elements which can effect a successful outcome.</p>
                </div>
            </div>
        </section>
        <!-- special feature section end  -->

    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->

    <!-- jQuery library is required. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="external/js/script.js"></script>

</body>

</html>