<?php
    session_start();

    include 'config.php';

    $userEmail = $_SESSION['email'];
    $resultEmployer = mysqli_query($conn, "SELECT * FROM `employer` WHERE `email` = '$userEmail'");
    $rowsEmployer = mysqli_fetch_assoc($resultEmployer);


    $employerId = $rowsEmployer['id'];
    $inputJobName = $_POST['jobName'];
    $inputSalary = $_POST['salary'];
    $inputCategory = $_POST['category'];
    $inputJobDescription = $_POST['jobDescription'];


    $query = "INSERT INTO `job`(`category`, `employerId`, `JobName`, `salary`, `JobDescription`) VALUES ('$inputCategory' ,'$employerId', '$inputJobName', '$inputSalary', '$inputJobDescription')";
    $insertJob = mysqli_query($conn, $query);

    header('location:jobPosting.php');





?>