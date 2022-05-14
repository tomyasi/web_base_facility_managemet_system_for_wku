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
<style>
#loginbox {
    opacity: 75%;

}

.form-actions input[type="submite"] {
    border: none;
    outline: none;
    height: 40px;
    width: 40px;
}
</style>

<body class="img js-fullheight" style="background-image: url(assets/img/wkulogo1.jpg);">
    <div id="loginbox" style="border-radius: 15px;">
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
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="storekpeer">Storekpeer</option>
                            <option value="employee">Employee</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <center>
                    <input type="submit" name="submit" value="LOGIN" class="btn btn-success"
                        style="border-radius: 13px;">
                </center>
            </div>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            //set timezone for lastlogin
            // date_default_timezone_set("	Africa/Addis_Ababa");
            $insertdate = date("Y/m/d H:i:s");
            $role = $_POST["role"];
            $username = mysqli_real_escape_string($con, $_POST["username"]);
            $password = mysqli_real_escape_string($con, $_POST["password"]);

            if ($role == "user") {
                $sql1 = "SELECT * FROM uaccount WHERE username='$username' AND password='$password' AND status='1'";
                $query1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($query1);
                if (mysqli_num_rows($query1) > 0) {
                    $_SESSION['user_id'] = $row1['user_id'];
                    $_SESSION['username'] = $row1['username'];
                    $_SESSION['role'] = "user";
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
            } else {
                $sql2 = "SELECT * FROM eaccount WHERE username='$username' AND password='$password' AND status='1'";
                $query2 = mysqli_query($con, $sql2);
                $row1 = mysqli_fetch_array($query2);
                if (mysqli_num_rows($query2) > 0) {
                    $eid = $row1['emp_id'];
                    $role = mysqli_query($con, "SELECT *FROM employee where id=$eid");
                    $row2 = mysqli_fetch_array($role);
                    if ($role == "employee") {
                        //Employee SESSION
                        $_SESSION['emp_id'] = $row1['emp_id'];
                        $_SESSION['username'] = $row1['username'];
                        $_SESSION['fname'] = $row2['fname'];
                        $_SESSION['mname'] = $row2['mname'];
                        $_SESSION['role'] = $row2['jop_position'];

                        header("Location:employee/home.php");
                    } else if ($row1['role'] == "manager") {
                        //manager session
                        $_SESSION['manager_id'] = $row1['id'];
                        $_SESSION['username'] = $row1['username'];
                        $_SESSION['fname'] = $row2['fname'];
                        $_SESSION['mname'] = $row2['mname'];
                        $_SESSION['role'] = $row2['jop_position'];
                        header("Location:manager/home.php");
                    } else if ($row1['role'] == "admin") {
                        //admin session
                        $_SESSION['admin_id'] = $row1['id'];
                        $_SESSION['username'] = $row1['username'];
                        $_SESSION['fname'] = $row2['fname'];
                        $_SESSION['mname'] = $row2['mname'];
                        $_SESSION['role'] = $row2['jop_position'];
                        header("Location:admin/home.php");
                    } else if ($row1['role'] == "storekpeer") {
                        //storekpeer session
                        $_SESSION['admin_id'] = $row1['id'];
                        $_SESSION['username'] = $row1['username'];
                        $_SESSION['fname'] = $row2['fname'];
                        $_SESSION['mname'] = $row2['mname'];
                        $_SESSION['role'] = $row2['jop_position'];
                        header("Location:storekpeer/home.php");
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
            }
        }
        ?>
    </div>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/matrix.login.js"></script>
</body>

</html>