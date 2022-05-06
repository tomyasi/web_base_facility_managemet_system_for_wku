<?php
include("header.php");
include("../connection.php");
?>
<!-- ***************************** -->
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage User</span></a>
            <a href="employee_regi.php" title="Go to User Registration" class="tip-bottom">
                <i class="icon-laptop"></i>User Registration
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>USER REGISTRATION PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid" style="float:right">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>User Registration Form</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 20px;">
                        <form name="formsend" action="user_regi.php" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="alert alert-danger display-error" style="display: none"></div>
                            <span><small style="color: red;">* Required</small></span>
                            <div class="control-group">
                                <label class="control-label"><strong>First Name<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="fname" class="span11" placeholder="First name" name="fname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><strong> Middel Name<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="mname" class="span11" placeholder="Middel name" name="mname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Last Name<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="lname" class="span11" placeholder="Last Name" name="lname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Gender<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <select id="gender" class="span11" name="gender" required
                                        style="border-radius: 13px;">
                                        <option value="">Select gender...</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Age<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="number" id="age" class="span11" placeholder="Enter age" name="age"
                                        required min="20" max="70" style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Email :</strong></label>
                                <div class="controls">
                                    <input type="email" id="email" class="span11" placeholder="Optional...."
                                        name="email" style="border-radius: 13px;" />
                                    <span></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Phone<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <div class="input-prepend"> <span class="add-on">+251 </span>
                                        <input id="phone" type="text" placeholder="999 999 999" class="span11"
                                            name="phone" required style="border-radius: 13px;">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Nationality<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="nationality" class="span11" placeholder="Enter nationality"
                                        name="nationality" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Address<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <input type="text" id="address" class="span11" placeholder="Enter address"
                                        name="address" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status<small style="color: red;">*</small>
                                        :</strong></label>
                                <div class="controls">
                                    <select id="status" class="span11" name="status" required
                                        style="border-radius: 13px;">
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
                                    <button id="form" type="submit" name="send" class="btn btn-success"
                                        style="border-radius: 10px;"><strong>
                                            Register</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The register successfully.</strong>
                                </center>
                            </div>
                            <script type='text/javascript'>
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
                                    if (lengthRestriction(firstname, 3, 30, " for First name")) {

                                        if (isAlphabet(middelname, "please enter Middel name in letters only")) {
                                            if (lengthRestriction(middelname, 3, 30, " for First name")) {

                                                if (isAlphabet(lastname, "please enter Last name in letters only")) {
                                                    if (lengthRestriction(lastname, 3, 30, " for Last name")) {

                                                        if (emailValidator(email,
                                                                "Please Enter email in this form'sample@gmail.com'")) {
                                                            if (isNumeric(phone,
                                                                    "please enter the Phone only Number ")) {
                                                                if (phonelengthRestriction(phone, 9, 9,
                                                                        " for your Phone number")) {

                                                                    if (isAlphabet(nationality,
                                                                            "please enter Your nationality in letters only"
                                                                        )) {
                                                                        if (lengthRestriction(nationality, 3, 25,
                                                                                " for your nationality")) {
                                                                            if (isAlphabet(address,
                                                                                    "please enter Your address in letters only"
                                                                                )) {
                                                                                if (lengthRestriction(address, 3, 30,
                                                                                        " for your address ")) {
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

                            function phonelengthRestriction(elem, min, max, helperMsg) {
                                var uInput = elem.value;
                                if (uInput.length >= min && uInput.length <= max) {
                                    return true;
                                } else {
                                    alert("Please enter only " + max + " Digit number" +
                                        helperMsg);
                                    elem.focus();
                                    return false;
                                }
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
    // input form form
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $fname = ucfirst($fname); //upercase first character
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $lname = ucfirst($lname); //upercase first character
    $mname = mysqli_real_escape_string($con, $_POST["mname"]);
    $lname = ucfirst($lname); //upercase first character
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $age = mysqli_real_escape_string($con, $_POST["age"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $nationality = mysqli_real_escape_string($con, $_POST["nationality"]);
    $nationality = ucfirst($nationality); //upercase first character
    $subcity = mysqli_real_escape_string($con, $_POST["address"]);
    $subcity = ucfirst($status); //upercase first character
    $status = mysqli_real_escape_string($con, $_POST["status"]);

    $qur = "INSERT INTO user(id,user_id,fname,mname,lname,gender,age,gmail,phone,nationality,subcity,status) 
    values (NULL,NULL,'$fname','$mname','$lname','$gender','$age','$email','$phone','$nationality','$subcity',$status)";
    $res = mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));
    $last_id = mysqli_insert_id($con);
    if ($last_id) {
        $code = rand(1, 9999);
        $id_genreted = "USER_" . $code . "_" . $last_id;
        $query = "UPDATE user SET user_id='" . $id_genreted . "' WHERE id='" . $last_id . "'";
    }
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
<script type="text/javascript">
$('document').ready(function() {
    var username_state = false;
    var email_state = false;
    $('#username').on('blur', function() {
        var username = $('#username').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                'username_check': 1,
                'username': username,
            },
            success: function(response) {
                if (response == 'taken') {
                    username_state = false;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass("form_error");
                    $('#username').siblings("span").text('Sorry... Username already taken');
                } else if (response == 'not_taken') {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass("form_success");
                    $('#username').siblings("span").text('Username available');
                }
            }
        });
    });
    $('#email').on('blur', function() {
        var email = $('#email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email,
            },
            success: function(response) {
                if (response == 'taken') {
                    email_state = false;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass("form_error");
                    $('#email').siblings("span").text('Sorry... Email already taken');
                } else if (response == 'not_taken') {
                    email_state = true;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass("form_success");
                    $('#email').siblings("span").text('Email available');
                }
            }
        });
    });

    $('#reg_btn').on('click', function() {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        if (username_state == false || email_state == false) {
            $('#error_msg').text('Fix the errors in the form first');
        } else {
            // proceed with form submission
            $.ajax({
                url: 'register.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'username': username,
                    'password': password,
                },
                success: function(response) {
                    alert('user saved');
                    $('#username').val('');
                    $('#email').val('');
                    $('#password').val('');
                }
            });
        }
    });
});
// $(document).ready(function() {
//     $("#form").blur(function() {
//         var phone = $("#phone").val();
//         var gmail = $("#gmail").val();
//         $.ajax({
//             url: "check_exist_phone_email.php",
//             type: "post",
//             data: {
//                 phone: phone,
//                 gmail: gmail
//             },
//             success: function(data) {
//                 $("#gmail-error").html(html);
//                 $("#gmail-error").css("display", "block");
//             }
//         });
//     });
// });
</script>