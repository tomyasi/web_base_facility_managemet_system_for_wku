<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	session_start();
	$message="";
	if(isset($_SESSION['name']))
	include "configuration.php";
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"super");
	mysqli_set_charset($con,'utf8');
	$lang="English";
	if(isset($_POST['submit'])){
	    $password=$_POST['password'];
		$query="SELECT * FROM account WHERE name='".$_POST['username']."' AND password='".$_POST['password']."' AND status='Enable'";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result)>0){
		if($row['Role']=="customer")
			header("Location:customer home.php");
			else if($row['Role']=="store keeper")
			header("Location:storekeeperhome.php");
			else if($row['Role']=="Employer")
			header("Location:employerhome.php");
			else if($row['Role']=="manager")
			header("Location:managerhome.php");
			$_SESSION['name']=$row['name'];
		}else	
			$message="<font color='red'size='4px'>Wrong username or password.</font>";
	}
?>
<head>
	<link rel="stylesheet" type="text/css" href="boot/stylefooter.css">
    <link rel="stylesheet" href="boot/styleheader.css">
    <link rel="styleshet" href="boot/all.min.css">
</head>
<?php
 include "MasterPages/Masterheader.php";
 ?>
<body>
    <form method="post" action="login.php">
        <div class="form-wrapper">
            <h3>Login here</h3>
            <div class="form-item">
                <input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
            </div>
            <div class="form-item">
                <input type="password" name="pass" required="required" placeholder="Password" required></input>
            </div>

            <div class="button-panel">
                <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
            </div>
            <div class="reminder">
                <p> <a href="#">Sign up now</a></p>
                <p><a href="forgot.php">Forgot password?</a></p>
            </div>
        </div>
    </form>
	<?php
 include "MasterPages/Masterfooter.php";
 ?>
</body>

</html>