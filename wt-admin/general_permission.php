<?php
if(empty($_SESSION['UserId']) or empty($_SESSION['Username']) or empty($_SESSION['LoggedIn']))
{
	$loginpage= $base ."/index.php";
	//header("location: $loginpage");
	echo "<div style=\"margin-left: 100px\">";
	echo "<h2>Permission Denied</h2>";
	echo "<p>Note: Don't forget to type <strong>www.</strong> before the URL while logging in to Admin Section.</p>";
	echo "<p>You may not have the permission to use this module. Ask your administrator to grant you permission.</p>";
	echo "<a href = \"$loginpage\">Click Here to Log in.</a></div>";
	exit(); // Quit the script.
}
	if(!isset($pagecode)) $pagecode=0;
	//echo "SELECT sn FROM permissions where pisn=$pagecode and user_id=" . $_SESSION['UserId'];

	$q = mysqli_query($dbc,"SELECT p FROM permissions where pisn=$pagecode and user_id=" . $_SESSION['UserId']);
	while($r = mysqli_fetch_array($q))
	{
		$p = $r['p'];
	}
	if($p==1)
	{
		//allow
	}
	else
	{
		echo "<h1 style=\"margin-left:50px\">Permission Denied</h1>";
		die();
	}

?>