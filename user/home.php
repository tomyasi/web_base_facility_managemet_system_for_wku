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
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="container">
                <td width="685" height="195" align="left" valign="top" style="color:#000000; ">
                    <font style="font-family:tahoma; font-size:12px;">
                        <p />
                        <p><span style="LINE-HEIGHT: 115%; FONT-FAMILY: "></span><span style="LINE-HEIGHT: 
																		  115%; FONT-FAMILY: "></span></p>
                        <p style="LINE-HEIGHT: 18pt; MARGIN: 0in 0in 0pt" dir="ltr" class="MsoNormal" align="left"><span
                                style="FONT-FAMILY: 
								 " lang="RU"><strong>
                                    <h2>
                                        <font color="#003333">Welcome to facility management system!<br> Things to do in
                                            Customer</font> <br /><br />
                                    </h2>
                                </strong>
                                <font color="#003333">
                                    <marquee behavior="scroll" direction="up">
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

                                    </marquee>

                                </font>
                            </span><span style="FONT-FAMILY: "></span></p>
                        <p align="left">
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
                        <p align="left"><span style="LINE-HEIGHT: 
  115%; FONT-FAMILY: "></span>
                            <font color="#003333"><span style="LINE-HEIGHT: 115%; FONT-FAMILY: ">
                </td>

                <!-- Full-width images with number text -->
                <div class="mySlides">
                    <div class="numbertext">1 / 6</div>
                    <img src="../images/fms1.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 6</div>
                    <img src="../images/fms2.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 6</div>
                    <img src="../images/fms3.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">4 / 6</div>
                    <img src="../images/fms4.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">5 / 6</div>
                    <img src="../images/fms5.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">6 / 6</div>
                    <img src="../images/fms3.png" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Image text -->
                <div class="caption-container">
                    <p id="caption"> caption</p>
                </div>

                <!-- Thumbnail images -->
                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="../images/fms1.jpg" style="width:100%" onclick="currentSlide(1)"
                            alt="The Woods">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../images/fms2.jpg" style="width:100%" onclick="currentSlide(2)"
                            alt="Cinque Terre">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../images/fms3.png" style="width:100%" onclick="currentSlide(3)"
                            alt="Mountains and fjords">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../images/fms4.png" style="width:100%" onclick="currentSlide(4)"
                            alt="Northern Lights">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../images/fms5.jpg" style="width:100%" onclick="currentSlide(5)"
                            alt="Nature and sunrise">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../images/fms3.png" style="width:100%" onclick="currentSlide(6)"
                            alt="Snowy Mountains">
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