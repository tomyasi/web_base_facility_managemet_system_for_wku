<?php
include("header.php");
include("../connection.php");
$u_name = mysqli_query($con, "SELECT * FROM employee WHERE id='1'") or dir(mysqli_error($con));
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
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a>
            <a href="view_service_request.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>Profile Page</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>Your Profile</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span11">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Personal Informatio</h5>
                    </div>
                    <div class="widget-content nopadding" style="border-radius: 15px;">
                        <form action="#" method="get" class="form-horizontal">
                            <div class="control-group" id="profile">
                                <label class="control-label">Avater :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
                                        class="control-label"></a>
                                </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">First Name :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['fname']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Middel Name :</label>
                                <a href="#" data-target="#middelname" data-toggle="modal"><strong class="control-label"
                                        id="a"><?php echo $row['mname']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Last Name :</label>
                                <a href="#" data-target="#laststname" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['lname']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gender :</label>
                                <a href="#" data-target="#gender" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['gender']; ?></strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gmail :</label>
                                <a href="#" data-target="#gmail" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['gmail']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Mobile :</label>
                                <a href="#" data-target="#mobile" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['phone']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Nationality :</label>
                                <a href="#" data-target="#nationality" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['nationality']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Subcity :</label>
                                <a href="#" data-target="#subcity" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['address']; ?>
                                    </strong></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->
<!-- for first name -->
<div class="modal fade" id="firstname" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['fname']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- for midele -->
<div class="modal fade" id="middelname" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['mname']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- for last name -->
<div class="modal fade" id="lastname" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['lname']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- for gender -->
<div class="modal fade" id="gender" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['gender']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- for gmail -->
<div class="modal fade" id="gmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['gmail']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- for mobile -->
<div class="modal fade" id="mobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['phone']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- for anationality -->
<div class="modal fade" id="nationality" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['nationality']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- for subcity -->
<div class="modal fade" id="subcity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="span3">
                    <br>
                    <div>
                        <label>Schedule</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['address']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;"><img
                        src="../images/close.jpg" alt="Yes" class="img-fluid"></a></button>
                <button type="button" class="btn btn-primary" style="border-radius: 10px;"
                    onclick="update_profile()">Save</button>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
<script type="text/javascript">
function displayfunc() {
    //display function
    var displayData = true;
    $.ajax({
        url: "display.php",
        type: "post",
        data: {
            displayData: displayData,
        },
        success: function() {

        }
    });

}

function update_profile() {
    var firstname = $("#fname").val();
    //var lastname = $("#firstname").val();
    //var firstname = $("#firstname").val();
    //var firstname = $("#firstname").val();
    $.ajax({
        url: "profile_inser_to_database.php",
        type: "post",
        data: {
            firstname: firstname,
        },
        success: function(data, status) {
            //console.log(status);
            displayfunc();
        }
    });

}
</script>