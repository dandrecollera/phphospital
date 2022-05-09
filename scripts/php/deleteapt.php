<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `appointment` WHERE appt_id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
        header('location:../../views/listappointment.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
