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

function updateComment($id, $comment, $conn)
{
    $sql = "INSERT INTO comment (submission_id, content) VALUES ('" . $id . "', '" . $comment . "');";
    echo ($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

function publish($id, $conn)
{
    $sql = "UPDATE submission SET publication = 1 WHERE submission_id=" . $id . "";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

function unpublish($id, $conn)
{
    $sql = "UPDATE submission SET publication = 0 WHERE submission_id=" . $id . "";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully 1";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

function getFacultyName($conn)
{
    $sql = "SELECT faculty_name FROM faculty WHERE faculty_id = " . $_SESSION["faculty"] . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $facultyname = $row['faculty_name'];
            echo '<h1 class="col">Faculty of ' . $facultyname . '</h1>';
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

    $sql = "SELECT * FROM submission INNER JOIN user ON submission.user_id = user.user_id WHERE publication = 0 AND faculty_id =" . $_SESSION["faculty"] . ";";
    //    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rowid = $row['submission_id'];
            $username = $row['username'];
            if ($row['image_url'] != "image url") {
                $submission = $row['image_url'];
                $submissionlink = 'upload/image/' . $row['image_url'] . '';
            } else {
                $submission = $row['word_url'];
                $submissionlink = 'upload/word/' . $row['word_url'] . '';
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
                                    <button type="button" class="btn btn-link buttonComment" data-toggle="modal" data-target="#commentModal" data-row-id="' . $rowid . '">
                                        Comment
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-info publishBtn" value="' . $rowid . '">
                                        Publish
                                    </button>
                                </td>
                            </tr>';
        }
    } else {
        // echo "<p>No records</p>";
    }
    //$conn->close();
}

function getSelected($conn)
{

    $sql = "SELECT * FROM submission INNER JOIN user ON submission.user_id = user.user_id WHERE publication = 1 AND faculty_id =" . $_SESSION["faculty"] . ";";
    //    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rowid = $row['submission_id'];
            $username = $row['username'];
            if ($row['image_url'] != "image url") {
                $submission = $row['image_url'];
                $submissionlink = 'upload/image/' . $row['image_url'] . '';
            } else {
                $submission = $row['word_url'];
                $submissionlink = 'upload/word/' . $row['word_url'] . '';
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
                                    <button class="btn btn-info unpublishBtn" value="' . $rowid . '">
                                        Unpublish
                                    </button>
                                </td>
                            </tr>';
        }
    } else {
        // echo "<tr><td>No records</td></tr>";
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
        Faculty Manager
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
                <div class="col-20">
                    <label for="submissionTable">
                        <h3>Submission</h3>
                    </label>

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

                <div class="col-16">
                    <label for="submissionTable">
                        <h3>Publication</h3>
                    </label>
                    <table id="publishTable" class="table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Submission</th>
                                <th>Date</th>
                                <th>Publication</th>
                            </tr>
                        </thead>
                        <tbody id="publishBody">
                            <?php
                            getSelected($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal" id="commentModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="commentModalLabel">Add comment to
                                submission</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="form-group modal-body">
                                <input type="hidden" class="form-control" id="rowID" value="">
                                <textarea type="text" class="form-control comment" placeholder="Enter your comment."></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary formSubmit">Submit</button>
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

    <script src="js/coordinatorhome.js"></script>
</body>

</html>