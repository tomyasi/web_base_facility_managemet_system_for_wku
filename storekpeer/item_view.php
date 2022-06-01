<?php
include("header.php");
include("../connection.php")
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#"><i class="icon icon-th-list"></i> <span>Manage Item</span></a>
            <a href="item_view.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>View Item
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>VIEW RESOURCE INFORMATION PAGE</h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div>
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item View Form</h5>
                    </div>
                    <!-- employee view inteble form  -->
                    <div class="widget-content nopadding" id="employee_table">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><a class="column_sort" id="item_id" data-order="desc" href="#">Item
                                            ID</a></th>
                                    <th><a class="column_sort" id="item_code" data-order="desc" href="#">Item
                                            Code</a></th>
                                    <th><a class="column_sort" id="item_name" data-order="desc" href="#">Item
                                            name</a></th>
                                    <th><a class="column_sort" id="item_type" data-order="desc" href="#">Item
                                            Type</a></th>
                                    <th><a class="column_sort" id="item_category" data-order="desc" href="#">Item
                                            category</a></th>
                                    <th><a class="column_sort" id="item_model" data-order="desc" href="#">Item
                                            Model</a></th>
                                    <th><a class="column_sort" id="item_quality" data-order="desc" href="#">Item
                                            Quality</a></th>
                                    <th><a class="column_sort" id="item_quantity" data-order="desc" href="#">Item
                                            Quantity</a></th>
                                </tr>
                            </thead>
                            <tbody id="output">
                                <?php
                                $result = mysqli_query($con, "SELECT *from stock;");
                                $no = 0;
                                $total_item = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $no++;
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
                                </tr>
                                <?php
                                    $total_item += $row["item_quantity"];
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">
                        <span style="float:left;">Type of Resource:&nbsp;</span><span style="float: left"><?php echo $no; ?></span>

                    </div>
                </h4><br>
                <h4 style="color: while;">
                    <div style="float: right;border:10px;border-radius:5px">

                        <span style="float:left;">&nbsp;&nbsp;&nbsp;Total:&nbsp;</span><span style="float: left"><?php echo $total_item; ?></span>
                    </div>
                </h4> -->
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
            url: "sort_item.php",
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