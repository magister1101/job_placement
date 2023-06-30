<!DOCTYPE html>
<html>
<body>
    
<?php
    session_start();

    $id = $email = $password = "";

    $conn = new mysqli('localhost','root','','accounts');

    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `employer` WHERE `email` = '$inputEmail'");

    $rows = mysqli_fetch_assoc($result);

    $id = $rows["id"];
    $email = $rows["email"];
    $password = $rows["password"];

    if($inputEmail == $email && $inputPassword == $password){

        $_SESSION['newEmail'] = $inputEmail;
        $_SESSION['newPass'] = $inputPassword;


        echo"Congrats";

    }
    else{
        
        header("Location:employerLogin.html");
        
    }
?>

</body>
</html>