<footer class="row px-4 pt-5 bg-dark d-flex align-items-center justify-content-center">
    <div class="col-12 col-sm-3 mb-3">
        <h5 class="text-light">Patient Portal</h5>
        <ul class="nav flex-column">
            <?php
            if (isset($_SESSION['patient_logged_in']) && $_SESSION['patient_logged_in'] == true) {
            ?>
                <li class="nav-item mb-2"><a href="patient_dashboard?email=<?php
                                                                            echo $_SESSION['patient_email'];
                                                                            ?>&id=<?php echo $_SESSION['patient_id']; ?>" class="nav-link p-0 text-light">Patient Dashboard</a></li>
                <li class="nav-item mb-2"><a href="doctor_appointment" class="nav-link p-0 text-light">Doctor Appointment</a></li>
                <li class="nav-item mb-2"><a href="appointment_schedule" class="nav-link p-0 text-light">Appointment Schedule</a></li>
                <li class="nav-item mb-2"><a href="logout" class="nav-link p-0 text-light">Logout</a></li>
            <?php
            } else {
            ?>
                <li class="nav-item mb-2"><a href="patient_dashboard" class="nav-link p-0 text-light">Patient Dashboard</a></li>
                <li class="nav-item mb-2"><a href="doctor_appointment" class="nav-link p-0 text-light">Doctor Appointment</a></li>
                <li class="nav-item mb-2"><a href="appointment_schedule" class="nav-link p-0 text-light">Appointment Schedule</a></li>
                <li class="nav-item mb-2"><a href="login" class="nav-link p-0 text-light">Login</a></li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="col-12 col-sm-3 mb-3">
        <h5 class="text-light">Doctor Portal</h5>
        <ul class="nav flex-column">
            <?php
            if (isset($_SESSION['doctor_logged_in']) && $_SESSION['doctor_logged_in'] == true) {
            ?>
                <li class="nav-item mb-2"><a href="doctor/doctor_dashboard?email=<?php
                                                                                    echo $_SESSION['doctor_email'];
                                                                                    ?>&id=<?php echo $_SESSION['doctor_id']; ?>" class="nav-link p-0 text-light">Doctor Dashboard</a></li>
                <li class="nav-item mb-2"><a href="doctor/patient_info" class="nav-link p-0 text-light">Patient Info</a></li>
                <li class="nav-item mb-2"><a href="doctor/appointment_schedule" class="nav-link p-0 text-light">Appointment Schedule</a></li>
                <li class="nav-item mb-2"><a href="doctor/logout" class="nav-link p-0 text-light">Logout</a></li>
            <?php
            } else {
            ?>
                <li class="nav-item mb-2"><a href="doctor/doctor_dashboard" class="nav-link p-0 text-light">Doctor Dashboard</a></li>
                <li class="nav-item mb-2"><a href="doctor/patient_info" class="nav-link p-0 text-light">Patient Info</a></li>
                <li class="nav-item mb-2"><a href="doctor/appointment_schedule" class="nav-link p-0 text-light">Appointment Schedule</a></li>
                <li class="nav-item mb-2"><a href="doctor/index" class="nav-link p-0 text-light">Login</a></li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="col-12 col-sm-3 mb-3">
        <h5 class="text-light">Admin Portal</h5>
        <ul class="nav flex-column">
            <?php
            if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
            ?>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" href="admin/admin_dashboard?email=<?php
                                                                                            echo $_SESSION['admin_email'];
                                                                                            ?>&id=<?php echo $_SESSION['admin_id']; ?>" aria-current="page">Admin Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" href="admin/patient_info" aria-current="page">Patient Info</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" ref="admin/appointment_page" aria-current="page">Appointment Info</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" href="admin/logout" aria-current="page">Logout</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" href="admin/admin_dashboard" aria-current="page">Admin Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" href="admin/patient_info" aria-current="page">Patient Info</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" href="admin/appointment_page" aria-current="page">Appointment Info</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link p-0 text-light" href="admin/index" aria-current="page">Login</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="col-12 mt-3">
        <a class="text-decoration-none text-light text-center">
            <p class="text-light">© 2023 Medical Company, Inc</p>
        </a>
    </div>
</footer>