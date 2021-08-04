<?php include "../base.php"; ?>
<?php
if(empty($_SESSION['UserId']) or empty($_SESSION['Username']) or empty($_SESSION['LoggedIn']))
{
	$loginpage= $base ."/index.php";
	header("Location: $loginpage");
	exit(); // Quit the script.
}

		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
					
		$registerquery = mysqli_query($dbc,"delete from forms where sn=$sn");
			if($registerquery)
			{
					
				header("location: index.php");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>