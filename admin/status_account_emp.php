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
            <a href="status_account_emp.php" title="Go to update employee account status page" class="tip-bottom">
                <i class="icon-user"></i>Update employee account status
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Account View Form</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emp_id</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>Role</th>
                                    <th>lastlogin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                $result = mysqli_query($con, "select *from eaccount;");
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $n; ?></td>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>
                                    <td><?php echo $row["role"]; ?></td>
                                    <td><?php echo $row["lastlogin"]; ?></td>
                                    <td> <?php
                                                if ($row["status"] == "1") {
                                                ?>
                                        <a href="employee_account_status_edite.php?id=<?php echo $row['id'] ?>"
                                            class="btn btn-success" style="border-radius:10px">Active</a>
                                        <?php
                                                } else { ?>
                                        <a href="employee_account_status_edite.php?id=<?php echo $row['id'] ?>"
                                            class="btn btn-danger" style="border-radius:10px">Deactive</a>
                                        <?php
                                                }
                                            ?>
                                </tr>
                                <?php
                                    $n++;
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