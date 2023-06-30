<!DOCTYPE html>
<html>
<body>
    
<?php
    session_start();

    $id = $email = $password = "";

    $conn = new mysqli('localhost','root','','accounts');

    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `employer` where 1");

    $rows = mysqli_fetch_assoc($result);

    $id = $rows["id"];
    $email = $rows["email"];
    $password = $rows["password"];


    $e = "SELECT email FROM employer WHERE email = '$inputEmail'";
    $ee = mysqli_query($conn,$e);

    if(mysqli_num_rows($ee) > 0){ //checks if the email is already in our database (employee)
        echo"<script>alert('The email is already registered.')</script>";
        echo"<script>location.href='employeeReg1.html'</script>";
    }
    else{ //inserts email and password to database
        $ins = mysqli_query($conn, "INSERT INTO `employer` (`email`, `password`) VALUES ('$inputEmail','$inputPassword')");
        header("Location:employerLogin.html");

    }
?>

</body>
</html>