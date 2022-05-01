<?php
include("../connection.php");
if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = "SELECT * FROM stock WHERE item_name LIKE '%" . $_POST['query'] . "%'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($row = mysqli_fetch_row($query)) {
            echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['item_name'] . '</a>';
        }
    } else {
        echo '<p class="list-group-item border-1">No Record</p>';
    }
?>
<?php
}
?>