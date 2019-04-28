<?php
// Authentication
require_once "authenticator.php";
// Include config file
require_once "config.php";


// sql to delete a record
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];
    if ($type == "user"){
        delUser($id, $conn);
    }
    if ($type == "role"){
        delRole($id, $conn);
    }
    if ($type == "faculty"){
        delFalc($id, $conn);
    }
    if ($type == "closure"){
        delClo($id, $conn);
    }
}

function delUser($id, $conn){
    $sql = "DELETE FROM user WHERE user_id=".$id.";";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo $sql;
        echo "Error deleting record: " . $conn->error;
    }
}

function delRole($id, $conn){
    $sql = "DELETE FROM role WHERE role_id=".$id.";";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo $sql;
        echo "Error deleting record: " . $conn->error;
    }
}

function delFalc($id, $conn){
    $sql = "DELETE FROM faculty WHERE faculty_id=".$id.";";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo $sql;
        echo "Error deleting record: " . $conn->error;
    }
}

function delClo($id, $conn){
    $sql = "DELETE FROM closure WHERE closure_id=".$id.";";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo $sql;
        echo "Error deleting record: " . $conn->error;
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
