<?php
require_once '../includes/config.php';
include '../includes/dbConnect.php';
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE `doctor` SET `active`='0' where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
        <script>
        alert('Data updated');
        window.location.href='doctor_dashboard?email=$_SESSION[doctor_email]&id=$_SESSION[doctor_id]';
        </script>
        ";
        }else{
            echo "
            <script>
            alert('Data not updated');
            window.location.href='doctor_dashboard?email=$_SESSION[doctor_email]&id=$_SESSION[doctor_id]';
            </script>
            ";
        }

}
