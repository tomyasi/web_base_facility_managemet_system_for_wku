<?php
include("../connection.php");
$result = mysqli_query($con, "SELECT *from stock where item_name LIKE '%" . $_POST['name'] . "%' || item_type LIKE '%" . $_POST['name'] . "%'");
$no = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
echo "<tr>
    <td>".$no."</td>
    <td>".$row['item_id']."</td>
    <td>".$row['item_code']."</td>
    <td>".$row['item_name']."</td>
    <td>".$row['item_type']."</td>
    <td>".$row['item_category']."</td>
    <td>".$row['item_model']."</td>
    <td>".$row['item_quality']."</td>
    <td>".$row['item_quantity']."</td>
</tr>";
        $no++;
    }
} else {
    echo "<tr><td>0 result's found</td></tr>";
}