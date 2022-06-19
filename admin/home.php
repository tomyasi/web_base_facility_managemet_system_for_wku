<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['admin_id']))) {
    header("Location: ../login.php");
}
$user_ac = mysqli_query($con, "SELECT *FROM uaccount");
$user_count = mysqli_num_rows($user_ac);
$emp_ac = mysqli_query($con, "SELECT *FROM eaccount");
$emp_count = mysqli_num_rows($emp_ac);
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
                <margee>HOME PAGE</margee>
            </h5>
        </center>
        <hr>
        <marquee direction="right" height="40%" behavior="alternate">
            <h4>WELL COME TO ADMIN PAGE</h4>
        </marquee>
        <hr>
        <div class="row-fluid">
            <div class="card" style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;">
                <img class="card-img-top" src="../images/users.png" alt="Card image cap" style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center"> User Account</h3>
                    <h1 class="card-text text-center"><?php echo $user_count; ?></h1>
                    <p class="card-text text-center">There are <?php echo $user_count; ?> Users register and use this
                        system.</p>
                    <a href="view_user_account.php" class="btn btn-primary text-center"
                        style="margin-left:70px;border-radius:15px">Get
                        More</a>
                </div>
            </div>
            <div class="card"
                style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:60px;">
                <img class="card-img-top" src="../images/employees.jpg" alt="Card image cap"
                    style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Employee Account</h3>
                    <h1 class="card-text text-center"><?php echo $emp_count; ?></h1>
                    <p class="card-text text-center">There are <?php echo $emp_count; ?> Employee's register and use
                        this system.</p>
                    <a href="view_employee_account.php" class="btn btn-primary text-center"
                        style="margin-left:70px;border-radius:15px">Go
                        more</a>
                </div>
            </div>
            <div class="card"
                style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:60px;">
                <img class="card-img-top" src="../images/wkulogo2.jpg" alt="Card image cap"
                    style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Total No of Account</h3>
                    <h1 class="card-text text-center"><?php echo $total; ?></h1>
                    <p class="card-text">There are <?php echo $total; ?> total peoples register and use this system.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->
<?php
include("footer.php");
?>