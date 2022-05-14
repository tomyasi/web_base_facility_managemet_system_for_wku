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
            <a href="edite_user.php" title="Go to update user account page" class="tip-bottom">
                <i class="icon-user"></i>Update user account
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Update user account</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>user_id</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>Status</th>
                                    <th>lastlogin</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $result = mysqli_query($con, "select *from uaccount;");
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>
                                    <td> <?php
                                                if ($row["status"] == "1") {
                                                    echo "Active";
                                                } else {
                                                    echo "Deactive";
                                                }
                                                ?>
                                    </td>
                                    <td><?php echo $row["lastlogin"]; ?></td>
                                    <td><a href="edite_user.php?id=<?php echo $row['id'] ?>" class="btn btn-primary"
                                            style="border-radius:10px"><i class="icon-edit"></i>
                                            Edit</a></td>
                                </tr>
                                <?php
                                    $no++;
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