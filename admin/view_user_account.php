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
            <a href="view_user_account.php" title="Go to user account view page" class="tip-bottom">
                <i class="icon-user"></i>View user account
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>
                <margee>vIEW USER ACCOUNT PAGE</margee>
            </h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> View user account </h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User_ID</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>lastlogin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                $result = mysqli_query($con, "select *from uaccount;");
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <th><?php echo $n; ?></th>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>
                                    <td><?php echo $row["lastlogin"]; ?></td>
                                    <td> <?php
                                                if ($row["status"] == "1") {
                                                    echo "Active";
                                                } else {
                                                    echo "Deactive";
                                                }
                                                ?>
                                </tr>
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