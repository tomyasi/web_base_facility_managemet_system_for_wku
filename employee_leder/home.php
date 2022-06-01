<?php
include("header.php");
if (!(isset($_SESSION['leder_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
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
            sdsd
        </div>

    </div>
</div>

<!--end-main-container-part-->
<?php
include("footer.php");
?>