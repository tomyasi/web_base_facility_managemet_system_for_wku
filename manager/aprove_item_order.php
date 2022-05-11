<?php
include("../connection.php");
if (isset($_GET['id'])) {
    $e_id = $_GET['id'];
    $statment = mysqli_query($con, "SELECT * from item_order where order_id=$e_id");
    $row = mysqli_fetch_array($statment);
    $sta = "UPDATE item_order set aprove='1' where order_id=$e_id";
    $resu = mysqli_query($con, $sta);
    $query = mysqli_query($con, "UPDATE item_request SET ordered='1' WHERE re_id=$row[req_id]");
    if ($resu) {
        header("location:view_item_order.php");
    } else {
        echo mysqli_error($con);
    }
?>
<?php
}
mysqli_close($con);
include("footer.php");
?>