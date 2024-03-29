<?php
session_start();
include("connection.php");
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
                <h3>WKUFMS<br>Forgot Password</h3>
            </div>
            <div class="alert alert-danger" id="emp_error" style="display: none;">
                <center>
                    <strong>No Employee is registered with this username!</strong>

                </center>
            </div>
            <div class="alert alert-danger" id="user_error" style="display: none;">
                <center>
                    <strong>No user is registered with this username!</strong>
                </center>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-envelope"></i></span><input type="text"
                            placeholder="Enter username" name="username" id="email" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <select name="role" required style="border-radius: 13px;">
                            <option value="">...Select Role...</option>
                            <option value="employee">Employee's</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <center>
                    <input type="submit" name="submit" value="Reset Password" class="btn btn-success"
                        style="border-radius: 13px;">
                </center>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $role = $_POST["role"];
    if ($role == 'employee') {
        $sel_query = "SELECT * FROM eaccount WHERE username='" . $username . "'";
        $results = mysqli_query($con, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row <= 0) {

?>
<script type="text/javascript">
document.getElementById("emp_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = window.location.href;
}, 3000);
</script>
<?php
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'employee';
            header("location:reset_password.php");
        }
    } elseif ($role == 'user') {
        $sel_query = "SELECT * FROM uaccount WHERE username='" . $username . "'";
        $results = mysqli_query($con, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row <= 0) {

        ?>
<script type="text/javascript">
document.getElementById("user_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = window.location.href;
}, 3000);
</script>
<?php
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';
            header("location:reset_password.php");
        }
    } else {
    }
}
?>