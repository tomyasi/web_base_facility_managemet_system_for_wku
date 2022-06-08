<?php
include("../connection.php");
if (isset($_POST['vari'])) {
    $_SESSION['name'] = $_POST['vari'];
    $query = "SELECT * FROM employee where id='$_POST[vari]'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        //echo '<input type="text" value=' . $row['jop_position'] . ' id="id" class="span8" placeholder="ID is not found" name="id" style="border-radius: 13px;">';
        //echo '<option value="">Select Role...</option>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value=' . $row['jop_position'] . '>' . $row['jop_position'] . '</option>';
        }
    } else {
        echo '<option>ID is not Found!</option>';
    }
}