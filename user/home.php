<?php
include("header.php");
if (!(isset($_SESSION['user_id']))) {
    header("Location: ../login.php");
}
?>
<style>
* {
    box-sizing: border-box;
}

img {
    vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
    position: relative;
}

/* Hide the images by default */
.mySlides {
    display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
    cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* Container for image text */
.caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Six columns side by side */
.column {
    float: left;
    width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
    opacity: 0.6;
}

.active,
.demo:hover {
    opacity: 1;
}
</style>
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
                                <font color="#003333">Welcome To Facility Management System!<br> User Page</font>
                            </h2>
                        </center>
                    </strong>
            </marquee>
            <hr>
            <div class="row-fluid">
                <div class="container">
                    <td width="685" height="195" align="left" valign="top" style="color:#000000; ">
                        <font style="font-family:tahoma; font-size:12px;">
                            <p><span style="LINE-HEIGHT: 115%;"></span>
                                <span style="LINE-HEIGHT:115%;"></span>
                            </p>
                            <p style="LINE-HEIGHT: 18pt; MARGIN: 0in 0in 0pt" dir="ltr" class="MsoNormal" align="left">
                                <center><span lang="RU">
                                        <h2>
                                            <font color="#003333">Things to do in
                                                Users</font>
                                        </h2>
                                    </span>
                                    <!-- <marquee behavior="scroll" direction="up"> -->
                                    <strong>
                                        <h3>&diams;&nbsp;&nbsp;&nbsp;View Response</h3>
                                    </strong>
                                    <strong>
                                        <h3>&diams;&nbsp;&nbsp;&nbsp;send Request</h3>
                                    </strong>
                                    <strong>
                                        <h3>&diams;&nbsp;&nbsp;&nbsp;send Feedback</h3>
                                    </strong>
                                    <strong>
                                        <h3>&diams;&nbsp;&nbsp;&nbsp;change passwords.</h3>
                                    </strong>
                                    <!-- </marquee> -->
                                </center>
                            </p>
                        </font>

                        <!-- <p align="left">
                            <font color="#003333"></font>
                        </p>
                        <p style="MARGIN: 0in 0in 10pt" class="MsoNormal" align="left">
                            <font color="#003333"></font>
                        </p>
                        <p align="left">
                            <font color="#003333"></font>
                        </p>
                        <p align="left">
                            <font color="#003333"></font>
                        </p>
                        <p align="left">
                            <font color="#003333"></font>
                        </p>
                        <p align="left">
                            <font color="#003333"></font>
                        </p>
                        <p align="left">
                            <font color="#003333"></font>
                        </p>
                        <p align="left"><span style="LINE-HEIGHT: 115%;"></span>
                            <font color="#003333"><span style="LINE-HEIGHT: 115%;"></span></font>
                        </p> -->
                    </td>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->
<?php
include("footer.php");
?>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo");
    let captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
}
</script>