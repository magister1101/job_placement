<!DOCTYPE html>
<html>
<body>
    
<?php
    session_start();

    $id = $email = $password = "";

    $conn = new mysqli('localhost','root','','accounts');

    $inputEmail = $_POST['email'];
    $inputContactPersonName = $_POST['contactPersonName'];
    $inputBusinessName = $_POST['businessName'];
    $inputPassword = $_POST['password'];
    $accountType = 'employer';
    
    $result = mysqli_query($conn, "SELECT * FROM `employer` where 1");

    $rows = mysqli_fetch_assoc($result);

    $id = $rows["id"];
    $contactPersonName = $rows["contactPersonName"];
    $businessName = $rows["businessName"];
    $email = $rows["email"];
    $password = $rows["password"];

    $uppercase = preg_match('@[A-Z]@', $inputPassword);
    $lowercase = preg_match('@[a-z]@', $inputPassword);
    $number    = preg_match('@[0-9]@', $inputPassword);
    $specialChars = preg_match('@[^\w]@', $inputPassword);


    $e = "SELECT email FROM employer WHERE email = '$inputEmail'";
    $ee = mysqli_query($conn,$e);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($inputPassword) < 8) {

        echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
        echo"<script>location.href='employerReg1.php'</script>";

    }
    else{

        if(mysqli_num_rows($ee) > 0){ //checks if the email is already in our database (employee)
            echo"<script>alert('The email is already registered.')</script>";
            echo"<script>location.href='employerReg1.php'</script>";
        }
        else{ //inserts email and password to database
            $ins = mysqli_query($conn, "INSERT INTO `employer`(`contactPersonName`, `businessName`, `email`, `password`, `accountType`) VALUES ('$inputContactPersonName','$inputBusinessName','$inputEmail','$inputPassword','employer')");
            header("Location:employerLoginPage.php");

        }
    }
?>

</body>
</html>