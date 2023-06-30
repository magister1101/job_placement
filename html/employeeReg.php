<!DOCTYPE html>
<html>
<body>
    
<?php
    session_start();

    $id = $email = $password = "";

    $conn = new mysqli('localhost','root','','accounts');

    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `employee` where 1");

    $rows = mysqli_fetch_assoc($result);

    $id = $rows["id"];
    $email = $rows["email"];
    $password = $rows["password"];

    if($inputEmail == $email && $inputPassword == $password){
        echo"The email is already registered.";

    }
    else{
        $ins = mysqli_query($conn, "INSERT INTO `employee` (`email`, `password`) VALUES ('$inputEmail','$inputPassword')");
        header("Location:employeeReg.html");

    }
?>

</body>
</html>