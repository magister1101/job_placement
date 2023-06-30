<!DOCTYPE html>
<html>
<body>
    
<?php
    session_start();

    $id = $email = $password = "";

    $conn = new mysqli('localhost','root','','accounts');

    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `employee` WHERE `email` = '$inputEmail'");

    $rows = mysqli_fetch_assoc($result);

    $id = $rows["id"];
    $email = $rows["email"];
    $password = $rows["password"];

    $_SESSION['ID'] = $id;
    $_SESSION['newEmail'] = $inputEmail;
    $_SESSION['newPass'] = $inputPassword;
    

    if(isset($_SESSION['email'])){

        echo"already logged in";

    }

    else{

        if($inputEmail == $email && $inputPassword == password){

            $_SESSION['una']

        }

    }


    if($inputEmail == $email && $inputPassword == $password){



        $_SESSION['newEmail'] = $inputEmail;
        $_SESSION['newPass'] = $inputPassword;
        $_SESSION['id'] = $id;


        echo"Congrats";

    }
    else{
        
        header("Location:employeeLogin.html");
        
    }
?>

</body>
</html>