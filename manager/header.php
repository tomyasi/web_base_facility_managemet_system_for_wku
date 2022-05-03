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

    <link rel="stylesheet" href="../boot/all.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <link href="../assets/img/wku im3.jpg" rel="icon">
</head>

<body>
    <div id="header">

        <h2 style="color: white;position: absolute">
            <a href="demo.php" style="color:white; margin-left: 30px; margin-top: 40px">WKUFMS</a>
        </h2>
        <h2 style="color: white;">
            <center>Manager Page</center>
        </h2>
    </div>
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="Your profile" href="#" data-toggle="dropdown" data-target="#profile-messages"
                    class="dropdown-toggle"><i class="icon icon-user"></i> <span
                        class="text"><?php echo "$row[fname] $row[lname]" ?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php"><i class="icon-user"></i> My Profile</a></li>
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
            <li class="x active">
                <a href="home.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Manage
                        Employees</span></a>
                <ul>
                    <li class="active"><a href="employee_regi.php"><i class="icon-user"></i> Employee Registeration</a>
                    </li>
                    <li><a href="update_employees.php"><i class="icon-user"></i> Employee Update </a></li>
                    <li><a href="employee_status.php"><i class="icon-user"></i>Employee status</a></li>
                    <li><a href="view_employee.php"><i class="icon-eye-open"></i>View Employee</a></li>
                </ul>
            </li>
            <li class="submenu" id="btn"><a href="#"><i class="icon icon-th-list"></i> <span>Manage Users</span></a>
                <ul>
                    <li><a href="user_regi.php"><i class="icon-user"></i>User Registeration </a></li>
                    <li><a href="update_users.php"><i class="icon-user"></i>User Update </a></li>
                    <li><a href="user_status.php"><i class="icon-user"></i>User Status</a></li>
                    <li><a href="view_user.php"><i class="icon-eye-open"></i>User View </a></li>
                </ul>
            </li>
            <li class="x">
                <a href="home.php"><i class="icon-eye-open"></i>
                    <span>View Requests</span><span class="label label-important">3</span></a>
            </li>
            <li class="x">
                <a href="home.php"><i class="icon-eye-open"></i>
                    <span>View Reports</span><span class="label label-important">3</span></a>
            </li>
            <li class="x">
                <a href="change_password.php"><i class="icon icon-cogs"></i>
                    <span>Change Password</span></a>
            </li>
        </ul>
    </div>
    <script type="text/javascript">
    // // Add active class to the current button (highlight it)
    // var header = document.getElementById("bar");
    // var btns = header.getElementsByClassName("x");
    // for (var i = 0; i < btns.length; i++) {
    //     btns[i].addEventListener("click", function() {
    //         var current = document.getElementsByClassName("active");
    //         current[0].className = current[0].className.replace(" active", "");
    //         this.className += " active";
    //     });
    // }



    // const curentLocation = location.href;
    // const navbar = document.querySelectorAll('a');
    // const navbarlength = navbar.length;
    // for (let i = 0; i < navbarlength; i++) {
    //     if (navbar[i].href === curentLocation) {
    //         navbar[i].className = 'active';
    //     }
    // }

    // var bar = document.getElementById("bar");
    // var btns = bar.getElementById("btn");
    // for (var i = 0; i < btns.lngth, i++;) {
    //     btns[i].addEventListener("click", function() {
    //         var current = document.getElementsByClassName("active");
    //         current[0].className = current[0].className.replace(" active");
    //         this.className += " active";
    //     })
    // }
    </script>