<?php
include("header.php");
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Resource Request Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="span2">
                                <div>
                                    <label>Product Name</label>
                                    <div id="product_name_div">
                                        <select class="span11">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span1">
                                <div>
                                    <label>Unit</label>
                                    <div id="unit_div">
                                        <select class="span11">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span2">
                                <div>
                                    <label>Packing Size</label>
                                    <div id="packing_size_div">
                                        <select class="span11">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span1">
                                <div>
                                    <label>Price</label>
                                    <input type="text" class="span11" name="price" id="price" readonly value="0">
                                </div>
                            </div>
                            <div class="span1">
                                <div>
                                    <label>Enter Qty</label>
                                    <input type="text" class="span11" name="qty" id="qty" autocomplete="off">
                                </div>
                            </div>
                            <div class="span1">
                                <div>
                                    <label>Total</label>
                                    <input type="text" class="span11" name="total" id="total" value="0" readonly>
                                </div>
                            </div>
                            <div class="span1">
                                <div>
                                    <label>&nbsp</label>
                                    <input type="button" class="span11 btn btn-success" value="Add">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Job position :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="position" required style="border-radius: 13px;">
                                        <option value="">Select jop position...</option>
                                        <option value="admin">Admin</option>
                                        <option value="manger">Manager</option>
                                        <option value="storekpeer">Storekpeer</option>
                                        <option value="security"> Security</option>
                                        <option value="clealiness"> Clealiness</option>
                                        <option>Special Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required style="border-radius: 13px;">
                                        <option value="">Select status...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
                                        style="border-radius: 13px;"><strong>Send Request</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>Request successfully dliverd.</strong>
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
include("footer.php");
?>