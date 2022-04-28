<?php
include("../connection.php");
if (isset($_GET['id'])) {
    $e_id = $_GET['id'];
    $statment = mysqli_query($con, "select * from stock where item_id=$e_id");
    while ($row = mysqli_fetch_array($statment)) {
        $status = $row['status'];
        if ($status == "1") {
            $e_status = 0;
        }
        if ($status == "0") {
            $e_status = 1;
        }
        $sta = "update stock set status=$e_status where item_id=$e_id";
        $resu = mysqli_query($con, $sta);
        if ($resu) {
            header("location:item_status.php");
        } else {
            echo mysqli_error($con);
        }
    }
?>
<?php
}
mysqli_close($con);
include("footer.php");
?>