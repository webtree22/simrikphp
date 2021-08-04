<?php include "../base.php"; ?>
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
$pageid = mysqli_real_escape_string($dbc,$_GET['pageid']);
	$check = mysqli_query($dbc,"select user_level from users where user_id=$sn") or die(mysqli_error());
	
	$rowcheck=@mysqli_fetch_array($check);
	$userlevel=$rowcheck['user_level'];
	
	if($userlevel==5) { // prevent deleting super user
		header("location: index.php");
		die();
	}

		$registerquery = mysqli_query($dbc,"delete from users where user_id=$sn");
		if($registerquery)
			{
				$registerquery = mysqli_query($dbc,"delete from permissions where user_id=$sn");
				header("location: index.php");
			}
			else
			{
				//trigger_error("Delete Error: " . mysqli_error($dbc));
				echo "You can not delete super user";
			}
	

}
else
{
	echo"NO WAY!";
}
?>