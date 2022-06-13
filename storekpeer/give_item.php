<?php
include("header.php");
include("../connection.php");
$full_name = $_SESSION['fname'] . ' ' . $_SESSION['mname'];
$full_name = ucfirst($full_name); //upercase first character
$insertdate = date("Y/m/d H:i:s");
$e_id = $_GET['id'];

$sql1 = mysqli_query($con, "SELECT *FROM item_order where order_id=$e_id");
$order_info = mysqli_fetch_array($sql1);
$emp_id = $order_info['emp_id'];
$sql = mysqli_query($con, "SELECT *FROM employee where id=$emp_id") or die("error occured" . mysqli_error($con));
$emp_info = mysqli_fetch_array($sql);
$re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
$re_by = ucfirst($re_by); //upercase first character
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$result = mysqli_query($con, "SELECT *FROM item_order where order_id='$e_id'");
$row = mysqli_fetch_array($result);
$name = $row['item_name'];
$quality = $row['quality'];
$quantity = $row['quantity'];
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>
<!--border style-->
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="Go to Employee Registration" class="tip-bottom">
                <i class="icon icon-th-list"></i>Item Order
            </a>
            <a href="item_add.php"><i class="icon-plus"></i>Give Item</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>GIVE ITEM PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Give Reguest Item Form</h5>
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
                                    <label>Today</label>
                                    <input type="text" required class="span12" name="date"
                                        value="<?php echo $insertdate; ?>" readonly style="border-radius:10px">
                                </div>
                            </div>
                            <div class="span3">
                                <br>
                                <div>
                                    <label>Give Item Schedule</label>
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
                                        style="border-radius: 13px;float:left"><strong>Submit</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The Sechedule submit Successfully.</strong>
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
// REGISTER USER
if (isset($_POST['send'])) {
    // receive all input values from the form
    $schedule = mysqli_real_escape_string($con, $_POST["schedule"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);

    $sql2 = "INSERT INTO give_item values(NULL,'$order_info[emp_id]','$order_info[emp_id]',
    '$order_info[item_name]','$order_info[item_type]','$order_info[item_category]',
    '$order_info[quality]','$order_info[quantity]','$insertdate','$message','$schedule','0')";

    $res = mysqli_query($con, $sql2) or die("Error occurd" . mysqli_error($con));
    if (!$res) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_order.php";
}, 3000);
</script>
<?php
    } else {
        //decrease the stock
        mysqli_query($con, "UPDATE item_order set give='1' where order_id='$e_id'") or die("Error occured" . mysqli_error($con));
        mysqli_query($con, "UPDATE stock set item_quantity=item_quantity-$quantity where (item_name='$name' and item_quality='$quality')");
    ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_order.php";
}, 3000);
</script>
<?php
    }

    mysqli_close($con);
}
include("footer.php");
?>