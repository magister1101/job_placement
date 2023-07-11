<?php
    
    session_start();
    include 'config.php';
    
    if(isset($_POST['submit']) && isset($_FILES['resume'])){

        $resume_name = $_FILES['resume']['name'];
        $resume_size = $_FILES['resume']['size'];
        $tmp_name = $_FILES['resume']['tmp_name'];
        $error = $_FILES['resume']['error'];

        echo $resume_name; ?><br><?php

        if($error == 0){
            $resume_ext = pathinfo($resume_name, PATHINFO_EXTENSION);
            $resume_ext_lc = strtolower($resume_ext);
            $allowed_ext = array("pdf","docx", "jpg", "jpeg", "png");

            if(in_array($resume_ext_lc, $allowed_ext)){
                $new_resume_name = $resume_name;
                echo $new_resume_name;
                $resume_up_path = '../uploads/'.$new_resume_name;
                move_uploaded_file($tmp_name, $resume_up_path);

                $seshId = $_SESSION['id'];
                $ins = "UPDATE `employee` SET `resume`='$new_resume_name' WHERE `id` = '$seshId'";
                mysqli_query($conn, $ins);
                ?><br><?php echo $new_resume_name;
                header('location:profile.php');
                
            }
            else{
                echo "You can`t upload this file type.";
            }

        }

        
    }
?>
