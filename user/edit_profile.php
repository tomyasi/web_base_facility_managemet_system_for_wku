<?php
include("header.php");
include("../connection.php");
$id = $_GET['id'];
$sql = "SELECT *from user where id=$id";
$query = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
$id = $fname = $mname = $lname = $gnder = $age = $gmail = $phone = $nationality = $address = "";
while ($row = mysqli_fetch_array($query)) {
    $id = $row["id"];
    $fname = $row["fname"];
    $mname = $row["mname"];
    $lname = $row["lname"];
    $gender = $row["gender"];
    $age = $row["age"];
    $gmail = $row["gmail"];
    $phone = $row["phone"];
    $nationality = $row["nationality"];
    $address = $row["subcity"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a>
            <a href="profile.php" title="Go to your profile" class="tip-bottom">
                <i class="icon-eye-open"></i>Profile</a>
            <a href="edit_profile.php" title="Go to your profile edit page" class="tip-bottom">
                <i class="icon-eye-open"></i>Profile Edit Page</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>UPDATE PROFILE INFORMATION PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Profile Edit Form</h5>
                    </div>
                    <!-- user edite in table form  -->
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong>First Name :</strong></label>
                                <div class="controls">
                                    <input type="text" id="fname" class="span11" name="fname"
                                        value="<?php echo $fname ?>" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Middel Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" name="mname" value="<?php echo $mname ?>" required
                                        style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Last Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" name="lname" value="<?php echo $lname ?>" required
                                        style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Gender :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="gender" required style="border-radius: 13px;">
                                        <option value="m" <?php if ($gender == "m") {
                                                                echo "selected";
                                                            } ?>>Male</option>
                                        <option value="f" <?php if ($gender == "f") {
                                                                echo "selected";
                                                            } ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Age :</strong></label>
                                <div class="controls">
                                    <input type="number" id="age" class="span11" placeholder="Enter age" name="age"
                                        required min="20" max="70" style="border-radius: 13px;"
                                        value="<?php echo $age; ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Email :</strong></label>
                                <div class="controls">
                                    <input type="email" id="email" class="span11" name="email"
                                        value="<?php echo $gmail; ?>" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Phone number</strong></label>
                                <div class="controls">
                                    <div class="input-prepend"> <span class="add-on">+251 </span>
                                        <input id="phone" type="text" placeholder="999 999 999" class="span11"
                                            name="phone" value="<?php echo $phone; ?>" required
                                            style="border-radius: 13px;" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Nationality :</strong></label>
                                <div class="controls">
                                    <input type="text" id="nationality" class="span11" placeholder="Enter nationality"
                                        name="nationality" value="<?php echo $nationality; ?>" required
                                        style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Subcity :</strong></label>
                                <div class="controls">
                                    <input type="text" id="subcity" class="span11" name="address"
                                        value="<?php echo $address; ?>" required style="border-radius: 13px;" />
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
                                        style="border-radius:13px"><strong>
                                            Save</strong></button>
                                </center>
                            </div>

                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The Updated successfully.</strong>
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

    $sql1 = "UPDATE user set 
     fname='$_POST[fname]',mname='$_POST[mname]',lname='$_POST[lname]',
     gender='$_POST[gender]',age='$_POST[age]',gmail='$_POST[email]',
     phone='$_POST[phone]',nationality='$_POST[nationality]',
     subcity='$_POST[address]' WHERE id=$id";
    $result = mysqli_query($con, $sql1) or die("Error occured" . mysqli_error($con));
    if ($result) {
?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location = "profile.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location = "edit_profile.php";
}, 3000);
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>