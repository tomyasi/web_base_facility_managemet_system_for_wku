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
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <?php
            print "<img src='images/tick.png' align='center' width='25px' height='25px'><font face='arial' color='green' size='5'> Successfully registered</font>";
            echo ' <meta content="6;home.php" http-equiv="refresh" />';
            ?>
        </div>

    </div>
</div>
<!--end-main-container-part-->
<?php
include("footer.php");
?>