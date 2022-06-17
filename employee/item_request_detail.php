<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['emp_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
$emp_id = $_SESSION['emp_id'];
$insertdate = date("Y/m/d H:i:s");
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="item_request_detail.php" title="Go to Resource Request Page" class="tip-bottom"><i
                    class="icon-home"></i>
                Resource Request</a></div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>RESOUCE REQUEST PAGE</h5>
        </center>
        <hr>
        <form name="form1" action="" method="post" class="form-horizontal nopadding">
            <div class="alert alert-success" id="success" style="display:none;">
                <center>
                    <strong>Send Request successfully.</strong>
                </center>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="alert alert-danger" id="error" style="display: none;">
                        <center>
                            <strong>Same thing error,please triy agian.</strong>
                        </center>
                    </div>
                    <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Resource Request Form</h5>
                        </div>
                        <div class="widget-content nopadding" style="border-radius: 20px;">
                            <div class="span3">
                                <br>
                                <div>
                                    <?php
                                    $query = mysqli_query($con, "SELECT *FROM stock where status='1'") or die("Error occured" .
                                        mysqli_error($con));
                                    if (mysqli_num_rows($query) > 0) {
                                    ?>
                                    <label>Resource Name</label>
                                    <select class="span11" required name="name" onchange="select_type(this.value)"
                                        style="border-radius:10px" id="name">
                                        <option value="">Select</option>
                                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                                        <option value="<?php echo $row['item_name']; ?>">
                                            <?php echo $row['item_name']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                <br>
                                <div>
                                    <label>Resource Type</label>
                                    <select class="span11" name="type" required style="border-radius: 13px;" id="type">
                                        <option value="">Select type...</option>
                                        <!-- <option value='Computer'>Computer</option>
                                        <option value='office material'>Office Material</option>
                                        <option value='Car'>Car</option>
                                        <option value='Oil'>Oil</option>
                                        <option value='Clean material'>Clean material </option>
                                        <option value='water Material'>water Material </option>
                                        <option value='light Material'>light Material </option>
                                        <option value='Security Material'>security Material </option>
                                        <option value='other'>Others</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                <br>
                                <div>
                                    <label>Resource Category</label>
                                    <select class="span11" name="category" required style="border-radius: 13px;"
                                        onchange="select_quality(this.value)">
                                        <option value="">Select category...</option>
                                        <option value='Returnable'>Returnable</option>
                                        <option value='Disposable'>Disposable</option>
                                        <option value='Consumable'>Consumable</option>
                                        <option value='other'>Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="span3">
                                <br>
                                <div>
                                    <label>Resource Quality</label>
                                    <select class="span12" name="quality" required style="border-radius:10px">
                                        <option value="">Select...</option>
                                        <option value="high">High</option>
                                        <option value="moderate">Moderate</option>
                                        <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                <br>
                                <div>
                                    <label>Enter Quantity</label>
                                    <input type="number" class="span11" required name="quantity" id="qty"
                                        autocomplete="off" style="border-radius:10px" min="1">
                                </div>
                            </div>
                            <div class="span5">
                                <br>
                                <div>
                                    <label>Message</label>
                                    <textarea class="span11" placeholder="Write your message here" name="message"
                                        required style="border-radius: 13px;"></textarea>
                                </div>
                            </div>
                            <div class="span3">
                                <br>
                                <div>
                                    <label>Date</label>
                                    <input type="text" required class="span12" name="date"
                                        value="<?php echo $insertdate; ?>" readonly style="border-radius:10px">
                                </div>
                            </div>
                            <div class="span2">
                                <br>
                                <div style="float:right;">
                                    <label>&nbsp</label>
                                    <button type="submit" id="f" name="send" class="btn btn-success"
                                        style="border-radius: 13px;float: left;"><strong>Send</strong></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $type = mysqli_real_escape_string($con, $_POST["type"]);
    $category = mysqli_real_escape_string($con, $_POST["category"]);
    $quality = mysqli_real_escape_string($con, $_POST["quality"]);
    $quantity = mysqli_real_escape_string($con, $_POST["quantity"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);

    $check_quantity = mysqli_query($con, "SELECT *FROM stock where item_name='$name' and item_quality='$quality'");
    $row = mysqli_fetch_array($check_quantity);
    if ($row['item_quantity'] >= $quantity) {

        $sql = "INSERT INTO item_request values(NULL,'$emp_id','$name','$type','$category','$quality','$quantity','$message',' $insertdate','0','0')";
        $re = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
        if (!$re) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_request_detail.php";
}, 3000);
</script>
<?php
        } else {
        ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_request_detail.php";
}, 3000);
</script>
<?php
        }
    } else {
        echo "<script>alert('Not avalabile Resource,Please enter less than $row[item_quantity]'); 
        window.location='item_request_detail.php'</script>";
    }
}
include("footer.php");
?>
<script type="text/javascript">
function select_quality(vari) {
    $('#category').html('');
    //$('#city').html('<option>Select City</option>');
    $.ajax({
        type: 'post',
        url: 'ajax_selection.php',
        data: {
            vari: vari
        },
        success: function(data) {
            $('#category').html(data);
        }
    })
}

function select_type(vari) {
    $('#type').html('');
    //$('#city').html('<option>Select City</option>');
    $.ajax({
        type: 'post',
        url: 'ajax_selection.php',
        data: {
            type: vari
        },
        success: function(data) {
            $('#type').html(data);
        }
    })
}
</script>