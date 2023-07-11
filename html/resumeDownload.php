<?php

include 'config.php';

session_start();

$employeeId = $_POST['employeeId'];

$que = "SELECT * FROM `employee` WHERE `id` = '$employeeId'";
$res = mysqli_query($conn, $que); 
$row = mysqli_fetch_assoc($res);

$filename = $row['resume'];

$file_path = '../uploads/'.$filename;
$file_name = $filename;
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
readfile($file_path);


?>