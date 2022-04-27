<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login facility management system</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="bootstrap/css/matrix-login.css" />
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <link href="assets/img/wku im3.jpg" rel="icon">
</head>

<body class="img js-fullheight" style="background-image: url(assets/img/wkulogo1.jpg);">
    <div id="loginbox">
        <form name="formlogin" class="form-vertical" action="" method="POST">
            <div class="control-group normal_text">
                <h3>WKUFMS<br>Login Form</h3>
            </div>
            <div class="alert alert-danger" id="error" style="display: none;">
                <center>
                    <strong>Invalid username or password,please triy agian.</strong>
                </center>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                            placeholder="Username" name="username" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                            placeholder="Password" name="password" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <!-- <span class="add-on bg_lg">Role</span> -->
                        <select name="role" required style="border-radius: 13px;">
                            <option value="">...Select Role...</option>
                            <option value="employee">Employee</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <center>
                    <input type="submit" name="submit" value="login" class="btn btn-success">
                </center>
            </div>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            //set timezone for lastlogin
            // date_default_timezone_set("	Africa/Addis_Ababa");
            $insertdate = date("Y-m-d H:i:s");
            $role = $_POST["role"];
            if ($role == "employee") {
                $username = mysqli_real_escape_string($con, $_POST["username"]);
                $password = mysqli_real_escape_string($con, $_POST["password"]);
                $sql = "SELECT * FROM eaccount WHERE username='$username' AND password='$password' AND status='active'";
                $query1 = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($query1);
                if (mysqli_num_rows($query1) > 0) {
                    if ($row['role'] == "employee") {
                        header("Location:employee/home.php");
                    } else if ($row['role'] == "manager") {
                        header("Location:manager/home.php");
                    } else if ($row['role'] == "admin") {
                        header("Location:admin/home.php");
                    }
                } else {
        ?>
        <script type="text/javascript">
        document.getElementById("error").style.display = "block";
        // refresh the page after 3 second
        setTimeout(function() {
            window.location.href = window.location.href;
        }, 3000);
        </script>
        <?php
                }
            } else {
                $username = mysqli_real_escape_string($con, $_POST["username"]);
                $password = mysqli_real_escape_string($con, $_POST["password"]);
                $sql1 = "SELECT * FROM uaccount WHERE username='$username' AND password='$password' AND status='active'";
                $query1 = mysqli_query($con, $sql1);
                $row = mysqli_fetch_array($query1);
                if (mysqli_num_rows($query1) > 0) {
                    header("Location:user/home.php");
                } else {
                ?>
        <script type="text/javascript">
        document.getElementById("error").style.display = "block";
        // refresh the page after 3 second
        setTimeout(function() {
            window.location.href = window.location.href;
        }, 3000);
        </script>
        <?php
                }
            }
        }
        ?>
    </div>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/matrix.login.js"></script>
</body>

</html>