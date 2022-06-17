<?php
include("header.php");
include("../connection.php");
$email_err = "";
?>
<!--border style-->
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="Go to Employee Registration" class="tip-bottom">
                <i class="icon icon-th-list"></i>Manage Item
            </a>
            <a href="item_add.php"><i class="icon-plus"></i>Add Item</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>ADD ITEM PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add Item Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="alert alert-danger" id="e" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Item not found,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="span3">
                                <br>
                                <div>
                                    <?php
                                    $query = mysqli_query($con, "SELECT *FROM stock") or die("Error occured" .
                                        mysqli_error($con));
                                    if (mysqli_num_rows($query) > 0) {
                                    ?>
                                    <label>Resource Name<small style="color: red;">*</small></label>
                                    <select class="span11" required name="item_name" style="border-radius:10px">
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
                                    <label>Resource Quality<small style="color: red;">*</small></label>
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
                                    <label>Enter Quantity<small style="color: red;">*</small></label>
                                    <input type="number" class="span11" required name="quantity" id="qty"
                                        autocomplete="off" style="border-radius:10px" min="1">
                                </div>
                            </div>
                            <div class="form-actions">
                                <br>
                                <center>
                                    <button type="submit" id="f" name="add" class="btn btn-success"
                                        style="border-radius: 13px;float:right"><strong>Add</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>Item Added successfully.</strong>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- employee view inteble form  -->
        <div class="row-fluid">
            <div class="span12">
                <center>
                    <h4>Resource Information</h4>
                </center>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item ID</th>
                                <th>Item Code</th>
                                <th>Item name</th>
                                <th>Item Type</th>
                                <th>Item category</th>
                                <th>Item Model</th>
                                <th>Item Quality</th>
                                <th>Item Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="output">
                            <?php
                            $result = mysqli_query($con, "select *from stock;");
                            $no = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row["item_id"]; ?></td>
                                <td><?php echo $row["item_code"]; ?></td>
                                <td><?php echo $row["item_name"]; ?></td>
                                <td><?php echo $row["item_type"]; ?></td>
                                <td><?php echo $row["item_category"]; ?></td>
                                <td><?php echo $row["item_model"]; ?></td>
                                <td><?php echo $row["item_quality"]; ?></td>
                                <td><?php echo $row["item_quantity"]; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <h4>
                        <div style="float: right"><span style="float:left;">Total:&nbsp;</span><span
                                style="float: left"><?php echo $no; ?></span></div>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--end-main-container-part-->
<?php
// REGISTER USER
if (isset($_POST['add'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($con, $_POST["item_name"]);
    $quality = mysqli_real_escape_string($con, $_POST["quality"]);
    $quantity = mysqli_real_escape_string($con, $_POST["quantity"]);
    $sql = "SELECT *FROM stock where item_name='$name' and item_quality='$quality'";
    $serch_item = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
    $row = mysqli_fetch_array($serch_item);
    if (!$serch_item) {
        $new_quantity = $row['item_quantity'] + $quantity;
        $sql2 = "UPDATE stock set item_quantity='$new_quantity' where item_name='$name' and item_quality='$quality'";
        $res = mysqli_query($con, $sql2) or die("Error occurd" . mysqli_error($con));
        if (!$res) {
?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_add.php";
}, 3000);
</script>
<?php
        } else {    ?>
<script type="text/javascript">
document.getElementById("e").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_add.php";
}, 3000);
</script>
<?php }
    } else {
        ?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_add.php";
}, 3000);
</script>
<?php
    }

    mysqli_close($con);
}
include("footer.php");
?>