<?php
include("../connection.php");
$id = $_GET['id'];
$sta = "UPDATE feedback set view='1' where id=$id";
$resu = mysqli_query($con, $sta);
if ($resu) {;
    header("location:view_feedback.php");
} else {
    echo mysqli_error($con);
}
