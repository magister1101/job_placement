<!DOCTYPE html>
<html>
<body>
    
<?php
    session_start();

    include 'config.php';


    $inputFirstName = $_POST['firstName'];
    $inputLastName = $_POST['lastName'];
    $inputStudentNumber = $_POST['studentNumber'];
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `employee` where 1");
    $rows = mysqli_fetch_assoc($result);

    $id = $rows["id"];
    $email = $rows["email"];
    $password = $rows["password"];
    
    
    $e = "SELECT email FROM employee WHERE email = '$inputEmail'";
    $ee = mysqli_query($conn,$e);

    if(mysqli_num_rows($ee) > 0){ //checks if the email is already in our database (employee)
        echo"<script>alert('The email is already registered.')</script>";
        echo"<script>location.href='employeeReg1.html'</script>";
    }
    else{ //inserts email and password to database
        $ins = mysqli_query($conn, "INSERT INTO `employee` (`email`, `password`, `firstName`, `lastName`, `studentNumber`) VALUES ('$inputEmail','$inputPassword','$inputFirstName','$inputLastName','$inputStudentNumber')");
        header("Location:employeeregister.php?email=$inputEmail");
    }
?>

</body>
</html>