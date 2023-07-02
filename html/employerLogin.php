<!DOCTYPE html>
<html>
<body>
    
<?php
    session_start();

    include 'config.php';

    //gets the input email and password from the inpunt forms
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM `employer` WHERE `email` = '$inputEmail'");
    $rows = mysqli_fetch_assoc($result);

    //grabs the data from the table and stores them in a variable
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
            echo"<script>location.href='employerLogin.php'</script>"; //loads itself to check if user is logged in or not

        }
        else{

            echo "<script>alert('email or password incorrect')</script>";
            echo "<script>location.href='employerLoginPage.php'</script>";

        }
    }
?>

</body>
</html>