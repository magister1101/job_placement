<!DOCTYPE html>
<html>
<body>
    
<?php

    session_start();

    $conn = new mysqli('localhost','root','','accounts');


    //gets the input email and password from the inpunt forms
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `employee` WHERE `email` = '$inputEmail'");

    $rows = mysqli_fetch_assoc($result);


    // grabs data from the table
    $id = $rows["id"]; 
    $email = $rows["email"];
    $password = $rows["password"];


    
    
    

    if(isset($_SESSION['email'])){ //checks if the user is already logged in by checking if session(email) is set.

        echo"already logged in";
        echo"<script>location.href='welcome.php'</script>";
        

    }

    else{

        if($inputEmail == $email && $inputPassword == $password){

            $_SESSION['email'] = $inputEmail; //puts the inputted email into a universal session that checks every page if it is logged in or not
            $_SESSION['id'] = $id;

            echo"<script>location.href='employeeLogin.php'</script>"; //loads itself to check if user is logged in or not

        }
        else{

            echo "<script>alert('email or password incorrect')</script>";
            echo "<script>location.href='employeeLoginPage.php'</script>";

        }
    }


    /*if($inputEmail == $email && $inputPassword == $password){

        $_SESSION['newEmail'] = $inputEmail;
        $_SESSION['newPass'] = $inputPassword;
        $_SESSION['id'] = $id;
        echo"Congrats";
    }
    else{
        header("Location:employeeLogin.html"); 
    }*/


?>


</body>
</html>