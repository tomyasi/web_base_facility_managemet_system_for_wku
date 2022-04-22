<?php
include("header.php");
include("../connection.php");
$id = $_GET['id'];
$sql = "select *from user where id='$id'";
$result = mysqli_query($con, $sql);
echo $id;
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="send_request.php" title="Go to Send Request" class="tip-bottom">
                <i class="icon icon-envelope"></i>Send Request
            </a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>User Request Form</h5>
                        <?php echo "$id"; ?>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong> First Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="fname" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Middle Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="mname" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Last Name :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last name" name="lname" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>user ID :</strong> </label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter your ID" name="userid" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Phone number :</strong> </label>
                                <div class="controls">
                                    <div class="input-prepend"> <span class="add-on">+251 </span>
                                        <input type="text" placeholder="999 999 999" class="span11" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Service :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="service" required>
                                        <option value="">Select your service...</option>
                                        <option>Maintenance</option>
                                        <option>Campus Safety and Security</option>
                                        <option>Campus Beauty and Clealiness</option>
                                        <option>Special Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Message :</strong></label>
                                <div class="controls">
                                    <textarea class="span11" placeholder="Write your message here" name="message" required></textarea>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="form-actions">
                                <center>
                                    <button type="submit" name="send" class="btn btn-success">Send</button>
                                    <button type="text" name="clear" class="btn btn-danger">Clear</button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The request send successfully.</strong>
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
    $user_id = mysqli_real_escape_string($con, $_POST["userid"]);
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $mname = mysqli_real_escape_string($con, $_POST["mname"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $service = mysqli_real_escape_string($con, $_POST["service"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);

    $qur = "insert into request values(NULL,' $user_id ','$fname','$mname','$lname','$phone','$service','$message');";
    // mysqli_query($con, $qur) or die("error occured" . mysqli_error($con));

    if (!mysqli_query($con, $qur)) {
?>
        <script type="text/javascript">
            document.getElementById("success").style.display = "none";
            document.getElementById("error").style.display = "block";
            // refresh the page after 3 second
            setTimeout(function() {
                window.location.href = window.location.href;
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
                window.location.href = window.location.href;
            }, 3000);
        </script>
<?php
    }
    mysqli_close($con);
}

// if (isset($_POST['clear'])) {
//     $_POST['fname'] = "";
//     $_POST['lname'] = "";
//     $_POST['gender'] = "";
//     $_POST['age'] = "";
//     $_POST['email'] = "";
//     $_POST['phone'] = "";
//     $_POST['nationality'] = "";
//     $_POST['subcity'] = "";
//     $_POST['salary'] = "";
//     $_POST['position'] = "";
// }
mysqli_close($con);
include("footer.php");
?>