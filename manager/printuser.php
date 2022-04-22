<?php
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WKUFMS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/matrix-style.css" />
</head>

<body onload="print()">
    <div>
        <h1>
            <center><b>User Information</b></center>
        </h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User_id</th>
                <th>Firet name</th>
                <th>Middel name</th>
                <th>Last name</th>
                <th>sex</th>
                <th>Age</th>
                <th>Gmail</th>
                <th>Phone</th>
                <th>Nationality</th>
                <th>Subcity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($con, "select *from user;");
            $no = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row["user_id"]; ?></td>
                <td><?php echo $row["fname"]; ?></td>
                <td><?php echo $row["mname"]; ?></td>
                <td><?php echo $row["lname"]; ?></td>
                <td><?php
                        if ($row["gender"] == "m") {
                            echo "Male";
                        } else {
                            echo "Female";
                        }
                        ?>
                </td>
                <td><?php echo $row["age"]; ?></td>
                <td><?php echo $row["gmail"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["nationality"]; ?></td>
                <td><?php echo $row["subcity"]; ?></td>
                <td> <?php
                            if ($row["status"] == "1") {
                                echo "Active";
                            } else {
                                echo "Deactive";
                            }
                            ?>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <?php
    mysqli_close($con);
    ?>
</body>

</html>