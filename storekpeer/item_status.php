<?php
include("header.php");
include("../connection.php")
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage Item</span></a>
            <a href="item_view.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>Item Status
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item Status</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item ID</th>
                                    <th>Item Code</th>
                                    <th>Item name</th>
                                    <th>Item Type</th>
                                    <th>Item category</th>
                                    <th>Item Model</th>
                                    <th>Item Quality</th>
                                    <th>Item Quantity</th>
                                    <th>Item Status</th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <?php
                                $result = mysqli_query($con, "select *from stock;");
                                $no = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["item_id"]; ?></td>
                                    <td><?php echo $row["item_code"]; ?></td>
                                    <td><?php echo $row["item_name"]; ?></td>
                                    <td><?php echo $row["item_type"]; ?></td>
                                    <td><?php echo $row["item_category"]; ?></td>
                                    <td><?php echo $row["item_model"]; ?></td>
                                    <td><?php echo $row["item_quality"]; ?></td>
                                    <td><?php echo $row["item_quantity"]; ?></td>
                                    <td>
                                        <?php
                                            if ($row["status"] == "1") {
                                            ?>
                                        <a href="item_status_edite.php?id=<?php echo $row['item_id'] ?>"
                                            class="btn btn-success" style="border-radius:10px">Enable</a>
                                        <?php
                                            } else { ?>
                                        <a href="item_status_edite.php?id=<?php echo $row['item_id'] ?>"
                                            class="btn btn-danger" style="border-radius:10px">Desable</a>
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