<?php include "../base.php"; ?>
<?php
if(empty($_SESSION['UserId']) or empty($_SESSION['Username']) or empty($_SESSION['LoggedIn']))
{
	$loginpage= $base ."/index.php";
	header("Location: $loginpage");
	exit(); // Quit the script.
}

		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
		$formsn = mysqli_real_escape_string($dbc,$_GET['formsn']);
		$registerquery = mysqli_query($dbc,"delete from formsdetail where sn=$sn");
			if($registerquery)
			{
					
				$del = mysqli_query($dbc, "delete from formdata where fdsn = $sn and formsn = $formsn");
				header("location: indexindex.php?formsn=$formsn");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>