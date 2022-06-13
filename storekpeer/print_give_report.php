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
            <center><b> Information</b></center>
        </h1>
    </div>
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
            $sub_sql = "";
            if (isset($_SESSION['from']) && isset($_SESSION['to'])) {
                $from  = $_SESSION['from'];
                $to = $_SESSION['to'];
                $sub_sql = "WHERE (schedule >= '$from' && schedule <= '$to') ";
            }
            $result = mysqli_query($con, "SELECT *from give_item $sub_sql");
            $no = $total_give = 0;
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
                    <strong>Empty.</strong>
                </center>
            </div>
            <?php
            }
            ?>
        </tbody>
    </table>
    <hr>
    <center>
        <h3>Give Item Report Information</h3>
    </center>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>MONTH</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql1 = "SELECT  MONTHNAME(schedule) as mname, sum(quantity) as total from give_item $sub_sql GROUP BY MONTH(schedule)";
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
            <span style="float:left;"> Request:&nbsp;</span><span style="float: left"><?php echo $no; ?></span>
        </div>
    </h4><br>
    <h4 style="color: while;">
        <div style="float: right;border:10px;border-radius:5px">
            <span style="float:left;">&nbsp;&nbsp;&nbsp;Total Given Resource:&nbsp;</span><span
                style="float: left"><?php echo $total_give; ?></span>
        </div>
    </h4>
    <?php
    mysqli_close($con);
    ?>
</body>

</html>