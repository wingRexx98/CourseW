<?php
session_start();

// get current script running
$current_page = basename($_SERVER["SCRIPT_FILENAME"], '.php');
// Check if the user is already logged in, if yes then check if authorized
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if (isset($_SESSION["role"]) && $_SESSION["role"] != 1) {
        $role = $_SESSION["role"];
        // Set location according to role
        switch ($role) {
            case "5":
                if ($current_page == "studenthome" or $current_page == "viewComment" or $current_page = "mail") {
                    
                }else{
                    die("Unauthorized access.");
                }
                break;
            case "4":

                if ($current_page == "manager" or $current_page == "viewComment") {
                }else{
                    die("Unauthorized access.");
                }
                break;
            case "3":
                if ($current_page == "coordinatorhome" or $current_page == "updateComment" or $current_page == "commentDelete") {}else{
                    die("Unauthorized access.");
                }
                break;
            case "2":
                if ($current_page == "guesthome" or $current_page == "viewComment") {
                    
                }else{
                    die("Unauthorized access.");
                }
                break;
//            case 1:
//                if ($current_page != "adminhome") {
//                    die("Unauthorized access.");
//                }
//                break;
            default:
                break;
        }
    }
} else {
    header("location: index.php");
}
