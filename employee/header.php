<?php
include("../connection.php");
$u_name = mysqli_query($con, "select * from user;") or dir(mysqli_error($con));
$row = mysqli_fetch_array($u_name);
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

    <link href="../assets/img/wku im3.jpg" rel="icon">

    <link rel="stylesheet" href="../boot/all.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="header">

        <h2 style="color: white;position: absolute">
            <a href="home.php" style="color:white; margin-left: 30px; margin-top: 40px">WKUFMS</a>
        </h2>
        <h2 style="color: white;">
            <center>Employee Page</center>
        </h2>
    </div>
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                        class="icon icon-user"></i> <span class="text"><?php echo "$row[fname] $row[lname]" ?></span><b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="change_password.php"><i class="icon icon-cogs"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="../index.php"><i class="icon-key"></i> Log Out</a></li>
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
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Manage
                        Item</span></a>
                <ul>
                    <li class="active"><a href="employee_regi.php"><i class="icon-user"></i>AddItem</a></li>
                    <li><a href="update_employees.php"><i class="icon-user"></i>UpdateItem </a></li>
                    <li><a href="employee_status.php"><i class="icon-user"></i>statusItem</a></li>
                    <li><a href="view_employee.php"><i class="icon-eye-open"></i>ViewItem</a></li>
                </ul>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>View</span></a>
                <ul>
                    <li class="active"><a href="employee_regi.php"><i class="icon-user"></i>View Request</a></li>
                    <li><a href="update_employees.php"><i class="icon-user"></i>View Feedback </a></li>

                </ul>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Generate Report</span></a>
                <ul>
                    <li class="active"><a href="employee_regi.php"><i class="icon-user"></i>Item Ordered Report</a></li>
                    <li><a href="update_employees.php"><i class="icon-user"></i>Store Item Report </a></li>
                    <li><a href="employee_status.php"><i class="icon-user"></i>Give in Item Report</a></li>

                </ul>
            </li>
            <li>
                <a href="generate_report.php"><i class="icon-reply"></i>
                    <span>Generate Repor</span>
            </li>
        </ul>
    </div>