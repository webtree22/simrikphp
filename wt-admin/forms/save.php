<?php include "../base.php"; ?>
<?php
if(empty($_SESSION['UserId']) or empty($_SESSION['Username']) or empty($_SESSION['LoggedIn']))
{
	$loginpage= $base ."/index.php";
	header("Location: $loginpage");
	exit(); // Quit the script.
}
?>
<?php 
$sn=$_POST['sn'];
$formname=$_POST['formname'];
$header=$_POST['header'];
$language=$_SESSION['AdminLanguage'];
$footer=$_POST['footer'];


if($sn == 0)
{
$sql = "insert into forms(formname, header, footer, language)
		values(\"$formname\", \"$header\", \"$footer\", \"$language\")";
}
else
{
$sql = "update forms set formname = \"$formname\", header = \"$header\", footer = \"$footer\" where sn = $sn";
}
$u = mysqli_query($dbc,$sql);
header("location: index.php");
?>