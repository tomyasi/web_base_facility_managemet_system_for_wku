<?php
include("header.php");
include("../connection.php")
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="view_item_order.php" title="Go to view item order" class="tip-bottom">
                <i class="icon-eye-open"></i>view item order
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>VIEW ITEM ORDER PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item Order</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Requested By</th>
                                    <th>Item name</th>
                                    <th>Item Type</th>
                                    <th>Item category</th>
                                    <th>Item Quality</th>
                                    <th>Item Quantity</th>
                                    <th>Ordered date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <?php

                                $result = mysqli_query($con, "SELECT *from item_order;");
                                $no = 1;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $e_id = $row["emp_id"];
                                        $sql = mysqli_query($con, "SELECT *FROM employee where id=$e_id") or die("error occured" . mysqli_error($con));
                                        $emp_info = mysqli_fetch_array($sql);
                                        $re_by = $emp_info['fname'] . ' ' . $emp_info['mname'];
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $re_by; ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row["item_type"]; ?></td>
                                    <td><?php echo $row["item_category"]; ?></td>
                                    <td><?php echo $row["quality"]; ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["orderd_date"]; ?></td>
                                    <td>
                                        <?php if ($row["aprove"] == "0") { ?>
                                        <a href="aprove_item_order.php?id=<?php echo $row['order_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px" title="Approve"><i
                                                class="icon-check"></i>
                                        </a>
                                        <a href="reject_item_order.php?id=<?php echo $row['order_id'] ?>" class="btn
                                        btn-danger" style="border-radius:13px" title="Reject"><i
                                                class="icon-remove-sign"></i>
                                        </a>
                                        <?php
                                                } elseif ($row["aprove"] == "2") { ?>
                                        <img src="../images/remove.png" alt="" class="img-fluid">Rejected
                                        <?php
                                                } else { ?>
                                        <img src="../images/tick.png" alt="" class="img-fluid"></a>

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
</div>
<?php
mysqli_close($con);
include("footer.php");
?>