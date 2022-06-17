<?php
include("../connection.php");
session_start();
if (!(isset($_SESSION['stor_id']))) {
    header("Location: ../login.php");
}
$full_name = $_SESSION['fname'] . ' ' . $_SESSION['mname'];
$stor_id = $_SESSION['stor_id'];
$result = mysqli_query($con, "SELECT *from item_request where status='0'");
$un_read = mysqli_num_rows($result);
$feedback = mysqli_query($con, "SELECT *from feedback where send_to=$stor_id");
$count_fee = mysqli_num_rows($feedback);
$total = $un_read + $count_fee;
$return = mysqli_query($con, "SELECT *from give_item where retu='1' and item_category='Returnable'");
$return_count = mysqli_num_rows($return);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WKUFMS STOREKPEER PAGE</title>
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
            <center>Storekpeer Page</center>
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
                    <li><a href="../logout.php"><i class="icon-signout"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--sidebar-menu-->
    <div id="sidebar">
        <?php $page_active = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
        <ul id="bar">
            <li class="<?= $page_active == 'home.php' ? 'active' : '' ?>">
                <a href="home.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
            </li>
            <li class="submenu <?= $page_active == 'item_register.php' ||
                                    $page_active == 'item_add.php' ||
                                    $page_active == 'edite_item.php' ||
                                    $page_active == 'item_update.php' ||
                                    $page_active == 'item_status.php' ||
                                    $page_active == 'item_view.php' ? 'active' : '' ?>" id="btn"><a href="#"><i
                        class="icon icon-th-list"></i> <span>Manage
                        Item</span></a>
                <ul>
                    <li class="<?= $page_active == 'item_register.php' ? 'active' : '' ?>">
                        <a href="item_register.php"><i class="icon-laptop"></i>&nbsp;&nbsp;Register Item</a>
                    </li>
                    <li class="<?= $page_active == 'item_add.php' ? 'active' : '' ?>">
                        <a href="item_add.php"><i class="icon-plus"></i>&nbsp;&nbsp;Add Item</a>
                    </li>
                    <li class="<?= $page_active == 'item_update.php' ? 'active' : '' ?>">
                        <a href="item_update.php"><i class="icon-pencil"></i>&nbsp;&nbsp;Update Item </a>
                    </li>
                    <li class="<?= $page_active == 'item_status.php' ? 'active' : '' ?>">
                        <a href="item_status.php"><i class="icon-ok"></i>&nbsp;&nbsp;status Item</a>
                    </li>
                    <li class="<?= $page_active == 'item_view.php' ? 'active' : '' ?>">
                        <a href="item_view.php"><i class="icon-eye-open"></i>&nbsp;&nbsp;View Item</a>
                    </li>
                </ul>
            </li>
            <li class="submenu <?= $page_active == 'view_request.php' ||
                                    $page_active == 'view_feedback.php' ? 'active' : '' ?>" id="btn"><a href="#"><i
                        class="icon icon-th-list"></i><span>View Notification
                        <?php if ($total > 0) {
                            echo '<span class="label label-important" style="border-radius:30px">' . $total . '</span>';
                        } ?></span></a>
                <ul>
                    <li class="<?= $page_active == 'view_request.php' ? 'active' : '' ?>">
                        <a href="view_request.php"><i class="icon-eye-open"></i>&nbsp;&nbsp;Resource Request
                            <?php if ($un_read > 0) {
                                echo '<span class="label label-important" style="border-radius:30px">' . $un_read . '</span>';
                            } ?></a>
                    </li>
                    <li class="<?= $page_active == 'view_feedback.php' ? 'active' : '' ?>">
                        <a href="view_feedback.php"><i class="icon-eye-open"></i> &nbsp;&nbsp;View Feedback
                            <?php if ($count_fee > 0) {
                                echo '<span class="label label-important" style="border-radius:30px">' . $count_fee . '</span>';
                            } ?></a>
                    </li>
                </ul>
            </li>
            <li class="submenu <?= $page_active == 'item_order_report.php' ||
                                    $page_active == 'item_stor_report.php' ||
                                    $page_active == 'give_item_report.php' ? 'active' : '' ?>" id="btn"><a href="#"><i
                        class="icon icon-th-list"></i> <span>Generate Report</span></a>
                <ul>
                    <li class="<?= $page_active == 'item_order_report.php' ? 'active' : '' ?>">
                        <a href="item_order_report.php"><i class="icon-briefcase"></i>&nbsp;&nbsp;Item Ordered
                            Report</a>
                    </li>
                    <li class="<?= $page_active == 'item_stor_report.php' ? 'active' : '' ?>">
                        <a href="item_stor_report.php"><i class="icon-briefcase"></i>&nbsp;&nbsp;Store Item Report </a>
                    </li>
                    <li class="<?= $page_active == 'give_item_report.php' ? 'active' : '' ?>">
                        <a href="give_item_report.php"><i class="icon-briefcase"></i>&nbsp;&nbsp;Give in Item Report</a>
                    </li>
                </ul>
            </li>
            <li class="<?= $page_active == 'returnable_item.php' ? 'active' : '' ?>">
                <a href="returnable_item.php"><i class="icon-briefcase"></i>
                    <span>Returnable Item<?php if ($return_count > 0) {
                                                echo '<span class="label label-important" style="border-radius:30px">' . $return_count . '</span>';
                                            } ?></span></a>
            </li>
            <li class="<?= $page_active == 'item_order.php' || $page_active == 'give_item.php' ? 'active' : '' ?>">
                <a href="item_order.php"><i class="icon-reorder"></i> Request Ordered</a>
            </li>
            <li class="submenu <?= $page_active == 'profile.php' || $page_active == 'change_password.php'  ? 'active' : '' ?>"
                id="btn"><a href="#"><i class="icon icon-cogs"></i> <span>Setting</span></a>
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