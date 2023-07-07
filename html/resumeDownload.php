<?php

include 'config.php';

session_start();

$id = $_SESSION['id'];

$result = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id` = '$id'");
$rows = mysqli_fetch_assoc($result);


$resname = $rows['resume'];


if(!empty($resname)){
    if(isset($_POST['download']) && isset($resname)){
        $filename= basename($resname); //dito pinasa ko naman ung name ng file sa filename
        $filepath= '../uploads/'.$filename; //after that dito naman ichecheck ni php if may file sa folder ng pinaguploadan which is ung resume folder na ginawa ko na kung saan doon nasstore lahat ng inuupload ni user na resume.

        echo $filepath;
        if(!empty($filename) && file_exists($filepath)){
            header("Cache-control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/zip");
            header("COntent-Transfer-Encoding: binary"); //dunno what kind of shit is this pero what I know it`s working. Basta ito daw ung pantawag sa dialogue box kapag idodownload na.
            readfile($filepath);
            exit;
        }else{
            echo "This file does not exist.";
        }
    }
}