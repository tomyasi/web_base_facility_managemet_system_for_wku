<?php
include("header.php");
include("../connection.php")
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>View</span></a>
            <a href="view_request.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>View Request
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>VIEW RESOURCE REQUEST PAGE</h5>
        </center>
        <hr>

        <div class="row-fluid">
            <form class="form-inline" action="" name="form1" method="post">
                <div class="form-group">
                    <label for="email">Start Date</label>
                    <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required
                        style="width:200px;border-style:solid; border-width:1px; border-radius: 13px;border-color:#666666"
                        placeholder="click here to open calender">
                </div>
                <div class="form-group">
                    <label for="email">End Date</label>
                    <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"
                        class="form-control"
                        style="width:200px;border-style:solid; border-width:1px;border-radius: 13px; border-color:#666666">
                </div>
                <button type="submit" name="submit1" class="btn btn-success" style="border-radius: 13px;">Show
                    Search</button>
                <button type="button" name="submit2" class="btn btn-warning"
                    onclick="window.location.href=item_order_report.php" style="border-radius: 13px;">Clear </button>
            </form>
            <br>
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>View Request</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <?php
                        $no = 0;
                        $cou_aprove = 0;
                        if (isset($_POST['submit2'])) {
                        ?>
                        <script type="text/javascript">
                        window.location.href = "item_order_report.php";
                        </script><?php
                                    }
                                    if (isset($_POST['submit1'])) {
                                        $starte_date = $_POST['dt'];
                                        $end_date = $_POST['dt'];
                                        ?>
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REQUESTED BY</th>
                                    <th>ITEM NAME</th>
                                    <th>ITEM TYPE</th>
                                    <th>ITEM CATEGORY</th>
                                    <th>ITEM QUALITY</th>
                                    <th>ITEM Quantity</th>
                                    <th>MESSAGE</th>
                                    <th>REQUESTED DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $result = mysqli_query($con, "SELECT *from item_request WHERE (re_date>='$starte_date'&& re_date<='$end_date')");
                                        $aprove = mysqli_query($con, "SELECT *from item_request WHERE ordered='0'");
                                        $cou_aprove = mysqli_num_rows($aprove);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
                                                $e_id = $row["emp_id"];
                                                $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                                $emp_info = mysqli_fetch_array($sql);
                                                $re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                                    ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $re_by; ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row["item_type"]; ?></td>
                                    <td><?php echo $row["item_category"]; ?></td>
                                    <td><?php echo $row["item_quality"]; ?></td>
                                    <td><?php echo $row["item_quantity"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td><?php echo $row["re_date"]; ?></td>
                                </tr>
                                <?php

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
                        <?php
                                    } else {
                        ?>
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REQUESTED BY</th>
                                    <th>ITEM NAME</th>
                                    <th>ITEM TYPE</th>
                                    <th>ITEM CATEGORY</th>
                                    <th>ITEM QUALITY</th>
                                    <th>ITEM Quantity</th>
                                    <th>MESSAGE</th>
                                    <th>REQUESTED DATE</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <?php
                                        $result = mysqli_query($con, "SELECT *from item_request;");
                                        $aprove = mysqli_query($con, "SELECT *from item_request WHERE ordered='0'");
                                        $cou_aprove = mysqli_num_rows($aprove);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
                                                $e_id = $row["emp_id"];
                                                $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                                $emp_info = mysqli_fetch_array($sql);
                                                $re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                                    ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $re_by; ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row["item_type"]; ?></td>
                                    <td><?php echo $row["item_category"]; ?></td>
                                    <td><?php echo $row["item_quality"]; ?></td>
                                    <td><?php echo $row["item_quantity"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td><?php echo $row["re_date"]; ?></td>
                                </tr>
                                <?php

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
                        <?php
                                    }
                        ?>
                    </div>
                </div>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Total Approved item:&nbsp;</span><span
                            style="float: left"><?php echo $cou_aprove; ?></span>&nbsp;&nbsp;&nbsp;
                    </div>
                </h4>
                <br>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Total Number of Order:&nbsp;</span><span
                            style="float: left"><?php echo $no; ?></span>&nbsp;&nbsp;&nbsp;
                    </div>
                </h4>
            </div>
        </div>
    </div>
</div>
<?php
mysqli_close($con);
include("footer.php");
?>