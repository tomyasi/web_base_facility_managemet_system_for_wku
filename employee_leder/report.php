<?php
include "header.php";
include("../connection.php");
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="report.php" class="tip-bottom" title="Go to Report page"><i
                    class="icon-briefcase"></i>Genrate Report</a></div>
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

            <div class="row-fluid">
                <div class="span12">
                    <a href="print_report.php" class="btn btn-primary" style="border-radius:10px"><i
                            class="icon-print"></i>
                        PRINT</a>
                    <hr>
                    <div class="widget-content nopadding">
                        <?php
                        $no =  $ma = $secu = $cl = $other =  $ur = 0;
                        // $resu = mysqli_query($con, "SELECT *from serv_request where view='0'");
                        // $ur = mysqli_num_rows($resu);
                        if (isset($_POST['submit1'])) {
                            $from = $_POST['dt'];
                            $from = $from . " 00:00:00";
                            $_SESSION['f'] = $from;

                            $to = $_POST['dt2'];
                            $to = $to . " 23:59:59";
                            $_SESSION['t'] = $to;
                            $sub_sql = " WHERE req_date >= '$from' && req_date <= '$to' ";
                            //$_SESSION["sub_sql"] = $sub_sql;
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
                                        $result = mysqli_query($con, "SELECT *from serv_request $sub_sql");
                                        $un_read = mysqli_num_rows($result);
                                        if ($un_read > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
                                                $e_id = $row["user_id"];
                                                $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                                                $user_info = mysqli_fetch_array($sql);
                                                $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                                                if ($row["req_service"] == "technician") {
                                                    $ma++;
                                                } elseif ($row["req_service"] == "security") {
                                                    $secu++;
                                                } elseif ($row["req_service"] == "clealiness") {
                                                    $cl++;
                                                } elseif ($row["req_service"] == "other") {
                                                    $other++;
                                                }
                                                //count unrespoce services
                                                if ($row['view'] == '1') $ur++;
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
                                        $result = mysqli_query($con, "SELECT *from serv_request ");
                                        $un_read = mysqli_num_rows($result);
                                        if ($un_read > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
                                                $e_id = $row["user_id"];
                                                $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                                                $user_info = mysqli_fetch_array($sql);
                                                $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                                                if ($row["req_service"] == "technician") {
                                                    $ma++;
                                                } elseif ($row["req_service"] == "security") {
                                                    $secu++;
                                                } elseif ($row["req_service"] == "clealiness") {
                                                    $cl++;
                                                } elseif ($row["req_service"] == "other") {
                                                    $other++;
                                                }
                                                //count unrespoce services
                                                if ($row['view'] == '1') $ur++;
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
                        <hr>
                        <center>
                            <h4>REPORT INFORMATION</h4>
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
                    </div>
                </div>
            </div>
            <br>
            <h4 style="color: while;">
                <div style="float: right;border:10px;border-radius:5px">
                    <span style="float:left;">Responce service:&nbsp;</span><span
                        style="float: left"><?php echo $ur; ?></span>&nbsp;&nbsp;&nbsp;
                </div>
            </h4>
            <br>
            <h4 style="color: while;">
                <div style="float: right;border:10px;border-radius:5px">
                    <span style="float:left;">Unresponced Service:&nbsp;</span><span
                        style="float: left"><?php echo $no - $ur;
                                                                                                            ?></span>&nbsp;&nbsp;&nbsp;
                </div>
            </h4>
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