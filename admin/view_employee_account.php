<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['admin_id']))) {
    header("Location: ../login.php");
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage User</span></a>
            <a href="view_employee_account.php" title="Go to employee account view page" class="tip-bottom">
                <i class="icon-user"></i>View employee account
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>
                <margee>VIEW EMPLOYEE ACCOUNT PAGE</margee>
            </h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>View employee account</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>EMPLOYEE ID</th>
                                    <th>USERNAME</th>
                                    <th>PASSWORD</th>
                                    <th>ROLE</th>
                                    <th>LASTLOGIN DATE</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                $result = mysqli_query($con, "SELECT *from eaccount;");
                                $no_acc = mysqli_num_rows($result);
                                if ($no_acc > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $e_id = $row["emp_id"];
                                        $sql = mysqli_query($con, "SELECT emp_id FROM employee where id='$e_id'") or die("error occured" . mysqli_error($con));
                                        $emp_id = mysqli_fetch_array($sql);
                                ?>
                                <tr>
                                    <td><?php echo $n; ?></td>
                                    <td><?php echo $emp_id["emp_id"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>
                                    <td><?php echo $row["role"]; ?></td>
                                    <td><?php echo $row["lastlogin"]; ?></td>
                                    <td> <?php
                                                    if ($row["status"] == "1") {
                                                        echo "Active";
                                                    } else {
                                                        echo "Deactive";
                                                    }
                                                    ?>
                                </tr>
                                <?php
                                        $n++;
                                    }
                                } else { ?>
                                <div class="alert alert-danger" id="error" style="display: block;">
                                    <center>
                                        <strong>Empty Employee Account.</strong>
                                    </center>
                                </div>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
mysqli_close($con);
include("footer.php");
?>