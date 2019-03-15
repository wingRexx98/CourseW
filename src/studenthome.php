<?php

//error var

$error_word = "";
$error_img = "";
$success_word = "";
$success_img = "";

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Check if word file was uploaded without errors
    if(isset($_FILES["word"]) && $_FILES["word"]["error"] == 0){
        $allowed = array("doc" => "application/msword", "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "pdf" => "application/pdf");
        $filename = $_FILES["word"]["name"];
        $filetype = $_FILES["word"]["type"];
        $filesize = $_FILES["word"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        //echo $ext;
        if(!array_key_exists($ext, $allowed)) $error_word = "Please select a valid file format.";
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) $error_word = "File size is larger than the allowed limit.";
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/word/" . $filename)){
                $error_word = $filename . " already exists.";
            } else{
                move_uploaded_file($_FILES["word"]["tmp_name"], "upload/word/" . $filename);
                $success_word = "Your file was uploaded successfully.";
            } 
        } else{
            $error_word = "There was a problem uploading your file. Please try again."; 
        }
    }else{
        $error_word = "There was a problem uploading your file. Please try again."; 
        //echo "Error: " . $_FILES["word"]["error"];
    }
    
    // Check if img file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png" );
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        //echo $ext;
        if(!array_key_exists($ext, $allowed)) $error_img = "Please select a valid file format.";
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) $error_img = "File size is larger than the allowed limit.";
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/image/" . $filename)){
                $error_img = $filename . " already exists.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/image/" . $filename);
                $success_img = "Your file was uploaded successfully.";
            } 
        } else{
            $error_img = "There was a problem uploading your file. Please try again."; 
            //echo $filetype;
        }
    }else{
        $error_img = "There was a problem uploading your file. Please try again."; 
        //echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <!--Styles-->
    <link rel="stylesheet" href="css/final.css">

    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="js/bootstrap.min.js">
    <!--jQuery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <title>
        Home
    </title>
</head>

<body>
    <section data-role="page">
        <header>
            <div class="header-footer">
                <div id="header" class="col">
                    <h1>News Management System</h1>
                </div>
            </div>
        </header>
        <div class="container">

            <div id="faculty" class="row pt-3">
                <!--from respective faculty-->
                <h2 class="col">Falcuty Name</h2>
            </div>

            <div id="body" class="row justify-content-between">
                <div id="submission" class="info-box col-10 card btn-light">
                    <div class="card-body">
                        <h4 class="card-title">Word file(s) submission</h4>
                        <ol class="card-text">
                            <li>One</li>
                            <li>Two</li>
                            <li>Three</li>
                            <li>Four</li>
                            <li>Five</li>
                            <li>Six</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Image file(s) submission</h4>
                        <ol class="card-text">
                            <li>One</li>
                            <li>Two</li>
                            <li>Three</li>
                            <li>Four</li>
                            <li>Five</li>
                            <li>Six</li>
                        </ol>
                    </div>
                </div>
                <div id="upload" class="info-box col-25">
                    <form method="post" enctype="multipart/form-data" class="row justify-content-around">
                        <div id="terms" class="col-17 card btn-light">
                            <div class="card-body">
                                <h4 class="card-title">Terms And Agreements</h4>
                                <div class="card-text long-text overflow-auto">
                                    <span>
                                        1. Introduction.
                                        </br>
                                        These Website Standard Terms and Conditions (these “Terms” or these “Website Standard Terms And Conditions”) contained herein on this webpage, shall govern your use of this website, including all pages within this website (collectively referred to herein below as this “Website”). These Terms apply in full force and effect to your use of this Website and by using this Website, you expressly accept all terms and conditions contained herein in full. You must not use this Website, if you have any objection to any of these Website Standard Terms and Conditions.
                                        </br>
                                        2. Intellectual Property Rights.
                                        </br>
                                        Other than content you own, which you may have opted to include on this Website, under these Terms, Greenwich University and/or its licensors own all rights to the intellectual property and material contained in this Website, and all such rights are reserved.
                                        You are granted a limited license only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this Website.
                                        </br>
                                        3. Restrictions.
                                        </br>
                                        You are expressly and emphatically restricted from all of the following:</br>
                                        - publishing any Website material in any media;</br>
                                        - selling, sublicensing and/or otherwise commercializing any Website material;</br>
                                        - publicly performing and/or showing any Website material;</br>
                                        - using this Website in any way that is, or may be, damaging to this Website;</br>
                                        - using this Website in any way that impacts user access to this Website;</br>
                                        - using this Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the Website, or to any person or business entity;</br>
                                        - engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website, or while using this Website;</br>
                                        - using this Website to engage in any advertising or marketing;</br>
                                        Certain areas of this Website are restricted from access by you and Greenwich University may further restrict access by you to any areas of this Website, at any time, in its sole and absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality of such information.
                                        </br>4. Your Content.
                                        In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video, text, images or other material you choose to display on this Website. With respect to Your Content, by displaying it, you grant Greenwich University a non-exclusive, worldwide, irrevocable, royalty-free, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                                        Your Content must be your own and must not be infringing on any third party’s rights. Greenwich University reserves the right to remove any of Your Content from this Website at any time, and for any reason, without notice.
                                        </br>5. No warranties.
                                        This Website is provided “as is,” with all faults, and Greenwich University makes no express or implied representations or warranties, of any kind related to this Website or the materials contained on this Website. Additionally, nothing contained on this Website shall be construed as providing consult or advice to you.
                                        </br>6. Limitation of liability.
                                        In no event shall Greenwich University, nor any of its officers, directors and employees, be liable to you for anything arising out of or in any way connected with your use of this Website, whether such liability is under contract, tort or otherwise, and Greenwich University, including its officers, directors and employees shall not be liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
                                        </br>7. Indemnification.
                                        You hereby indemnify to the fullest extent Greenwich University from and against any and all liabilities, costs, demands, causes of action, damages and expenses (including reasonable attorney’s fees) arising out of or in any way related to your breach of any of the provisions of these Terms.
                                        </br>8. Severability.
                                        If any provision of these Terms is found to be unenforceable or invalid under any applicable law, such unenforceability or invalidity shall not render these Terms unenforceable or invalid as a whole, and such provisions shall be deleted without affecting the remaining provisions herein.
                                         
                                        </br>9. Variation of Terms.
                                        Greenwich University is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review such Terms on a regular basis to ensure you understand all terms and conditions governing use of this Website.
                                        </br>10. Assignment.
                                        Greenwich University shall be permitted to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification or consent required. However, you shall not be permitted to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
                                        </br>11. Entire Agreement.
                                        These Terms, including any legal notices and disclaimers contained on this Website, constitute the entire agreement between Greenwich University and you in relation to your use of this Website, and supersede all prior agreements and understandings with respect to the same.
                                        </br>12. Governing Law & Jurisdiction.
                                        These Terms will be governed by and construed in accordance with the laws of the City of Hanoi, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Hanoi for the resolution of any disputes.
                                    </span>
                                </div>
                                <div class="card-text">
                                    <input id="terms-check-box" type="checkbox" name="checkbox" value="checked" required>
                                    <label for="terms-check-box">I agree with these term and condition</label>
                                </div>
                            </div>
                        </div>

                        <div id="file" class="col-17 card btn-light">
                            <div class="card-body">
                                <h4 class="card-title">Word Upload</h4>
                                <!--Error word-->
                                <span class="help-block text-danger"><?php echo $error_word; ?></span>

                                <div class="card-text">
                                    <label for="file">Choose a Word File</label>
                                    <input type="file" class="form-control-file" name="word" id="fileSelect" required>
                                    <span>
                                        <strong>Note:</strong>
                                        Only .doc, .docx, .pdf formats allowed to a max size of 5 MB.
                                    </span>
                                </div>

                                <!--Success img-->
                                <span class="help-block text-success"><?php echo $success_word; ?></span>

                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Image Upload</h4>
                                <!--Error img-->
                                <span class="help-block text-danger"><?php echo $error_img; ?></span>

                                <div class="card-text">
                                    <label for="file">Choose a Image file</label>
                                    <input type="file" class="form-control-file" name="photo" id="fileSelect" required>
                                    <span>
                                        <strong>Note:</strong>
                                        Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.
                                    </span>
                                </div>

                                <!--Success img-->
                                <span class="help-block text-success"><?php echo $success_img; ?></span>

                            </div>
                            <button type="submit" name="submit" value="Upload" class="btn btn-primary">Send</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <footer data-role="footer">
            <div id="footer" class="header-footer">
                @ 2019 2-1640 group
            </div>
        </footer>
    </section>
</body>

</html>
