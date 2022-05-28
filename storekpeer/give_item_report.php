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
            <div class="span12">
                <a href="print_give_report.php" class="btn btn-primary" style="border-radius:10px"><i
                        class="icon-print"></i>
                    PRINT</a>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>View Request</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>GIVEN TO</th>
                                    <th>ITEM NAME</th>
                                    <th>ITEM TYPE</th>
                                    <th>ITEM CATEGORY</th>
                                    <th>ITEM QUALITY</th>
                                    <th>ITEM QUANTITY</th>
                                    <th>MESSAGE</th>
                                    <th>GIVEN DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con, "SELECT *from give_item");
                                $no = 1;
                                $total_give = 0;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $no++;
                                        $e_id = $row["give_to"];
                                        $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                        $emp_info = mysqli_fetch_array($sql);
                                        $re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                                        $total_give += $row["quantity"];
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $re_by; ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row["item_type"]; ?></td>
                                    <td><?php echo $row["item_category"]; ?></td>
                                    <td><?php echo $row["quality"]; ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td><?php echo $row["schedule"]; ?></td>
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
                    </div>
                </div>
                <hr>
                <center>
                    <h3>Report Information</h3>
                </center>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>MONTH</th>
                            <th>TOTAL GIVE ITEM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT  MONTHNAME(schedule) as mname, sum(quantity) as total from give_item GROUP BY MONTH(schedule)";
                        $result1 = mysqli_query($con, $sql1);
                        $n = 0;
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_array($result1)) {
                                $n++;
                        ?>
                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $row['mname']; ?></td>
                            <td><?php echo $row["total"]; ?></td>
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
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;"> Request:&nbsp;</span><span
                            style="float: left"><?php echo $no; ?></span>
                    </div>
                </h4><br>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">&nbsp;&nbsp;&nbsp;Total Given Resource:&nbsp;</span><span
                            style="float: left"><?php echo $total_give; ?></span>
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