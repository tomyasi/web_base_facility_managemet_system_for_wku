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
                <form name="formsend" action="#" method="POST" class="form-horizontal">
                    <div class="span2">
                        <div>
                            <label>Search</label>
                            <select class="span12" name="sex" required style="border-radius: 13px;" id="type">
                                <option value="all">All</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="span2">
                        <div>
                            <label>&nbsp</label>
                            <button type="submit" id="f" name="search" class="btn btn-success"
                                style="border-radius: 13px;float: left;"><strong>Search</strong></button>
                        </div>
                    </div>
                </form>
                <br>
                <form name="formsend" action="#" method="POST" class="form-horizontal">
                    <input type="text" class="span6" name="live_search" id="live_search" autocomplete="off"
                        placeholder="Search ..." style="border-radius:10px" required>
                    &nbsp;&nbsp;
                    <button type="submit" id="f" name="ind_search" class="btn btn-primary"
                        style="border-radius: 13px;float: left;"><strong>Search</strong></button>
                    <button type="button" name="submit2" class="btn btn-warning"
                        onclick="window.location.href=window.location.href" style="border-radius: 10px;">Clear</button>
                </form><br>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Employee View Form</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding" id="employee_table">
                        <?php
                        $female = $male = 0;
                        if (isset($_POST['search'])) {
                            $sex = $_POST['sex'];
                            if ($sex == 'male') {
                        ?>
                        <table id="datatableid" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><a class="column_sort" id="emp_id" data-order="desc" href="#">Emp_ID</a></th>
                                    <th><a class="column_sort" id="fname" data-order="desc" href="#">FIRST NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="mname" data-order="desc" href="#">MIDDEL NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="sex" data-order="desc" href="#">SEX</a></th>
                                    <th><a class="column_sort" id="age" data-order="desc" href="#">AGE</a></th>
                                    <th><a class="column_sort" id="gmail" data-order="desc" href="#">GMAIL</a></th>
                                    <th><a class="column_sort" id="phone" data-order="desc" href="#">PHONE</a></th>
                                    <th><a class="column_sort" id="nationality" data-order="desc"
                                            href="#">NATIONALITY</a></th>
                                    <th><a class="column_sort" id="salary" data-order="desc" href="#">SALARY</a></th>
                                    <th><a class="column_sort" id="jop_position" data-order="desc" href="#">JOP
                                            POSITION</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $result = mysqli_query($con, "SELECT *from employee where gender='m'");
                                        $user = mysqli_num_rows($result);
                                        if ($user > 0) {
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
                                        ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["emp_id"]; ?></td>
                                    <td><?php echo $row["fname"]; ?></td>
                                    <td><?php echo $row["mname"]; ?></td>
                                    <td><?php
                                                        if ($row["gender"] == "m") {
                                                            $male++;
                                                            echo "Male";
                                                        } else {
                                                            $female++;
                                                            echo "Female";
                                                        }
                                                        ?>
                                    </td>
                                    <td><?php echo $row["age"]; ?></td>
                                    <td><?php echo $row["gmail"]; ?></td>
                                    <td><?php echo "+251 ", $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
                                    <?php

                                            }
                                        } else { ?>
                                    <div class="alert alert-danger" id="error" style="display: block;">
                                        <center>
                                            <strong>Empty.</strong>
                                        </center>
                                    </div>
                                    <?php
                                        }
                                            ?>
                            </tbody>
                        </table>
                        <?php
                            } elseif ($sex == 'female') {
                            ?>
                        <table id="datatableid" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><a class="column_sort" id="emp_id" data-order="desc" href="#">Emp_ID</a></th>
                                    <th><a class="column_sort" id="fname" data-order="desc" href="#">FIRST NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="mname" data-order="desc" href="#">MIDDEL NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="sex" data-order="desc" href="#">SEX</a></th>
                                    <th><a class="column_sort" id="age" data-order="desc" href="#">AGE</a></th>
                                    <th><a class="column_sort" id="gmail" data-order="desc" href="#">GMAIL</a></th>
                                    <th><a class="column_sort" id="phone" data-order="desc" href="#">PHONE</a></th>
                                    <th><a class="column_sort" id="nationality" data-order="desc"
                                            href="#">NATIONALITY</a></th>
                                    <th><a class="column_sort" id="salary" data-order="desc" href="#">SALARY</a></th>
                                    <th><a class="column_sort" id="jop_position" data-order="desc" href="#">JOP
                                            POSITION</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $result = mysqli_query($con, "SELECT *from employee where gender='f'");
                                        $user = mysqli_num_rows($result);
                                        if ($user > 0) {
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
                                        ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["emp_id"]; ?></td>
                                    <td><?php echo $row["fname"]; ?></td>
                                    <td><?php echo $row["mname"]; ?></td>
                                    <td><?php
                                                        if ($row["gender"] == "m") {
                                                            $male++;
                                                            echo "Male";
                                                        } else {
                                                            $female++;
                                                            echo "Female";
                                                        }
                                                        ?>
                                    </td>
                                    <td><?php echo $row["age"]; ?></td>
                                    <td><?php echo $row["gmail"]; ?></td>
                                    <td><?php echo "+251 ", $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
                                    <?php

                                            }
                                        } else { ?>
                                    <div class="alert alert-danger" id="error" style="display: block;">
                                        <center>
                                            <strong>Empty.</strong>
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
                        <table id="datatableid" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><a class="column_sort" id="emp_id" data-order="desc" href="#">Emp_ID</a></th>
                                    <th><a class="column_sort" id="fname" data-order="desc" href="#">FIRST NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="mname" data-order="desc" href="#">MIDDEL NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="sex" data-order="desc" href="#">SEX</a></th>
                                    <th><a class="column_sort" id="age" data-order="desc" href="#">AGE</a></th>
                                    <th><a class="column_sort" id="gmail" data-order="desc" href="#">GMAIL</a></th>
                                    <th><a class="column_sort" id="phone" data-order="desc" href="#">PHONE</a></th>
                                    <th><a class="column_sort" id="nationality" data-order="desc"
                                            href="#">NATIONALITY</a></th>
                                    <th><a class="column_sort" id="salary" data-order="desc" href="#">SALARY</a></th>
                                    <th><a class="column_sort" id="jop_position" data-order="desc" href="#">JOP
                                            POSITION</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $result = mysqli_query($con, "SELECT *from employee");
                                        $user = mysqli_num_rows($result);
                                        if ($user > 0) {
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $no++;
                                        ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["emp_id"]; ?></td>
                                    <td><?php echo $row["fname"]; ?></td>
                                    <td><?php echo $row["mname"]; ?></td>
                                    <td><?php
                                                        if ($row["gender"] == "m") {
                                                            $male++;
                                                            echo "Male";
                                                        } else {
                                                            $female++;
                                                            echo "Female";
                                                        }
                                                        ?>
                                    </td>
                                    <td><?php echo $row["age"]; ?></td>
                                    <td><?php echo $row["gmail"]; ?></td>
                                    <td><?php echo "+251 ", $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
                                    <?php

                                            }
                                        } else { ?>
                                    <div class="alert alert-danger" id="error" style="display: block;">
                                        <center>
                                            <strong>Empty.</strong>
                                        </center>
                                    </div>
                                    <?php
                                        }
                                            ?>
                            </tbody>
                        </table>
                        <?php
                            }
                        } elseif (isset($_POST['ind_search'])) {
                            $search = mysqli_real_escape_string($con, $_POST['live_search']);
                            ?>
                        <table id="datatableid" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><a class="column_sort" id="emp_id" data-order="desc" href="#">Emp_ID</a></th>
                                    <th><a class="column_sort" id="fname" data-order="desc" href="#">FIRST NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="mname" data-order="desc" href="#">MIDDEL NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="sex" data-order="desc" href="#">SEX</a></th>
                                    <th><a class="column_sort" id="age" data-order="desc" href="#">AGE</a></th>
                                    <th><a class="column_sort" id="gmail" data-order="desc" href="#">GMAIL</a></th>
                                    <th><a class="column_sort" id="phone" data-order="desc" href="#">PHONE</a></th>
                                    <th><a class="column_sort" id="nationality" data-order="desc"
                                            href="#">NATIONALITY</a></th>
                                    <th><a class="column_sort" id="salary" data-order="desc" href="#">SALARY</a></th>
                                    <th><a class="column_sort" id="jop_position" data-order="desc" href="#">JOP
                                            POSITION</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result = mysqli_query($con, "SELECT *from employee where
                                    emp_id  LIKE '%" . $search . "%'
                                    OR fname LIKE '%" . $search . "%'
                                    OR mname LIKE '%" . $search . "%' 
                                    OR lname LIKE '%" . $search . "%' ");
                                    $user = mysqli_num_rows($result);
                                    if ($user > 0) {
                                        $no = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $no++;
                                    ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["emp_id"]; ?></td>
                                    <td><?php echo $row["fname"]; ?></td>
                                    <td><?php echo $row["mname"]; ?></td>
                                    <td><?php
                                                    if ($row["gender"] == "m") {
                                                        $male++;
                                                        echo "Male";
                                                    } else {
                                                        $female++;
                                                        echo "Female";
                                                    }
                                                    ?>
                                    </td>
                                    <td><?php echo $row["age"]; ?></td>
                                    <td><?php echo $row["gmail"]; ?></td>
                                    <td><?php echo "+251 ", $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
                                    <?php

                                        }
                                    } else { ?>
                                    <div class="alert alert-danger" id="error" style="display: block;">
                                        <center>
                                            <strong>Empty.</strong>
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
                        <table id="datatableid" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><a class="column_sort" id="emp_id" data-order="desc" href="#">Emp_ID</a></th>
                                    <th><a class="column_sort" id="fname" data-order="desc" href="#">FIRST NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="mname" data-order="desc" href="#">MIDDEL NAME</a>
                                    </th>
                                    <th><a class="column_sort" id="sex" data-order="desc" href="#">SEX</a></th>
                                    <th><a class="column_sort" id="age" data-order="desc" href="#">AGE</a></th>
                                    <th><a class="column_sort" id="gmail" data-order="desc" href="#">GMAIL</a></th>
                                    <th><a class="column_sort" id="phone" data-order="desc" href="#">PHONE</a></th>
                                    <th><a class="column_sort" id="nationality" data-order="desc"
                                            href="#">NATIONALITY</a></th>
                                    <th><a class="column_sort" id="salary" data-order="desc" href="#">SALARY</a></th>
                                    <th><a class="column_sort" id="jop_position" data-order="desc" href="#">JOP
                                            POSITION</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result = mysqli_query($con, "SELECT *from employee");
                                    $user = mysqli_num_rows($result);
                                    if ($user > 0) {
                                        $no = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $no++;
                                    ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["emp_id"]; ?></td>
                                    <td><?php echo $row["fname"]; ?></td>
                                    <td><?php echo $row["mname"]; ?></td>
                                    <td><?php
                                                    if ($row["gender"] == "m") {
                                                        $male++;
                                                        echo "Male";
                                                    } else {
                                                        $female++;
                                                        echo "Female";
                                                    }
                                                    ?>
                                    </td>
                                    <td><?php echo $row["age"]; ?></td>
                                    <td><?php echo $row["gmail"]; ?></td>
                                    <td><?php echo "+251 ", $row["phone"]; ?></td>
                                    <td><?php echo $row["nationality"]; ?></td>
                                    <td><?php echo $row["salary"]; ?></td>
                                    <td><?php echo $row["jop_position"]; ?></td>
                                    <?php

                                        }
                                    } else { ?>
                                    <div class="alert alert-danger" id="error" style="display: block;">
                                        <center>
                                            <strong>Empty.</strong>
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
                    </div>
                </div>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Total Female:&nbsp;</span><span
                            style="float: left"><?php echo $female; ?></span>
                    </div>
                </h4>
                <br>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Total Male:&nbsp;</span><span
                            style="float: left"><?php echo $male; ?></span>
                    </div>
                </h4>
                <br>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Total:&nbsp;</span><span style="float: left"><?php echo $no; ?></span>
                    </div>
                </h4>
            </div>
        </div>
    </div>
</div>
<?php
mysqli_close($con);
include("footer.php");
?>
<script>
$(document).ready(function() {
    $(document).on('click', '.column_sort', function() {
        var column_name = $(this).attr("id");
        var order = $(this).data("order");
        var arrow = '';
        //glyphicon glyphicon-arrow-up  
        //glyphicon glyphicon-arrow-down  
        if (order == 'desc') {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
        } else {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
        }
        $.ajax({
            url: "sort_EMP.php",
            method: "POST",
            data: {
                column_name: column_name,
                order: order
            },
            success: function(data) {
                $('#employee_table').html(data);
                $('#' + column_name + '').append(arrow);
            }
        })
    });
});
</script>