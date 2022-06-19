<?php
include("header.php");
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <hr>
            <!-- <center>
                <h5>
                    <margee>HOME PAGE</margee>
                </h5>
            </center> -->
            <marquee direction="right" height="40%" behavior="alternate">
                <span lang="RU"><strong>
                        <center>
                            <h2>
                                <font color="#003333">Welcome to facility management system!<br>
                                    <?php echo ucfirst($emp_position); ?> Page</font>
                            </h2>
                        </center>
                    </strong>
            </marquee>
            <hr>
        </div>
        <td width="685" height="195" align="left" valign="top" style="color:#000000; ">
            <font style="font-family:tahoma; font-size:12px;">
                <p style="LINE-HEIGHT: 18pt; MARGIN: 0in 0in 0pt" dir="ltr" class="MsoNormal" align="left">
                    <center>
                        <span lang="RU"><strong>
                                <h2>
                                    <font color="#003333">Things to do in
                                        <?php echo ucfirst($emp_position); ?></font>
                                </h2>
                            </strong></span>

                        <strong>
                            <h3>&diams;&nbsp;&nbsp;&nbsp;View Response</h3>
                        </strong>
                        <strong>
                            <h3>&diams;&nbsp;&nbsp;&nbsp;Send Request</h3>
                        </strong>
                        <strong>
                            <h3>&diams;&nbsp;&nbsp;&nbsp;Send Feedback</h3>
                        </strong>
                        <strong>
                            <h3>&diams;&nbsp;&nbsp;&nbsp;Setting Profile</h3>
                        </strong>
                    </center>
                </p>
            </font>
        </td>
    </div>
</div>

<!--end-main-container-part-->
<?php
include("footer.php");
?>