<?php

$last_id = mysqli_insert_id($con);
if ($last_id) {
    $code = rand(1, 9999);
    $id_genreted = "EMP_" . $code . "_" . $last_id;
    $query = "UPDATE DATABAS SET emp_id='" . $id_genreted . "' WHERE id='" . $last_id . "'";
}
