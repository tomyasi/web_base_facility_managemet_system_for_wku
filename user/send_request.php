<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['user_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
$query = mysqli_query($con, "SELECT *FROM user where id=$user_id");
$user_info = mysqli_fetch_array($query);
$fname = $user_info['fname'];
$lname = $user_info['mname'];
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
        <hr>
        <center>
            <h5>SERVICE REQUEST PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>User Request Form</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 20px;">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong>Service :</strong></label>
                                <div class="controls">
                                    <select class="span8" name="service" required style="border-radius: 13px;">
                                        <option value="">Select your service...</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="security">Campus Safety and Security</option>
                                        <option value="clealiness">Campus Beauty and Clealiness</option>
                                        <option value="other">Special Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Message :</strong></label>
                                <div class="controls">
                                    <textarea class="span8" placeholder="Write your message here" name="message"
                                        required style="border-radius: 13px;" rows="10" cols="20"></textarea>
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
                                        style="border-radius: 13px;">Send Service Requset</button>
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
    $service = mysqli_real_escape_string($con, $_POST["service"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);
    $insertdate = date("Y/m/d H:i:s");
    $qur = "INSERT into serv_request values(NULL,' $user_id ','$service','$message',' $insertdate',0);";
    if (!mysqli_query($con, $qur)) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "send_request.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "send_request.php";
}, 3000);
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>