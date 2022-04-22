<?php
include("header.php");
include("../connection.php");
// $id = $_GET['id'];
// $sql = "select *from user where id='$id'";
// $result = mysqli_query($con, $sql);
// echo $id;
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="send_request.php" title="Go to Create account" class="tip-bottom">
                <i class="icon icon-envelope"></i>Create account
            </a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Create Account Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <!-- <div class="control-group">
                                <label class="control-label"><strong> First Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="fname" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Middle Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="mname" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Last Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last name" name="lname" required />
                                </div>
                            </div> -->
                            <div class="control-group">
                                <label class="control-label"><strong>UserName :</strong> </label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="username" name="username" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Password :</strong> </label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="passsword" name="password" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Role :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="role" required>
                                        <option value="">Select role...</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <option value="employee">Employee</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required>
                                        <option value="">Select status...</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>User name is alredy exist.</strong>
                                </center>
                            </div>
                            <div class="form-actions">
                                <center>
                                    <button type="submit" name="send" class="btn btn-success">Create</button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The request send successfully.</strong>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST["send"])) {
    // $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    // $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    // $mname = mysqli_real_escape_string($con, $_POST["mname"]);

    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $username = mysqli_real_escape_string($con, $_POST["password"]);
    $role = mysqli_real_escape_string($con, $_POST["role"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    // //passwor encrption using md5
    // $password = md5($pass);
    // $qur = "insert into account values(NULL,NULL,'$username','$password','$role','$status',NULL)";
    // mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));
    if (strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }
    if (strlen($username) < 6) {
        $mobile_error = "Mobile number must be minimum of 6 characters";
    }
    $s = "INSERT INTO account  VALUES('" . $username . "', '" . $username . "', '" . $role . "', '" . $status . "')";
    if (mysqli_query($con, $s)) {
?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
            // refresh the page after 3 second
            setTimeout(function() {
                window.location.href = "employee_regi.php";
            }, 3000);
        </script>
<?php
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
mysqli_close($con);
include("footer.php");
?>