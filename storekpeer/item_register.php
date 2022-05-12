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
            <a href="item_register.php" title="Go to Employee Registration" class="tip-bottom">
                <i class="icon icon-envelope"></i>Item Registration
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>ITEM REGISTRATION PAGE</h5>
        </center>
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

                            <div class="control-group">
                                <label class="control-label"><strong>Item Code :</strong></label>
                                <div class="controls">
                                    <input type="number" class="span11" placeholder="Enter item code" name="code"
                                        required min="1" style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Type :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="type" required style="border-radius: 13px;">
                                        <option value="">Select item type...</option>
                                        <option value='Computer'>Computer</option>
                                        <option value='office material'>Office Material</option>
                                        <option value='Car'>Car</option>
                                        <option value='Oil'>Oil</option>
                                        <option value='Clean material'>Clean material </option>
                                        <option value='water Material'>water Material </option>
                                        <option value='light Material'>light Material </option>
                                        <option value='Security Material'>security Material </option>
                                        <option value='other'>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Categoty :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="category" required style="border-radius: 13px;">
                                        <option value="">Select item category...</option>
                                        <option value='Returnable'>Returnable</option>
                                        <option value='Disposable'>Disposable</option>
                                        <option value='Consumable'>Consumable</option>
                                        <option value='other'>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Name :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="name" required style="border-radius: 13px;">
                                        <option value="">Select item name...</option>
                                        <option value='desktop'>Desktop</option>
                                        <option value='laptop'>Laptop</option>
                                        <option value='Soap'>Soap</option>
                                        <option value='Detergent'>Detergent</option>
                                        <option value='gauntlet'>gauntlet</option>
                                        <option value='selverbrush'>selverbrush</option>
                                        <option value='metsrga'>metsrga</option>
                                        <option value='chair'>Chair</option>
                                        <option value='table'>table</option>
                                        <option value='boarde'>boarde</option>
                                        <option value='stapler'>Stapler</option>
                                        <option value='kerosene'>kerosene</option>
                                        <option value='naphtha'>naphtha</option>
                                        <option value='grease'>grease</option>
                                        <option value='bus'> bus</option>
                                        <option value='minbus'> minbus</option>
                                        <option value='loary'> loary</option>
                                        <option value='teyota'> teyota</option>
                                        <option value='motor'> motor</option>
                                        <option value='cylinder'> cylinder</option>
                                        <option value='tube'> tube</option>
                                        <option value='watergage'> watergage</option>
                                        <option value='vavola'> vavola</option>
                                        <option value='switch on/off'> switch on/off</option>
                                        <option value='wire'> wire</option>
                                        <option value='other'> Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Model :</strong></label>
                                <div class="controls">
                                    <input type="text" id="nationality" class="span11" placeholder="Enter item model"
                                        name="model" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Quality:</strong></label>
                                <div class="controls">
                                    <select class="span11" name="quality" required style="border-radius: 13px;">
                                        <option value="">Select item quality...</option>
                                        <option value='high'>High</option>
                                        <option value='Moderate'>Moderate</option>
                                        <option value='low'>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Quantity :</strong></label>
                                <div class="controls">
                                    <input type="number" class="span11" placeholder="Enter item quantity"
                                        name="quantity" required min="1" style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Item Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required style="border-radius: 13px;">
                                        <option value="">Select status...</option>
                                        <option value="1">Enable</option>
                                        <option value="0">Desable</option>
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
                                    <button type="submit" id="f" name="register" class="btn btn-success"
                                        style="border-radius: 13px;"><strong>Register</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>Item Registerd successfully.</strong>
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
if (isset($_POST['register'])) {
    // receive all input values from the form
    $code = mysqli_real_escape_string($con, $_POST["code"]);
    $type = mysqli_real_escape_string($con, $_POST["type"]);
    $category = mysqli_real_escape_string($con, $_POST["category"]);
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $model = mysqli_real_escape_string($con, $_POST["model"]);
    $quality = mysqli_real_escape_string($con, $_POST["quality"]);
    $quantity = mysqli_real_escape_string($con, $_POST["quantity"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $query = "INSERT INTO stock values(NULL,$code,'$name','$type','$category','$model','$quality','$quantity',$status)";
    $res = mysqli_query($con, $query) or die("Error occurd" . mysqli_error($con));
    if (!$res) {
?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_register.php";
}, 3000);
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
// refresh the page after 3 second
setTimeout(function() {
    window.location.href = "item_register.php";
}, 3000);
</script>
<?php
    }

    mysqli_close($con);
}
include("footer.php");
?>