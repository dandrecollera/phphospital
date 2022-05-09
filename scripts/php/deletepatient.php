<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `patient` WHERE patient_id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
        header('location:../../views/listpatient.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
