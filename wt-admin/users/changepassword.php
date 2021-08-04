<?php include "../base.php"; 
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{

	$sn=$_POST['sn'];
	$pageid=$_GET['pageid'];
	
	if(isset($_POST['pass'])) $pass=$_POST['pass'];
	if(isset($_POST['conpass'])) $conpass=$_POST['conpass'];

	
	
		
	//$user_level=$_POST['user_level'];

	//if($_SESSION['Role']<5)//prevent other than super admin to change password
	//{
		//header("location: index.php?pageid=$pageid");
		//die();
	//}
	
	if($pass!=$conpass)
	{
		echo '<p  style="color: #c00">Password do not match.</p> <a href="javascript:history.back()">Click here to go back</a>';
		die();
	}

	/////////////////////////////////////////////////////////////
	
	
	$p = FALSE;
	

	// Check for a password 
	if(isset($_POST['pass']))
	{
		if (preg_match ('/^\w{4,20}$/', $pass) ) {
			$p= mysqli_real_escape_string ($dbc, $pass);		
		} else {
			echo '<p style="color: #c00">Please enter a valid password!</p>';
		}
	}
	
	if ($p) { // If everything's OK...
		//Update
		
				$q = "update users set  pass=SHA1('$p') where user_id=$sn";
				$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
				if ($r) 
				{ // If it ran OK.
					
						header("location: index.php?pageid=$pageid");
						exit();
						
				} 
				else 
				{ // If it did not run OK.
						echo '<p style="color: #c00">Password cannot be changed due to a system error. We apologize for any inconvenience.</p>';
				}
		
	}
	else 
	{ // If one of the data tests failed.
		echo '<p style="color: #c00">Please re-enter your passwords and try again.</p>';
	}

	mysqli_close($dbc);

}
else
{
	echo"NO WAY!";
}
?>