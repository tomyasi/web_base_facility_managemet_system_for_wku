<?php
include("../connection.php");
$output = '';
$no = 1;
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT *from stock
	WHERE id  LIKE '%" . $search . "%'
	OR item_code LIKE '%" . $search . "%' 
	OR item_name LIKE '%" . $search . "%' 
	OR item_type LIKE '%" . $search . "%' 
    OR item_type LIKE '%" . $search . "%' 
    OR item_category LIKE '%" . $search . "%' 
    OR item_model LIKE '%" . $search . "%' 
	";
} else {
    $query = "SELECT *from stock;";
}
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <!-- <th><a class="column_sort" id="item_id" data-order="desc" href="#">Item
                    ID</a></th> -->
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
    </thead>';
    while ($row1 = mysqli_fetch_array($result)) {
        $return .= '
		<tr>  
            <td>' . $no . '</td>
            <td>' . $row["item_code"] . '</td>
            <td>' . $row["item_name"] . '</td>
            <td>' . $row["item_type"] . '</td>
            <td>' . $row["item_category"] . '</td>
            <td>' . $row["item_model"] . '</td>
            <td>' . $row["item_quality"] . '</td>
            <td>' . $row["item_quantity"] . '</td>
      </tr>';
        $no++;
    }
    $output .= '</table>';

    echo $return;
} else {
    echo 'No results containing all your search terms were found.';
}