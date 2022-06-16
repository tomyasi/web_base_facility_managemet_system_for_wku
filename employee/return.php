<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['emp_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
$emp_id = $_SESSION['emp_id'];
$insertdate = date("Y/m/d H:i:s");
$e_id = $_GET['id'];
// $result = mysqli_query($con, "SELECT *from serv_request where s_id=$e_id");
// $requester = mysqli_fetch_array($result);
// $user = $requester['user_id'];
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="item_return.php" title="Go to Service Request view" class="tip-bottom">
                <i class="icon-eye-open"></i>Return Item
            </a>
            <a href="return.php" title="Go to Service Request Responce" class="tip-bottom">
                <i class="icon-reply"></i>Return Item Schedule
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Return Item Schedule Form</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 20px;">
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
                                    <label>Today</label>
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
                            <!-- <div class="span6">
                                <br>
                                <div>
                                    <label>Message</label>
                                    <textarea class="span11" placeholder="Write your message here" name="message"
                                        required style="border-radius: 13px;" rows="10" cols="20"></textarea>
                                </div>
                            </div> -->
                            <div class="form-actions">
                                <br>
                                <center>
                                    <button type="submit" id="f" name="send" class="btn btn-success"
                                        style="border-radius: 13px;float:right"><strong>Send Sechedule</strong></button>
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
    $schedule = mysqli_real_escape_string($con, $_POST["schedule"]);
    // $message = mysqli_real_escape_string($con, $_POST["message"]);
    /**   ++++++++++++++++++++++++++++++++++++  * */
    //include("../connection.php");
    echo $schedule;
    $id = $_GET['id'];
    $sta = "UPDATE give_item set retu='1' return_time='$schedule' where id=$id";
    $resu = mysqli_query($con, $sta);
    // if ($resu) {;
    //     header("location:item_return.php");
    // } else {
    //     echo mysqli_error($con);
    // }
    /**   ++++++++++++++++++++++++++++++++++++  **/

    $sql = "INSERT INTO give_item(return_time) values('$schedule')";
    // $re = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
    if (!$resu) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_return.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_return.php";
}, 3000);
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>