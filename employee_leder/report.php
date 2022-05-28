<?php
include "header.php";
include("../connection.php");
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="report.php" class="tip-bottom" title="Go to Report page"><i
                    class="icon-briefcase"></i>Report</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <form class="form-inline" action="" name="form1" method="post">
                <div class="form-group">
                    <label for="email"> Start Date</label>
                    <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required
                        style="width:200px;border-style:solid; border-width:1px;border-radius: 10px; border-color:#666666"
                        placeholder="click here to open calender">
                </div>
                <div class="form-group">
                    <label for="email"> End Date</label>
                    <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"
                        class="form-control"
                        style="width:200px;border-style:solid; border-width:1px;border-radius: 10px; border-color:#666666">
                </div>
                <button type="submit" name="submit1" class="btn btn-success" style="border-radius: 10px;">Show
                    Search</button>
                <button type="button" name="submit2" class="btn btn-warning"
                    onclick="window.location.href=window.location.href" style="border-radius: 10px;">Clear
                    Search</button>
            </form>
            <br>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-content nopadding">
                        <?php $no = 0;
                        if (isset($_POST['submit1'])) {
                        ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REQUESTED BY</th>
                                    <th>REQUEST SERVICE</th>
                                    <th>MESSAGE</th>
                                    <th>REQUESTED DATE</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <tr>
                                    <?php
                                        $result = mysqli_query($con, "SELECT *from serv_request where (req_date>=$_POST[dt]and req_date<=$_POST[dt2])");
                                        $un_read = mysqli_num_rows($result);
                                        if ($un_read > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
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
                                </tr>
                                <?php
                                            }
                                        } else { ?>
                                <div class="alert alert-danger" id="error" style="display: block;">
                                    <center>
                                        <strong>Empty Report.</strong>
                                    </center>
                                </div>
                                <?php
                                        }
                            ?>
                            </tbody>
                        </table>
                        <?php
                        } else {
                        ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REQUESTED BY</th>
                                    <th>REQUEST SERVICE</th>
                                    <th>MESSAGE</th>
                                    <th>REQUESTED DATE</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <tr>
                                    <?php
                                        $result = mysqli_query($con, "SELECT *from serv_request where");
                                        $un_read = mysqli_num_rows($result);
                                        if ($un_read > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
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
                                </tr>
                                <?php
                                            }
                                        } else { ?>
                                <div class="alert alert-danger" id="error" style="display: block;">
                                    <center>
                                        <strong>Empty Report.</strong>
                                    </center>
                                </div>
                                <?php
                                        }
                            ?>
                            </tbody>
                        </table>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br>
            <h4 style="color: while;">
                <div style="float: right;border:10px;border-radius:5px">
                    <span style="float:left;">Total Number of Request service:&nbsp;</span><span
                        style="float: left"><?php echo $no; ?></span>&nbsp;&nbsp;&nbsp;
                </div>
            </h4>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>