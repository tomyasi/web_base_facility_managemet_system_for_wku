<?php
include("header.php");
include("../connection.php");
// $id = $_GET['id'];
// $sql = "select *from user where id='$id'";
// $result = mysqli_query($con, $sql);
// echo $id;
$id_error = $pass_error = $cpass_error = "";
if (isset($_POST["send"])) {

    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $pass = mysqli_real_escape_string($con, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($con, $_POST["cpassword"]);
    $role = mysqli_real_escape_string($con, $_POST["role"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    if (strlen($pass) < 6) {
        $pass_error = "Password must be minimum of 6 characters";
    }
    if (!($pass == $cpassword)) {
        $cpass_error = "Password and confirm password doesn't mached";
    }
    $id_check = mysqli_query($con, "SELECT *FROM employee WHERE id=$id");
    if (!$id_check) {
        $id_error = "ID doesn't exist!!!";
    }
    $insertdate = date("Y-m-d H:i:s");
    if ($id_error == "" && $pass_error == "" && $cpass_error == "") {
        //passwor encrption using md5
        $password = md5($pass);
        $qur = "INSERT INTO eaccount values(NULL,'$id','$username','$password','$status',' $insertdate','$role')";
        $res = mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));
        if ($res) {
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
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage User</span></a>
            <a href="create_account_emp.php" title="Go to Create employee account" class="tip-bottom">
                <i class="icon-user"></i>Create employee account
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Create Account Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                            method="POST" class="form-horizontal" onsubmit='return formValidation()'>
                            <div class="control-group">
                                <label class="control-label"><strong>ID :</strong></label>
                                <div class="controls">
                                    <input type="text" id="id" class="span11" placeholder="First name" name="id"
                                        required style="border-radius: 13px;" /><br>
                                    <span style="color: red;"><?php if (isset($id_error)) echo $id_error; ?></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>UserName :</strong> </label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="username" name="username" required
                                        style="border-radius: 13px;" /><br>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Password :</strong> </label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="passsword" name="password"
                                        required style="border-radius: 13px;" /><br>
                                    <span style="color: red;"><?php if (isset($pass_error)) echo $pass_error; ?></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Re_Password :</strong> </label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="passsword" name="cpassword"
                                        required style="border-radius: 13px;" /><br>
                                    <span
                                        style="color: red;"><?php if (isset($cpass_error)) echo $cpass_error; ?></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Role :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="role" required style="border-radius: 13px;">
                                        <option value="">Select role...</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="storekpeer">Storekpeer</option>
                                        <option value="technitian">Technitian</option>
                                        <option value="security">Security</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required style="border-radius: 13px;">
                                        <option value="">Select status...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
                                    <button type="submit" name="send" class="btn btn-success"
                                        style="border-radius: 13px;">Create</button>
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

mysqli_close($con);
include("footer.php");
?>