<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg1.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>INDEX</title>
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
                    <li><a href="employeeLoginPage.php">Log In</a></li>
                </ul>
            </div>
        </nav>
    </div>
    

    <div class="body">
        <div class="inner-body">
            <div class="reg-box">
            
                    <div style="display: block; margin-bottom: 5%;">
                        <h1 style="margin-bottom: 5%;" >WELCOME</h1>
                        <form action="employeeLoginPage.php" method="POST">
                            <div style="text-align: center; margin-bottom: 2%;">
                                <button type="submit" class="btn btn-warning" id="" style="margin-bottom: 5%;">Start</button>
                            </div>
                        </form>
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