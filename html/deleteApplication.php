<?php 

    session_start();
    include 'config.php';

    $jobId = $_POST['messageId'];

    echo $jobId;

    $JobQueryDelete = "DELETE FROM `messages` WHERE `id` = '$jobId'";
    $jobResultDelete = mysqli_query($conn, $JobQueryDelete); 

    echo "<script>alert('JOB POST DELETED')</script>";
    echo "<script>location.href='jobPosting.php'</script>";

    
?>