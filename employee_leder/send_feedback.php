<?php
include("../connection.php");
if (isset($_GET['id'])) {
    $e_id = $_GET['id'];
    $query = mysqli_query($con, "UPDATE give_item SET view='1' WHERE id='$e_id'");
    if ($query) {
        header("location:view_responce.php");
    } else {
        echo mysqli_error($con);
    }
?>
<?php
}
mysqli_close($con);
include("footer.php");
?>