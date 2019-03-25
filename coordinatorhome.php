<?php
// Authentication
require_once "authenticator.php";

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
                <h1 class="col">Falcuty Name</h1>
            </div>

            <div id="body" class="row justify-content-between">
                <div id="student-list" class="info-box col-11 card btn-light">
                    <div class="card-body">
                        <h4 class="card-title">Students:</h4>
                        <ol class="card-text">
                            <li>One</li>
                            <li>Two</li>
                            <li>Three</li>
                            <li>Four</li>
                            <li>Five</li>
                            <li>Six</li>
                        </ol>
                        <button class="btn btn-outline-primary">Contact</button>
                    </div>
                </div>
                <div id="submission" class="info-box col-11 card btn-light">
                    <div class="card-body">
                        <h4 class="card-title">Submissions:</h4>
                        <ol class="card-text">
                            <li>One</li>
                            <li>Two</li>
                            <li>Three</li>
                            <li>Four</li>
                            <li>Five</li>
                            <li>Six</li>
                        </ol>
                        <button class="btn btn-outline-primary">Select</button>
                        <button class="btn btn-outline-primary">Comment</button>
                    </div>
                </div>
                <div id="publication" class="info-box col-11 card btn-light">
                    <div class="card-body">
                        <h4 class="card-title">Selected for publication:</h4>
                        <ol class="card-text">
                            <li>One</li>
                            <li>Two</li>
                            <li>Three</li>
                            <li>Four</li>
                            <li>Five</li>
                            <li>Six</li>
                        </ol>
                        <button class="btn btn-outline-primary">Deselect</button>
                    </div>
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
