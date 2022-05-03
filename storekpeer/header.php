<?php
include("../connection.php");
session_start();
$full_name = $_SESSION['fname'] . ' ' . $_SESSION['mname'];
$result = mysqli_query($con, "SELECT *from item_request where status='0';");
$un_read = mysqli_num_rows($result);
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
        <ul id="bar">
            <li class="active">
                <a href="home.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Manage
                        Item</span></a>
                <ul>
                    <li><a href="item_register.php"><i class="icon-laptop"></i>&nbsp;&nbsp;Register Item</a></li>
                    <li><a href="item_add.php"><i class="icon-plus"></i>&nbsp;&nbsp;Add Item</a></li>
                    <li><a href="item_update.php"><i class="icon-pencil"></i>&nbsp;&nbsp;Update Item </a></li>
                    <li><a href="item_status.php"><i class="icon-ok"></i>&nbsp;&nbsp;status Item</a></li>
                    <li><a href="item_view.php"><i class="icon-eye-open"></i>&nbsp;&nbsp;View Item</a></li>
                </ul>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>View</span>
                    <?php if ($un_read > 0) {
                        echo '<span class="label label-important" style="border-radius:30px">' . $un_read . '</span></a></a>';
                    } ?>
                    <ul>
                        <li><a href="view_request.php"><i class="icon-eye-open"></i>&nbsp;&nbsp;Resource
                                Request</a><?php if ($un_read > 0) {
                                                echo '<span class="label label-important" style="border-radius:30px">' . $un_read . '</span></a></a>';
                                            } ?>
                        </li>
            </li>
            <li><a href="update_employees.php"><i class="icon-eye-open"></i> &nbsp;&nbsp;View Feedback </a></li>
        </ul>
        </li>
        <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Generate Report</span></a>
            <ul>
                <li><a href="employee_regi.php"><i class="icon-user"></i>Item Ordered Report</a></li>
                <li><a href="update_employees.php"><i class="icon-user"></i>Store Item Report </a></li>
                <li><a href="employee_status.php"><i class="icon-user"></i>Give in Item Report</a></li>
            </ul>
        </li>
        <li>
            <a href="item_register.php"><i class="icon-reply"></i>
                <span>Item Order</span>
        </li>
        <!-- <li>
                <a href="generate_report.php"><i class="icon-reply"></i>
                    <span>Item Distribute</span>
            </li> -->
        </ul>
    </div>
    <script type="text/javascript">
    function loadDoc() {
        setInterval(function() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("noti_numbers").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "notify.php", true);
            xhttp.send();
        }, 1000);
    }
    loadDoc();
    </script>