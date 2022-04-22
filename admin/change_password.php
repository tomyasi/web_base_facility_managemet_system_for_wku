<?php
include("header.php");
include("../connection.php");
if (isset($_POST['re_password'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $re_pass = $_POST['re_pass'];

    $password_query = mysqli_query($con, "select * from account where id='1'");
    $password_row = mysqli_fetch_array($password_query);
    $database_password = $password_row['password'];
    if ($database_password == $old_pass) {

        if ($new_pass == $re_pass) {
            $update_pwd = mysqli_query($con, "update account set password='$new_pass' where id='12'");
            echo "<script>alert('Update Sucessfully'); window.location='home.php'</script>";
        } else {
            echo "<script>alert('Your new and Retype Password is not match'); window.location='change_password.php'</script>";
        }
    } else {
        echo "<script>alert('Your old password is wrong'); window.location='change_password.php'</script>";
    }
}

?>
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="change_password.php" title="Go to Change Password" class="tip-bottom">
                <i class="icon icon-cogs"></i>Change Password
            </a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>User Change Password Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Old Password :</label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="Enter old password"
                                        name="old_pass" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">New Password :</label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="Enter new password"
                                        name="new_pass" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm Password :</label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="Confirm Password" name="re_pass"
                                        required />
                                </div>
                                <div class="alert alert-danger" id="error" style="display: none;">
                                    <center>
                                        <strong>Same thing error,please triy agian.</strong>
                                    </center>
                                </div>
                                <div class="form-actions">
                                    <center>
                                        <button type="submit" name="re_password" class="btn btn-success">Change
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