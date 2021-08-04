<?php include "base.php"; ?>
<?php
		//Google ReCaptcha V2
		/*
		$captcha;
		if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfNiQITAAAAAGHcOhiC3HJw6ZcmAl13T5B9bYLc&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$suc = json_decode($response);
		$ans = $suc->{'success'};
		//echo $ans . "<hr>";
        if($ans==false)
        {
          echo '<h2>Permission Denied. Invalid Captcha or Session Expired. <a href="'.$base.'/index.php">Try again</a></h2>';
		  die();
        }
		else
        {
         //continue...
        }
        */
  		//Google ReCaptcha V2
		
if(!empty($_POST['txtusername']) && !empty($_POST['txtpassword']))
{
	$e = mysqli_real_escape_string($dbc,$_POST['txtusername']);
	$p = mysqli_real_escape_string($dbc,$_POST['txtpassword']);
	$l= mysqli_real_escape_string($dbc,$_POST['txtlanguage']);
	
	
    $q = "SELECT user_id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p')) AND user_level>0 AND active IS NULL";	
	 $checklogin = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
    
    if(@mysqli_num_rows($checklogin) == 1)
    {
    	$row = mysqli_fetch_array($checklogin);
        $userlevel = $row['user_level'];

        
        $_SESSION['Username'] = $row['first_name'];
		$_SESSION['UserId'] = $row['user_id'];
		$_SESSION['email'] = $e;
        $_SESSION['LoggedIn'] = 1;
        $_SESSION['Role']=$userlevel;
		$_SESSION['AdminLanguage']=$l;
		
    	header("location: dashboard.php"); 
		//header("location: at/index.php"); 
    }
    else
    {
    	 echo "<h1>Access Denied</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
		//echo"<hr>$username";
		//echo"<br>$password";
    }
}
else
	{
		echo"<h1>Try Again</h1>";
		echo"Username and Password cannot be empty.";
		
	}

?>