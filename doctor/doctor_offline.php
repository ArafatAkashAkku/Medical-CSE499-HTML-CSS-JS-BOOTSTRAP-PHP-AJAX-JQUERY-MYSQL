<?php
require_once '../config/config.php';
include '../config/dbConnect.php';
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE `doctor_info` SET `active`='0' where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
        <script>
        alert('Data updated');
        window.location.href='doctor_dashboard';
        </script>
        ";
        }else{
            echo "
            <script>
            alert('Data not updated');
            window.location.href='doctor_dashboard';
            </script>
            ";
        }

}
