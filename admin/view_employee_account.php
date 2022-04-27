<?php
include("header.php");
include("../connection.php")
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
                                                    echo "Active";
                                                } else {
                                                    echo "Deactive";
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