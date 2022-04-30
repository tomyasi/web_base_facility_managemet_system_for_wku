<?php
include("../connection.php");
$sql = "SELECT * FROM item_request where status='1'";
$result = mysqli_query($con, $sql);
echo mysqli_num_rows($result);
?>
<?php
mysqli_close($con);
include("footer.php");
?>