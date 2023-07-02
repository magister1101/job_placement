<?php
    session_start();

    error_reporting(0);
    include 'config.php';
    
    $id = $_SESSION['id'];

    $result = mysqli_query($conn, "SELECT * FROM `employee` WHERE `id` = '$id'");
    $rows = mysqli_fetch_assoc($result);

    $firstName = $rows['firstName'];
    $lastName = $rows['lastName'];
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
    <title>Profile</title>

</head>
<body>

    <div style="padding: 5px; background-color: #044434; color: white;">
        <nav>
            <a href="index.php"><img src="../img/cvsulogo.png"></a>
            <div class="nav-links">
                <ul>
                    <li class="search-container">
                    <form action="/search" method="get">
                        <input type="text" name="query" placeholder="Search...">
                        <button type="submit">Search</button>
                    </form>
                </li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Companies</a></li>
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
    

    <div class="basic-inner-box">
        
        <h1>
            <?php
                echo $firstName;
            ?>
        </h1>
        
    </div>

    <footer style="background-color: #044434;">

    </footer>




    
</body>
</html>