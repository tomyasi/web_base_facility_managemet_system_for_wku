<?php
include("header.php");
include("../connection.php");
$profile = mysqli_query($con, "SELECT * FROM employee WHERE id='$emp_id'") or die("Error occurde in profile query" . mysqli_error($con));
$row = mysqli_fetch_array($profile);
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
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a>
            <a href="view_service_request.php" title="Go to your profile" class="tip-bottom">
                <i class="icon-eye-open"></i>Profile Page</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>YOUR PROFILE PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span11">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Personal Informatio</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 15px; margin: right 10px">
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
                                <label class="control-label">Last Name :</label>
                                <strong class="control-label"><?php echo $row['lname']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gender :</label>
                                <strong class="control-label">
                                    <?php if ($row['gender'] == 'm') echo "Male";
                                    else echo "Female"; ?></strong>
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
                                <strong class="control-label"><?php echo $row['phone']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Nationality :</label>
                                <strong class="control-label"><?php echo $row['nationality']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Subcity :</label>
                                <strong class="control-label"><?php echo $row['address']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label"></label>
                                <a href="edit_profile.php?id=<?php echo $row['id'] ?>"
                                    class="btn btn-primary control-label" style="border-radius:10px;"><i
                                        class="icon-pencil"></i>
                                    UPDATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
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