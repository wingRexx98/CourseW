<?php
session_start();

// get current script running
$current_page = basename($_SERVER["SCRIPT_FILENAME"], '.php');
// Check if the user is already logged in, if yes then check if authorized
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
if(isset($_SESSION["role"]) && $_SESSION["role"] != 1){
    // Set location according to role
    switch ($current_page) {
    case "studenthome":
        if ($_SESSION["role"] != 5){die("Unauthorized access.");}
        break;
    case "coordinatorhome":
        if ($_SESSION["role"] != 3){die("Unauthorized access.");}
        break;
    case "HomePage-Marketing-Manager":
        if ($_SESSION["role"] != 4){die("Unauthorized access.");}
        break;
    case 4:
        
        break;
    case 5:
        
        break;
    default:
        break; 
    }
}
}else{
    header("location: login.php");
}

?>