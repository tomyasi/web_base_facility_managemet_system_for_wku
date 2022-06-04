<?php
include("header.php");
include("../connection.php");
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
                    <h4>WELL COME TO STOREKPEER PAGE</h4>
                </marquee>
            </h5>
        </center>
        <hr>
        <div class="row-fluid">
            <div class="card"
                style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:20px;">
                <img class="card-img-top" src="../images/users.png" alt="Card image cap" style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center"> User Account</h3>
                    <h1 class="card-text text-center">///</h1>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's content.</p>
                    <a href="view_user_account.php" class="btn btn-primary text-center"
                        style="margin-left:70px;border-radius:15px">Get
                        More</a>
                </div>
            </div>
            <div class="card"
                style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:200px;">
                <img class="card-img-top" src="../images/employees.jpg" alt="Card image cap"
                    style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Employee Account</h3>
                    <h1 class="card-text text-center">///</h1>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's content.</p>
                    <a href="view_employee_account.php" class="btn btn-primary text-center"
                        style="margin-left:70px;border-radius:15px">Go
                        more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->
<?php
include("footer.php");
?>