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
    
    
    <div class="basic-inner-box main" >
        <?php
            $filter = $_GET['filter'];

        ?>
        
        <h1 class="text-center job-offers">Job Offers</h1> 
        
            <div class="filters">
                <div class="filter-word" style="float:left;">
                <h2 class="filter-word">Filter:</h2>
                </div>
                <a href="index.php?filter=Sales" name="filter" value="Sales" class="btn btn-info">Sales</a>
                <a href="index.php?filter=Technician" name="filter" value="Technician" class="btn btn-info">Technician</a>
                <a href="index.php?filter=Customer-Service" name="filter" value="Customer-Service" class="btn btn-info">Customer-Service</a>
                <a href="index.php?filter=Management" name="filter" value="Management" class="btn btn-info">Management</a>
                <a href="index.php?filter=Industries" name="filter" value="Industries" class="btn btn-info">Industries</a>
                <a href="index.php?filter=" name="filter" value="" class="btn btn-secondary">Clear</a>
            </div>
            <br>

            

        <?php
            $JobQuery = "SELECT * FROM `job` ORDER BY `id` desc";
            $jobResult = mysqli_query($conn, $JobQuery);    

            

            while($jobRow = mysqli_fetch_assoc($jobResult)){

                if($filter == $jobRow['category']){
        ?>
                        <a name="jobClick" href="jobDetails.php?jobClick=<?php echo $jobRow['id']?>" style="text-decoration: none;">
                            <div class="job-panel">
                                <h1><?php echo $jobRow['JobName']?></h1>
                                <h2><u>Salary:</u> <i class="text-uppercase"><?php echo $jobRow['salary']?></i></h2>
                                <h3><u>Category:</u> <i class="text-uppercase"><?php echo $jobRow['category']?></i></h3>
                                <hr>
                                <h4><u>Job Description:</u> 
                                <br>
                                <br>
                                <?php echo $jobRow['JobDescription']?></h4>
                            </div>
                        </a>
            <?php
                }
                else if($filter == ""){
                    ?>
                        <a name="jobClick" href="jobDetails.php?jobClick=<?php echo $jobRow['id']?>" style="text-decoration: none;">
                            <div class="job-panel">
                                <h1><?php echo $jobRow['JobName']?></h1>
                                <h2><u>Salary:</u> <i class="text-uppercase"><?php echo $jobRow['salary']?></i></h2>
                                <h3><u>Category:</u> <i class="text-uppercase"><?php echo $jobRow['category']?></i></h3>
                                <hr>
                                <h4><u>Job Description:</u> 
                                <br>
                                <br>
                                <?php echo $jobRow['JobDescription']?></h4>
                            </div>
                        </a>
                    

                    <?php

                }
            }
            ?>
    </div>

    
    



    <footer style="background-color: #044434;">

    </footer>
    
</body>
</html>
</body>
</html>