<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['admin_id']))) {
    header("Location: ../login.php");
}
$id = $_GET['id'];
$sql = "select *from eaccount where id='$id'";
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
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage User</span></a>
            <a href="update_account_emp.php" title="Go to employee account page" class="tip-bottom">
                <i class="icon-user"></i>Employee
            </a>
            <a href="edite_emp.php" title="Go to update employee account form page" class="tip-bottom">
                <i class="icon-user"></i>Update employee account form
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
                        <h5>Update employee account Form</h5>
                    </div>
                    <div class="widget-content nopadding">
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
                                <label class="control-label"><strong>Role :</strong></label>
                                <div class="controls">
                                    <select class="span8" name="role" required style="border-radius: 13px;">
                                        <option value="admin" <?php if ($role == "admin") {
                                                                    echo "selected";
                                                                } ?>>Admin</option>
                                        <option value="storekpeer" <?php if ($role == "storekpeer") {
                                                                        echo "selected";
                                                                    } ?>>Storekpeer</option>
                                        <option value="security" <?php if ($role == "security") {
                                                                        echo "selected";
                                                                    } ?>>Security</option>
                                        <option value="manager" <?php if ($role == "manager") {
                                                                    echo "selected";
                                                                } ?>>Manager</option>
                                        <option value="manager" <?php if ($role == "technician") {
                                                                    echo "selected";
                                                                } ?>>Technician</option>
                                        <option value="manager" <?php if ($role == "clealiness") {
                                                                    echo "selected";
                                                                } ?>>Clealiness</option>
                                        <option value="manager" <?php if ($role == "other") {
                                                                    echo "selected";
                                                                } ?>>Special Services</option>
                                    </select>
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
</div>div>
</div>
<?php
if (isset($_POST['send'])) {
    $query = "UPDATE eaccount set username='$_POST[username]',password='$_POST[password]',role='$_POST[role]',status='$_POST[status]' where id=$id";
    $res = mysqli_query($con, $query) or die("error occured" . mysqli_error($con));
    if ($res) {
?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
setTimeout(function() {
    window.location.href = "update_account_emp.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
setTimeout(function() {
    window.location.href = "update_account_emp.php";
}, 3000);
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>