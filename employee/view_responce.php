<?php

include("header.php");
include("../connection.php");
if (!(isset($_SESSION['emp_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
$user_id = $_SESSION['emp_id'];
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>View</span></a>
            <a href="view_request.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>View Responce
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>VIEW RESPONCE FROM RESOURCE REQUEST PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <!-- employee view inteble form  -->
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped thead-dark">
                        <thead style="color: red;">
                            <tr>
                                <th>#</th>
                                <th>REQUESTED DATE</th>
                                <th>ITEM NAME</th>
                                <th>ITEM TYPE</th>
                                <th>ITEM CATEGORY</th>
                                <th>ITEM QUALITY</th>
                                <th>ITEM QUANTITY</th>
                                <th>GIVING DATE</th>
                                <th>MESSAGE</th>
                                <th>FEEDBACK</th>
                            </tr>
                        </thead>
                        <tbody id="output">
                            <?php
                            $result = mysqli_query($con, "SELECT *from give_item where give_to='$emp_id'");
                            $no = 1;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $e_id = $row["give_by"];
                                    $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                    $emp_info = mysqli_fetch_array($sql);
                                    $give_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $give_by; ?></td>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row["item_type"]; ?></td>
                                <td><?php echo $row["item_category"]; ?></td>
                                <td><?php echo $row["quality"]; ?></td>
                                <td><?php echo $row["quantity"]; ?></td>
                                <td><?php echo $row["give_date"]; ?></td>
                                <td><?php echo $row["message"]; ?></td>

                                <td>
                                    <?php if ($row["view"] == "1") { ?>
                                    <img src="../images/tick.png" alt="" class="img-fluid"></a>
                                    <?php
                                            } else { ?>
                                    <a href="feedback.php?id=<?php echo $row['id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px">Feedback </a>
                                    <?php
                                            }
                                            ?>
                                </td>
                            </tr>
                            <?php
                                    $no++;
                                }
                            } else { ?>
                            <div class="alert alert-danger" id="error" style="display: block;">
                                <center>
                                    <strong>Empty Request.</strong>
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
<?php
mysqli_close($con);
include("footer.php");
?>