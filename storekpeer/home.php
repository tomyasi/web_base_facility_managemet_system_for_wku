<?php
include("header.php");
include("../connection.php");
$resourc = mysqli_query($con, "SELECT *FROM stock ");
$count = mysqli_num_rows($resourc);
$total = 0;
while ($row = mysqli_fetch_array($resourc)) {
    $total += $row['item_quantity'];
}

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
        <marquee direction="right" height="40%" behavior="alternate">
            <span lang="RU"><strong>
                    <center>
                        <h2>
                            <font color="#003333">Welcome to facility management system!<br>
                                Storkpeer Page</font>
                        </h2>
                    </center>
                </strong>
        </marquee>
        <hr>
        <div class="row-fluid">
            <div class="card" style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:20px;">
                <img class="card-img-top" src="../images/3asset.jpg" alt="Card image cap" style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center"> Type Of Resource</h3>
                    <h1 class="card-text text-center"><?php echo $count ?></h1>
                    <p class="card-text text-center">There are <?php echo $count ?> resources availeble for users </p>
                    <a href="item_view.php" class="btn btn-primary text-center" style="margin-left:70px;border-radius:15px">Get
                        More</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;border-style:solid;border-width:1px;border-radius:10px;float:left;margin-left:200px;">
                <img class="card-img-top" src="../images/employees.jpg" alt="Card image cap" style="border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center">Total Resource</h3>
                    <h1 class="card-text text-center"><?php echo $total ?></h1>
                    <p class="card-text text-center">There are <?php echo $total ?> total available resource</p>
                    <a href="item_view.php" class="btn btn-primary text-center" style="margin-left:70px;border-radius:15px">Get
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