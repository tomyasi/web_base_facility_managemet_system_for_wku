<?php
session_start();
if (!(isset($_SESSION['leder_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
include("../connection.php");
$leder_id = $_SESSION['leder_id'];
$query = mysqli_query($con, "SELECT *FROM employee where id=$leder_id");
$leder_info = mysqli_fetch_array($query);
$full_name = $leder_info['fname'] . ' ' . $leder_info['mname'];

$info = mysqli_query($con, "SELECT * FROM employee WHERE id='$leder_id'");
$row = mysqli_fetch_array($info);
//$emp_position = $row['jop_position'];
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// $result1 = mysqli_query($con, "SELECT *from serv_request where view='0'");
// $un_read = mysqli_num_rows($result1);
$responce = mysqli_query($con, "SELECT * from give_item where view='0' and give_to='$leder_id'");
$un_read_res = mysqli_num_rows($responce);
$feedback = mysqli_query($con, "SELECT *FROM feedback where view='0' and send_to='$leder_id' ");
$un_read_fee = mysqli_num_rows($feedback);
$total = $un_read_res + $un_read_fee;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WKUFMS </title>
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
            <a href="home.php" style="color:white; margin-left: 30px; margin-top: 40px">WKUFMS</a>
        </h2>
        <h2 style="color: white;">
            <center>Employee Group Leder Page</center>
        </h2>
    </div>
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">

            <li class="dropdown" id="profile-messages">
                <!-- <i class="icon-bell" style=" color:white; margin-left: 50px; margin-top: 20px; size: 23px;"></i> -->
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>
                    <span class="text"><?php echo "$full_name"; ?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="change_password.php"><i class="icon icon-cogs"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="../logout.php"><i class="icon-signout"></i>Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--sidebar-menu-->
    <div id="sidebar">
        <?php $page_active = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
        <ul id="bar">
            <li class="<?= $page_active == 'home.php' ? 'active' : '' ?>">
                <a href="home.php"><i class="icon-dashboard"></i></i><span>Dashboard</span></a>
            </li>

            <li class="submenu <?= $page_active == 'view_service_request.php' ||
                                    $page_active == 'view_feedback.php' ||
                                    $page_active == 'view_responce.php' ? 'active' : '' ?>" id="btn"><a href="#"><i class="icon icon-th-list"></i><span>View Notification</span>
                    <?php if ($total > 0) {
                        echo '<span class="label label-important" style="border-radius:15px">' . $total . '</span>';
                    } ?></a>
                <ul>
                    <li class="<?= $page_active == 'view_service_request.php' ? 'active' : '' ?>"><a href="view_service_request.php"><i class="icon-eye-open"></i>&nbsp;&nbsp;Service Request
                        </a>
                    </li>
                    <li class="<?= $page_active == 'view_feedback.php' ? 'active' : '' ?>"><a href="view_feedback.php"><i class="icon-eye-open"></i>&nbsp;&nbsp;Feedback
                            <?php if ($un_read_fee > 0) {
                                echo '<span class="label label-important" style="border-radius:15px">' . $un_read_fee . '</span>';
                            } ?></a>
                    </li>
                    <li class="<?= $page_active == 'view_responce.php' ? 'active' : '' ?>"><a href="view_responce.php"><i class="icon-eye-open"></i>&nbsp;&nbsp; Response
                            <?php if ($un_read_res > 0) {
                                echo '<span class="label label-important" style="border-radius:15px">' . $un_read_res . '</span>';
                            } ?></a>
                    </li>
                </ul>
            </li>
            <li class="<?= $page_active == 'report.php' ? 'active' : '' ?>">
                <a href="report.php"><i class="icon-briefcase"></i><span>Generate Report</span></a>
            </li>
            <li class="<?= $page_active == 'item_request_detail.php' ? 'active' : '' ?>">
                <a href="item_request_detail.php"><i class="icon-reply"></i><span>Resource Request</span></a>
            </li>
            <!-- <li>
                <a href="service_responce2.php"><i class="icon-exchange"></i><span>User Service Response</span></a>
            </li> -->
            <li class="submenu <?= $page_active == 'profile.php' ||
                                    $page_active == 'change_password.php' ||
                                    $page_active == 'edit_profile.php' ? 'active' : '' ?>" id="btn"><a href="#"><i class="icon icon-cogs"></i> <span>Setting</span></a>
                <ul>
                    <li class="<?= $page_active == 'profile.php' ? 'active' : '' ?>">
                        <a href="profile.php"><i class="icon-user"></i> My Profile</a>
                    </li>
                    <li class="<?= $page_active == 'change_password.php' ? 'active' : '' ?>">
                        <a href="change_password.php"><i class="icon-cog"></i> Change Password</a>
                    </li>
                    <li><a href="../logout.php"><i class="icon-signout"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>