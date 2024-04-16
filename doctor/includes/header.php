<style>
    .navigation-header {
        width: 100%;
        z-index: 1000;
    }
</style>

<header>
    <nav class="navbar navbar-expand-lg bg-dark top-0 start-0 navigation-header">
        <div class="container-fluid">
            <?php
            if (isset($_SESSION['doctor_logged_in']) && $_SESSION['doctor_logged_in'] == true) {
            ?>
                <a class="navbar-brand text-warning" href="doctor_dashboard">MHC</a>
            <?php
            } else {
            ?>
                <a class="navbar-brand text-warning" href="../">MHC</a>
            <?php
            }
            ?>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (isset($_SESSION['doctor_logged_in']) && $_SESSION['doctor_logged_in'] == true) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="doctor_dashboard" aria-current="page">Doctor Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="patient_info" aria-current="page">Patient Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="appointment_schedule" aria-current="page">Appointment Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="logout" aria-current="page">Logout</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="../login" aria-current="page">Patient Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="./" aria-current="page">Doctor Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="../admin/" aria-current="page">Admin Login</a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    const navigationBar = document.querySelector(".navigation-header");

    // windows scroll function 
    window.onscroll = () => {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navigationBar.style.position = "fixed";
        } else {
            navigationBar.style.position = "relative";
        }
    };
</script>