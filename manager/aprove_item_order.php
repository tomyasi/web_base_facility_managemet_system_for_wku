<?php
include("header.php");
include("../connection.php");
$insertdate = date("Y/m/d H:i:s");
$id = $_GET['id'];
$qury = mysqli_query($con, "SELECT * FROM item_order where order_id='$id'");
$row = mysqli_fetch_array($qury);
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_item_order.php" title="Go to view item order" class="tip-bottom"><i
                    class="icon-home"></i>
                View Item Order</a>
            <a href="aprove_item_order.php" title="Go to approve item order" class="tip-bottom">
                <i class="icon-check"></i>Approve Item Order
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
                        <h5>Item Approval Form</h5>
                    </div>
                    <div class="widget-content nopadding" style=" margin-left:20%">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="span8">
                                <br>
                                <div>
                                    <label>Approved Quantity</label>
                                    <input type="number" name="new_quantity" min="1"
                                        max="<?php echo $row['quantity']; ?>" value="<?php echo $row['quantity']; ?>"
                                        required style="border-radius: 13px;">
                                </div>
                            </div>

                            <div class="form-actions">
                                <br>
                                <center>
                                    <button type="submit" id="f" name="send" class="btn btn-success"
                                        style="border-radius: 13px;"><strong>Approve</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The Approved Successfully.</strong>
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
    $new_quantity = $_POST['new_quantity'];
    if (isset($_GET['id'])) {
        $e_id = $_GET['id'];
        $statment = mysqli_query($con, "SELECT * from item_order where order_id=$e_id");
        $row = mysqli_fetch_array($statment);
        $sta = "UPDATE item_order set aprove='1' where order_id=$e_id";
        $resu = mysqli_query($con, $sta);
        $query = mysqli_query($con, "UPDATE item_request SET ordered='1' WHERE re_id=$row[req_id]");
        //decrease the approval quantity
        mysqli_query($con, "UPDATE item_order set quantity=$new_quantity where order_id='$id'");
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