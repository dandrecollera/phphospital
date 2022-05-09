<?php
include './connection.php';
$id = $_GET['updateid'];


$sql = "SELECT * FROM `appointment` WHERE appt_id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$gdate = $row['appointment_date'];
$gpat = $row['pat_id'];
$gdoc = $row['doc_id'];

if(isset($_POST['submit'])){
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $apptdate = $_POST['apptdate'];

    $sql = "UPDATE `appointment` SET appointment_date = '$apptdate', pat_id = '$patient', doc_id = '$doctor' WHERE  appt_id = $id";
    $result = mysqli_query($con,$sql);

    if($result){
        header('location:../../views/listappointment.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/55faa7e024.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../scripts/styles/styles.css">
</head>

<body>
    <section class="container p-3 col-12 col-md-6" id="loginForm">
        <div class="card bg-light text-dark shadow ">
            <div class="card-header">Appointment</div>
            <div class="card-body">
                <h1 class="card-title mb-3">Edit Appointment</h1>
                <h6 class="card-subtitle mb-3">Enter all fields</h6>
                <hr class="mb-4">
                <form method="post">
                    <div class="input-group pb-3">
                        <span class="input-group-text">Appointment Date</span>
                        <input type="date" id="birthday" name="apptdate" value=<?php echo $gdate?>>
                    </div>
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Patient</label>
                        <select class="form-select" id="inputGroupSelect01" name="patient">
                            <?php
                                $sql="SELECT * FROM `patient`";
                                $result = mysqli_query($con, $sql);

                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                        $id=$row['patient_id'];
                                        $fname=$row['fname'];
                                        $lname=$row['lname'];
                                        $test = $fname . ' ' . $lname;
                                        if($gpat == $id){
                                            echo '<option value="'.$id.'" selected>'.$test.'</option>';
                                        } else {
                                            echo '<option value="'.$id.'">'.$test.'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect02">Doctor</label>
                        <select class="form-select" id="inputGroupSelect02" name="doctor">
                            <?php
                                $sql="SELECT * FROM `doctor`";
                                $result = mysqli_query($con, $sql);

                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                        $id=$row['doctor_id'];
                                        $fname=$row['fname'];
                                        $lname=$row['lname'];
                                        $department=$row['department'];
                                        $test = $department . ': '. $fname . ' ' . $lname;

                                        if($gdoc == $id){
                                            echo '<option value="'.$id.'" selected>'.$test.'</option>';
                                        } else {
                                            echo '<option value="'.$id.'">'.$test.'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
                    <a href="../../views/listappointment.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>