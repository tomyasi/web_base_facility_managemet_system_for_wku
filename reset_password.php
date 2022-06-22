<?php
session_start();
include("connection.php");
if (!isset($_SESSION['username']) and !isset($_SESSION['role'])) {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
    header("Refresh:1; url=login.php", true, 303);
}
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

    <link href="images/wkulogo7.png" rel="icon">
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
        <form name="formlogin" class="form-vertical" action="" method="POST" onsubmit='return formValidation()'>
            <div class="control-group normal_text">
                <h3>WKUFMS<br>Enter new Password</h3>
            </div>
            <div class="alert alert-success" id="emp_error" style="display: none;">
                <center>
                    <strong>Password change successfully!<br>
                        <a href='login.php' style='color:#fff;'>Login here... </a></strong>
                </center>
            </div>
            <div class="alert alert-danger" id="user_error" style="display: none;">
                <center>
                    <strong>Password and confirm password do not match!</strong>
                </center>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-lock"></i></span><input type="password"
                            placeholder="Enter new password" name="pass" id="email" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-lock"></i></span><input type="password"
                            placeholder="Enter confirm password" name="cpass" id="email" required />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <center>
                    <input type="submit" name="submit" value="Reset" class="btn btn-success"
                        style="border-radius: 13px;">
                </center>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $password =  md5($_POST['pass']);
    $passwordConfirm =  md5($_POST['cpass']);
    $username =  $_SESSION['username'];
    $role = $_SESSION['role'];
    if ($password == $passwordConfirm) {
        if ($role = 'user') {
            $result = mysqli_query($con, "UPDATE uaccount SET password='$password' WHERE username='$username'");
            if ($result) {
                header("location:login.php");
?>
<script type="text/javascript">
document.getElementById("employee_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = window.location.href;
}, 3000);
</script>
<?php
            }
        } else {
            $result = mysqli_query($con, "UPDATE eaccount SET password='$password' WHERE username='$username'");
            if ($result) {
                header("location:login.php");
            ?>
<script type="text/javascript">
document.getElementById("employee_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = window.location.href;
}, 3000);
</script>
<?php
            }
        }
    } else {
        ?>
<script type="text/javascript">
document.getElementById("user_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = window.location.href;
}, 3000);
</script>
<?php
    }
}
?>