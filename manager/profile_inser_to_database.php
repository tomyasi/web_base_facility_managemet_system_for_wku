<?php
include("../connection.php");
extract($_POST);
if (
    isset($_POST['firstname']) && isset($_POST['middlename']) &&
    isset($_POST['lastname']) && isset($_POST['gender']) &&
    isset($_POST['phone']) && isset($_POST['gmail']) &&
    isset($_POST['nationality']) && isset($_POST['subcity'])
) {
    $sql = "UPDATE employee set fname='$firstname',mname='$middelname',lname='$lastname',
     gender='$gender', phone='$phone' gmail='$gmail',nationality='$nationality',adderess='$subcity'";
    $result = mysqli_query($con, $sql) or die("Error occured" . mysqli_error($con));
    if ($result) {
        header("location: profile.php");
    }
} else {
    echo "The profile can't updated";
}
?>
<?php
mysqli_close($con);

?>