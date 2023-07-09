<?php
    error_reporting(0);
    session_start();
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg1.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/new-basic.css">
    <link rel="stylesheet" href="../css/indexPage.css">
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

    <div class="underPic">
        <h1 class="text-center">CvSU Job Seekers</h1> 
    </div>

    <?php

        $jobClick = $_GET['jobClick'];

    
        $JobQuery = "SELECT * FROM `job` WHERE id = '$jobClick'";
        $jobResult = mysqli_query($conn, $JobQuery); 
        $jobRow = mysqli_fetch_assoc($jobResult);
                    
        $employerId = $jobRow['employerId'];

        $employerQuery = "SELECT * FROM `employer` WHERE id = '$employerId'";
        $employerResult = mysqli_query($conn, $employerQuery); 
        $employerRow = mysqli_fetch_assoc($employerResult);

        $businessName = $employerRow['businessName'];
    
    ?>
    
    
    <div class="basic-inner-box" >

        <a href="index.php" type="button" class="btn btn-warning back-btn">Back</a>
            <div class="row">
                <div class="col-sm first-col">
                    <h1 class="text-uppercase"><?php echo $businessName ?></h1>
                    <h2 class="text-uppercase">Job: <?php echo $jobRow['JobName']?></h2>
                    <h3 class="text-uppercase">category: <a style="text-decoration:none; color: #1d1d1d"href="index.php?filter=<?php echo $jobRow['category']?>"><?php echo $jobRow['category']?></a></h3>
                    <h3 class="text-uppercase">CONTACT PERSON: <?php echo $employerRow['contactPersonName']?></h3>
                    <h3>EMAIL: <?php echo $employerRow['email']?> </h3>
                    <h3>SALARY: <?php echo $jobRow['salary']?></h3>
                    <br>
                    <h3 class="text-uppercase">JOB DESCRIPTION:</h3>
                    <p><?php echo $jobRow['JobDescription']?></p>

                </div>
                <div class="col-sm second-col">
                    <h1></h1>
                </div>
            </div>
            <?php
                if(isset($_SESSION['email'])){
            ?>
                    <div class="apply-div">
                        <form action="apply.php" method="POST">
                            <input type="text" name="jobId" style="display:none"  value="<?php echo $jobClick ?>" >
                            <input type="text" name="employerId" style="display:none" value="<?php echo $employerId ?>">
                            <input type="submit" class="btn btn-info apply-btn" value="SEND APPLICATION">
                        </form>
                    </div>
                        
                    <?php
                } 
                else {
                    ?>

                    <div class="apply-div">
                        <a href="employeeLoginPage.php" type="button" class="btn btn-info apply-btn">SEND APPLICATION</a>
                    </div>

                    <?php

                }
                ?>
                
    
    </div>

    
    



    <footer style="background-color: #044434;">

    </footer>
    
</body>
</html>
</body>
</html>