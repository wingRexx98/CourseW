<?php
ob_start();
require_once "config.php";
$files = array();
$facultyId = $_GET['facultyid'];
$sql = "SELECT * FROM submission INNER JOIN user ON submission.user_id = user.user_id WHERE publication = 1 AND faculty_id =" .$facultyId.";";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    $rowno = 0;
    while($row = $result->fetch_assoc()) {
       
        if($row['image_url'] == "image url"){
            
            $submissionlink = 'upload/word/'.$row['word_url'].'';
        }else{
            
            $submissionlink = 'upload/image/'.$row['image_url'].'';
        };
        array_push($files, $submissionlink);
        
    }
}
    
$zip = new ZipArchive();
$zip_name = time().".zip"; // Zip name
$zip->open($zip_name,  ZipArchive::CREATE);
foreach ($files as $file) {
  if(file_exists($file)){
  $zip->addFromString(basename($file),  file_get_contents($file));  
  }else{
  echo"file does not exist";
  }
}
$zip->close();
    
//header('Content-Type: application/zip');
//header('Content-disposition: attachment; filename='.$zip_name);
//header('Content-Length: ' . filesize($zip_name));
//readfile($zip_name);    

//$file='../downloads/'.$filename;
if (headers_sent()) {
    echo 'HTTP header already sent';
} else {
    if (!is_file($zip_name)) {
        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
        echo 'File not found';
    } else if (!is_readable($zip_name)) {
        header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden');
        echo 'File not readable';
    } else {
        header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: Binary");
//        header("Content-Length: ".filesize($zip_name));
        header("Content-Disposition: attachment; filename=\"".basename($zip_name)."\"");
        readfile($zip_name);
        exit;
    }
}
?>