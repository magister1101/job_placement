<?php
    session_start();
    include 'config.php';

    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
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
    <link rel="stylesheet" href="../css/side-navbar.css">
    <link rel="stylesheet" href="../css/profile.css">
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

    <div class="side-navbar">
        <ul>
            <li><a href="employerProfile.php">Profile</a></li>
            <li><a href="jobPosting.php">Job Posting</a></li>
            <li><a class="active" href="applicants.php">Applicants</a></li>
            <li><a href="messages.php">Messages</a></li>
        </ul>
    </div>


    
    
    <?php
        $id = $_SESSION['id'];
        $AppQuery = "SELECT * FROM `application` WHERE `employerId` = '$id' ORDER BY `id` desc";
        $AppResult = mysqli_query($conn, $AppQuery);    


        


        
    
    ?>

    <div class="basic-inner-box jobs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card-mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">APPLICANTS</h2>
                        </div>
                         <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td class="text-light bg-success text-uppercase">Applicant Name</td>
                                    <td class="text-light bg-success text-uppercase">Email</td>
                                    <td class="text-light bg-success text-uppercase">Date of Application</td>
                                    <td class="text-light bg-success text-uppercase">Job Applied for</td>
                                    <td class="text-light bg-success text-uppercase">Resume</td>
                                    
                                <tr>
                                    <?php
                                        while($appRow = mysqli_fetch_assoc($AppResult)){
                                    ?>
                                            
                                                        <td class="text-uppercase"><?php echo $appRow['nameOfApplicant']?></td>
                                                        <td><?php echo $appRow['emailOfApplicant']?></td>
                                                        <td><?php echo $appRow['dateOfApplication']?></td>
                                                        <td class="text-uppercase"><?php echo $appRow['jobName']?></td>
                                                        

                                                        <?php 
                                                        
                                                        $employeeId = $appRow['employeeId'];
                                                        
                                                        $employeeResQue = "SELECT * FROM `employee` WHERE `id` = '$employeeId'";
                                                        $employeeResResult = mysqli_query($conn, $employeeResQue); 
                                                        $employeeRow = mysqli_fetch_assoc($employeeResResult);

                                                       
                                                        ?>
                                                        

                                                        <form action="resumeDownload.php" method="post">
                                                            
                                                        <?php 
                                                            
                                                            $resname = $employeeRow['resume'];?>
                                                            <td>
                                                                <?php
                                                                    if($resname != null){
                                                                ?>
                                                                <input type="text" name="employeeId" value="<?php echo $employeeId ?>" style="display:none">
                                                                <?php echo $employeeRow['resume'];?> 
                                                                <input style="font-size:100%"class="btn btn-info" type="submit" name="download" value="download"/>   

                                                                <?php
                                                                }
                                                                else {
                                                                ?>
                                                                NO RESUME

                                                                <?php
                                                                }
                                                                
                                                                ?>
                                                            </td>
                                                        </form>
                                                            
                                </tr>
                                    <?php
                                                
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
</body>
</html>