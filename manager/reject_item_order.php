<?php
include("header.php");
include("../connection.php");
$insertdate = date("Y/m/d H:i:s");
$id = $_GET['id'];
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_item_order.php" title="Go to view item order" class="tip-bottom"><i
                    class="icon-eye-open"></i>
                View Item Order</a>
            <a href="reject_item_order.php" title="Go to Reject item order" class="tip-bottom">
                <i class="icon-remove-sign"></i>Reject Item Order
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
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item Reject Form</h5>
                    </div>
                    <div class="widget-content nopadding" style=" margin-left:20%">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="span8">
                                <br>
                                <div>
                                    <label>Remark</label>
                                    <textarea class="span11" placeholder="Write your remark here" name="message"
                                        required style="border-radius: 13px;" rows="10" cols="20"></textarea>
                                </div>
                            </div>
                            <div class="span8">
                                <br>
                                <div>
                                    <center>
                                        <button type="submit" id="f" name="send" class="btn btn-danger"
                                            style="border-radius: 13px;"><strong>Reject</strong></button>
                                    </center>
                                </div>
                            </div>
                            <!-- <div class="form-actions">
                                <br>

                                <button type="submit" id="f" name="send" class="btn btn-success"
                                    style="border-radius: 13px;"><strong>Reject</strong></button>

                            </div> -->
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The Reject Successfully.</strong>
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
    $remark = $_POST['message'];
    if (isset($_GET['id'])) {
        $e_id = $_GET['id'];
        //$statment = mysqli_query($con, "SELECT * from item_order where order_id=$e_id");
        //$row = mysqli_fetch_array($statment);
        $sta = "UPDATE item_order set aprove='2',message='$remark' where order_id=$e_id";
        $resu = mysqli_query($con, $sta);
        //$query = mysqli_query($con, "UPDATE item_request SET ordered='2' WHERE re_id=$row[req_id]");
        //decrease the approval quantity
        //mysqli_query($con, "UPDATE item_order set quantity=$new_quantity where order_id='$id'");
        if (!$resu) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "aprove_item_order.php";
}, 3000);
</script>
<?php
        } else {
        ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "view_item_order.php";
}, 3000);
</script>
<?php
        }
    }
}
mysqli_close($con);
include("footer.php");
?>