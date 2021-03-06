<?php
// Authentication
require_once "authenticator.php";
// Include config file
require_once "config.php";
if (isset($_GET['file'])) {
    $fileid = $_GET['file'];
    $filetype = $_GET['filetype'];
    $filename = $_GET['filename'];
    if($filetype == 'word'){
        $fileurl = 'upload/word/'.$filename;
    }else{
        $fileurl = 'upload/image/'.$filename;
    }
} else {
    // Fallback behaviour goes here
}

function getComment($conn, $submission_id){
    $sql = "SELECT * FROM comment WHERE submission_id =" . $submission_id . ";";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $comid = $row["comment_id"];
            $comment = $row["content"];
            echo '<tr>
                            <td>
                                '.$comment.'
                            </td>
                        </tr>';
           
        }
    }
}
?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <!--Styles-->
    <link rel="stylesheet" href="css/final.css">

    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!--jQuery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <title>
        Home
    </title>
</head>

<body>
    <!--Default header-->
    <div class="header-footer">
        <div id="header" class="row justify-content-between">
            <div class="col-auto">
                <a href="index.php">
                    <h1>News Management System</h1>
                </a>
            </div>
            <span class="col-3">
                <a class="btn btn-link" href="logout.php">
                    <span>Logout</span>
                </a>
            </span>
        </div>
    </div>

    <!--body-->
    <div class="container" id="">
        <div id="fileName" class="row pt-3">
            <h3 class="col-36 pb-2">View Comment</h3>
            <?php
            echo '<a href="'.$fileurl.'">'.$filename.'</a>';
                ?>
        </div>

        <div id="body" class="row justify-content-between">
            <div class=" long-text overflow-auto col-36">
                <table id="commentTable" class="table">
                    <thead>
                        <tr>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody id="commentTableBody">
                        <?php
                        getComment($conn, $fileid)
                        ?>
<!--
                        <tr>
                            <td>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.
                            </td>
                        </tr>
-->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!--Default footer-->
    <div id="footer" class="header-footer">
        <span>@ 2019 2-1640 group.</span>
    </div>

    <!--    <script src="../js/validation.js"></script>-->
</body>

</html>