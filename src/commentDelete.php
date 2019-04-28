<?php
ob_start();
// Authentication
require_once "authenticator.php";
// Include config file
require_once "config.php";

// sql to delete a record
if (isset($_GET['commentid'])) {
    $commentid = $_GET['commentid'];
    $sql = "DELETE FROM comment WHERE comment_id=".$commentid.";";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Fallback behaviour goes here
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
