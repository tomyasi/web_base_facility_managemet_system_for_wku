<?php
include("header.php");
include("../connection.php");
$id = $_GET['id'];
$sql = "select *from stock where item_id=$id";
$query = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
$id = $code = $name = $type = $category = $model = $quality = $quantity = $status  = "";
while ($row = mysqli_fetch_array($query)) {
    $id = $row["id"];
    $code = $row["item_code"];
    $name = $row["item_name"];
    $type = $row["item_type"];
    $category = $row["item_category"];
    $model = $row["item_model"];
    $quality = $row["item_quality"];
    $quantity = $row["item_quantity"];
    $status = $row["status"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage Item</span></a>
            <a href="update_users.php" title="Go to User update" class="tip-bottom"><i class="icon-pencil"></i> Update
                Item</a>
            <a href="user_edite.php" title="Go to User update form" class="tip-bottom">
                Item Update form</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item Update Form</h5>
                    </div>
                    <!-- user edite in table form  -->
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong>Item Code :</strong></label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter item code" name="code" required
                                        style="border-radius: 13px;" value="<?php echo $code; ?>" readonly />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Type :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="type" required style="border-radius: 13px;">
                                        <option value='Computer' <?php if ($type == "Computer") echo "selected"; ?>>
                                            Computer</option>
                                        <option value='office material'
                                            <?php if ($type == "office material") echo "selected"; ?>>Office Material
                                        </option>
                                        <option value='Car' <?php if ($type == "Car") echo "selected"; ?>>Car</option>
                                        <option value='Oil' <?php if ($type == "Oil") echo "selected"; ?>>Oil</option>
                                        <option value='Clean material'
                                            <?php if ($type == "Clean material") echo "selected"; ?>>Clean material
                                        </option>
                                        <option value='water Material'
                                            <?php if ($type == "water Material") echo "selected"; ?>>water Material
                                        </option>
                                        <option value='light Material'
                                            <?php if ($type == "light Material") echo "selected"; ?>>light Material
                                        </option>
                                        <option value='Security Material'
                                            <?php if ($type == "Security Material") echo "selected"; ?>>security
                                            Material </option>
                                        <option value='other' <?php if ($type == "other") echo "selected"; ?>>Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Categoty :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="category" required style="border-radius: 13px;">
                                        <option value='Returnable' <?php if ($type == "Returnable") echo "selected"; ?>>
                                            Returnable</option>
                                        <option value='Disposable' <?php if ($type == "Disposable") echo "selected"; ?>>
                                            Disposable</option>
                                        <option value='Consumable' <?php if ($type == "Car") echo "selected"; ?>>
                                            Consumable</option>
                                        <option value='other' <?php if ($type == "Consumable") echo "selected"; ?>>
                                            Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Name :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="name" required style="border-radius: 13px;">
                                        <option value='desktop' <?php if ($type == "desktop") echo "selected"; ?>>
                                            Desktop</option>
                                        <option value='laptop' <?php if ($type == "laptop") echo "selected"; ?>>Laptop
                                        </option>
                                        <option value='Soap' <?php if ($type == "soap") echo "selected"; ?>>Soap
                                        </option>
                                        <option value='Detergent' <?php if ($type == "Detergent") echo "selected"; ?>>
                                            Detergent</option>
                                        <option value='gauntlet' <?php if ($type == "gauntlet") echo "selected"; ?>>
                                            gauntlet</option>
                                        <option value='selverbrush'
                                            <?php if ($type == "selverbrush") echo "selected"; ?>>selverbrush</option>
                                        <option value='metsrga' <?php if ($type == "metsrga") echo "selected"; ?>>
                                            metsrga</option>
                                        <option value='chair' <?php if ($type == "chair") echo "selected"; ?>>Chair
                                        </option>
                                        <option value='table' <?php if ($type == "table") echo "selected"; ?>>table
                                        </option>
                                        <option value='boarde' <?php if ($type == "boarde") echo "selected"; ?>>boarde
                                        </option>
                                        <option value='stapler' <?php if ($type == "stapler") echo "selected"; ?>>
                                            Stapler</option>
                                        <option value='kerosene' <?php if ($type == "Returnable") echo "selected"; ?>>
                                            kerosene</option>
                                        <option value='naphtha' <?php if ($type == "naphtha") echo "selected"; ?>>
                                            naphtha</option>
                                        <option value='grease' <?php if ($type == "grease") echo "selected"; ?>>grease
                                        </option>
                                        <option value='bus' <?php if ($type == "bus") echo "selected"; ?>> bus</option>
                                        <option value='minbus' <?php if ($type == "minbus") echo "selected"; ?>> minbus
                                        </option>
                                        <option value='loary' <?php if ($type == "loary") echo "selected"; ?>> loary
                                        </option>
                                        <option value='teyota' <?php if ($type == "teyota") echo "selected"; ?>> teyota
                                        </option>
                                        <option value='motor' <?php if ($type == "motor") echo "selected"; ?>> motor
                                        </option>
                                        <option value='cylinder' <?php if ($type == "cylinder") echo "selected"; ?>>
                                            cylinder</option>
                                        <option value='tube' <?php if ($type == "tube") echo "selected"; ?>> tube
                                        </option>
                                        <option value='watergage' <?php if ($type == "watergage") echo "selected"; ?>>
                                            watergage</option>
                                        <option value='vavola' <?php if ($type == "vavola") echo "selected"; ?>> vavola
                                        </option>
                                        <option value='switch on/off'
                                            <?php if ($type == "switch on/off") echo "selected"; ?>> switch on/off
                                        </option>
                                        <option value='wire' <?php if ($type == "wire") echo "selected"; ?>> wire
                                        </option>
                                        <option value='other' <?php if ($type == "other") echo "selected"; ?>> Other
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Model :</strong></label>
                                <div class="controls">
                                    <input type="text" id="nationality" class="span11" placeholder="Enter item model"
                                        name="model" required style="border-radius: 13px;"
                                        value="<?php echo $model; ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Quality:</strong></label>
                                <div class="controls">
                                    <input type="text" id="subcity" class="span11" placeholder="Enter item quality"
                                        name="quality" required style="border-radius: 13px;"
                                        value="<?php echo $quality; ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Quantity :</strong></label>
                                <div class="controls">
                                    <input type="number" class="span11" placeholder="Enter item quantity"
                                        name="quantity" required min="0" style="border-radius: 13px;"
                                        value="<?php echo $quantity; ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required style="border-radius: 13px;">
                                        <option value="1" <?php if ($status == "1") {
                                                                echo "selected";
                                                            } ?>>Enable</option>
                                        <option value="0" <?php if ($status == "0") {
                                                                echo "selected";
                                                            } ?>>Desable</option>
                                    </select>
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
                                        style="border-radius:13px"><strong>
                                            Update</strong></button>
                                </center>
                            </div>

                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>The Item Updated successfully.</strong>
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

    $sql1 = "UPDATE stock set 
     item_code='$_POST[code]',item_name='$_POST[name]',item_type='$_POST[type]',
     item_category='$_POST[category]',item_model='$_POST[model]',item_quality='$_POST[quality]',
     item_quantity='$_POST[quantity]',status='$_POST[status]' WHERE item_id='$id'";
    $result = mysqli_query($con, $sql1) or die("Error occured" . mysqli_error($con));
    if ($result) {
?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location = "item_update.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
</script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>