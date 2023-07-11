<?php
    session_start();

    error_reporting(0);
    include 'config.php';
    
    $id = $_SESSION['id'];

    $result = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id` = '$id'");
    $rows = mysqli_fetch_assoc($result);
    

    $resume = $rows['resume'];
    $firstName = $rows['firstName'];
    $lastName = $rows['lastName'];
    $course = $rows['course'];
    $email = $rows['email'];
    $studentNumber = $rows['studentNumber'];
    $resume = $rows['resume'];
    $stat = $rows['stat'];
    $campus = $rows['campus'];
    $env = $rows['workEnvironment'];
    $address = $rows['address'];
    $contactNumber = $rows['contactNumber'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/new-basic.css">
    <link rel="stylesheet" href="../css/navbar.css">

    <link rel="stylesheet" href="../css/profile.css">
    <title>Job Placement</title>

    

    

</head>
<body>

<div style="padding: 5px; background-color: #044434; color: white;">
        <nav>
            <a href="index.php"><img src="../img/cvsulogo.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php 

                    session_start();
                    include 'config.php';
                    

                    $inputEmail = $_SESSION['email'];
                    
                    $result = mysqli_query($conn, "SELECT * FROM `employer` WHERE `email` = '$inputEmail'"); //gets the info that matches the email from the database
                    $rows = mysqli_fetch_assoc($result); //fetches the result and stores them
                    
                    $accountType = $rows['accountType'];

                    if(isset($_SESSION['email'])){ //checks if the user is already logged in by checking if session(email) is set.
                        

                            if($accountType == 'employer'){
                                ?> <li><a href="employerProfile.php">Profile</a></li> <?php
                            }else {
                    ?>
                            <li><a href="profile.php">Profile</a></li>
                            
                    <?php
                            }   
                    }
                    else {
                    ?>
                        <li><a href="employeeLoginPage.php">Profile</a></li>
                    <?php
                    }
                    ?>
                    <?php 

                    if(isset($_SESSION['email'])){ //checks if the user is already logged in by checking if session(email) is set.
                    ?>
                        <li><a href="logout.php">Log out</a></li>
                    <?php
                    }
                    else {
                    ?>
                        <li><a href="employeeLoginPage.php">Log In</a></li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </nav>
    </div>

    <div class="basic-inner-box" style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.1)),url(../img/profbg.png); color: white" >
        
        <div class="edit-button">
            <a class="btn btn-info" href="employeeMessages.php">MESSAGES</a>
        </div>
    
    
        <div class="information">

        <?php
                    
                    if(isset($_POST['submit']) && isset($_FILES['img'])){

                        $img_name = $_FILES['img']['name'];
                        $img_size = $_FILES['img']['size'];
                        $tmp_name = $_FILES['img']['tmp_name'];
                        $error = $_FILES['img']['error'];

                        if($error == 0){
                            $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ext_lc = strtolower($img_ext);
                            $allowed_ext = array("jpg", "jpeg", "png");

                            if(in_array($img_ext_lc, $allowed_ext)){
                                $new_img_name = uniqid("IMG-", true).'.'.$img_ext_lc;
                                $img_up_path = '../uploads/'.$new_img_name;
                                move_uploaded_file($tmp_name, $img_up_path);
            
                                $seshId = $_SESSION['id'];
                                $ins = "UPDATE `employee` SET `img`='$new_img_name' WHERE `id` = '$seshId'";
                                mysqli_query($conn, $ins);
            
                                $sid = "SELECT * from employee WHERE img = '$new_img_name'";
                                $sidd = mysqli_query($conn, $sid);
                                $rows = mysqli_fetch_assoc($sidd);
            
                                $id = $rows["id"];
            
                                $imgsearch = "SELECT * FROM employee WHERE id = '$id'";
                                $res = mysqli_query($conn, $imgsearch);
            
                                $img_upload = mysqli_fetch_assoc($res);
                                    ?><div class="album">
                                            <!--<img src= "../uploads/<?=$img_upload['img']?>">-->
                                    </div>
                                <?php
                            }
                            else{
                                echo "You can`t upload this file type.";
                            }

                        }

                       
                    }
                ?>

            <div class="profile-picture" style="float:left;">

            <?php
                $imgsearch1 = "SELECT * FROM employee WHERE id = '$id'";
                $res1 = mysqli_query($conn, $imgsearch1);
                $img_upload1 = mysqli_fetch_assoc($res1);

                $imageChecker = $img_upload1['img'];
                if($imageChecker != ""){
                ?>

                    <img src="../uploads/<?=$img_upload1['img']?>"  alt="" style="width:190px; height:190px">

                <?php
                }
                else{
                ?>
                    <img src="../img/default_image.jpg" alt="">
                <?php
                }
                ?>
                

            </div>
        
            <div class="side-picture-info">
                <h1 class="text-uppercase">Name: <?php echo $lastName ?>, <?php echo $firstName ?></h1>
                <h3><?php
                    if ($course == "BSIT"){
                        echo "Bachelor of Science in Information Technology";
                    }
                    if ($course == "BSCS"){
                        echo "Bachelor of Science in Computer Science";
                    } 
                    if ($course == "BSBM"){
                        echo "Bachelor of Science in Business Management";
                    }    
                    if ($course == "BSHM"){
                        echo "Bachelor of Science in Hospitality Management";
                    }   
                    if ($course == "BSOA"){
                        echo "Bachelor of Science in Office Administration";
                    }        
                    if ($course == "BSEd"){
                        echo "Bachelor of Science in Office Administration";
                    }       
                    if ($course == "BS Psych"){
                        echo "Bachelor of Science in Psychology";
                    }    
                    if ($course == "AB Journ"){
                        echo "Bachelor of Arts in Journalism";
                    }        
                    if ($course == "BS Entrep"){
                        echo "Bachelor of Science in Entrepreneurship";
                    }        
                                    
                    ?></h3>
                <h4><?php echo $email ?> | <?php echo $studentNumber ?> | <?php echo $stat ?></h4>
                
                <form action="#" method="post" enctype="multipart/form-data">
                    <div style="">
                        <input type="file" name="img" class="form-control" style="width:6.7%; float:left;margin-right:5px">
                        <input type="submit" value="Upload" name="submit" class="form-control" style="width:7%;">
                    </div>
                </form>
                
            </div>
            
            <hr>

            <h1>Education:</h1>
            <div class="move-right">
                <h3 class="text-uppercase"><?php echo $campus ?></h3>
                <h3><?php echo $course ?></h3>
            </div>
            
            <hr>

            <h1>Additional Info:</h1>

            <div class="move-right">
                <h3 class="text-uppercase">Address: <?php echo $address ?></h3>
                <h3 class="text-uppercase">Contact No.: <?php echo $contactNumber ?></h3>
                <h3 class="text-uppercase">Preferred work evironment:
                    <?php
                    if ($env == "wfh"){
                        echo "Work From Home";
                    }
                    else {
                        echo "On-Site";
                    }                 
                    ?>
                </h3>
                <br>
                <div style="color:white;">

                
                </div>

                
                <h3 for="">RESUME UPLOAD: <?php echo $resume; ?></h3>
                <form action="resumeUpload.php" method="post" enctype="multipart/form-data">
                    <div style="">
                        <input type="file" name="resume" style="display:inline" class="btn btn-success">
                        <input type="submit" value="Upload" name="submit" class="btn btn-warning">
                    </div>
                </form>
            </div>

           

        </div>
        
    </div>
            <?php
                echo $resname;
            ?>


    <footer style="background-color: #044434;">

    </footer>




    
</body>
</html>