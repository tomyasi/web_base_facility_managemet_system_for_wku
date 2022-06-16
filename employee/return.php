<?php
include("../connection.php");
$id = $_GET['id'];
$sta = "UPDATE give_item set retu='1' where id=$id";
$resu = mysqli_query($con, $sta);
if ($resu) {;
    header("location:item_return.php");
} else {
    echo mysqli_error($con);
}
