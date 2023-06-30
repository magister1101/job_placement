<?php 
error_reporting(0);
$email = $_GET['email'];
$university = $_GET['university'];
$status = $_GET['status'];
$course = $_GET['course'];
$exp = $_GET['exp'];
$env = $_GET['env'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg1.css">
    <link rel="stylesheet" href="modal.css">

    <title>Document</title>
</head>
<body>

    <div class="nav-sm-12" style="padding: 5px; background-color: #044434; color: white;">
        <h1>test</h1>
    </div>
    

    <div class="body">
        <div class="inner-body">
            <div class="reg-box">
                
                 <?php if($university == "") {?>
                    <!--second register form-->
                    <div id="secondReg" style="display: block; margin-bottom: 5%;">
                        <form action="" method="GET">
                            <h1 style="margin-bottom: 5%;" >University?</h1>
                            <input type="text" name="university" id="" class="form-control" placeholder="Enter your Campus" style="margin-bottom: 2%;">
                            <input type="hidden" name="email" value="<?php echo $email; ?>" id="" class="form-control" placeholder="Enter your Campus" style="margin-bottom: 2%;">
                            <button type="submit" class="btn btn-success">Next</button>    
                        </form>
                    </div>
                    <?php } ?>

                    <?php if($university != "" && $status == "" && $course == "" && $exp == "") {?>
                        <!--third register form-->
                        <div id="thirdReg">
                            <div style="display:flex; flex-direction: column;">
                                <h1 style="margin-bottom: 5%;" >Are you a?</h1>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=Alumni" class="btn btn-success" style="margin-bottom: 2%;">Alumni</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=Undergraduate" class="btn btn-success" style="margin-bottom: 2%;">Undergraduate</a>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <?php if($university != "" && $status != "" && $course == "" && $exp == "") {?>
                        <!--fourth register form-->
                        <div id="fourthReg">

                            <div style="display:flex; flex-direction: column;">
                                <h1 style="margin-bottom: 5%;" >Course:</h1>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BSIT" class="btn btn-success" style="margin-bottom: 2%;">BSIT</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BSCS" class="btn btn-success" style="margin-bottom: 2%;">BSCS</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BSBM" class="btn btn-success" style="margin-bottom: 2%;">BSBM</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BSHM" class="btn btn-success" style="margin-bottom: 2%;">BSHM</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BSOA" class="btn btn-success" style="margin-bottom: 2%;">BSOA</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BSE" class="btn btn-success" style="margin-bottom: 2%;">BSE</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BS Psych" class="btn btn-success" style="margin-bottom: 2%;">BS Psych</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=AB Journ" class="btn btn-success" style="margin-bottom: 2%;">AB Journ</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=BS Entrep" class="btn btn-success" style="margin-bottom: 2%;">BS Entrep</a>
                            </div>

                        </div>
                    <?php } ?>
                    
                    <?php if($university != "" && $status != "" && $course != "" && $exp == "") {?>
                        <!--fifth register form-->
                        <div id="fifthReg">

                            <div style="display:flex; flex-direction: column;">
                                <h1 style="margin-bottom: 5%;" >Have work experience?</h1>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=<?php echo $course?>&exp=yes" class="btn btn-success" style="margin-bottom: 2%;">Yes</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=<?php echo $course?>&exp=no" class="btn btn-success" style="margin-bottom: 2%;">No</a>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($university != "" && $status != "" && $course != "" && $exp != "") {?>
                        <!--sixth register form-->
                        <div id="sixthReg" style="display:;">

                            <div style="display:flex; flex-direction: column;">
                                <h1 style="margin-bottom: 5%;" >Preferred work environment?</h1>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=<?php echo $course?>&exp=<?php echo $exp ?>&env=yes" class="btn btn-success" style="margin-bottom: 2%;">Yes</a>
                                <a href="employeeregister.php?email=<?php echo $email?>&university=<?php echo $university; ?>&status=<?php echo $status; ?>&course=<?php echo $course?>&exp=<?php echo $exp ?>&env=no" class="btn btn-success" style="margin-bottom: 2%;">No</a>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($university != "" && $status != "" && $course != "" && $exp != "" && $env != "") {
                    
                        echo $email, $university, $status, $course, $exp, $env;

                        $conn = new mysqli('localhost','root','','accounts');
                        $update = "UPDATE employee SET campus='$university', stat='$status', course='$course', workExperience='$exp', workEnvironment='$env' WHERE email='$email' ";
                        $updrun = mysqli_query($conn, $update);
                        header("Location:employeeLogin.html");

                    }
                    ?>

            </div>
        </div>
    </div>



    <footer style="background-color: #044434;">

    </footer>
    
</body>
</html>