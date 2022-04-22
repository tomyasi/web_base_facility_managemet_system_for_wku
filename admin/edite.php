<?php
include("header.php");
include("../connection.php");
// $id = $_GET['id'];
$id = 6;
$sql = "select *from account where id='$id'";
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
    $role = $row["role"];
    $status = $row["status"];
}
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
                        <?php echo "$id"; ?>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong> ID :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" value="<?php echo $aid; ?>" name="id" readonly />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Username :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" value="<?php echo $username; ?>" name="username" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Password :</strong> </label>
                                <div class="controls">
                                    <input type="password" class="span11" value="<?php echo $password; ?>" name="password" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Role :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="role" required>
                                        <option <?php if ($role == "admin") {
                                                    echo "selected";
                                                } ?>>Admin</option>
                                        <option <?php if ($role == "user") {
                                                    echo "selected";
                                                } ?>>User</option>
                                        <option <?php if ($role == "employee") {
                                                    echo "selected";
                                                } ?>>Employee</option>
                                        <option <?php if ($role == "manager") {
                                                    echo "selected";
                                                } ?>>Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required>
                                        <option <?php if ($status == "active") {
                                                    echo "selected";
                                                } ?>>Active</option>
                                        <option <?php if ($status == "inactive") {
                                                    echo "selected";
                                                } ?>>Inactive</option>
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
                                    <button type="submit" name="send" class="btn btn-success">Update</button>
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
</div>div>
</div>
<?php
if (isset($_POST['send'])) {
    $query = "update account set username='$_POST[username]',password='$_POST[password]',role='$_POST[role]',status='$_POST[status]' where id=$id";
    $res = mysqli_query($con, $query) or die("error occured" . mysqli_error($con));
    if ($res) {
?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
            setTimeout(function() {
                window.location.href = "update_account.php";
            }, 3000);
        </script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>