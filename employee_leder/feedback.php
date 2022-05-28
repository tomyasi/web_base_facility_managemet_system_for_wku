<?php
include("header.php");
include("../connection.php");
$emp_id = $_SESSION['emp_id'];
$insertdate = date("Y/m/d H:i:s");
$e_id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM give_item");
$row = mysqli_fetch_array($result);
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_responce.php" title="Go to view responce" class="tip-bottom"><i class="icon-home"></i>
                View Responce</a>
            </a>
            <a href="feedback.php" title="Go to Send feedback" class="tip-bottom">
                <i class="icon-reply"></i>Send Feedback
            </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <center>
            <h5>SEND FEEDBACK PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box" style="border-radius: 20px; margin-right:10%; margin-left:10%">
                    <div class="widget-content nopadding" style="border-radius: 20px; margin-right:20%; margin-left:10%">
                        <form name="formsend" action="#" method="POST" class="form-horizontal">

                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="span4">
                                <br>
                                <div>
                                    <label>DATE</label>
                                    <input type="text" required class="span12" name="date" value="<?php echo $insertdate; ?>" readonly style="border-radius:10px">
                                </div>
                            </div>
                            <div class="span8">
                                <br>
                                <div>
                                    <label>MESSAGE</label>
                                    <textarea class="span11" placeholder="Write your feedback here" name="message" required style="border-radius: 13px;" rows="10" cols="20"></textarea>
                                </div>
                            </div>
                            <div class="alert alert-success span12" id="success" style="display:none;">
                                <center>
                                    <strong>The Feedback Send Successfully.</strong>
                                </center>
                            </div>
                            <div class="span4">
                                <br><br>
                                <center>
                                    <button type="submit" id="f" name="send" class="btn btn-success" style="border-radius: 10px;float:right"><strong>SEND </strong></button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->
<?php
if (isset($_POST['send'])) {
    mysqli_query($con, "UPDATE give_item SET view='1' where id='$e_id'");
    $message = mysqli_real_escape_string($con, $_POST["message"]);
    $query = "INSERT INTO feedback VALUES (NULL,'$_SESSION[emp_id]','$row[give_by]','$message','$insertdate','0')";
    $re = mysqli_query($con, $query) or die("Error occured" . mysqli_error($con));
    if (!$re) {
?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "block";
            // refresh the page after 3 second
            setTimeout(function() {
                window.location.href = "view_responce.php";
            }, 3000);
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            document.getElementById("success").style.display = "block";
            // refresh the page after 3 second
            setTimeout(function() {
                window.location.href = "view_responce.php";
            }, 3000);
        </script>
<?php
    }
}
mysqli_close($con);
include("footer.php");
?>