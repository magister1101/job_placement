<?php
    session_start();

    error_reporting(0);
    include 'config.php';
    
    $id = $_SESSION['id'];

    $result = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id` = '$id'");
    $rows = mysqli_fetch_assoc($result);

    $employeeId = $rows['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/new-basic.css">
    <link rel="stylesheet" href="../css/navbar-messages.css">

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
    </div>

    <?php

        $contentQuery = "SELECT * FROM `message` ORDER BY `id` desc";
        $cqResult = mysqli_query($conn,$contentQuery);      
    
    ?>

    <div class="basic-inner-box jobs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card-mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">MESSAGES</h2>
                        </div>
                         <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td class="text-light bg-success text-uppercase" style="width:10%">Date Recieved</td>
                                    <td class="text-light bg-success text-uppercase">Business Name</td>
                                    <td class="text-light bg-success text-uppercase">Sender Email</td> <!--employer email-->
                                    <td class="text-light bg-success text-uppercase">Content</td>
                                </tr>
                                <tr>
                                    <?php
                                        while($cqRow = mysqli_fetch_assoc($cqResult)){
                                    ?>
                                            <?php
                                                if($employeeId == $cqRow['employeeId']){
                                                    
                                                    $employerId = $cqRow['employerId'];

                                                    $idToEmail = mysqli_query($conn, "SELECT * FROM `employer` WHERE `id` = '$employerId'");
                                                    $idToEmailRows = mysqli_fetch_assoc($idToEmail);

                                                    $idToEmail2 = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id` = '$employeeId'");
                                                    $idToEmailRows2 = mysqli_fetch_assoc($idToEmail2);

                                                    
                                            ?>
                                        <td><?php echo $cqRow['dateCreated']?></td>
                                        <td><?php echo $idToEmailRows['businessName']?></td>
                                        <td><?php echo $idToEmailRows['email']?></td>
                                        <td><?php echo $cqRow['content']?></td>
                                            
                                </tr>
                                    <?php
                                                }
                                        }
                                    ?>
                                
                            </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer style="background-color: #044434;">

    </footer>




    
</body>
</html>