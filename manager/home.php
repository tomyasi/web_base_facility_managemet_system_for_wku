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
        <h5>Home</h5>
        <hr>
        <div class="row-fluid">
            <div class="span5" style="float: right;">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Personal Informatio</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 15px;">
                        <?php
                        include("../calendar/cal3.php");
                        //include("../calendar/cal2.php");
                        //include("../calendar/main.php");
                        //include("../calendar/year-calendar3.php");
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!--end-main-container-part-->
<?php
include("footer.php");
?>