<?php
include("header.php");
include("../connection.php");
$profile = mysqli_query($con, "SELECT * FROM employee WHERE id=$stor_id") or
    die("Error occurde in profile query" . mysqli_error($con));
$profile_info = mysqli_fetch_array($profile);
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
            <a href="profile.php" title="Go to your profile" class="tip-bottom">
                <i class="icon-folder-open"></i>Profile Page</a>
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
                                <strong class="control-label"><?php echo $profile_info['fname']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Middel Name :</label>
                                <strong class="control-label" id="a"><?php echo $profile_info['mname']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Last Name :</label>
                                <strong class="control-label"><?php echo $profile_info['lname']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gender :</label>
                                <strong class="control-label">
                                    <?php if ($profile_info['gender'] == 'm') echo "Male";
                                    else echo "Female"; ?></strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gmail :</label>
                                <strong class="control-label"><?php echo $profile_info['gmail']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Mobile :</label>
                                <strong class="control-label"><?php echo $profile_info['phone']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Nationality :</label>
                                <strong class="control-label"><?php echo $profile_info['nationality']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Subcity :</label>
                                <strong class="control-label"><?php echo $profile_info['address']; ?>
                                </strong>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label"></label>
                                <a href="edit_profile.php?id=<?php echo $profile_info['id'] ?>" class="btn btn-primary control-label" style="border-radius:10px;"><i class="icon-pencil"></i>
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