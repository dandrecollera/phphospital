<?php
include '../scripts/php/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>

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
                                <a href="./addappointment.php" class="nav-link">Add Appointments</a>
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
                                <a class="nav-link active">List of Doctors</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="azdropdown" data-bs-toggle="dropdown">Patients</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li class="dropdown-item">
                                <a href="./addpatient.php" class="nav-link">Add Patients</a>
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

    <section class="container">
        <h1 class="card-title mb-3">Doctor List</h1>
        <h6 class="card-subtitle mb-3">Here is the list of doctors.</h6>
        <hr class="mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Doctor ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Operation</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM `doctor`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $id=$row['doctor_id'];
                            $fname=$row['fname'];
                            $lname=$row['lname'];
                            $department=$row['department'];
                            echo '
                                <tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$fname.'</td>
                                    <td>'.$lname.'</td>
                                    <td>'.$department.'</td>
                                    <td>
                                        <button class="btn btn-primary"><a href="../scripts/php/updatedoctor.php?updateid='.$id.'" class="text-light">Update</button>
                                        <button class="btn btn-danger"><a href="../scripts/php/deletedoctor.php?deleteid='.$id.'" class="text-light">Delete</button>
                                    </td>
                                </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
        <a href="main.html"><button type="button" class="btn btn-outline-primary">Back</button></a>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>