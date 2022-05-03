<?php
include("../connection.php");
$output = '';
$order = $_POST["order"];
if ($order == 'desc') {
    $order = 'asc';
} else {
    $order = 'desc';
}
$query = "SELECT * FROM stock ORDER BY " . $_POST["column_name"] . "  " . $_POST["order"] . "";
$no = 1;
$total_item = 0;
$result = mysqli_query($con, $query);
$output .= '  
 <table class="table table-bordered">  
      <tr>  
      <th>#</th>
      <th><a class="column_sort" id="item_id" data-order="' . $order . '" href="#">Item ID</a></th>
      <th><a class="column_sort" id="item_code" data-order="' . $order . '" href="#">Item Code</a></th>
      <th><a class="column_sort" id="item_name" data-order="' . $order . '" href="#">Item name</a></th>
      <th><a class="column_sort" id="item_type" data-order="' . $order . '" href="#">Item Type</a></th>
      <th><a class="column_sort" id="item_category" data-order="' . $order . '" href="#">Item category</a></th>
      <th><a class="column_sort" id="item_model" data-order="' . $order . '" href="#">Item Model</a></th>
      <th><a class="column_sort" id="item_quality" data-order="' . $order . '" href="#">Item Quality</a></th>
      <th><a class="column_sort" id="item_quantity" data-order="' . $order . '" href="#">Item Quantity</a></th>
      </tr>  
 ';
while ($row = mysqli_fetch_array($result)) {
    $output .= '  
      <tr>  
      <td>' . $no . '</td>
      <td>' . $row["item_id"] . '</td>
      <td>' . $row["item_code"] . '</td>
      <td>' . $row["item_name"] . '</td>
      <td>' . $row["item_type"] . '</td>
      <td>' . $row["item_category"] . '</td>
      <td>' . $row["item_model"] . '</td>
      <td>' . $row["item_quality"] . '</td>
      <td>' . $row["item_quantity"] . '</td>
      </tr>
';
    $no++;
    $total_item += $row["item_quantity"];
}
?>
<?php
$output .= '</table>';
$output .= ' <h4>
<div style="float: right; background-color:black;border:10px;border-radius:5px">
    <span style="float:left;">Type of Resource:&nbsp;</span><span
        style="float: left"> ' . $no . '</span>
<span style="float:left;">&nbsp;&nbsp;&nbsp;Total:&nbsp;</span><span style="float: left"> ' . $total_item . '</span>
</div>
</h4>';
echo $output;
?>