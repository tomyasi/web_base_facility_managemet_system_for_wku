<?php
include("header.php");
include("../connection.php")
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Generate Report</span></a>
            <a href="item_order_report.php" title="Go to view User" class="tip-bottom">
                <i class="icon-briefcase"></i>Item Order Report
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
            <div class="span12">
                <a href="print_order_report.php" class="btn btn-primary" style="border-radius:10px"><i
                        class="icon-print"></i>
                    PRINT</a>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item Order Report</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <?php
                        $no = $total_item = $count_aprove =  $count_order = 0;
                        $sub_sql = "";
                        $toDate = $fromDate = "";

                        //$aprove = mysqli_query($con, "SELECT *from item_request WHERE ordered='0'");
                        //$cou_aprove = mysqli_num_rows($aprove);
                        // $ordered = mysqli_query($con, "SELECT *from item_request WHERE status='1'");
                        //$cou_order = mysqli_num_rows($ordered);
                        if (isset($_POST['submit1'])) {
                            $from = $_POST['dt'];
                            $fromDate = $from;
                            $from = $from . " 00:00:00";

                            $to = $_POST['dt2'];
                            $toDate = $to;
                            $to = $to . " 23:59:59";
                            $sub_sql = "WHERE (re_date >= '$from' && re_date <= '$to') ";
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
                                    $result = mysqli_query($con, "SELECT *from item_request $sub_sql");
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $no++;
                                            $e_id = $row["emp_id"];
                                            $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                            $emp_info = mysqli_fetch_array($sql);
                                            $re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                                            $total_item += $row['item_quantity'];
                                            if ($row['status' == '1']) {
                                                $count_order++;
                                            }

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
                                    $result = mysqli_query($con, "SELECT *from item_request");
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $no++;
                                            $e_id = $row["emp_id"];
                                            $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                            $emp_info = mysqli_fetch_array($sql);
                                            $re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                                            $total_item += $row['item_quantity'];
                                            if ($row['status' == '1']) {
                                                $count_order++;
                                            }
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
                <hr>
                <center>
                    <h3>Requested and Ordered Report Information</h3>
                </center>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>MONTH</th>
                            <th>TOTAL ORDER ITEM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT  MONTHNAME(re_date) as mname, sum(item_quantity) as total from item_request $sub_sql GROUP BY MONTH(re_date)";
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
                        <span style="float:left;">Total Number of Requested:&nbsp;</span><span
                            style="float: left"><?php echo $no; ?></span>&nbsp;&nbsp;&nbsp;
                    </div>
                </h4>
                <br>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Total Number of Ordered:&nbsp;</span><span
                            style="float: left"><?php echo $count_order; ?></span>&nbsp;&nbsp;&nbsp;
                    </div>
                </h4>
                <br>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Total Number of Item Orderd:&nbsp;</span><span
                            style="float: left"><?php echo $total_item; ?></span>&nbsp;&nbsp;&nbsp;
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