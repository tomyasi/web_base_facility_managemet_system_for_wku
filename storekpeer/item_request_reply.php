<?php
include("../connection.php");
if (isset($_GET['id'])) {
    $e_id = $_GET['id'];
    $statment = mysqli_query($con, "SELECT * from item_request where re_id=$e_id");
    while ($row = mysqli_fetch_array($statment)) {
        $status = $row['status'];
        if ($status == "1") {
            $e_status = 0;
        }
        if ($status == "0") {
            $e_status = 1;
        }
        $sta = "UPDATE item_request set status=$e_status where re_id=$e_id";
        $resu = mysqli_query($con, $sta);
        if ($resu) {
            $insertdate = date("Y/m/d H:i:s");
            $sql = mysqli_query($con, "SELECT *FROM item_request WHERE re_id=$e_id");
            $result = mysqli_fetch_array($sql);
            $sql2 = "INSERT INTO item_order
            values(NULL,'$result[re_id]','$result[emp_id]','$result[item_name]',
            '$result[item_type]','$result[item_category]','$result[item_quality]',
            '$result[item_quantity]',' $insertdate','0','0','')";
            mysqli_query($con, $sql2) or die("Error occured" . mysqli_error($con));
            header("location:view_request.php");
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