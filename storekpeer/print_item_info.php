<?php
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
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Item ID</th>
                <th>Item Code</th>
                <th>Item name</th>
                <th>Item Type</th>
                <th>Item category</th>
                <th>Item Model</th>
                <th>Item Quality</th>
                <th>Item Quantity</th>
            </tr>
        </thead>
        <tbody id="output">
            <?php
            $result = mysqli_query($con, "select *from stock;");
            $no = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["item_id"]; ?></td>
                    <td><?php echo $row["item_code"]; ?></td>
                    <td><?php echo $row["item_name"]; ?></td>
                    <td><?php echo $row["item_type"]; ?></td>
                    <td><?php echo $row["item_category"]; ?></td>
                    <td><?php echo $row["item_model"]; ?></td>
                    <td><?php echo $row["item_quality"]; ?></td>
                    <td><?php echo $row["item_quantity"]; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <h4 style="color: while;">
        <div style="float: right;border:10px;border-radius:5px">
            <span style="float:left;">Type of Resource:&nbsp;</span><span style="float: left"><?php echo $no; ?></span>
        </div>
    </h4><br>
    <h4 style="color: while;">
        <div style="float: right;border:10px;border-radius:5px">
            <span style="float:left;">&nbsp;&nbsp;&nbsp;Total Resource In Store:&nbsp;</span><span style="float: left"><?php echo $total_item; ?></span>
        </div>
    </h4>
    <?php
    mysqli_close($con);
    ?>
</body>

</html>