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
    <h1>
        <center><b>Service Report</b></center>
    </h1>
    <?php $no = 0;
    $ma = $secu = $cl = $other = 0;
    $resu = mysqli_query($con, "SELECT *from serv_request where view='0'");
    $ur = mysqli_num_rows($resu);
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
                $result = mysqli_query($con, "SELECT *from serv_request ");
                $un_read = mysqli_num_rows($result);
                if ($un_read > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $no++;
                        $e_id = $row["user_id"];
                        $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                        $user_info = mysqli_fetch_array($sql);
                        $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                        if ($row["req_service"] == "technitian") {
                            $ma++;
                        } elseif ($row["req_service"] == "security") {
                            $secu++;
                        } elseif ($row["req_service"] == "clealiness") {
                            $cl++;
                        } elseif ($row["req_service"] == "other") {
                            $other++;
                        }
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
    <hr>
    <center>
        <h4>REPORT </h4>
    </center>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>SERVICE</th>
                <th>TOTAL REQUESTED</th>
            </tr>
        </thead>
        <tbody id="output">
            <tr>
                <td><?php echo 1; ?></td>
                <td><?php echo "Maintenance"; ?></td>
                <td><?php echo $ma; ?></td>
            </tr>
            <tr>
                <td><?php echo 2; ?></td>
                <td><?php echo "Campus Safety and Security"; ?></td>
                <td><?php echo $secu; ?></td>
            </tr>
            <tr>
                <td><?php echo 3; ?></td>
                <td><?php echo "Campus Beauty and Clealiness"; ?></td>
                <td><?php echo $cl; ?></td>
            </tr>
            <tr>
                <td><?php echo 4; ?></td>
                <td><?php echo "Special Services"; ?></td>
                <td><?php echo $other; ?></td>
            </tr>
    </table>
    <br>
    <h4 style="color: while;">
        <div style="float: right;border:10px;border-radius:5px">
            <span style="float:left;">Response service:&nbsp;</span><span style="float: left"><?php echo $no - $ur; ?></span>&nbsp;&nbsp;&nbsp;
        </div>
    </h4>
    <br>
    <h4 style="color: while;">
        <div style="float: right;border:10px;border-radius:5px">
            <span style="float:left;">Unresponsed Service:&nbsp;</span><span style="float: left"><?php echo $ur; ?></span>&nbsp;&nbsp;&nbsp;
        </div>
    </h4>
    <br>
    <h4 style="color: while;">
        <div style="float: right;border:10px;border-radius:5px">
            <span style="float:left;">Total Number of Request service:&nbsp;</span><span style="float: left"><?php echo $no; ?></span>&nbsp;&nbsp;&nbsp;
        </div>
    </h4>
    </div>

    <?php
    mysqli_close($con);

    ?>
</body>

</html>