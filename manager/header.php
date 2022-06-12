<?php
session_start();
include("../connection.php");
if (!(isset($_SESSION['manager_id']))) {
    header("Location: ../login.php");
}
$manager_id = $_SESSION['manager_id'];
$full_name = $_SESSION['fname'] . ' ' . $_SESSION['mname'];
$result = mysqli_query($con, "SELECT *from item_order where aprove='0';");
$un_read = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WKUFMS MANAGER PAGE</title>
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

    <link href="../images/wkulogo7.png" rel="icon">
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
                        class="text"><?php echo $full_name; ?></span><b class="caret"></b></a>
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
        <?php $page_active = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
        <ul id="bar">
            <li class="<?= $page_active == 'home.php' ? 'active' : '' ?>">
                <a href="home.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
            </li>
            <li class="submenu  <?= $page_active == 'employee_regi.php' ||
                                    $page_active == 'update_employees.php' ||
                                    $page_active == 'employee_status.php' ||
                                    $page_active == 'employee_edite.php' ||
                                    $page_active == 'view_employee.php' ? 'active' : '' ?>" id="btn"><a href="#"><i
                        class="icon icon-th-list"></i> <span>Manage
                        Employees</span></a>
                <ul>
                    <li class="<?= $page_active == 'employee_regi.php' ? 'active' : '' ?>"><a
                            href="employee_regi.php"><i class="icon-laptop"></i>&nbsp;&nbsp;Employee
                            Registeration</a>
                    </li>
                    <li class="<?= $page_active == 'update_employees.php' ? 'active' : '' ?>"><a
                            href="update_employees.php"><i class="icon-pencil"></i> &nbsp;&nbsp;Employee Update </a>
                    </li>
                    <li class="<?= $page_active == 'employee_status.php' ? 'active' : '' ?>"><a
                            href="employee_status.php"><i class="icon-user"></i>&nbsp;&nbsp;Employee status</a></li>
                    <li class="<?= $page_active == 'view_employee.php' ? 'active' : '' ?>"><a
                            href="view_employee.php"><i class="icon-eye-open"></i>&nbsp;&nbsp;View Employee</a></li>
                </ul>
            </li>
            <li class="submenu <?= $page_active == 'user_regi.php' ||
                                    $page_active == 'update_users.php' ||
                                    $page_active == 'user_status.php' ||
                                    $page_active == 'user_edite.php' ||
                                    $page_active == 'view_user.php' ? 'active' : '' ?>" id="btn"><a href="#"><i
                        class="icon icon-th-list"></i> <span>Manage Users</span></a>
                <ul>
                    <li class="<?= $page_active == 'user_regi.php' ? 'active' : '' ?>"><a href="user_regi.php"><i
                                class="icon-laptop"></i>&nbsp;&nbsp;User Registeration </a></li>
                    <li class="<?= $page_active == 'update_users.php' ? 'active' : '' ?>"><a href="update_users.php"><i
                                class="icon-pencil"></i> &nbsp;&nbsp;User Update </a></li>
                    <li class="<?= $page_active == 'user_status.php' ? 'active' : '' ?>"><a href="user_status.php"><i
                                class="icon-user"></i>&nbsp;&nbsp;User Status</a></li>
                    <li class="<?= $page_active == 'view_user.php' ? 'active' : '' ?>"><a href="view_user.php"><i
                                class="icon-eye-open"></i>&nbsp;&nbsp;User View </a></li>
                </ul>
            </li>
            <li class="<?= $page_active == 'view_item_order.php' ? 'active' : '' ?>">
                <a href="view_item_order.php"><i class="icon-eye-open"></i>
                    <span>View Item Order</span>
                    <?php if ($un_read > 0) {
                        echo '<span class="label label-important" style="border-radius:30px">' . $un_read . '</span>';
                    } ?></a>
            </li>
            <li class="submenu <?= $page_active == 'profile.php' || $page_active == 'change_password.php' || $page_active == 'edit_profile.php'  ? 'active' : '' ?>"
                id="btn"><a href="#"><i class="icon icon-cogs"></i> <span>Setting</span></a>
                <ul>
                    <li class="<?= $page_active == 'profile.php' ? 'active' : '' ?>">
                        <a href="profile.php"><i class="icon-user"></i> My Profile</a>
                    </li>
                    <li class="<?= $page_active == 'change_password.php' ? 'active' : '' ?>">
                        <a href="change_password.php"><i class="icon-cog"></i> Change Password</a>
                    </li>
                    <li><a href="../logout.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- <li class="x">
                <a href="change_password.php"><i class="icon icon-cogs"></i>
                    <span>Change Password</span></a>
            </li> -->
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