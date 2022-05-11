<?php
include("header.php");
include("../connection.php")
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>View</span></a>
            <a href="view_request.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>View Request
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>ITEM ORDER PAGE</h5>
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
                                    <th>Odered date</th>
                                    <th>Aproved</th>
                                    <th>Give Item</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <?php
                                $result = mysqli_query($con, "SELECT *from item_order where aprove='1'");
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
                                    <td><?php echo $row['item-name']; ?></td>
                                    <td><?php echo $row["item_type"]; ?></td>
                                    <td><?php echo $row["item_category"]; ?></td>
                                    <td><?php echo $row["quality"]; ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["orderd_date"]; ?></td>
                                    <td> <?php if ($row["aprove"] == "1") { ?>
                                        <img src="../images/tick.png" alt="" class="img-fluid"></a>
                                        <?php
                                                    } else { ?>
                                        <img src="../images/remove.png" alt="" class="img-fluid">
                                        <?php
                                                    }
                                                ?>
                                    </td>
                                    <td><a href="item_request_reply.php?id=<?php echo $row['req_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                            Give </a></td>

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