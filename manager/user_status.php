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
            <a href="view_employee.php" title="Go to User status" class="tip-bottom">
                <i class="icon icon-envelope"></i>User Status
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Employee View Form</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User_id</th>
                                    <th>Firet name</th>
                                    <th>Middel name</th>
                                    <th>Last name</th>
                                    <th>sex</th>
                                    <th>Age</th>
                                    <th>Gmail</th>
                                    <th>Phone</th>
                                    <th>Nationality</th>
                                    <th>Subcity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con, "select *from user;");
                                $no = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["user_id"]; ?></td>
                                    <td><?php echo $row["fname"]; ?></td>
                                    <td><?php echo $row["mname"]; ?></td>
                                    <td><?php echo $row["lname"]; ?></td>
                                    <td><?php
                                            if ($row["gender"] == "m") {
                                                echo "Male";
                                            } else {
                                                echo "Female";
                                            }
                                            ?>
                                    </td>
                                    <td><?php echo $row["age"]; ?></td>
                                    <td><?php echo $row["gmail"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["subcity"]; ?></td>
                                    <td>
                                        <?php
                                            if ($row["status"] == "1") {
                                            ?>
                                        <a href="user_status_edite.php?id=<?php echo $row['id'] ?>"
                                            class="btn btn-success" style="border-radius:10px">Active</a>
                                        <?php
                                            } else { ?>
                                        <a href="user_status_edite.php?id=<?php echo $row['id'] ?>"
                                            class="btn btn-danger" style="border-radius:10px">Inactive</a>
                                        <?php
                                            }
                                            ?>
                                    </td>
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