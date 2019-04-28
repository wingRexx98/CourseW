<?php
// Authentication
require_once "authenticator.php";
// Include config file
require_once "config.php";

$studentemail = $_GET['student'];
$date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 14 days'));

function getFacultyName($conn)
{
    $sql = "SELECT username FROM user WHERE role_id = 4 AND faculty_id = " . $_SESSION["faculty"] . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $username = $row['username'];
        }
    }
}


$to      = 'tunmgch16383@gmail.com';
$subject = 'New Submission in The Newspaper Management System.';
$message = '
Hello '.$username.'.
There is a new submission on the NMS.
Submission is from the: '.$studentemail.'
Please log on and review it at your earliest convenient. Comment function will be available till '.$date.'

(This is an automated message, please do not respond to this message)
';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?> 

