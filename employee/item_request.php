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
        <form name="form1" action="" method="post" class="form-horizontal nopadding">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Resource Request Form</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <div class=" span4">
                                <br>
                                <div>
                                    <label>Full Name</label>
                                    <input type="text" class="span12" name="full_name" style="border-radius:10px">
                                </div>
                            </div>
                            <div class="span2">
                                <br>
                                <div>
                                    <label>Date</label>
                                    <input type="text" class="span12" name="date" value="<?php echo date("Y-m-d") ?>"
                                        readonly style="border-radius:10px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- new row-->
            <div class="row-fluid">
                <div class="span12">
                    <center>
                        <h4>Resource Form</h4>
                    </center>
                    <div class="span3">
                        <div>
                            <label>Resource Name</label>
                            <select class="span11" name="company_name" id="company_name"
                                onchange="select_company(this.value)" style="border-radius:10px">
                                <option value="">Select name</option>

                            </select>
                        </div>
                    </div>
                    <div class="span3">
                        <div>
                            <label>Resource Type</label>
                            <div id="product_name_div">
                                <select class="span11" style="border-radius:10px">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="span2">
                        <div>
                            <label>Resouce Category</label>
                            <div id="unit_div">
                                <select class="span11" style="border-radius:10px">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="span3">
                        <div>
                            <label>Resource Quality</label>
                            <div id="packing_size_div">
                                <select class="span11" style="border-radius:10px">
                                    <option value="">Select</option>
                                    <option value="high">high</option>
                                    <option value="moderat">Moderate</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br> <br> <br> <br>
                    <div class="span2">
                        <div>
                            <label>Resource Quantity</label>
                            <input type="text" class="span11" name="qty" id="qty" autocomplete="off"
                                style="border-radius:10px">
                        </div>
                    </div>
                    <div class="span2">
                        <div>
                            <label>Total</label>
                            <input type="text" class="span11" name="total" id="total" value="0" readonly
                                style="border-radius:10px">
                        </div>
                    </div>
                    <br> <br> <br> <br>
                    <div class="span2" style="float: right">
                        <div>
                            <label>&nbsp </label>
                            <input type="button" class="span11 btn btn-success" value="Send Request"
                                style="border-radius:10px">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <h4>
            <div style="float: right"><span style="float:left;">Total:&#8377;</span><span style="float: left">525</span>
            </div>
        </h4>
    </div>
</div>
<?php
include("footer.php");
?>