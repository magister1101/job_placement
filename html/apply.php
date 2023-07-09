<?php

    session_start();
    include 'config.php';
    
    $applicantId = $_SESSION['id'];

    
    $jobId = $_POST['jobId'];
    $employerId = $_POST['employerId'];

    $employeeQuery = "SELECT * FROM `employee` WHERE id = '$applicantId'";
    $employeeResult = mysqli_query($conn, $employeeQuery); 
    $employeeRow = mysqli_fetch_assoc($employeeResult);

    $resume = $employeeRow['resume'];
    $fullName = $employeeRow['firstName']." ".$employeeRow['lastName'];
    $applicantEmail = $employeeRow['email'];
    
    

    $JobQuery = "SELECT * FROM `job` WHERE id = '$jobId'";
    $jobResult = mysqli_query($conn, $JobQuery); 
    $jobRow = mysqli_fetch_assoc($jobResult);
    
    $jobName = $jobRow['JobName'];

    //fixes date format for phpMyAdmin

    $dateOfApplication = date("Y-m-d");


    $Insquery = "INSERT INTO `application`(`employeeId`, `employerId`, `resume`, `nameOfApplicant`, `emailOfApplicant`, `dateOfApplication`, `jobName`) VALUES ('$applicantId','$employerId','$resume','$fullName','$applicantEmail','$dateOfApplication','$jobName')";
    $ApplicationQuery = mysqli_query($conn, $Insquery);

    header('location:index.php');

    

    
?>