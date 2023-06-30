<?php
session_start();

if(isset($_SESSION['email'])){ 

    session_destroy(); //destroys the session.
    echo"<script>location.href='employeeLogin.html'</script>";

}
else{ //if not logged in but manages to get to click the logout, it will automatically redirect to login page.
    echo"<script>location.href='employeeLogin.html'</script>";
}



?>