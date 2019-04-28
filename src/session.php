<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // Set location according to role
    switch ($_SESSION["role"]) {
    case 1:
        header("location: adminhome.php");
        break;
    case 2:
        header("location: guesthome.php");
        break;
    case 4:
        header("location: manager.php");
        break;
    case 3:
        header("location: coordinatorhome.php");
        break;
    case 5:
        header("location: studenthome.php");
        break;
    default:
        header("location: index.php");
    }
}
?>
