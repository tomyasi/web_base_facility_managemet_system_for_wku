<?php
include("header.php");
include("../connection.php")
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="returnabl_item.php" title="Go to view User" class="tip-bottom">
                <i class="icon-briefcase"></i>Returnable Item
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>RETURNABLE ITEM PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Returnable Item</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>GIVEN TO</th>
                                    <th>ITEM NAME</th>
                                    <th>ITEM TYPE</th>
                                    <th>ITEM CATEGORY</th>
                                    <th>ITEM QUALITY</th>
                                    <th>ITEM QUANTITY</th>
                                    <th>MESSAGE</th>
                                    <th>RETURN SCHEDULE</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <?php
                                // $result = mysqli_query($con, "SELECT *from item_order where aprove='1'");
                                $no = 0;
                                $result = mysqli_query($con, "SELECT *from give_item where item_category='Returnable'");
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $no++;
                                        $e_id = $row["give_to"];
                                        $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                        $emp_info = mysqli_fetch_array($sql);
                                        $re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                                        //$total_give += $row["quantity"];
                                        //$no++;
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $re_by; ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row["item_type"]; ?></td>
                                    <td><?php echo $row["item_category"]; ?></td>
                                    <td><?php echo $row["quality"]; ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td><?php echo $row["return_time"]; ?></td>
                                    <td>
                                        <?php if ($row["retu"] == "0") { ?>
                                        <img src="../images/remove.png" alt="" class="img-fluid"></a>

                                        <?php } elseif ($row["retu"] == "1") { ?><a
                                            href="return_ok.php?id=<?php echo $row['id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px">Ok</a>

                                        <?php
                                                } else { ?>
                                        <img src="../images/tick.png" alt="" class="img-fluid"></a>
                                        <?php
                                                }
                                                ?>
                                    </td>
                                </tr>
                                <?php

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
</div>
<?php
mysqli_close($con);
include("footer.php");
?>