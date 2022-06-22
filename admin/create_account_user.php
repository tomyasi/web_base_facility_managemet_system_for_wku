<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['admin_id']))) {
    header("Location: ../login.php");
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Create Account</span></a>
            <a href="create_account_user.php" title="Go to Create user account page" class="tip-bottom">
                <i class="icon-user"></i>Create user account
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>
                <margee> CREATE USER ACCOUNT PAGE</margee>
            </h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span11">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Create User Account Form</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 20px;">
                        <form name="formsend" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                            method="POST" class="form-horizontal">
                            <span><small style="color: red;">* Required</small></span>
                            <div class="alert alert-danger" id="id_error" style="display: none;">
                                <center>
                                    <strong>This ID doesn't register in this system!!!.</strong>
                                </center>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>ID<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span8" placeholder="First name" name="id" required
                                        style="border-radius: 13px;" />
                                    <div class="alert alert-danger" id="id_exist" style="display: none;">
                                        <center>
                                            <strong>This ID is already exist!!!.</strong>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Username<small style="color: red;">*</small>
                                        :</strong> </label>
                                <div class="controls">
                                    <input type="text" class="span8" placeholder="username" name="username" required
                                        style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Password<small style="color: red;">*</small>
                                        :</strong> </label>
                                <div class="controls">
                                    <input type="password" class="span8" placeholder="passsword" name="password"
                                        required style="border-radius: 13px;" />
                                    <div class="alert alert-danger" id="pass_error" style="display: none;">
                                        <center>
                                            <strong>Password must be minimum of 6 characters!!!.</strong>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Re_Password<small style="color: red;">*</small>
                                        :</strong> </label>
                                <div class="controls">
                                    <input type="password" class="span8" placeholder="passsword" name="cpassword"
                                        required style="border-radius: 13px;" />
                                    <div class="alert alert-danger" id="cpass_error" style="display: none;">
                                        <center>
                                            <strong>Password and confirm password doesn't mached!!!.</strong>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <select class="span8" name="status" required style="border-radius: 13px;">
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
                                    <strong>The Account is Created successfully.</strong>
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
$id_error = $pass_error = $cpass_error = $regi_id_err = "";
if (isset($_POST["send"])) {

    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $pass = mysqli_real_escape_string($con, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($con, $_POST["cpassword"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $insertdate = date("Y-m-d H:i:s");

    $id_check = mysqli_query($con, "SELECT *FROM user WHERE id='$id'");
    if (mysqli_num_rows($id_check) < 1) {
        $id_error = "ID doesn't exist!!!";
?>
<script type="text/javascript">
document.getElementById("id_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "create_account_user.php";
}, 5000);
</script>
<?php
    }

    $id_check = mysqli_query($con, "SELECT *FROM uaccount WHERE user_id='$id'");
    if (mysqli_num_rows($id_check) > 0) {
        $regi_id_err = "This ID already exist!!!";
    ?>
<script type="text/javascript">
document.getElementById("id_exist").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "create_account_emp.php";
}, 5000);
</script>
<?php
    }
    if (strlen($pass) < 6) {
        $pass_error = "Password must be minimum of 6 characters";
    ?>
<script type="text/javascript">
document.getElementById("pass_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "create_account_user.php";
}, 5000);
</script>
<?php
    }
    if (!($pass == $cpassword)) {
        $cpass_error = "Password and confirm password doesn't mached!!!";
    ?>
<script type="text/javascript">
document.getElementById("cpass_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "create_account_user.php";
}, 5000);
</script>
<?php
    }
    if ($id_error == "" && $pass_error == "" && $cpass_error == "" && $regi_id_err == "") {
        $qur = "INSERT INTO uaccount values(NULL,'$id','$username','" . md5($pass) . "','$status',' $insertdate')";
        $res = mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));
        if ($res) { ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "create_account_emp.php";
}, 5000);
</script>
<?php
        } else {
            echo "Error: " . $sql . "" . mysqli_error($con);
        }
    }
}
mysqli_close($con);
include("footer.php");
?>