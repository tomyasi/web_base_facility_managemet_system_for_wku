<?php
include("header.php");
include("../connection.php")
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage User</span></a>
            <a href="employee_regi.php" title="Go to User Registration" class="tip-bottom">
                <i class="icon icon-envelope"></i>User Registration
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>User Registration Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="user_regi.php" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong>First Name :</strong></label>
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
                                <label class="control-label"><strong> Last Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last Name" name="lname" required />
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
                                <label class="control-label"><strong> Age :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="age" required>
                                        <option value="">Select age...</option>
                                        <?php for ($i = 20; $i <= 50; $i++) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Email :</strong></label>
                                <div class="controls">
                                    <input type="email" id="email" class="span11" placeholder="Optional...."
                                        name="email" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Phone :</strong></label>
                                <div class="controls">
                                    <div class="input-prepend"> <span class="add-on">+251 </span>
                                        <input id="phone" type="text" placeholder="999 999 999" class="span11"
                                            name="phone" required>
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
                                <label class="control-label"><strong>Address :</strong></label>
                                <div class="controls">
                                    <input type="text" id="subcity" class="span11" placeholder="Enter address"
                                        name="address" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required>
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
                                    <button type="submit" name="send" class="btn btn-success"
                                        style="border-radius:10px"><strong>
                                            Register</strong></button>

                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The register successfully.</strong>
                                </center>
                            </div>
                            <!-- <script type='text/javascript'>
                            function formValidation() {
                                //assign the fields
                                var firstname = document.getElementById('fname');
                                var middelname = document.getElementById('mname');
                                var lastname = document.getElementById('lname');
                                var email = document.getElementById('email');
                                var phone = document.getElementById('phone');
                                var nationality = document.getElementById('nationality');
                                var subcity = document.getElementById('address');

                                if (isAlphabet(firstname, "please enter First name in letters only")) {
                                    if (lengthRestriction(firstname, 3, 30, "for First name")) {

                                        if (isAlphabet(middelname, "please enter Middel name in letters only")) {
                                            if (lengthRestriction(middelname, 3, 30, "for First name")) {

                                                if (isAlphabet(lastname, "please enter Last name in letters only")) {
                                                    if (lengthRestriction(lastname, 3, 30, "for Last name")) {

                                                        if (emailValidator(email,
                                                                "Please Enter email in this form'sample@gmail.com'")) {
                                                            if (isNumeric(phone,
                                                                    "please enter the Phone Number only Number ")) {
                                                                if (lengthRestriction(phone, 9, 9,
                                                                        "for your Phone number")) {

                                                                    if (isAlphabet(nationality,
                                                                            "please enter Your nationality in letters only"
                                                                        )) {
                                                                        if (lengthRestriction(nationality, 3, 25,
                                                                                "for your nationality")) {
                                                                            if (isAlphabet(address,
                                                                                    "please enter Your address in letters only"
                                                                                )) {
                                                                                if (lengthRestriction(address, 3, 30,
                                                                                        "for your address ")) {
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

                            // function isAlphanumeric(elem, helperMsg) {
                            //     var alphaExp = /^[0-9a-zA-Z\/]+$/;
                            //     if (elem.value.match(alphaExp)) {
                            //         return true;
                            //     } else {
                            //         alert(helperMsg);
                            //         elem.focus();
                            //         return false;
                            //     }
                            // }

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
                            </script> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST["send"])) {

    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $mname = mysqli_real_escape_string($con, $_POST["mname"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $age = mysqli_real_escape_string($con, $_POST["age"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $nationality = mysqli_real_escape_string($con, $_POST["nationality"]);
    $subcity = mysqli_real_escape_string($con, $_POST["address"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);

    $qur = "INSERT INTO user(id,user_id,fname,mname,lname,gender,age,gmail,phone,nationality,address,status) 
    values (NULL,NULL,'$fname','$mname','$lname','$gender','$age','$email','$phone','$nationality','$address',$status)";
    $res = mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));
    if ($res) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "none";
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "user_regi.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("success").style.display = "none";
document.getElementById("error").style.display = "block";
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>