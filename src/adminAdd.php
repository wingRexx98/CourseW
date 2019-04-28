<?php
ob_start();
// Authentication
require_once "authenticator.php";
// Include config file
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"])){
        addUser($conn);
    }
    if (isset($_POST["rolename"])){
        addRole($conn);
    }
    if (isset($_POST["facultyname"])){
        addFalc($conn);
    }
    if (isset($_POST["closuredate"])){
        addClosure($conn);
    }
}

function addUser($conn){
    $role_id = $_POST["role"];
    $faculty_id = $_POST["select"];
    $username = $_POST["username"];
    $password = $_POST["password"];
$sql = "INSERT INTO `user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('".$role_id."', '".$faculty_id."', '".$username."', MD5('".$password."'));
";
    
                if ($conn->query($sql) === true) {
                    $success_word = "Your file was uploaded successfully.";
                } else {
                    $error_word = "Error: " . $sql . "<br>" . $conn->error;
                }
}

function addRole($conn){
    $role_name = $_POST["rolename"];
$sql = "INSERT INTO `role` (`role_name`) VALUES ('".$role_name."');";
    
                if ($conn->query($sql) === true) {
                    $success_word = "Your file was uploaded successfully.";
                } else {
                    $error_word = "Error: " . $sql . "<br>" . $conn->error;
                }
}

function addFalc($conn){
    $facultyname = $_POST["facultyname"];
$sql = "INSERT INTO `faculty` (`faculty_name`) VALUES ('".$facultyname."');";
    
                if ($conn->query($sql) === true) {
                    $success_word = "Your file was uploaded successfully.";
                } else {
                    $error_word = "Error: " . $sql . "<br>" . $conn->error;
                }
}

function addClosure($conn){
    $closuredate = $_POST["closuredate"];
$sql = "INSERT INTO `closure` (`academic_year`, `closure_date`) VALUES (YEAR('".$closuredate."'), '".$closuredate."');
";
    
                if ($conn->query($sql) === true) {
                    $success_word = "Your file was uploaded successfully.";
                } else {
                    $error_word = "Error: " . $sql . "<br>" . $conn->error;
                }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>