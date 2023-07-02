<?php
    session_start();

    error_reporting(0);
    include 'config.php';
    
    $id = $_SESSION['id'];

    $result = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id` = '$id'");
    $rows = mysqli_fetch_assoc($result);

    $firstName = $rows['firstName'];
    $lastName = $rows['lastName'];
    $course = $rows['course'];
    $email = $rows['email'];
    $studentNumber = $rows['studentNumber'];
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
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/navbar.css">

    <link rel="stylesheet" href="../css/profile.css">
    <title>Profile</title>

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

                    if(isset($_SESSION['email'])){ //checks if the user is already logged in by checking if session(email) is set.
                    ?>
                        <li><a href="profile.php">Profile</a></li>
                    <?php
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

    <div class="basic-inner-box" style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(../img/profbg.png); color: white" >
        
        <div class="edit-button">
            <button type="button" class="btn btn-warning">EDIT</button>
        </div>
    
    
        <div class="information">

            <div class="profile-picture" style="float:left;">
                <img src="../img/default_image.jpg"  alt="">
            </div>
        
            <div class="side-picture-info">
                <h1>Name: <?php echo $lastName ?>, <?php echo $firstName ?></h1>
                <h3><?php
                    if ($course == "BSIT"){
                        echo "Bachelor of Science in Information Technology";
                    }
                    if ($course == "BSCS"){
                        echo "Bachelor of Science in Computer Science";
                    }                 
                    ?></h3>
                <h4><?php echo $email ?> | <?php echo $studentNumber ?> | <?php echo $stat ?></h4>
            </div>
            
            <hr>

            <h1>Education:</h1>
            <div class="move-right">
                <h3><?php echo $campus ?></h3>
                <h3><?php echo $course ?></h3>
            </div>
            
            <hr>

            <h1>Additional Info:</h1>

            <div class="move-right">
                <h3>Address: <?php echo $address ?></h3>
                <h3>Contact No.: <?php echo $contactNumber ?></h3>
                <h3>Preferred work evironment:
                    <?php
                    if ($env == "wfh"){
                        echo "Work From Home";
                    }
                    else {
                        echo "On-Site";
                    }                 
                    ?>
                </h3>
            </div>
         
        </div>
        
    </div>


    <footer style="background-color: #044434;">

    </footer>




    
</body>
</html>