<?php
session_start();
$full_name = $_SESSION['fname'] . ' ' . $_SESSION['mname'];
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
                    <li><a href="change_password.php"><i class="icon icon-cogs"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
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
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Create Account</span></a>
                <ul>
                    <li><a href="create_account_emp.php"><i class="icon-user"></i>&nbsp;&nbsp;Employee </a></li>
                    <li><a href="create_account_user.php"><i class="icon-user"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Update Account</span></a>
                <ul>
                    <li><a href="update_account_emp.php"><i class="icon-user"></i>&nbsp;&nbsp;Employee </a></li>
                    <li><a href="update_account_user.php"><i class="icon-user"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Status Account</span></a>
                <ul>
                    <li><a href="status_account_emp.php"><i class="icon-user"></i>&nbsp;&nbsp;Employee </a></li>
                    <li><a href="status_account_user.php"><i class="icon-user"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Vivew Account</span></a>
                <ul>
                    <li><a href="view_employee_account.php"><i class="icon-user"></i>&nbsp;&nbsp;Employee </a></li>
                    <li><a href="view_user_account.php"><i class="icon-user"></i>&nbsp;&nbsp;User </a></li>
                </ul>
            </li>
            <li>
                <a href="generate_account.php"><i class="icon-laptop"></i>
                    <span>Generate Account</span></a>
            </li>
            <li>
                <a href="change_password.php"><i class="icon icon-cogs"></i>
                    <span>Change Password</span></a>
            </li>
        </ul>
    </div>