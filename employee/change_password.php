<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['emp_id']))) {
    header("Location: ../login.php");
}
$user_id = $_SESSION['emp_id'];
if (isset($_POST['re_password'])) {

    $old_pass = md5($_POST['old_pass']);
    $new_pass = $_POST['new_pass'];
    $re_pass = $_POST['re_pass'];
    $password_query = mysqli_query($con, "SELECT * from eaccount where emp_id='$user_id'");
    $password_row = mysqli_fetch_array($password_query);
    $database_password = $password_row['password'];
    if ($database_password == $old_pass) {

        if ($new_pass == $re_pass) {
            $update_pwd = mysqli_query($con, "UPDATE eaccount set password='" . md5($new_pass) . "' where emp_id='$user_id'");
            echo "<script>alert('Update Sucessfully'); window.location='home.php'</script>";
        } else {
            echo "<script>alert('Your new and Retype Password is not match'); window.location='change_password.php'</script>";
        }
    } else {
        echo "<script>alert('Your old password is wrong'); window.location='change_password.php'</script>";
    }
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a>
            <a href="change_password.php" title="Go to Change Pasword" class="tip-bottom">
                <i class="icon-cog"></i>Change Password
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <hr>
            <CENTER>
                <h5>CHANGE PASSWORD PAGE</h5>
            </CENTER>
            <hr>
            <div class="span11">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>User Change Password Form</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 20px;">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group" style="min-height: 50px;">
                                <label class="control-label"><strong>Old Password<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="password" class="span8" placeholder="Enter old password"
                                        name="old_pass" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group" style="min-height: 50px; min-height: 50px;">
                                <label class="control-label"><strong>New Password<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="password" class="span8" placeholder="Enter new password"
                                        name="new_pass" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group" style="min-height: 50px;">
                                <label class="control-label"><strong>Confirm Password<small
                                            style="color: red;">*</small> :</strong></label>
                                <div class="controls">
                                    <input type="password" class="span8" placeholder="Confirm Password" name="re_pass"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="form-actions">
                                <center>
                                    <button type="submit" name="re_password" class="btn btn-success"
                                        style="border-radius: 13px;">Change
                                        Password</button>
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
<!--end-main-container-part-->
<?php
mysqli_close($con);
include("footer.php");
?>