<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg1.css">
    <link rel="stylesheet" href="../css/navbar.css">
    

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

                    error_reporting(0);
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
    

    <div class="body">
        <div class="inner-body">
            <div class="reg-box">
                <form action="employerReg.php" method="post">

                    <!--first register form-->

                    <div id="firstReg" style="display: block; margin-bottom: 5%;">

                        <h1 style="margin-bottom: 5%;" >Employer Register</h1>


                        <div style="text-align: justify; margin-bottom: 8%;">
                            
                            <label for="" style="margin-left: 1%;">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email" style="margin-bottom: 2%; margin: 1%; width: 98%;" required>

                            <label for="" style="margin-left: 1%;">Contact Person Name:</label>
                            <input type="text" name="contactPersonName" id="contactPersonName" class="form-control" placeholder="Enter Contact Person Namer" style="margin-bottom: 2%; margin: 1%; width: 98%;" required> 

                            <label for="" style="margin-left: 1%;">Registered Business Name:</label>
                            <input type="text" name="businessName" id="businessName" class="form-control" placeholder="Enter Registered Business Name" style="margin-bottom: 2%; margin: 1%; width: 98%;" required>

                            <label for="" style="margin-left: 1%;">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" style="margin-bottom: 2%; margin: 1%; width: 98%;" required>
                            
                        </div>

                        <div class="innerfirstreg" style="text-align: justify; display: flex; flex-direction: row;">
                            
                            <div style="width: 50%; margin: 1%;">
                                <input type="submit" class="btn btn-warning" value="Register">
                            </div>
                            
                            <div style="width: 50%; margin: 1%; text-align: right;">
                                <a href="employeeReg1.php" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Employee Signup</a>
                            </div>
                        </div>
                       

                    </div>



                    
                </form>
            </div>
        </div>
    </div>



    <footer style="background-color: #044434;">

    </footer>
    
</body>
</html>