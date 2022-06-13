<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WKUFMS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/matrix-style.css" />
</head>

<body onload="print()">
    <div>
        <h1>
            <center><b>Item Information</b></center>
        </h1>
    </div>
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
            $no = $total_item = $count_aprove =  $count_order = 0;
            $sub_sql = "";
            if (isset($_SESSION['from']) && isset($_SESSION['to'])) {
                $from  = $_SESSION['from'];
                $to = $_SESSION['to'];
                $sub_sql = "WHERE (re_date >= '$from' && re_date <= '$to') ";
            }
            $result = mysqli_query($con, "SELECT *from item_request $sub_sql");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $no++;
                    $e_id = $row["emp_id"];
                    $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" .
                        mysqli_error($con));
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
                    <strong>Empty Report.</strong>
                </center>
            </div>
            <?php
            }
            ?>
        </tbody>
    </table>
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
    <?php
    mysqli_close($con);
    ?>
</body>

</html>