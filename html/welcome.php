<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        session_start();

        if(isset($_SESSION['email'])){

            echo"<h1>welcome page</h1>";
            echo"<a href='logout.php'><input type='button' value='logout' name='logout'>";

        }
        else{
            echo"<script>location.href='employeeLogin.html'</script>";
        }


        

    ?>
    

</body>
</html>