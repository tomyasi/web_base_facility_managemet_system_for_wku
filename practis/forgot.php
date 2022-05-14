
		<?php
  	include "MasterPages/Masterhome.php";
if (isset($_POST['forgotpassword'])) 
  	{	
	   require("configuration.php");
		$name = $_POST['name'];	
		$confirmpassword = $_POST['confirmpassword'];	
		$new_password = $_POST['new_password'];
		$sql="SELECT * FROM account WHERE name = '$name'";
	$resulsasst = mysqli_query("super",$sql);
	$counssst=mysqli_num_rows($resulsasst);
		if($counssst == 0){
		
			echo "<font color='gren'size='3'><center><h2>Faild Please Insert Correct account?</h2> </center></font>";
			echo '</strong></div>';
		} else{
		
		$passw=$_POST['new_password'];
	if(strlen($passw) <=7 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Must Be Grater Than Or Equal To 8 Characters !".'</strong>');
		echo '</div>';
	} 
	if (substr($new_password,0,5) == substr($username,0,5)){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("Your Password Must Have A Big Defferent From Your Your Username, Try Other Password !");
		echo '</strong></div>';
	}
		
		if($new_password != $confirmpassword){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("Your New Password Be The Same With Confirm Password,Enter The same Password");
		echo '</strong></div>';
	}
		
		$sqll="update account set password='$new_password' where name = '$name' ";
$res=mysqli_query($sqll) or die("unable to change".mysqli_error());
	//echo '<script type="text/javascript">alert("You are successfully rest your password please login here");window.location=\'Anti_Corruption.php\';</script>';
	echo '<font color="red" size="3">'."Successfully Changed!&nbsp;&nbsp;".'</font>';
		echo "".'<a href="index.php?log_in=">'."Login Here".'</a>';
		echo '</strong></div>';
		}
		
			
	}
		?>

		
<div id="rightmenu">
   <div id="contentbox">

    </div>
    </div>
    <div id="mainmenu">
		<div id="content">
<form method="POST" action="">
				<table border="2" cellpadding="15" cellspacing="0" >
            	   
				 <tr>
                	<td>User Name</td>
                    <td>
                    <input type="text" title="Enter Your user name" name="name" id="kl" placeholder="User name" required>
                    </td>
            	</tr>
				 <tr>
                	<td>New Password</td>
                    <td>
                    <input type="password" title="Enter Your user name" name="new_password" id="kl" placeholder="password" required>
                    </td>
            	</tr>
				 <tr>
                	<td>Confirm Password</td>
                    <td>
                    <input type="password" title="Enter Your user name" name="confirmpassword" id="kl" placeholder="password" required>
                    </td>
            	</tr>
				
				
				   <tr>
				   <td></td>
            <td colspan="2">
                	<input type="submit" name="forgotpassword"  value="Change Password" class="btn" id="kl">
                </td>
            </tr>
				   <tr>
				   <td></td>
            <td colspan="2">
                	
                </td>
            </tr>
			</table>
		</form></div>
			</div><!-- content -->
		 <div id="leftmenu">
    <div id="video">
	</div></div>
		
 <div id="footer1"> <div id="templatemo_footer_section" align="center">
        <font color="#FFFFFF">Copyright @ 2018</font>| 
        <a href="project members.php"><font style="color:#FFF">Website Design by Dilla university Departement of Computer Science  students</font>
        
</div></div>