<!DOCTYPE html>
<html>
<head>
    <title>skip ad</title>
    <link rel="stylesheet" href="css.css">
</head>
<body >
	<header>
		<div id="logo">WKUFMS</div>
		<span class="sign"><a class="act" href="login.php">LOGIN</a></span>
        <span class="sign"><a href="#">Gallary</a></span>
        <span class="sign"><a href="#">ContactUs</a></span>		
        <span class="sign"><a href="#">AboutUs</a></span>
		<span class="sign"><a href="login.php">Home</a></span>
	</header>
	
    <div class="slider">
		<!-- fade css -->
		<div class="myslide fade">
			<div class="txt">
				<h1>IMAGE 1</h1>
				<p>Web Devoloper<br>Subscribe To My Channel For More Videos</p>
			</div>
			<img src="images/wkulogo1.jpg" >
		</div>
		
		<div class="myslide fade">
			<div class="txt">
				<h1>IMAGE 2</h1>
				<p>Web Devoloper<br>Subscribe To My Channel For More Videos</p>
			</div>
			<img src="images/wkulogo2.jpg" >
		</div>
		
		<div class="myslide fade">
			<div class="txt">
				<h1>IMAGE 3</h1>
				<p>Web Devoloper<br>Subscribe To My Channel For More Videos</p>
			</div>
			<img src="images/wkulogo3.jpg">
		</div>
		
		<div class="myslide fade">
			<div class="txt">
				<h1>IMAGE 4</h1>
				<p>Web Devoloper<br>Subscribe To My Channel For More Videos</p>
			</div>
			<img src="images/wkulogo4.jpg" >
		</div>
		
		<div class="myslide fade">
			<div class="txt">
				<h1>IMAGE 5</h1>
				<p>Web Devoloper<br>Subscribe To My Channel For More Videos</p>
			</div>
			<img src="img5.jpg" >
		</div>
		<!-- /fade css -->
		
		<!-- onclick js -->
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		
		<div class="dotsbox" style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
			<span class="dot" onclick="currentSlide(3)"></span>
			<span class="dot" onclick="currentSlide(4)"></span>
			<span class="dot" onclick="currentSlide(5)"></span>
		</div>
		<!-- /onclick js -->
	</div>
</div>
<footer>
<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, Coding Journey</p>
</footer>
<script src="jsfile.js"></script>
</body>
</html>


