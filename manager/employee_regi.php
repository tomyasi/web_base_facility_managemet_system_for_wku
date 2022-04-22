<?php
include("header.php");
include("../connection.php");
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="employee_regi.php" title="Go to Employee Registration" class="tip-bottom">
                <i class="icon icon-envelope"></i>Employee Registration
            </a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Employee Registration Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="control-group">
                                <label class="control-label"><strong> First Name :</strong></label>
                                <div class="controls">
                                    <input type="text" id="fname" class="span11" placeholder="First name" name="fname"
                                        required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Middel Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Middel name" name="mname" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Last Name :</strong></label>
                                <div class="controls">
                                    <input type="text" id="lname" class="span11" placeholder="Last name" name="lname"
                                        required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Gender :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="gender" required>
                                        <option value="">Select gender...</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Age :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="age" required>
                                        <option value="">Select age...</option>
                                        <?php for ($i = 20; $i <= 65; $i++) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Email :</strong></label>
                                <div class="controls">
                                    <input type="email" id="email" class="span11" placeholder="Enter email" name="email"
                                        required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Phone number :</strong></label>
                                <div class="controls">
                                    <div class="input-prepend"> <span class="add-on">+251 </span>
                                        <input type="text" id="phone" placeholder="999 999 999" class="span11"
                                            name="phone" required />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Nationality :</strong></label>
                                <div class="controls">
                                    <input type="text" id="nationality" class="span11" placeholder="Enter nationality"
                                        name="nationality" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Subcity :</strong></label>
                                <div class="controls">
                                    <input type="text" id="subcity" class="span11" placeholder="Enter sucity"
                                        name="subcity" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Salary :</strong></label>
                                <div class="controls">
                                    <input type="text" id="salary" class="span11" placeholder="Enter salary"
                                        name="salary" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Job position :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="position" required>
                                        <option value="">Select jop position...</option>
                                        <option>Maintenance</option>
                                        <option>Storekpeer</option>
                                        <option>Campus Safety and Security</option>
                                        <option>Campus Beauty and Clealiness</option>
                                        <option>Special Services</option>
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
                                    <button type="submit" name="register"
                                        class="btn btn-success"><strong>Register</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>Employee Registerd successfully.</strong>
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
// REGISTER USER
if (isset($_POST['register'])) {
    // receive all input values from the form

    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $mname = mysqli_real_escape_string($con, $_POST["mname"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $age = mysqli_real_escape_string($con, $_POST["age"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $nationality = mysqli_real_escape_string($con, $_POST["nationality"]);
    $subcity = mysqli_real_escape_string($con, $_POST["subcity"]);
    $salary = mysqli_real_escape_string($con, $_POST["salary"]);
    $jop = mysqli_real_escape_string($con, $_POST["positon"]);

    $query = "insert into employee 
    values(NULL,NULL,'$fname','$mname','$lname','$gender','$age','$email','$phone','$nationality','$subcity','salary','$jop')";

    if (!mysqli_query($con, $query)) {
?>
<script type="text/javascript">
document.getElementById("success").style.display = "none";
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "employee_regi.php";
}, 3000);
</script>
<?php
    } else {
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
    }
    mysqli_close($con);
}
include("footer.php");
?>