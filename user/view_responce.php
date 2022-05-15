<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['user_id']))) {
    header("Location: ../login.php");
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_responce.php" title="Go to View User" class="tip-bottom">
                <i class="icon-eye-open"></i>View Responce
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>VIEW REQUEST RESPONCE PAGE</h5>
        </center>
        <hr>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> View Request Responce Form</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding table-responsive-sm">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Responce By</th>
                                    <th>Message</th>
                                    <th>Responce Date</th>
                                    <th>Schedule</th>
                                    <th>Feedback</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con, "SELECT *from serv_responce;");
                                $no = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $e_id = $row["emp_id"];
                                    $sql = mysqli_query($con, "SELECT *FROM employee where id='$e_id'") or die("error occured" . mysqli_error($con));
                                    $emp_info = mysqli_fetch_array($sql);
                                    $res_by = $user_info['fname'] . ' ' . $user_info['mname'];
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><a href="#?id=<?php echo $row['emp_id'] ?>" data-target="#employeeInformation" title="Click here to get employee information" data-toggle="modal">
                                                <?php echo $res_by; ?></a>
                                        </td>
                                        <td><?php echo $row["message"]; ?></td>
                                        <td><?php echo $row["res_date"]; ?></td>
                                        <td><?php echo $row["schedule"]; ?></td>
                                        <td> <?php if ($row["view"] == "1") { ?>
                                                <img src="../images/tick.png" alt="Yes" class="img-fluid"></a>
                                            <?php
                                                } else { ?>
                                                <a href="feedback.php?id=<?php echo $row['res_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                                    feedback</a>
                                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#insertToDatabase" style="border-radius: 10px;">feedback
                                        </button> -->
                                            <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="insertToDatabase" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLongTitle">feedback form </h5>
            </div>
            <form action="feedback.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message
                        </label>
                        <textarea class="form-control span5" id="message" name="message" rows="10" cols="10" style="border-radius: 10px;" placeholder="Write here your feedback" required></textarea>
                    </div>
                    <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $row['res_id'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;">
                        <image src="../images/close.jpg" alt="Yes" class="img-fluid">
                    </button>
                    <button type="submit" class="btn btn-primary" style="border-radius: 10px;" name="send">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Display Employee information -->
<div class="modal fade" id="employeeInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLongTitle">feedback form </h5>
            </div>
            <form action="feedback.php" method="POST">
                <div class="modal-body">
                    <div class="span5">
                        <br>
                        <div>
                            <center><strong class="control-label">first name :&nbsp;&nbsp;</strong>
                                Temesgen</center>

                        </div>
                        <hr>
                    </div>
                    <div class="span5">
                        <br>
                        <div>
                            <center><strong class="control-label">first name :&nbsp;&nbsp;</strong>
                                Temesgen</center>

                        </div>
                        <hr>
                    </div>
                    <div class="span5">
                        <br>
                        <div>
                            <center><strong class="control-label">first name :&nbsp;&nbsp;</strong>
                                Temesgen</center>

                        </div>
                        <hr>
                    </div>
                    <div class="span5">
                        <br>
                        <div>
                            <center> <strong class="control-label">first name :</strong>
                                Temesgen</center>

                        </div>
                    </div>
                    <input type="hidden" name="hidden_id" id="hidden_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;">
                        <image src="../images/close.jpg" alt="Yes" class="img-fluid">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
mysqli_close($con);
include("footer.php");
?>