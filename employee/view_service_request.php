<?php
include("header.php");
include("../connection.php");
session_start();
$user_id = $_SESSION['user_id'];
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#"><i class="icon icon-th-list"></i> <span>View</span></a>
            <a href="view_service_request.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>View Services Request
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>View Services Request</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Requested By</th>
                                    <th>Request Service</th>
                                    <th>Message</th>
                                    <th>Requested Date</th>
                                    <th>Reply</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <tr>
                                    <?php
                                    $result = mysqli_query($con, "SELECT *from serv_request where view='0';");
                                    $un_read = mysqli_num_rows($result);
                                    $no = 1;
                                    if ($un_read > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row["req_service"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td><?php echo $row["req_date"]; ?></td>
                                    <td> <?php if ($row["view"] == "1") { ?>
                                        <img src="../images/tick.png" alt="" class="img-fluid"></a>
                                        <?php
                                                    } else { ?>
                                        <a href="service-request_reply.php?id=<?php echo $row['s_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                            Reply</a>
                                        <?php
                                                    }
                                                ?>
                                    </td>
                                    <?php
                                            $no++;
                                        }
                                    } else { ?>
                                    <div class="alert alert-danger" id="error" style="display: block;">
                                        <center>
                                            <strong>Empty Request.</strong>
                                        </center>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </tr>
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