<?php
include("header.php");
include("../connection.php");
$id = $_GET['id'];
$sql = "select *from employee where id=$id";
$query = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
$id = $fname = $mname = $lname = $gnder = $age = $gmail = $phone = $nationality = $address = $salary = $jop = "";
while ($row = mysqli_fetch_array($query)) {
    $id = $row["id"];
    $emp_id = $row["emp_id"];
    $fname = $row["fname"];
    $mname = $row["mname"];
    $lname = $row["lname"];
    $gender = $row["gender"];
    $age = $row["age"];
    $gmail = $row["gmail"];
    $phone = $row["phone"];
    $nationality = $row["nationality"];
    $address = $row["address"];
    $status = $row["status"];
    $salary = $row["salary"];
    $jop = $row["jop_position"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage Employee</span></a>
            <a href="update_employees.php" title="Go to Employee update page" class="tip-bottom"><i
                    class="icon-pencil"></i> Update Employee</a>
            <a href="#" title="Go to Employee update form" class="tip-bottom">
                Employee Update form</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>UPDATE EMPLOYEE INFORMATION PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Employee Edite Form</h5>
                    </div>
                    <!-- user edite in table form  -->
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
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
                                <label class="control-label"><strong> ID :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" value="<?php echo $emp_id; ?>" name="id" readonly
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
                                <label class="control-label"><strong>Address :</strong></label>
                                <div class="controls">
                                    <input type="text" id="subcity" class="span11" name="address"
                                        value="<?php echo $address; ?>" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Salary :</strong></label>
                                <div class="controls">
                                    <input type="text" id="salary" class="span11" name="salary"
                                        value="<?php echo $salary; ?>" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Job position :</strong></label>
                                <div class="controls">
                                    <select id="f" class="span11" name="jop" required style="border-radius: 13px;">
                                        <option value="admin" <?php if ($jop == "admin") {
                                                                    echo "selected";
                                                                } ?>>Admin</option>
                                        <option value="manager" <?php if ($jop == "manager") {
                                                                    echo "selected";
                                                                } ?>>Manager</option>
                                        <option value="technitian" <?php if ($jop == "technitian") {
                                                                        echo "selected";
                                                                    } ?>>Technitian</option>
                                        <option value="storekpeer" <?php if ($jop == "storekpeer") {
                                                                        echo "selected";
                                                                    } ?>>Storekpeer</option>
                                        <option value="security" <?php if ($jop == "security") {
                                                                        echo "selected";
                                                                    } ?>>Security</option>
                                        <option value="clealiness" <?php if ($jop == "clealiss") {
                                                                        echo "selected";
                                                                    } ?>>Clealiness</option>
                                        <option>Special Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required style="border-radius: 13px;">
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
                                        style="border-radius:13px"><strong>
                                            Update</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The Updated successfully.</strong>
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
<?php
if (isset($_POST["send"])) {

    $sql1 = "UPDATE employee set 
     fname='$_POST[fname]',mname='$_POST[mname]',lname='$_POST[lname]',
     gender='$_POST[gender]',age='$_POST[age]',gmail='$_POST[email]',
     phone='$_POST[phone]',nationality='$_POST[nationality]',
     address='$_POST[address]',status='$_POST[status]',
     salary='$_POST[salary]',jop_position='$_POST[jop]' WHERE id=$id";
    $result = mysqli_query($con, $sql1) or die("Error occured" . mysqli_error($con));
    if ($result) {
?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location = "update_employees.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>