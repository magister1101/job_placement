<?php
    
    session_start();
    include 'config.php';
    
    if(isset($_POST['submit']) && isset($_FILES['resume'])){

        $resume_name = $_FILES['resume']['name'];
        $resume_size = $_FILES['resume']['size'];
        $tmp_name = $_FILES['resume']['tmp_name'];
        $error = $_FILES['resume']['error'];

        if($error == 0){
            $resume_ext = pathinfo($resume_name, PATHINFO_EXTENSION);
            $resume_ext_lc = strtolower($resume_ext);
            $allowed_ext = array("pdf","docx", "jpg", "jpeg", "png");

            if(in_array($resume_ext_lc, $allowed_ext)){
                $new_resume_name = uniqid("resume-", true).'.'.$resume_ext_lc;
                $resume_up_path = '../uploads/'.$new_resume_name;
                move_uploaded_file($tmp_name, $resume_up_path);

                $seshId = $_SESSION['id'];
                $ins = "UPDATE `employee` SET `resume`='$new_resume_name' WHERE `id` = '$seshId'";
                mysqli_query($conn, $ins);

                $sid = "SELECT * from employee WHERE resume = '$new_resume_name'";
                $sidd = mysqli_query($conn, $sid);
                $rows = mysqli_fetch_assoc($sidd);

                $id = $rows["id"];

                $resumesearch = "SELECT * FROM employee WHERE id = '$id'";
                $res = mysqli_query($conn, $resumesearch);

                $resume_upload = mysqli_fetch_assoc($res);
                
                header('location:profile.php');
                
            }
            else{
                echo "You can`t upload this file type.";
            }

        }

        
    }
?>
