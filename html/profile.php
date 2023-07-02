<?php
    session_start();

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
    <title>Profile</title>

</head>
<body>

    <div class="nav-sm-12" style="padding: 5px; background-color: #044434; color: white;">
        <h1>NAVBAR</h1>
    </div>
    

    <div class="basic-inner-box">
        <?php
        
            echo $firstName;

        ?>
    </div>

    <footer style="background-color: #044434;">

    </footer>




    
</body>
</html>