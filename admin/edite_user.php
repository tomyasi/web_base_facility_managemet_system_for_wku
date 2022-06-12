<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['admin_id']))) {
    header("Location: ../login.php");
}
$id = $_GET['id'];
$sql = "select *from uaccount where id='$id'";
$result = mysqli_query($con, $sql);
$aid = "";
$username = "";
$password = "";
$role = "";
$status = "";
while ($row = mysqli_fetch_array($result)) {
    $aid = $row["id"];
    $username = $row["username"];
    $password = $row["password"];
    $status = $row["status"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage User</span></a>
            <a href="update_account_user.php" title="Go to user account page" class="tip-bottom">
                <i class="icon-user"></i>User
            </a>
            <a href="edite_user.php" title="Go to update user account form page" class="tip-bottom">
                <i class="icon-user"></i>Update user account form
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>
                <margee>UPDATE EMPLOYEE ACCOUNT PAGE</margee>
            </h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Update user account form</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 20px;">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong> ID :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span8" value="<?php echo $aid; ?>" name="id" readonly
                                        style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Username :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span8" value="<?php echo $username; ?>" name="username"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Password :</strong> </label>
                                <div class="controls">
                                    <input type="password" class="span8" value="<?php echo $password; ?>"
                                        name="password" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span8" name="status" required style="border-radius: 13px;">
                                        <option value="1" <?php if ($status == "1") {
                                                                echo "selected";
                                                            } ?>>Active</option>
                                        <option value="0" <?php if ($status == "0") {
                                                                echo "selected";
                                                            } ?>>Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="form-actions">
                                <center>
                                    <button type="submit" name="send" class="btn btn-success"
                                        style="border-radius: 13px;">Update</button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>Update accounte successfully.</strong>
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
if (isset($_POST['send'])) {
    $pass = md5($_POST['password']);
    $query = "update uaccount set username='$_POST[username]',password='$pass',status='$_POST[status]' where id=$id";
    $res = mysqli_query($con, $query) or die("error occured" . mysqli_error($con));
    if ($res) {
?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
setTimeout(function() {
    window.location.href = "update_account_user.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("error").style.display = "blpck";
setTimeout(function() {
    window.location.href = "update_account_user.php";
}, 3000);
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>