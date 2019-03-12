<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png" );
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        echo $ext;
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/image/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/image/" . $filename);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    }else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
    
    // Check if file was uploaded without errors
    if(isset($_FILES["word"]) && $_FILES["word"]["error"] == 0){
        $allowed = array("doc" => "application/msword", "docx" => "application/msword", "pdf" => "application/pdf");
        $filename = $_FILES["word"]["name"];
        $filetype = $_FILES["word"]["type"];
        $filesize = $_FILES["word"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        echo $ext;
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/word/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["word"]["tmp_name"], "upload/word/" . $filename);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    }else{
        echo "Error: " . $_FILES["word"]["error"];
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
            <div id="body" class="row justify-content-around">
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
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at cursus quam.
                                        Integer
                                        nunc
                                        tellus, pretium sit amet congue a, sollicitudin ut orci. Fusce sodales fermentum
                                        cursus.
                                        Cras nonhendrerit nisl, quis faucibus lacus. Mauris sollicitudin, lacus in
                                        aliquet
                                        laoreet,
                                        tortor arcu semper ipsum, vitae rhoncus sem dui nec velit. Etiam vel venenatis
                                        metus.
                                        Mauris
                                        luctus, lectus sed molestie dictum, lectus ligula vestibulum urna, vel
                                        sollicitudin
                                        nunc
                                        magna sodales odio. Pellentesque habitant morbi tristique senectus et netus et
                                        malesuada
                                        fames ac turpis egestas. Integer est nunc, efficitur id lacus eu, tristique
                                        laoreet
                                        nisi.
                                        Fusce et justo vitae felis accumsan tincidunt. Praesent bibendum justo et lectus
                                        pharetra
                                        porttitor. Ut mattis turpis quis lorem gravida blandit. Integer dictum, risus ut
                                        finibus
                                        tempor, neque nibh cursus neque, sed aliquet nisl massa et mi. Mauris vehicula
                                        arcu
                                        vel
                                        quam
                                        lobortis, ut mollis enim placerat.

                                        Ut non tempus enim, non sodales neque. Aenean eget enim sit amet nulla tempus
                                        sagittis.
                                        Maecenas ullamcorper dui nec lectus finibus porta. Etiam ultricies et nunc at
                                        fermentum.
                                        Suspendisse porta tellus quis arcu interdum, non finibus dolor consectetur.
                                        Vestibulum
                                        ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris
                                        tempus
                                        quis
                                        nisi eu tincidunt. Nullam pharetra, nibh non facilisis tincidunt, eros ipsum
                                        eleifend
                                        arcu,
                                        ac dignissim ligula ex non magna. Sed rutrum enim nulla, ut interdum nunc
                                        egestas
                                        eu.
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
                                <div class="card-text">
                                    <label for="file">Choose a Word File</label>
                                    <input type="file" name="word" id="fileSelect" required>
                                    <p><strong>Note:</strong> Only .doc, .docx, .pdf formats allowed to a max size of 5 MB.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Image Upload</h4>
                                <div class="card-text">
                                    <label for="file">Choose a Image file</label>
                                    <input type="file" name="photo" id="fileSelect" required>
                                    <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                                </div>
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
