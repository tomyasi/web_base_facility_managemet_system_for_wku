<?php
include("header.php");
include("../connection.php");
$emp_id = $_SESSION['emp_id'];
$insertdate = date("Y/m/d H:i:s");
$e_id = $_GET['id'];
if (isset($_GET['id'])) {
    $statment = mysqli_query($con, "SELECT * from serv_request where s_id=$e_id");
    while ($row = mysqli_fetch_array($statment)) {
        $status = $row['view'];
        if ($status == "1") {
            $e_status = 0;
        }
        if ($status == "0") {
            $e_status = 1;
        }
        $sta = "UPDATE serv_request set view=$e_status where s_id=$e_id";
        $resu = mysqli_query($con, $sta);
        if ($resu) {
            header("location:service_responce.php?id=" . $e_id);
        } else {
            echo mysqli_error($con);
        }
    }
}
?>
<?php
mysqli_close($con);
include("footer.php");
?>