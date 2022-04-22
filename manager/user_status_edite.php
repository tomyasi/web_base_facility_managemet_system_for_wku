<?php
include("../connection.php");
if (isset($_GET['id'])) {
    $e_id = $_GET['id'];
    $statment = mysqli_query($con, "select * from user where id=$e_id");
    while ($row = mysqli_fetch_array($statment)) {
        $status = $row['status'];
        if ($status == "1") {
            $e_status = 0;
        }
        if ($status == "0") {
            $e_status = 1;
        }
        $sta = "update user set status=$e_status where id=$e_id";
        $resu = mysqli_query($con, $sta);
        if ($resu) {
            header("location:user_status.php");
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