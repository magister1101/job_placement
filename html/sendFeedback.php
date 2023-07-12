<?php

    include 'config.php';

    $feedbackName = $_POST['name'];
    $content = $_POST['content'];
    $businessName = $_POST['businessName'];
    $dateOfCreation = date("Y-m-d");

    $empRes = mysqli_query($conn, "SELECT * FROM `employer` WHERE `businessName` = '$businessName'");
    $empRows = mysqli_fetch_assoc($empRes);

    echo $employerId = $empRows['id'];


    $ins = mysqli_query($conn, "INSERT INTO `review`(`name`, `employerId`, `dateCreated`, `content`) VALUES ('$feedbackName' ,'$employerId' ,'$dateOfCreation', '$content')");
    
    echo $feedbackName = $_POST['name'];
    echo $content = $_POST['content'];
    echo $businessName = $_POST['businessName'];
    echo $dateOfCreation = date("Y-m-d");
    
    header("Location:company.php?businessName=$businessName");
    

?>