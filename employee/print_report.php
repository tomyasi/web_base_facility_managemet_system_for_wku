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
                <th>REQUESTED BY</th>
                <th>REQUEST SERVICE</th>
                <th>MESSAGE</th>
                <th>REQUESTED DATE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $no = 0;
                $sub_sql = "";
                if (isset($_SESSION['from']) && isset($_SESSION['to'])) {
                    $from  = $_SESSION['from'];
                    $to = $_SESSION['to'];
                    $sub_sql = "and req_date >= '$from' && req_date <= '$to'";
                }
                $serv = $_SESSION['role'];
                $result = mysqli_query($con, "SELECT *from serv_request where req_service='$serv' $sub_sql");
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
    <br>
    <h4 style="color: while;">
        <div style="float: right;border:10px;border-radius:5px">
            <span style="float:left;">Total Number of Request service:&nbsp;</span><span
                style="float: left"><?php echo $no; ?></span>&nbsp;&nbsp;&nbsp;
        </div>
    </h4>
</body>

</html>