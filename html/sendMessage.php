<?php
    session_start();
    include 'config.php';
    
    $_SESSION['email']; //email of logged in account

    $senderEmail = $_SESSION['email'];
    $destinationEmail = $_POST['destinationEmail']; 
    $content = $_POST['content'];


    $result = mysqli_query($conn, "SELECT * FROM `message` WHERE 1");
    $rows = mysqli_fetch_assoc($result);

    $resultEmployee = mysqli_query($conn, "SELECT * FROM `employee` WHERE `email` = '$destinationEmail'");
    $rowsEmployee = mysqli_fetch_assoc($resultEmployee);

    $resultEmployer = mysqli_query($conn, "SELECT * FROM `employer` WHERE `email` = '$senderEmail'");
    $rowsEmployer = mysqli_fetch_assoc($resultEmployer);
    
    
    $employeeId = $rowsEmployee['id'];
    $employerId = $rowsEmployer['id'];
    $dateOfCreation = date("Y-m-d");

    echo $employeeId;
    echo $employerId;
    echo $content;

    $ins = mysqli_query($conn, "INSERT INTO `message`(`employeeId`, `employerId`, `content`, `dateCreated`) VALUES ($employeeId ,$employerId ,'$content', '$dateOfCreation')");

    header("Location:messages.php")

    



?>