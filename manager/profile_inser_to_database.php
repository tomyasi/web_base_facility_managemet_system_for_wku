<?php
include("../connection.php");
extract($_POST);
if (isset($_POST['firstname'])) {
    $sql = "UPDATE employee set fname='$firstname'";
    $result = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
    if ($result) {
        header("location: profile.php");
    }
} else {;
}
?>
<?php
mysqli_close($con);

?>