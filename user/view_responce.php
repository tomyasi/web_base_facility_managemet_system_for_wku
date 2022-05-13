<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['user_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_responce.php" title="Go to View User" class="tip-bottom">
                <i class="icon-eye-open"></i>View user
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>VIEW RESPONCE PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> View Responce Form</h5>
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
                                $result = mysqli_query($con, "select *from serv_responce;");
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
                                                <a href="service_request_reply.php?id=<?php echo $row['res_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                                    feedback</a>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="employeeInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="control-group" id="profile">
                                                        <label class="control-label">First Name :</label>
                                                        <a href="#" data-target="#firstname" data-toggle="modal"><strong class="control-label"><?php echo $_GET['id'] ?>
                                                            </strong></a>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="control-group" id="profile">
                                                        <label class="control-label">First Name :</label>
                                                        <a href="#" data-target="#firstname" data-toggle="modal"><strong class="control-label"><?php echo $emp_info['lname']; ?>
                                                            </strong></a>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px;">
                                                        <image src="../images/close.jpg" alt="Yes" class="img-fluid">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


<?php
mysqli_close($con);
include("footer.php");
?>