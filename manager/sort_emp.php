<?php
include("../connection.php");
$output = '';
$order = $_POST["order"];
if ($order == 'desc') {
    $order = 'asc';
} else {
    $order = 'desc';
}
$query = "SELECT * FROM employee ORDER BY " . $_POST["column_name"] . "  " . $_POST["order"] . "";
$no = 0;
$female = 0;
$male = 0;
$result = mysqli_query($con, $query);
$output .= '  
 <table class="table table-bordered">  
      <tr>  
      <th>#</th>
      <th><a class="column_sort" id="emp_id" data-order="' . $order . '" href="#">Emp_ID</a></th>
      <th><a class="column_sort" id="fname" data-order="' . $order . '" href="#">FIRST NAME</a>
      </th>
      <th><a class="column_sort" id="mname" data-order="' . $order . '" href="#">MIDDEL
              NAME</a></th>
      <th><a class="column_sort" id="gender" data-order="' . $order . '" href="#">SEX</a></th>
      <th><a class="column_sort" id="age" data-order="' . $order . '" href="#">AGE</a></th>
      <th><a class="column_sort" id="gmail" data-order="' . $order . '" href="#">GMAIL</a></th>
      <th><a class="column_sort" id="phone" data-order="' . $order . '" href="#">PHONE</a></th>
      <th><a class="column_sort" id="nationality" data-order="' . $order . '"
              href="#">NATIONALITY</a></th>
      <th><a class="column_sort" id="salary" data-order="' . $order . '" href="#">SALARY</a></th>
      <th><a class="column_sort" id="jop_position" data-order="' . $order . '" href="#">JOP POSITION</a>
      </tr>  
 ';
while ($row = mysqli_fetch_array($result)) {
    $no++;
    $output .= '  
      <tr>  
      <td>' . $no . '</td>
      <td>' . $row["emp_id"] . '</td>
      <td>' . $row["fname"] . ' </td>
      <td>' . $row["mname"] . '</td>';
    if ($row["gender"] == "m") {
        $male++;

        $output .= '<td> Male  </td>';
    } else {
        $female++;
        $output .= '<td> Female </td>';;
    }
    $output .= '
<td>' . $row["age"] . '</td>
<td>' . $row["gmail"] . '</td>
<td>' . $row["phone"] . '</td>
<td>' . $row["nationality"] . '</td>
<td>' . $row["salary"] . '</td>
<td>' . $row["jop_position"] . '</td>
</tr>
';
}
?>
<?php
$output .= '</table>';
echo $output;
?>