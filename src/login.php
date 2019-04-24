<?php
// Session and redirect
require_once "session.php";
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$invalid_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){    
    
    // if username is not empty
    if(!empty(trim($_POST["username"]))){
        $username = trim($_POST["username"]);
    }
    
    // if password is not empty
    if(!empty(trim($_POST["password"]))){
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($invalid_err)){
        // Prepare a select statement
        $sql = "SELECT user_id, role_id, faculty_id, username, password FROM user WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $role_id, $faculty_id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password === $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["role"] = $role_id;
                            $_SESSION["faculty"] = $faculty_id;
                            
                            // Redirect user to their page
                            header("location: login.php");
                        } else{
                            // Display an error message if password is not valid
                            $invalid_err = "Invalid username/password";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $invalid_err = "Invalid username/password";
                }
            } else {
                $invalid_err = "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
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
    <!--jQuery-->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!--JS-->
    <script src="js/validation.js"></script>

    <title>
        Home
    </title>
</head>

<body>
    <!--Default header-->
    <div class="header-footer">
        <div id="header" class="col">
            <h1>News Management System</h1>
        </div>
    </div>

    <!--Log in body-->
    <div class="container">
        <div id="body" class="row justify-content-around">
            <div id="welcome" class="info-box col-9 card btn-light">
                <div class="card-body">
                    <h4 class="card-title">Welcome to NMS.</h4>
                    <p class="card-text"> This is the web application for XYZ School's News management system</p>
                </div>
            </div>
            <div id="log-feature" class="info-box col-9 card border-0">
                <div id="log" class="card-body row card mb-3 btn-light">
                    <h4 class="card-title">What's new?</h4>
                    <ul class="card-text">
                        <li>App release</li>
                        <li>Minor fix</li>
                    </ul>
                </div>
                <div id="feature" class="card-body row card btn-light">
                    <h4 class="card-title">What does this app do?</h4>
                    <p class="card-text">NMS is the portal for the management system of XYZ's school. Students can upload their files, admins and manager can manage the uploads within this application.</p>
                </div>
            </div>
            <div id="log-in" class="info-box col-12 card btn-light">
                <div class="card-body">
                    <h4 class="card-title">Sign in</h4>
                    <span class="help-block text-danger"><?php echo $invalid_err; ?></span>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <!--TODO: change validation js-->
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="username" name="username" placeholder="Enter email address" required>

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" value="login">Sign in</button>
                    </form>
                </div>
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
