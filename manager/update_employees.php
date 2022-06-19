<?php
include("header.php");
include("../connection.php")
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list" title="Go to User Manage"></i> <span>Manage Employee</span></a>
            <a href="updat_users.php" title="Go to Update Users page" class="tip-bottom"><i
                    class="icon-pencil"></i>Employee
                Update
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>EMPLOYEE UPDATE INFORMATIN PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <form name="formsend" action="#" method="POST" class="form-horizontal">
                    <input type="text" class="span6" name="live_search" id="live_search" autocomplete="off"
                        placeholder="Search ..." style="border-radius:10px" required>
                    &nbsp;&nbsp;
                    <button type="submit" id="f" name="search" class="btn btn-primary"
                        style="border-radius: 13px;float: left;"><strong>Search</strong></button>
                    <button type="button" name="submit2" class="btn btn-warning"
                        onclick="window.location.href=window.location.href" style="border-radius: 10px;">Clear</button>
                </form><br>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>User Update Form</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <?php
                        if (isset($_POST['search'])) {
                            $search = mysqli_real_escape_string($con, $_POST['live_search']);
                            $result = mysqli_query($con, "SELECT *from employee WHERE
                            emp_id  LIKE '%" . $search . "%'
                            OR fname LIKE '%" . $search . "%'
                            OR mname LIKE '%" . $search . "%' 
                            OR lname LIKE '%" . $search . "%'");
                            if (mysqli_num_rows($result) > 0) {
                        ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emp_id</th>
                                    <th>First name</th>
                                    <th>Middel name</th>
                                    <th>Last name</th>
                                    <th>sex</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Nationality</th>
                                    <th>Salary</th>
                                    <th>Jop Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $no = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $no++;
                                        ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["emp_id"]; ?></td>
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
                                    <td><?php echo "+251 ", $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
                                    <td><a href="employee_edite.php?id=<?php echo $row['id'] ?>" class="btn btn-primary"
                                            style="border-radius:13px"><i class="icon-pencil"></i>
                                            Edit</a></td>
                                </tr>
                                <?php

                                        }
                                        ?>
                            </tbody>
                        </table>
                        <?php
                            } else { ?>
                        <div class="alert alert-danger" id="error" style="display: block;">
                            <center>
                                <strong>Search not found!!!.</strong>
                            </center>
                        </div>
                        <?php
                            }
                        } else {
                            ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emp_id</th>
                                    <th>First name</th>
                                    <th>Middel name</th>
                                    <th>Last name</th>
                                    <th>sex</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Nationality</th>
                                    <th>Salary</th>
                                    <th>Jop Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result = mysqli_query($con, "select *from employee;");
                                    $no = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["emp_id"]; ?></td>
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
                                    <td><?php echo "+251 ", $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
                                    <td><a href="employee_edite.php?id=<?php echo $row['id'] ?>" class="btn btn-primary"
                                            style="border-radius:13px"><i class="icon-pencil"></i>
                                            Edit</a></td>
                                </tr>
                                <?php
                                        $no++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <?php
                        } ?>
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