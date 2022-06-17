<?php
include("header.php");
include("../connection.php");
$e_id = $_GET['id'];
$u_name = mysqli_query($con, "SELECT * FROM employee WHERE id='$e_id'") or die("Query faild" . mysqli_error($con));
$row = mysqli_fetch_array($u_name);
?>
<style>
#profile {
    min-height: 80px;

}

#a {
    margin-right: 34px;
}
</style>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_responce.php" title="Go to view responce" class="tip-bottom"><i
                    class="icon-home"></i>
                View Responce</a>
            <a href="employee_info.php" title="Go to view employee information" class="tip-bottom">
                <i class="icon-eye-open"></i>Employee information</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>EMPLOYEE INFORMATION PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span11">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Personal Informatio</h5>
                    </div>
                    <div class="widget-content nopadding"
                        style="border-radius: 20px; margin-right:20%; margin-left:10%">
                        <form action="#" method="Post" class="form-horizontal">
                            <div class="control-group" id="profile">
                                <label class="control-label">First Name :</label>
                                <strong class="control-label"><?php echo $row['fname']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Middel Name :</label>
                                <strong class="control-label" id="a"><?php echo $row['mname']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gmail :</label>
                                <strong class="control-label"><?php echo $row['gmail']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Mobile :</label>
                                <strong class="control-label"><?php echo "+251", $row['phone']; ?>
                                </strong>
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