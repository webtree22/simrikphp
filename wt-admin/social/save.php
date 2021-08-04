<?php include "../base.php"; ?>
<?php
$pagecode=10; 
include("../general_permission.php"); 
?>
<?php 
$sn=$_POST['sn'];
$service=$_POST['service'];
$link=$_POST['link'];
$display_order=$_POST['display_order'];



if($sn == 0)
{
	$sql = "insert into social(service, link, display_order)
	values( \"$service\", \"$link\", -9)";
	$result=mysqli_query($dbc,$sql);
	
	$sql="update social set display_order = display_order+1 where display_order >= $display_order";
	$result=mysqli_query($dbc,$sql);
	

	$sql="update social set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);	
}
else
{
	$sql = "update social set  service = \"$service\", link = \"$link\" where sn = $sn";
	$result=mysqli_query($dbc,$sql);
}

header("location: index.php");

/*
kam banki
1. display_order automization
*/
?>