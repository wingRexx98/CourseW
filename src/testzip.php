<?php
require_once "config.php";
$files = array('');
$facultyId = $_POST['facultyid'];
    $sql = "SELECT * FROM submission INNER JOIN user ON submission.user_id = user.user_id WHERE publication = 1 AND faculty_id =" .$facultyId.";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
        $rowno = 0;
        while($row = $result->fetch_assoc()) {
            
            if($row['image_url'] != "image url"){
                $submissionlink = 'upload/image/'.$row['image_url'].'';
            }else{
                $submissionlink = 'upload/word/'.$row['word_url'].'';
            };
            array_push($files, $submissionlink);
        }
    }

    
    $zip = new ZipArchive();
$zip_name = time().".zip"; // Zip name
$zip->open($zip_name,  ZipArchive::CREATE);
    foreach ($files as $file) {
  echo $path = $file;
  if(file_exists($path)){
  $zip->addFromString(basename($path),  file_get_contents($path));  
  }
  else{
   echo"file does not exist";
  }
}
$zip->close();
    
    header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zip_name);
header('Content-Length: ' . filesize($zip_name));
ob_end_clean();
readfile($zip_name);    
?>