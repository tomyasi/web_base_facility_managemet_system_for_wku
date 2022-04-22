<?php
include("header.php");
include("../connection.php")
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="view_employee.php" title="Go to View User" class="tip-bottom">
                <i class="icon icon-envelope"></i>View user
            </a></div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
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
                                    <th>ID</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>lastlogin</th>
                                    <th>Action1</th>
                                    <th>Action2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con, "select *from account;");
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["password"]; ?></td>
                                        <td><?php echo $row["role"]; ?></td>
                                        <td><?php echo $row["status"]; ?></td>
                                        <td><?php echo $row["lastlogin"]; ?></td>
                                        <td><a href="detail_account.php?id=<?php echo $row['id'] ?>" class="btn btn-primary" style="border-radius:10px"><i class="icon-eye-open"></i>
                                                Detail</a></td>
                                        <td><a href="edite.php?id=<?php echo $row['id'] ?>" class="btn btn-primary" style="border-radius:10px"><i class="icon-edit"></i>
                                                Edite</a></td>
                                    </tr>
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