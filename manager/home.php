<?php
include("header.php");
include("../connection.php");
$user = mysqli_query($con, "SELECT *FROM user");
$user_count = mysqli_num_rows($user);
$emp = mysqli_query($con, "SELECT *FROM employee");
$emp_count = mysqli_num_rows($emp);
$total = $user_count + $emp_count;
?>
<!--main-container-part-->

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a></div>
    </div>
    <div class="container-fluid">

        <hr>
        <center>
            <h5>
                <marquee direction="right" height="40%" behavior="alternate">
                    <h4>WELL COME TO MANAGER PAGE</h4>
                </marquee>
            </h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="card" style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;">
                <img class="card-img-top" src="../images/users.png" alt="Card image cap" style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center"> Users</h3>
                    <h1 class="card-text text-center"><?php echo $user_count; ?></h1>
                    <p class="card-text text-center">There are <?php echo $user_count; ?> users registerd in the system
                        to gete services.</p>
                    <a href="view_user.php" class="btn btn-primary text-center"
                        style="margin-left:70px;border-radius:15px">Get
                        More</a>
                </div>
            </div>
            <div class="card"
                style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:50px;">
                <img class="card-img-top" src="../images/employees.jpg" alt="Card image cap"
                    style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Employee's</h3>
                    <h1 class="card-text text-center"><?php echo $emp_count; ?></h1>
                    <p class="card-text text-center">There are <?php echo $emp_count; ?> employees registerd in the
                        system
                        to give services.</p>
                    <a href="view_employee.php" class="btn btn-primary text-center"
                        style="margin-left:70px;border-radius:15px">Go
                        more</a>
                </div>
            </div>
            <div class="card"
                style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:50px;">
                <img class="card-img-top" src="../images/wkulogo2.jpg" alt="Card image cap"
                    style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Total</h3>
                    <h1 class="card-text text-center"><?php echo $total; ?></h1>
                    <p class="card-text">There are <?php echo $total; ?> users registerd in the system
                        to gete services.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--end-main-container-part-->
<?php
include("footer.php");
?>