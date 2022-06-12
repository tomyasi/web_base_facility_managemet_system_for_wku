<?php
include("../connection.php");
if (isset($_POST['vari'])) {
    $_SESSION['name'] = $_POST['vari'];
    $query = "SELECT * FROM employee where id='$_POST[vari]'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value=' . $row['jop_position'] . '>' . $row['jop_position'] . '</option>';
        }
    } else {
        echo '<option style="color: red;">ID is not Found!</option>';
    }
}