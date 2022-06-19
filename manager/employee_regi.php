<?php
include("header.php");
include("../connection.php");
$email_err = "";
?>
<!--border style-->
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#"><i class="icon icon-th-list"></i> <span>Manage Employee</span></a>
            <a href="employee_regi.php" title="Go to Employee Registration" class="tip-bottom">
                <i class="icon-laptop"></i>Employee Registration
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>EMPLOYEE REGISTRATION PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Employee Registration Form</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 20px;">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <span><small style="color: red;">* Required</small></span>
                            <div class="control-group">
                                <label class="control-label"><strong> First Name<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="fname" class="span8" placeholder="First name" name="fname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Middel Name<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="mname" class="span8" placeholder="Middel name" name="mname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Last Name<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="lname" class="span8" placeholder="Last name" name="lname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Gender<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <select class="span8" name="gender" required style="border-radius: 13px;">
                                        <option value="">Select gender...</option>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>
                                <!-- <div class="controls">
                                    <label>
                                        <input type="radio" name="radios" />&nbsp;&nbsp;
                                        Male</label>
                                    <label>
                                        <input type="radio" name="radios" />&nbsp;&nbsp;
                                        Female</label>
                                </div> -->
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Age<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="number" class="span8" placeholder="Enter age" name="age" required
                                        min="20" max="70" style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Email<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="email" id="email" class="span8" placeholder="Enter email" name="email"
                                        required style="border-radius: 13px;" />
                                    <div class="alert alert-danger" id="email_error" style="display: none;">
                                        <center>
                                            <strong>This email already exist!!!.</strong>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Phone number<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <div class="input-prepend"> <span class="add-on">+251 </span>
                                        <input type="text" id="phone" placeholder="999 999 999" class="span11"
                                            name="phone" required />
                                    </div>
                                    <div class="alert alert-danger" id="phone_error" style="display: none;">
                                        <center>
                                            <strong>This phone number already exist!!!.</strong>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Nationality<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="nationality" class="span8" placeholder="Enter nationality"
                                        name="nationality" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Subcity<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="subcity" class="span8" placeholder="Enter sucity"
                                        name="subcity" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Salary<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="salary" class="span8" placeholder="Enter salary"
                                        name="salary" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Role<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <select class="span8" name="position" required style="border-radius: 13px;">
                                        <option value="">Select job position...</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="storekpeer">Storekpeer</option>
                                        <option value="leder">Employee Leder</option>
                                        <option value="technician">Technician</option>
                                        <option value="security"> Security</option>
                                        <option value="clealiness"> Clealiness</option>
                                        <option value="other">Special Services</option>
                                    </select>
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
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>

                            <div class="form-actions">
                                <center>
                                    <button type="submit" id="f" name="register" class="btn btn-success"
                                        style="border-radius: 13px;"><strong>Register</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>Employee Registerd successfully.</strong>
                                </center>
                            </div>
                            <script type='text/javascript'>
                            function formValidation() {
                                //assign the fields
                                var firstname = document.getElementById('fname');
                                var middelname = document.getElementById('mname');
                                var lastname = document.getElementById('lname');
                                var phone = document.getElementById('phone');
                                var email = document.getElementById('email');
                                var subcity = document.getElementById('subcity');
                                var nationality = document.getElementById('nationality');
                                var salary = document.getElementById('salary');

                                if (isAlphabet(firstname, "please enter First name in letters only")) {
                                    if (lengthRestriction(firstname, 3, 30, "for First name")) {

                                        if (isAlphabet(middelname, "please enter Middel name in letters only")) {
                                            if (lengthRestriction(middelname, 3, 30, "for First name")) {

                                                if (isAlphabet(lastname, "please enter Last name in letters only")) {
                                                    if (lengthRestriction(lastname, 3, 30, "for Last name")) {
                                                        if (emailValidator(email,
                                                                "Please Enter email in this form'sample@gmail.com'"
                                                            )) {
                                                            if (isNumeric(phone,
                                                                    "please enter the Phone Number only Number ")) {
                                                                if (lengthRestriction(phone, 9, 9,
                                                                        "for your Phone number")) {

                                                                    if (isAlphanumeric(nationality,
                                                                            "please enter Your nationality in letters only"
                                                                        )) {
                                                                        if (lengthRestriction(nationality, 3, 25,
                                                                                "for your nationality")) {
                                                                            if (isAlphabet(subcity,
                                                                                    "please enter Your subcity in letters only"
                                                                                )) {
                                                                                if (lengthRestriction(subcity, 3,
                                                                                        30,
                                                                                        "for your subcity ")) {
                                                                                    if (isFloat(salary,
                                                                                            "please enter the employee salary only Number "
                                                                                        )) {
                                                                                        return true;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                return false;
                            }

                            function isAlphabet(elem, helperMsg) {
                                var alphaExp = /^[a-zA-Z]+$/;
                                if (elem.value.match(alphaExp)) {
                                    return true;
                                } else {
                                    alert(helperMsg);
                                    elem.focus();
                                    return false;
                                }
                            }

                            function emailValidator(elem, helperMsg) {
                                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                                if (elem.value.match(emailExp)) {
                                    return true;
                                } else {
                                    alert(helperMsg);
                                    elem.focus();
                                    return false;
                                }
                            }

                            function isNumeric(elem, helperMsg) {
                                var numericExpression = /^[0-9]+$/;
                                if (elem.value.match(numericExpression)) {
                                    return true;
                                } else {
                                    alert(helperMsg);
                                    elem.focus();
                                    return false;
                                }
                            }

                            function lengthRestriction(elem, min, max, helperMsg) {
                                var uInput = elem.value;
                                if (uInput.length >= min && uInput.length <= max) {
                                    return true;
                                } else {
                                    alert("Please enter between " + min + " and " + max + " characters" +
                                        helperMsg);
                                    elem.focus();
                                    return false;
                                }
                            }

                            function isAlphanumeric(elem, helperMsg) {
                                var alphaExp = /^[0-9a-zA-Z\/]+$/;
                                if (elem.value.match(alphaExp)) {
                                    return true;
                                } else {
                                    alert(helperMsg);
                                    elem.focus();
                                    return false;
                                }
                            }

                            function isFloat(elem, helperMsg) {
                                var alphaExp = /^(\d)*\.(\d)+$/;
                                if (elem.value.match(alphaExp)) {
                                    return true;
                                } else {
                                    alert(helperMsg);
                                    elem.focus();
                                    return false;
                                }
                            }
                            </script>
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
$email_err = $phone_err = "";
if (isset($_POST['register'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $fname = ucfirst($fname); //upercase first character
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $lname = ucfirst($lname); //upercase first character
    $mname = mysqli_real_escape_string($con, $_POST["mname"]);
    $mname = ucfirst($mname); //upercase first character
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $age = mysqli_real_escape_string($con, $_POST["age"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $nationality = mysqli_real_escape_string($con, $_POST["nationality"]);
    $nationality = ucfirst($nationality); //upercase first character
    $subcity = mysqli_real_escape_string($con, $_POST["subcity"]);
    $subcity = ucfirst($subcity); //upercase first character
    $salary = $_POST["salary"];
    $jop = mysqli_real_escape_string($con, $_POST["position"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);


    $email_checker = mysqli_query($con, "SELECT *FROM employee where gmail='$email'");
    if (mysqli_num_rows($email_checker) > 0) {
        $email_err = "email already exist!!!";
?>
<script type="text/javascript">
document.getElementById("email_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "employee_regi.php";
}, 5000);
</script>
<?php
    }

    $phone_checker = mysqli_query($con, "SELECT *FROM employee where phone='$phone'");
    if (mysqli_num_rows($phone_checker) > 0) {
        $phone_err = "phone number already exist!!!";
    ?>
<script type="text/javascript">
document.getElementById("phone_error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "employee_regi.php";
}, 5000);
</script>
<?php
    }
    if ($email_err == "" && $phone_err == "") {
        $query = "INSERT INTO employee(id,emp_id,fname,mname,lname,gender,age,gmail,phone,nationality,address,salary,jop_position,status)
        values(NULL,'','$fname','$mname','$lname','$gender','$age','$email','$phone','$nationality','$subcity','$salary','$jop',$status)";
        $res = mysqli_query($con, $query) or die("Error occurd" . mysqli_error($con));
        if (!$res) {
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
            //Generate id
            $last_id = mysqli_insert_id($con);
            if ($last_id) {
                $code = rand(1, 9999);
                $id_genreted = "EMP_" . $code . "_" . $last_id;
                $query = "UPDATE employee SET emp_id='$id_genreted' WHERE id='$last_id'";
                mysqli_query($con, $query);
            }
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
    } else {
        $email_err = "Email or Phone already exist!!!";
    }
    mysqli_close($con);
}
include("footer.php");
?>