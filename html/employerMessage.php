<?php
    error_reporting(0);
    session_start();

    include 'config.php'

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
    <link rel="stylesheet" href="../css/employerMessage.css">
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
    

    <div class="body">
        <div class="inner-body" style="height:50vh">
            <div class="reg-box" style="text-align:left;">
            
                    <form action="sendMessage.php" method="post">

                        <label for="email"">Email:</label>
                        <input type="text" name="destinationEmail" id="email" class="form-control" placeholder="Enter email" style="margin-bottom: 2%; width: 50%;" required>

                        <label for="content">Content:</label>
                        <textarea name="content" id="" cols="30" rows="5" class="form-control" style="margin-bottom: 2%;" placeholder="Enter content"></textarea>

                        <button type="submit" class="btn btn-warning">Send</button>

                    </form>

            </div>
        </div>

        <div class="inner-body">
            <div class="reg-box message-box" style="text-align:left;">
 
                <h1>Messages</h1>

                <?php
                    if(is_array($fetchData)){      
                    $sn=1;
                    foreach($fetchData as $data){
                    ?>
                    <tr>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $data['fullName']??''; ?></td>
                    <td><?php echo $data['gender']??''; ?></td>
                    <td><?php echo $data['email']??''; ?></td>
                    <td><?php echo $data['mobile']??''; ?></td>
                    <td><?php echo $data['address']??''; ?></td>
                    <td><?php echo $data['city']??''; ?></td>
                    <td><?php echo $data['state']??''; ?></td>  
                    </tr>
                    <?php
                    $sn++;}}else{ ?>
                    <tr>
                        <td colspan="8">
                    <?php echo $fetchData; ?>
                    </td>
                    <tr>
                    <?php
                    }?>
            </div>
        </div>
    </div>



    <footer style="background-color: #044434;">

    </footer>
    
</body>
</html>
</body>
</html>