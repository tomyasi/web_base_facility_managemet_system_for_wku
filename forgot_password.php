<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login facility management system</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="bootstrap/css/matrix-login.css" />
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <link href="images/wkulogo7.png" rel="icon">
</head>
<style>
#loginbox {
    opacity: 75%;

}

.form-actions input[type="submite"] {
    border: none;
    outline: none;
    height: 40px;
    width: 40px;
}
</style>

<body class="img js-fullheight" style="background-image: url(assets/img/wkulogo1.jpg);">
    <div id="loginbox" style="border-radius: 15px;">
        <form name="formlogin" class="form-vertical" action="" method="POST" onsubmit='return formValidation()'>
            <div class="control-group normal_text">
                <h3>WKUFMS<br>Forgot Password</h3>
            </div>
            <div class="alert alert-danger" id="error" style="display: none;">
                <center>
                    <strong>Invalid username or password,please triy agian.</strong>
                </center>
            </div>
            <div class="alert alert-danger" id="role_err" style="display: none;">
                <center>
                    <strong>Your Role is Invalid,please triy agian.</strong>
                </center>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-envelope"></i></span><input type="email"
                            placeholder="Enter your email" name="email" id="email" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <select name="role" required style="border-radius: 13px;">
                            <option value="">...Select Role...</option>
                            <option value="employee">Employee's</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <center>
                    <input type="submit" name="submit" value="Reset Password" class="btn btn-success"
                        style="border-radius: 13px;">
                </center>
            </div>
            <script type='text/javascript'>
            function formValidation() {
                //assign the fields
                var email = document.getElementById('email');
                if (emailValidator(email, "Please Enter email in this form'sample@gmail.com'")) {
                    return true;
                }
                return false;
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
            </script>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $role = $_POST["role"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $error = "";
    if (!$email) {
        $error .= "<p>Invalid email address please type a valid email address!</p>";
    } elseif ($role == 'user') {
        $sel_query = "SELECT * FROM user WHERE gmail='" . $email . "'";
        $results = mysqli_query($con, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .= "<p>No user is registered with this email address!</p>";
        }
    } else {
        $sel_query = "SELECT * FROM employee WHERE gmail='" . $email . "'";
        $results = mysqli_query($con, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .= "<p>No employee is registered with this email address!</p>";
        }
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div>
        <br /><a href='javascript:history.go(-1)'>Go Back</a>";
    } else {
        $expFormat = mktime(
            date("H"),
            date("i"),
            date("s"),
            date("m"),
            date("d") + 1,
            date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5(2418 * 2);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        // Insert Temp Table
        mysqli_query(
            $con,
            "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
            VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
        );


        //Load Composer's autoloader
        require 'vendor/autoload.php';
        $output = '<p>Dear user,</p>';
        $output .= '<p>Please click on the following link to reset your password.</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p><a href="https://www.allphptricks.com/forgot-password/reset-password.php?
        key=' . $key . '&email=' . $email . '&action=reset" target="_blank">
        https://www.allphptricks.com/forgot-password/reset-password.php
        ?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser.
         The link will expire after 1 day for security reason.</p>';
        $output .= '<p>If you did not request this forgotten password email, no action 
        is needed, your password will not be reset. However, you may want to log into 
        your account and change your security password as someone may have guessed it.</p>';
        $output .= '<p>Thanks,</p>';
        $output .= '<p>AllPHPTricks Team</p>';
        $body = $output;
        $subject = "Password Recovery";

        $email_to = $email;
        $fromserver = "noreply@yourwebsite.com";

        require("PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "localhost"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@yourwebsite.com"; // Enter your email here
        $mail->Password = "password"; //Enter your password here
        $mail->Port = 25;
        $mail->IsHTML(true);
        $mail->From = "noreply@yourwebsite.com";
        $mail->FromName = "AllPHPTricks";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "<div class='error'>
            <p>An email has been sent to you with instructions on how to reset your password.</p>
             </div><br /><br /><br />";
        }
    }
}
?>