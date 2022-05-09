<?php
include '../scripts/php/connection.php';

if(isset($_POST['submit'])){
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $apptdate = $_POST['apptdate'];

    $sql = "INSERT INTO `appointment`(appointment_date, pat_id, doc_id) values(CAST('".$apptdate."' AS DATE) ,'$patient', '$doctor')";
    $result = mysqli_query($con,$sql);

    if(!$result){
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
    <title>Add Appointment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/55faa7e024.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../scripts/styles/styles.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container">
            <a class="navbar-brand">
                <i class="fa-solid fa-hospital"></i>
                <span class="fs-6">
                    Hospital Management
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigations">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigations">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="./main.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="azdropdown" data-bs-toggle="dropdown">Appointment</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li class="dropdown-item">
                                <a class="nav-link active">Add Appointments</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="./listappointment" class="nav-link">List of Appointments</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="azdropdown" data-bs-toggle="dropdown">Doctors</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li class="dropdown-item">
                                <a href="./adddoctors.php" class="nav-link">Add Doctors</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="./listdoctors.php" class="nav-link">List of Doctors</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="azdropdown" data-bs-toggle="dropdown">Patients</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li class="dropdown-item">
                                <a href=".addpatient.php" class="nav-link">Add Patients</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="./listpatient.php" class="nav-link">List of Patients</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container p-3 col-12 col-md-6" id="loginForm">
        <div class="card bg-light text-dark shadow ">
            <div class="card-header">Appointment</div>
            <div class="card-body">
                <h1 class="card-title mb-3">Add Appointment</h1>
                <h6 class="card-subtitle mb-3">Enter all fields</h6>
                <hr class="mb-4">
                <form method="post">
                    <div class="input-group pb-3">
                        <span class="input-group-text">Appointment Date</span>
                        <input type="date" id="birthday" name="apptdate">
                    </div>
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Patient</label>
                        <select class="form-select" id="inputGroupSelect01" name="patient">
                            <option selected disabled hidden>Choose...</option>
                            <?php
                                $sql="SELECT * FROM `patient`";
                                $result = mysqli_query($con, $sql);

                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                        $id=$row['patient_id'];
                                        $fname=$row['fname'];
                                        $lname=$row['lname'];
                                        $test = $fname . ' ' . $lname;
                                        echo '
                                            <option value="'.$id.'">'.$test.'</option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Doctor</label>
                        <select class="form-select" id="inputGroupSelect01" name="doctor">
                        <option selected disabled hidden>Choose...</option>
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
                                        echo '
                                            <option value="'.$id.'">'.$test.'</option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
                    <a href="./main.html"><button type="button" class="btn btn-outline-primary">Back</button></a>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>