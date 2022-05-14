<?php
include("header.php");
include("../connection.php")
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#"><i class="icon icon-th-list"></i> <span>Manage Employees</span></a><a
                href="view_employee.php" title="Go to User View Employees" class="tip-bottom">
                <i class="icon-eye-open"></i>View Employees
            </a></div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>EMPLOYEE INFORMATION</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <a href="print_emp_info.php" class="btn btn-primary" style="border-radius:10px;"><i
                        class="icon-print">&nbsp;&nbsp;PRINT</i></a>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Employee View Form</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table id="datatableid" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emp_id</th>
                                    <th>Firet name</th>
                                    <th>Middel name</th>
                                    <th>sex</th>
                                    <th>Age</th>
                                    <th>Gmail</th>
                                    <th>Phone</th>
                                    <th>Nationality</th>
                                    <th>Salary</th>
                                    <th>Jop Position</th>
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
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
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