<?php
include("header.php");
include("../connection.php");
$u_name = mysqli_query($con, "SELECT * FROM employee WHERE id='1'") or dir(mysqli_error($con));
$row = mysqli_fetch_array($u_name);
$id = $row['id'];
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
                    <div class="widget-content nopadding" style="border-radius: 15px; margin: right 10px">
                        <form action="#" method="Post" class="form-horizontal">

                            <div class="control-group" id="profile">
                                <br>
                                <label class="control-label">Avater :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal">
                                    <strong class="control-label"> <img src="../images/fms1.jpg" width=125 height=125
                                            title="" style="border-radius: 50%;"></a>
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
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong class="control-label"
                                        id="a"><?php echo $row['mname']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Last Name :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['lname']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gender :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['gender']; ?></strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Gmail :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['gmail']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Mobile :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['phone']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Nationality :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
                                        class="control-label"><?php echo $row['nationality']; ?>
                                    </strong></a>
                            </div>
                            <hr>
                            <div class="control-group" id="profile">
                                <label class="control-label">Subcity :</label>
                                <a href="#" data-target="#firstname" data-toggle="modal"><strong
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
                <!-- avater -->
                <div class="span3">
                    <br>
                    <div>
                        <label><img src="../images/wkulogo3.jpg" alt="Yes" class="img-fluid" style="border-radius: 50%;"
                                width=125 height=125></label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                    </div>
                </div>
                <!-- middel name -->
                <div class="span3">
                    <br>
                    <div>
                        <label>First Name</label>
                        <input type="text" name="fname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['fname']; ?>">
                    </div>
                </div>
                <!-- middel name -->
                <div class="span3">
                    <br>
                    <div>
                        <label>Middel Name</label>
                        <input type="text" name="mname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['mname']; ?>">
                    </div>
                </div>
                <!-- last name -->
                <div class="span3">
                    <br>
                    <div>
                        <label>Last Name</label>
                        <input type="text" name="lname" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['lname']; ?>">
                    </div>
                </div>
                <!-- Gender -->
                <div class="span3">
                    <br>
                    <div>
                        <label>Gender</label>
                        <select class="span5" name="gender" required style="border-radius: 13px;">
                            <option value="m" <?php if ($row['gender'] == "m") {
                                                    echo "selected";
                                                } ?>>Male</option>
                            <option value="f" <?php if ($row['gender'] == "f") {
                                                    echo "selected";
                                                } ?>>Female</option>
                        </select>
                    </div>
                </div>
                <!-- Gmail -->
                <div class="span3">
                    <br>
                    <div>
                        <label>Gemail</label>
                        <input type="email" name="gmail" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['gmail']; ?>">
                    </div>
                </div>
                <!-- mobile -->
                <div class="span3">
                    <br>
                    <div>
                        <label>Mobile</label>
                        <input type="text" name="phone" id="fname" class="span5" required style="border-radius: 10px;"
                            value="<?php echo $row['phone']; ?>">
                    </div>
                </div>
                <!-- natinality -->
                <div class="span3">
                    <br>
                    <div>
                        <label>Nationality</label>
                        <input type="text" name="nationality" id="fname" class="span5" required
                            style="border-radius: 10px;" value="<?php echo $row['nationality']; ?>">
                    </div>
                </div>
                <!-- subcity -->
                <div class="span3">
                    <br>
                    <div>
                        <label>Subcity</label>
                        <input type="text" name="subcity" id="fname" class="span5" required style="border-radius: 10px;"
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
// if (isset($_FILES["image"]["name"])) {
//     $id = $_POST["id"];
//     $name = $_POST["name"];

//     $imageName = $_FILES["image"]["name"];
//     $imageSize = $_FILES["image"]["size"];
//     $tmpName = $_FILES["image"]["tmp_name"];

//     // Image validation
//     $validImageExtension = ['jpg', 'jpeg', 'png'];
//     $imageExtension = explode('.', $imageName);
//     $imageExtension = strtolower(end($imageExtension));
//     if (!in_array($imageExtension, $validImageExtension)) {
//         echo
//         "
//     <script>
//       alert('Invalid Image Extension');
//       document.location.href = '../updateimageprofile';
//     </script>
//     ";
//     } elseif ($imageSize > 1200000) {
//         echo
//         "
//     <script>
//       alert('Image Size Is Too Large');
//       document.location.href = '../updateimageprofile';
//     </script>
//     ";
//     } else {
//         $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
//         $newImageName .= '.' . $imageExtension;
//         $query = "UPDATE enployee SET avater = '$newImageName' WHERE id = $id";
//         mysqli_query($conn, $query);
//         move_uploaded_file($tmpName, 'img/' . $newImageName);
//         echo
//         "
//     <script>
//     document.location.href = '../updateimageprofile';
//     </script>
//     ";
//     }
// }
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
    var middelname = $("#mname").val();
    var lastname = $("#lname").val();
    var gender = $("#gender").val();
    var phone = $("#phone").val();
    var gmail = $("#gmail").val();
    var nationality = $("#nationality").val();
    var subcity = $("#subcity").val();
    $.ajax({
        url: "profile_inser_to_database.php",
        type: "post",
        data: {
            firstname: firstname,
            middelname: middelname,
            lastname: lastname,
            gender: gender,
            phone: phone,
            gmail: gmail,
            nationality: nationality,
            subcity: subcity
        },
        success: function(data, status) {
            console.log(status);
            // displayfunc();
            resetForm(form);
            $('#firstname').modal('toggle');
        }
    });

}
</script>