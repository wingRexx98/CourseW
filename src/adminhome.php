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
        <div id="header" class="col">
            <h1>News Management System</h1>
        </div>
    </div>

    <!--body-->
    <div class="container">
        <div id="AdminTitle" class="row pt-3">
            <h2 class="col">Administrator</h2>
        </div>

        <div id="body">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#user">User</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#Role">Role</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#Faculty">Faculty</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" class="nav-link" href="#Closure">Closure</a>
                </li>
            </ul>
            <!--Content for Tab -->
            <div class="tab-content">
                <div id="user" class="tab-pane fade container">
                    <div id="body" class="row justify-content-between">
                        <div class="info-box col-25 card btn-light">
                            <div class="card-body">
                                <label>
                                    <h3 class="card-title">User</h3>
                                </label>
                                <table class="card-text table">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Role ID</th>
                                            <th>Falculty ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Delete</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody class="userTable">
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>asd</td>
                                            <td>asd</td>
                                            <td>
                                                <a href="#" class="getRowID" data-toggle="modal"
                                                    data-target="#deleteModal" data-row-id="1">
                                                    Delete
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">Update</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--Input For New-->
                        <div class="info-box col-10 card btn-light">
                            <div class="card-body">
                                <label>
                                    <h3 class="card-title">Add a new user</h3>
                                </label>
                                <div class="card-text">
                                    <form>
                                        <div data-role="fieldcontain" class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" />
                                        </div>
                                        <div data-role="fieldcontain" class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" />
                                        </div>
                                        <div data-role="fieldcontain" class="form-group">
                                            <label for="select" class="select">Choose Role:</label>
                                            <!--Get role name from db-->
                                            <select id="select" class="form-control" name="select">
                                                <option value="1">Student</option>
                                                <option value="2">Coordinator</option>
                                                <option value="3">Manager</option>
                                            </select>
                                        </div>
                                        <div data-role="fieldcontain" class="form-group">
                                            <label for="select" class="select">Choose Faculty:</label>
                                            <!--Get faculty name from db-->
                                            <select id="select" class="form-control" name="select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Role" class="tab-pane fade container">
                    <div id="body" class="row justify-content-between">
                        <div id="submission" class="info-box col-25 card btn-light">
                            <div class="card-body">
                                <label>
                                    <h2 class="card-title">User Roles:</h2>
                                </label>
                                <table class="table">
                                    <tr>
                                        <th>Role ID</th>
                                        <th>Role Name</th>
                                        <th>Delete</th>
                                    </tr>
                                    <!--Place Holder-->
                                    <tr>
                                        <td>1</td>
                                        <td>asd</td>
                                        <td>
                                            <a href="#">Delete</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--Input For New-->
                        <div id="submission" class="info-box col-10 card btn-light">
                            <div class="card-body text-center">
                                <div class="card-text">
                                    <form>
                                        <div data-role="fieldcontain">
                                            <label for="textBox">Role Name:</label>
                                            <input type="text" name="textBox" id="Usernametxt" value="" />
                                        </div>
                                        </br>
                                        <button type="button" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Faculty" class="tab-pane fade container">
                    <div id="body" class="row justify-content-between">
                        <div id="submission" class="info-box col-25 card btn-light">
                            <h2 class="card-title">Falculties:</h2>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Falculty ID</th>
                                        <th>Falculty Name</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tr>
                                        <!--Place Holder-->
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <a href="#">Delete</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--Input For New-->
                        <div id="submission" class="info-box col-10 card btn-light">
                            <div class="card-body text-center">
                                <div class="card-text">
                                    <form>
                                        <div data-role="fieldcontain">
                                            <label for="textBox">Faculty name:</label>
                                            <input type="text" name="textBox" id="Usernametxt" value="" />
                                        </div>
                                        </br>
                                        <button type="button" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Closure" class="tab-pane fade container">
                    <div id="body" class="row justify-content-between">
                        <div id="submission" class="info-box col-25 card btn-light">
                            <h2 class="card-title">Falculties:</h2>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Closure ID</th>
                                        <th>Closure Date</th>
                                        <th>Academic Year</th>
                                        <th>Delete</th>
                                    </tr>
                                    <!--Place Holder-->
                                    <tr>
                                        <td>1</td>
                                        <td>1/1/1111</td>
                                        <td>1</td>
                                        <td><input type="button" name="Contact" value="Delete"
                                                class="btn btn-link btn-lg">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--Input For New-->
                        <div id="submission" class="info-box col-10 card btn-light">
                            <div class="card-body text-center">
                                <div class="card-text">
                                    <form>
                                        <div data-role="fieldcontain">
                                            <label for="textBox">Closure Date:</label>
                                            <input type="text" name="textBox" id="Usernametxt" value="" />
                                        </div>
                                        </br>
                                        <button type="button" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete a row</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form>
                    <div class="form-group modal-body">
                        <input type="text" class="form-control" id="rowID">
                        <span>Are you sure? This action cannot be undone.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="updateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Update a row</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form>
                    <div class="form-group modal-body">
                        <input type="text" class="form-control" id="rowID" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
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