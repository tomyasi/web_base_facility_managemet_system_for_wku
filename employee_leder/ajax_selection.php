<?php
include("../connection.php");
if (isset($_POST['vari'])) {
    $_SESSION['name'] = $_POST['vari'];
    $query = "SELECT * FROM stock where item_name='$_POST[vari]'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Select category...</option>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value=' . $row['item_category'] . '>' . $row['item_category'] . '</option>';
        }
    } else {
        echo '<option>No State Found!</option>';
    }
}
if (isset($_POST['type'])) {
    $query = "SELECT * FROM stock where item_name='$_POST[type]'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Select type...</option>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value=' . $row['item_type'] . '>' . $row['item_type'] . '</option>';
        }
    } else {
        echo '<option>No State Found!</option>';
    }
}