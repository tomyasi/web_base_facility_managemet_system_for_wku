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
                                                        if (isNumeric(salary,
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

<?php
require_once "db.php";
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $name_error = "Name must contain only alphabets and space";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    if (strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }
    if (strlen($mobile) < 10) {
        $mobile_error = "Mobile number must be minimum of 10 characters";
    }
    if ($password != $cpassword) {
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if (mysqli_query($conn, "INSERT INTO users(name, email, mobile ,password) VALUES('" . $name . "', '" . $email . "', '" . $mobile . "', '" . md5($password) . "')")) {
            header("location: registration.php");
            exit();
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Registration Form in PHP with Validation | Tutsmake.com</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Registration Form in PHP with Validation</h2>
                </div>
                <p>Please fill all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>
                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
                        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" name="signup" value="submit">
                    Already have a account?<a href="login.php" class="btn btn-default">Login</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>