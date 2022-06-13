<?php
session_start();
if (!(isset($_SESSION['admin_id']))) {
    header("Location: ../login.php");
}
$full_name = $_SESSION['fname'] . ' ' . $_SESSION['mname'];
$admin_id = $_SESSION['admin_id'];
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WKUFMS ADMIN PAGE</title>
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
            <center>Admin Page</center>
        </h2>
    </div>
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                        class="icon icon-user"></i>
                    <span class="text"><?php echo $full_name; ?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="change_password.php"><i class="icon-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="../logout.php"><i class="icon-signout"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--sidebar-menu-->
    <div id="sidebar">
        <?php $page_active = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
        <ul>
            <li class="<?= $page_active == 'home.php' ? 'active' : '' ?>">
                <a href="home.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
            </li>
            <li class="submenu <?= $page_active == 'create_account_emp.php' ||
                                    $page_active == 'create_account_user.php' ? 'active' : '' ?>" id="btn"><a
                    href="#"><i class="icon icon-th-list"></i> <span>Create Account</span></a>
                <ul>
                    <li class="<?= $page_active == 'create_account_emp.php' ? 'active' : '' ?>"><a
                            href="create_account_emp.php"><i class="icon-laptop"></i>&nbsp;&nbsp;Employee </a></li>
                    <li class="<?= $page_active == 'create_account_user.php' ? 'active' : '' ?>"><a
                            href="create_account_user.php"><i class="icon-laptop"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li class="submenu <?= $page_active == 'update_account_emp.php' ||
                                    $page_active == 'update_account_user.php' ||
                                    $page_active == 'edite_emp.php' ||
                                    $page_active == 'edite_user.php' ? 'active' : '' ?>" id="btn"><a href="#"><i
                        class="icon icon-th-list"></i> <span>Update Account</span></a>
                <ul>
                    <li class="<?= $page_active == 'update_account_emp.php' ? 'active' : '' ?>"><a
                            href="update_account_emp.php"><i class="icon-pencil"></i>&nbsp;&nbsp;Employee </a></li>
                    <li class="<?= $page_active == 'update_account_user.php' ? 'active' : '' ?>"><a
                            href="update_account_user.php"><i class="icon-pencil"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li class="submenu <?= $page_active == 'status_account_emp.php' || $page_active == 'status_account_user.php' ? 'active' : '' ?>"
                id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Status Account</span></a>
                <ul>
                    <li class="<?= $page_active == 'status_account_emp.php' ? 'active' : '' ?>"><a
                            href="status_account_emp.php"><i class="icon-user"></i>&nbsp;&nbsp;Employee </a></li>
                    <li class="<?= $page_active == 'status_account_user.php' ? 'active' : '' ?>"><a
                            href="status_account_user.php"><i class="icon-user"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li class="submenu <?= $page_active == 'view_employee_account.php' || $page_active == 'view_user_account.php' ? 'active' : '' ?>"
                id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Vivew Account</span></a>
                <ul>
                    <li class="<?= $page_active == 'view_employee_account.php' ? 'active' : '' ?>"><a
                            href="view_employee_account.php"><i class="icon-user"></i>&nbsp;&nbsp;Employee </a></li>
                    <li class="<?= $page_active == 'view_user_account.php' ? 'active' : '' ?>"><a
                            href="view_user_account.php"><i class="icon-user"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li class="<?= $page_active == 'generate_account.php' ? 'active' : '' ?>">
                <a href="generate_account.php"><i class="icon-laptop"></i>
                    <span>Generate Account</span></a>
            </li>
            <li class="<?= $page_active == 'backup.php' ? 'active' : '' ?>">
                <a href="backup.php"><i class="icon-laptop"></i>
                    <span>Backup and Recovery</span></a>
            </li>
            <li class="submenu <?= $page_active == 'profile.php' || $page_active == 'change_password.php' || $page_active == 'edit_profile.php'  ? 'active' : '' ?>"
                id="btn"><a href="#"><i class="icon icon-cogs"></i> <span>Setting</span></a>
                <ul>
                    <li class="<?= $page_active == 'profile.php' ? 'active' : '' ?>"><a href="profile.php"><i
                                class="icon-user"></i> My Profile</a></li>
                    <li class="<?= $page_active == 'change_password.php' ? 'active' : '' ?>"><a
                            href="change_password.php"><i class="icon-cog"></i> Change Password</a></li>
                    <li><a href="../logout.php"><i class="icon-signout"></i>Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>