<?php include "../base.php"; ?>
<?php
if(empty($_SESSION['UserId']) or empty($_SESSION['Username']) or empty($_SESSION['LoggedIn']))
{
	$loginpage= $base ."/index.php";
	header("Location: $loginpage");
	exit(); // Quit the script.
}

		$uid = mysqli_real_escape_string($dbc,$_GET['uid']);
		$formsn = mysqli_real_escape_string($dbc,$_GET['formsn']);
					
		$registerquery = mysqli_query($dbc,"delete from formdata where unique_id='$uid'");
			if($registerquery)
			{
					
				header("location: formdata.php?sn=$formsn");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>