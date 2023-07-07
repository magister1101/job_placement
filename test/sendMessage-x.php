<?php
    session_start();

    include 'config.php';

    $destinationEmail = $_POST['DestinationEmail'];
    $content = $_POST['content'];

    $result = mysqli_query($conn, "SELECT * FROM `message` where 1");
    $rows = mysqli_fetch_assoc($result);

    $resulEmployer = mysqli_query($conn, "SELECT * FROM `employer` where 1");
    $rowsEmployer = mysqli_fetch_assoc($resulEmployer);

    $resulEmployee = mysqli_query($conn, "SELECT * FROM `employee` where 1");
    $rowsEmployee = mysqli_fetch_assoc($resulEmployee);

    $destinationEmail = $_post['DestinationEmail'];
    $contentEmail = $_post['content'];

    $employerId = $rowsEmployer['id']; //id of logged in account
    $_SESSION['email']; //email of logged in account

    if($destinationEmail == $employeeId){
        $employeeId = $rowsEmployee["id"];
    }
    
    

    echo $employerId;
    $send = "INSERT INTO `message`(`employeeId`, `employerId`, `content`) VALUES ($employeeId,$employerId,$contentEmail)";

    $Message = $rows['content'];
    echo $message;
    #header("location:employerMessage.php");

?>