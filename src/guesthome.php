<?php
// Authentication
require_once "authenticator.php";
// Include config file
require_once "config.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    echo ($name);
    if ($name == "publish") {
        publish($id, $conn);
    } else {
        unpublish($id, $conn);
    }
}

if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    updateComment($id, $comment, $conn);
}

function getFacultyName($conn)
{
    $sql = "SELECT faculty_name FROM faculty WHERE faculty_id = " . $_SESSION["faculty"] . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $facultyname = $row['faculty_name'];
            echo '<h2 class="col">Faculty of ' . $facultyname . ' - Guest Page</h2>';
        }
    }
}

//echo $_SESSION["faculty"];
function getFacultyStudent($conn)
{

    $sql = "SELECT username FROM user WHERE role_id = 5 and faculty_id =" . $_SESSION["faculty"] . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $username = $row['username'];
            echo "<li>" . $username . "</li><br>";
        }
    } else {
        echo "<li>One</li>";
    }
    //$conn->close();
}

function getSubmission($conn)
{

    $sql = "SELECT * FROM submission INNER JOIN user ON submission.user_id = user.user_id WHERE faculty_id =" . $_SESSION["faculty"] . ";";
    //    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rowid = $row['submission_id'];
            $username = $row['username'];
            if ($row['publication'] == 0) {
                $published = 'No';
            } else {
                $published = 'Yes';
            }
            if ($row['image_url'] != "image url") {
                $submission = $row['image_url'];
                $submissionlink = 'upload/image/' . $row['image_url'] . '';
                $filetype = 'image';
            } else {
                $submission = $row['word_url'];
                $submissionlink = 'upload/word/' . $row['word_url'] . '';
                $filetype = 'word';
            }
            $submission_date = $row['submission_date'];

            echo '<tr>
                                <td>
                                    <a href="#">' . $username . '</a>
                                </td>
                                <td>
                                    <a href="' . $submissionlink . '">' . $submission . '</a>
                                </td>
                                <td>' . $submission_date . '</td>
                                <td>
                                    <a href="viewComment.php?file=' . $rowid . '&filename=' . $submission . '&filetype=' . $filetype . '" class="">
                                                Comment
                                            </a>
                                </td>
                                <td>' . $published . '</td>
                            </tr>';
        }
    } else {
        // echo "<p>No records</p>";
    }
    //$conn->close();
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--jQuery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <title>
        Guest
    </title>
</head>

<body>
    <section data-role="page">
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
        <div class="container">

            <div id="faculty" class="row pt-3">
                <!--from respective faculty-->
                <?php
                getFacultyName($conn);
                ?>
            </div>

            <div id="body" class="row justify-content-between">
                <div class="col-36">
                    <label for="submissionTable">
                        <h3>Submission</h3>
                    </label>

                    <div class="long-text ">
                        <table id="submissionTable" class="table">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Submission</th>
                                    <th>Date</th>
                                    <th>Comment</th>
                                    <th>Publication</th>
                                </tr>
                            </thead>
                            <tbody id="submissionBody">
                                <?php
                                getSubmission($conn);
                                ?>
                            </tbody>
                        </table>
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

    <script src="js/coordinatorhome.js"></script>
</body>

</html>