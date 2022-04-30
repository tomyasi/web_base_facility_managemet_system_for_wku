<?php
include("header.php");
include("../connection.php")
?>
<style>
/* Formatting search box */
.search-box {
    width: 300px;
    position: relative;
    display: inline-block;
    font-size: 14px;
}

.search-box input[type="text"] {
    height: 32px;
    padding: 5px 10px;
    border: 1px solid #CCCCCC;
    font-size: 14px;
}

.result {
    position: absolute;
    z-index: 999;
    top: 100%;
    left: 0;
}

.search-box input[type="text"],
.result {
    width: 100%;
    box-sizing: border-box;
}

/* Formatting result items */
.result p {
    margin: 0;
    padding: 7px 10px;
    border: 1px solid #CCCCCC;
    border-top: none;
    cursor: pointer;
}

.result p:hover {
    background: #f2f2f2;
}
</style>
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
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div>
                    <a href="print_item_info.php" class="btn btn-primary" style="border-radius:10px"><i
                            class="icon-print"></i> PRINT</a>
                </div>
                <div class="search-box">
                    <input type="text" autocomplete="off" placeholder="Search..." name="live_search" id="search"
                        style="border-radius: 13px;" />
                    <div></div>
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item View Form</h5>
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
<script>
$(document).ready(function() {
    $("#search").keypress(function() {
        $.ajax({
            type: 'POST',
            url: 'item_search.php',
            data: {
                name: $("#search").val(),
            },
            success: function(data) {
                $("#output").html(data);
            }
        });
    });
});
</script>