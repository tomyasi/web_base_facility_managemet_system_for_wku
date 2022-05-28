<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['emp_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
$emp_id = $_SESSION['emp_id'];
$insertdate = date("Y/m/d H:i:s");
$e_id = $_GET['id'];
$result = mysqli_query($con, "SELECT *from serv_request where s_id=$e_id");
$requester = mysqli_fetch_array($result);
$user = $requester['user_id'];

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                View</a>
            <a href="view_service_request.php" title="Go to Service Request view" class="tip-bottom">
                <i class="icon-eye-open"></i>View Services Request
            </a>
            <a href="view_service_request.php" title="Go to Service Request Responce" class="tip-bottom">
                <i class="icon-reply"></i>Service Request Responce
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item Registration Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="span2">
                                <br>
                                <div>
                                    <label>Date</label>
                                    <input type="text" required class="span12" name="date"
                                        value="<?php echo $insertdate; ?>" readonly style="border-radius:10px">
                                </div>
                            </div>
                            <div class="span3">
                                <br>
                                <div>
                                    <label>Schedule</label>
                                    <input type="datetime-local" name="schedule" min="<?php echo $insertdate; ?>"
                                        data-date-format="dd-mm-yyyy" class="datepicker span11" required
                                        style="border-radius: 13px;">
                                </div>
                            </div>
                            <div class="span6">
                                <br>
                                <div>
                                    <label>Message</label>
                                    <textarea class="span11" placeholder="Write your message here" name="message"
                                        required style="border-radius: 13px;" rows="10" cols="20"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <br><br>
                                <center>
                                    <button type="submit" id="f" name="send" class="btn btn-success"
                                        style="border-radius: 13px;float:left"><strong>Send Sechedule</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The Sechedule Send Successfully.</strong>
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
if (isset($_POST['send'])) {
    /**   ++++++++++++++++++++++++++++++++++++  * */
    $statment = mysqli_query($con, "SELECT * from serv_request where s_id=$e_id");
    while ($row = mysqli_fetch_array($statment)) {
        $status = $row['view'];
        if ($status == "1") {
            $e_status = 0;
        }
        if ($status == "0") {
            $e_status = 1;
        }
        $sta = "UPDATE serv_request set view=$e_status where s_id=$e_id";
        $resu = mysqli_query($con, $sta);
        if ($resu) {;
            //header("location:service_responce.php");
        } else {
            echo mysqli_error($con);
        }
    }
    /**   ++++++++++++++++++++++++++++++++++++  **/
    $schedule = mysqli_real_escape_string($con, $_POST["schedule"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);
    $sql = "INSERT INTO serv_responce values(NULL,'$emp_id','$requester[user_id]','$message','$insertdate','$insertdate','0')";
    $re = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
    if (!$re) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "view_service_request.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "view_service_request.php";
}, 3000);
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>