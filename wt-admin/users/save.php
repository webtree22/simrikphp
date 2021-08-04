<?php include "../base.php";
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{

	$sn=$_POST['sn'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	if(isset($_POST['pass'])) $pass=$_POST['pass'];
	$user_level=$_POST['user_level'];

	
	//echo $user_level;	

	if($sn==0 and $_SESSION['Role']<5)//prevent other than super admin to create   an administrator
	{
		header("location: index.php");
		die();
	}
	
	if($user_level==5 and sn==0) // prevent updating/creating super user
	{
		header("location: index.php");
		die();
	}
	/////////////////////////////////////////////////////////////
	
	
	$fn = $ln = $e = $p = FALSE;
	
	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $first_name)) {
		$fn = mysqli_real_escape_string ($dbc, $first_name);
	} else {
		echo '<p class="error">Please enter your first name!</p>';
	}
	
	// Check for a last name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $last_name)) {
		$ln = mysqli_real_escape_string ($dbc, $last_name);
	} else {
		echo '<p class="error">Please enter your last name!</p>';
	}
	
	// Check for an email address:
	if (preg_match ('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $email)) {
		$e = mysqli_real_escape_string ($dbc, $email);
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}
	

	// Check for a password 
	if(isset($_POST['pass']))
	{
		if (preg_match ('/^\w{4,20}$/', $pass) ) {
			$p= mysqli_real_escape_string ($dbc, $pass);		
		} else {
			echo '<p class="error">Please enter a valid password!</p>';
		}
	}
	else
	{
		$p="xxxxxx"; //to validate
	}
	$ra=true;
	if ($fn && $ln && $e && $p) { // If everything's OK...
		//Add
		if($sn==0)
		{
			// Make sure the email address is available:
			$q = "SELECT user_id FROM users WHERE email='$e'";
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
			if (mysqli_num_rows($r) == 0) 
			{ // Available.
			
				// Create the activation code:
				//$a = md5(uniqid(rand(), true));
				//$a="NULL";
				// Add Update the user to the database:
				
				
					$qa = "INSERT INTO users (email, pass, first_name, last_name, active, registration_date,user_level) VALUES ('$e', SHA1('$p'), '$fn', '$ln', NULL, NOW(), $user_level )";
					$ra = mysqli_query ($dbc, $qa) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
			} 
			else 
			{ // The email address is not available.
				echo '<p class="error">That email address has already been registered.</p>';
				exit();
			}
		
		}
		else //update
		{
				//echo "aaaa";
				$qa = "update users set  first_name='$fn', last_name='$ln', user_level=$user_level where user_id=$sn";
				$ra = mysqli_query ($dbc, $qa) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		}
			
			

		if (!$ra) 
		{ // If it did not run OK.
			
				
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
				
		} 
		else 
		{ // If it did run OK.
				
				// Send the email:
				//$body = "Thank you for registering at < >. To activate your account, please click on this link:\n\n";
				//$body .= 'http://www.sharekinbech.com/activate.php?x=' . urlencode($e) . "&y=$a";
				//mail($trimmed['email'], 'Registration Confirmation', $body, 'From: SHAREKINBECH.COM <info@sharekinbech.com>');
				
				// Finish the page:
				//echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</h3>';
				header("location: index.php");
				exit();
				
		}

		
	} 
	else 
	{ // If one of the data tests failed.
		echo '<p class="error">Please re-enter your passwords and try again.</p>';
	}

	mysqli_close($dbc);

}
else
{
	echo"NO WAY!";
}
?>