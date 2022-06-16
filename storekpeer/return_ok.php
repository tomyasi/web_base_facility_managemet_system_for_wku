<?php
include("../connection.php");
$id = $_GET['id'];
$sta = "UPDATE give_item set retu='2' where id=$id";
$resu = mysqli_query($con, $sta);
if ($resu) {;
    header("location:returnable_item.php");
} else {
    echo mysqli_error($con);
}