<?php
include("header.php");
include("../connection.php");
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
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>
                            <div class="span10">
                                <br>
                                <div>
                                    <label>Serche Request</label>
                                    <input type="text" class="span11" placeholder="search" required name="quantity"
                                        id="qty" autocomplete="off" style="border-radius:10px" min="1">
                                </div>
                            </div>
                            <div class="form-actions">
                                <br>
                                <center>
                                    <button type="submit" id="f" name="serch" class="btn btn-success"
                                        style="border-radius: 10px; float:left"><strong>Serch</strong></button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <center>
                <h4>Resource Request Information</h4>
            </center>
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
                            $result = mysqli_query($con, "SELECT *from serv_request ORDER BY req_date asc;");
                            $un_read = mysqli_num_rows($result);
                            $no = 1;
                            if ($un_read > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $e_id = $row["user_id"];
                                    $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                                    $user_info = mysqli_fetch_array($sql);
                                    $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                            ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $re_by; ?></td>
                            <td><?php echo $row["req_service"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["req_date"]; ?></td>
                            <td> <?php if ($row["view"] == "1") { ?>
                                <img src="../images/tick.png" alt="Yes" class="img-fluid"></a>
                                <?php
                                            } else { ?>
                                <a href="reply_live.php?id=<?php echo $row['s_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                    Reply</a>

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo" style="border-radius: 13px;">
                                    Reply</button>
                                <?php
                                            }
                                        ?>
                            </td>
                        </tr>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sechedule:</label>
                        <input type="text" class="form-control" id="sechedule-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    style="border-radius: 13px;">Close</button>
                <button type="button" class="btn btn-primary" style="border-radius: 13px;">Send message</button>
            </div>
        </div>
    </div>
</div>
<?php
mysqli_close($con);
include("footer.php");
?>
<script type="text/javascript">

</script>