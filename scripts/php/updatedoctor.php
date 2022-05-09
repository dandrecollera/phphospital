<?php
include './connection.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM `doctor` WHERE doctor_id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$lname = $row['lname'];
$department = $row['department'];

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department = $_POST['department'];

    $sql = "UPDATE `doctor` SET fname = '$firstname', lname = '$lastname', department = '$department' WHERE  doctor_id = $id";
    $result = mysqli_query($con,$sql);

    if($result){
        header('location:../../views/listdoctors.php');
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
    <title>Update Doctors</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/55faa7e024.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../scripts/styles/styles.css">
</head>

<body>
    <section class="container p-3 col-12 col-md-6" id="loginForm">
        <div class="card bg-light text-dark shadow ">
            <div class="card-header">Doctor</div>
            <div class="card-body">
                <h1 class="card-title mb-3">Add Doctor</h1>
                <h6 class="card-subtitle mb-3">Enter all fields</h6>
                <hr class="mb-4">
                <form method="post">
                    <div class="input-group pb-3">
                        <span class="input-group-text">First and last name</span>
                        <input type="text" aria-label="First name" class="form-control" name="firstname" value=<?php echo $fname;?>>
                        <input type="text" aria-label="Last name" class="form-control" name="lastname" value=<?php echo $lname;?>>
                    </div>
                    <div class="input-group pb-3">
                        <span class="input-group-text">Department</span>
                        <input type="text" aria-label="Age" class="form-control" name="department" value=<?php echo $department;?>>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
                    <a href="../../views/listdoctors.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>