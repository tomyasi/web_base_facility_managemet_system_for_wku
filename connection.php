<?php
$con = mysqli_connect("localhost", "root", "") or die('Could not connect: ' .  mysqli_error($con));
mysqli_select_db($con, "fmsdb") or die('Could not connect: ' .  mysqli_error($con));