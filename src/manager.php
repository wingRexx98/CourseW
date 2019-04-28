<?php
// Authentication
require_once "authenticator.php";
// Include config file
require_once "config.php";

ini_set('display_errors', 1);

//if (isset($_POST['facultyid'])) {
//}

function getSubmission($conn, $facultyId)
{

    $sql = "SELECT * FROM submission INNER JOIN user ON submission.user_id = user.user_id WHERE faculty_id =" . $facultyId . ";";
    //    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $rowno = 0;
        while ($row = $result->fetch_assoc()) {
            $rowno = $rowno + 1;
            $rowid = $row['submission_id'];
            $username = $row['username'];
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
            if ($row['publication'] == 0) {
                $published = 'No';
            } else {
                $published = 'Yes';
            }


            echo '<tr>
                                                <td>' . $rowno . '</td>
                                                <td>' . $username . '</td>
                                                <td>' . $submission_date . '</td>
                                                <td>
                                                    <a href="' . $submissionlink . '">
                                                        ' . $submission . '
                                                    </a>
                                                </td>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--jQuery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <title>
        Director Manager
    </title>
</head>
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
<div class="container">
    <div id="body">
        <div id="AdminTitle" class="row pt-3">

            <label>
                <h2 class="col">Manager Home Page</h2>
            </label>

        </div>

        <div class="row">
            <ul class="nav nav-tabs col-36">
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#com">Computing</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#biz">Business</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#design">Design</a>
                </li>
            </ul>

            <!--Faculty 1 -->
            <div class="tab-content col-36 ">
                <div id="com" class="tab-pane fade container ">
                    <div class="row justify-content-between">
                        <div class="info-boxy col-36">
                            <div class="card-body row">
                                <label class="col-36">
                                    <h3 class="card-title">Faculty of Computing</h3>
                                </label>
                                <div class="col-36 mb-3">
                                    <button type="button" class="btn btn-primary zipDownload1">
                                        <span>Download all published submission</span>
                                    </button>
                                </div>
                                <div class="long-text col-36">
                                    <table class="card-text table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User ID</th>
                                                <th>Submit date</th>
                                                <th>Submission</th>
                                                <th>Comment<th>
                                                <th>Publication status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="comTable">
                                            <?php
                                            getSubmission($conn, 1);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Faculty 2-->
                <div id="biz" class="tab-pane fade container">
                    <div class="row justify-content-between">
                        <div class="info-box col-36">
                            <div class="card-body row">
                                <label class="col-36">
                                    <h3 class="card-title">Faculty of Business</h3>
                                </label>
                                <div class="col-36 mb-3">
                                    <button type="button" class="btn btn-primary zipDownload2">
                                        <span>Download all published submission</span>
                                    </button>
                                </div>
                                <div class="long-text col-36">
                                    <table class="card-text table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User ID</th>
                                                <th>Submit date</th>
                                                <th>Submission</th>
                                                <th>Publication status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bizTable">
                                            <?php
                                            getSubmission($conn, 2);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Faculty 3-->
                <div id="design" class="tab-pane fade container">
                    <div class="row justify-content-between">
                        <div class="info-box col-36">
                            <div class="card-body row">
                                <label class="col-36">
                                    <h3 class="card-title">Faculty of Design</h3>
                                </label>
                                <div class="col-36 mb-3">
                                    <button type="button" class="btn btn-primary zipDownload3">
                                        <span>Download all published submission</span>
                                    </button>
                                </div>
                                <div class="long-text col-36">
                                    <table class="card-text table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User ID</th>
                                                <th>Submit date</th>
                                                <th>Submission</th>
                                                <th>Publication status</th>
                                            </tr>

                                        </thead>
                                        <tbody id="dsgTable">
                                            <?php
                                            getSubmission($conn, 3);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Default footer-->
<div id="footer" class="header-footer">
    <span>@ 2019 2-1640 group.</span>
</div>
<script src="js/getRowID.js"></script>
</body>

</html>