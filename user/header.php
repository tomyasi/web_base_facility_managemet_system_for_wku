<?php
session_start();
if (!(isset($_SESSION['user_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
$user_id = $_SESSION['user_id'];
include("../connection.php");
$query = mysqli_query($con, "SELECT *FROM user where id=$user_id");
$user_info = mysqli_fetch_array($query);
$full_name = $user_info['fname'] . ' ' . $user_info['mname'];
$result = mysqli_query($con, "SELECT *from serv_responce where view='0'and requ_by=$user_id");
$un_read = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WKUFMS USER PAGE</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../bootstrap/css/fullcalendar.css" />
    <link rel="stylesheet" href="../bootstrap/css/matrix-style.css" />
    <link rel="stylesheet" href="../bootstrap/css/matrix-media.css" />
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../bootstrap/css/jquery.gritter.css" />

    <link href="../images/wkulogo7.png" rel="icon">
    <link rel="stylesheet" href="../boot/all.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="header">

        <h2 style="color: white;position: absolute">
            <a href="home.php" style="color:white; margin-left: 30px; margin-top: 40px">WKUFMS </a>
        </h2>
        <h2 style="color: white;">
            <center>User Page</center>
        </h2>
    </div>
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                        class="icon icon-user"></i> <span class="text"><?php echo $full_name; ?></span><b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="change_password.php"><i class="icon icon-cogs"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="../logout.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--sidebar-menu-->
    <div id="sidebar">
        <ul>
            <li class="active">
                <a href="home.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="send_request.php"><i class="icon icon-envelope"></i>
                    <span>Send Request</span></a>
            </li>
            <li>
                <a href="view_responce.php"><i class="icon-signin"></i>
                    <span>View Respons</span>
                    <?php if ($un_read > 0) {
                        echo '<span class="label label-important" style="border-radius:15px">' . $un_read . '</span>';
                    } ?></a>
            </li>
            <li>
                <a href="change_password.php"><i class="icon icon-cogs"></i>
                    <span>Change Password</span></a>
            </li>
        </ul>
    </div>