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
$formsn=$_POST['formsn'];
$fieldname=$_POST['fieldname'];
$control=$_POST['control'];
$options=$_POST['options'];
$displayorder=$_POST['displayorder'];
$required=$_POST['required'];


if($sn == 0)
{
$sql = "insert into formsdetail(formsn, fieldname, control, options, displayorder, required)
		values(\"$formsn\", \"$fieldname\", \"$control\", \"$options\", \"$displayorder\", \"$required\")";
		$u = mysqli_query($dbc,$sql);
		$sn = mysqli_insert_id($dbc);
		//populate blank data in formdata table
		$q1=mysqli_query($dbc,"select distinct(unique_id) as uid from formdata where formsn=$formsn");
		if(!$q1) echo mysqli_error($dbc);
		while($r1 = mysqli_fetch_array($q1))
		{ 
			$uid = $r1['uid'];
			$sql = "insert into formdata(formsn, fdsn, data_value, unique_id) values(\"$formsn\",\"$sn\", \"\", \"$uid\")";
			//echo $sql . "<br>";
			$ins = mysqli_query($dbc, $sql);
		}
		///////////////
}
else
{
$sql = "update formsdetail set formsn = \"$formsn\", fieldname = \"$fieldname\", control = \"$control\", options = \"$options\", displayorder = \"$displayorder\", required = \"$required\" where sn = $sn";
$u = mysqli_query($dbc,$sql);
}

header("location: indexindex.php?formsn=$formsn");
?>