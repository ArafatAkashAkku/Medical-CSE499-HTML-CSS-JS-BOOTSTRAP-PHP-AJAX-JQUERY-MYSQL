<?php
require_once '../includes/config.php';
include '../includes/dbConnect.php';
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE `doctor` SET `verified`='0' where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
        <script>
        alert('Data updated');
        window.location.href='admin_dashboard?email=$_SESSION[admin_email]&id=$_SESSION[admin_id]';
        </script>
        ";
        }else{
            echo "
            <script>
            alert('Data not updated');
            window.location.href='admin_dashboard?email=$_SESSION[admin_email]&id=$_SESSION[admin_id]';
            </script>
            ";
        }

}
?>