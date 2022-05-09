<?php
$con = new mysqli('localhost', 'root', '', 'hospital_management');

if(!$con){
    die(mysqli_error($con));
}
?>