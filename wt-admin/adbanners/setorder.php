<?php include "../base.php"; ?>
<?php 
$pagecode = 7; 
include("../general_permission.php"); 
?>
<?php
$sn=$_GET['sn'];
$osn=$_GET['osn'];
$task=$_GET['task'];
$backto="index.php";



$sql="select * from ads";
$result=mysqli_query($dbc,$sql);
$num=mysqli_num_rows($result);
$num=$num-1;
if($task=="up" and $osn>1) 
{
			$lessvalue=$osn-1;
			$sql="select * from ads where display_order=$lessvalue";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update ads set display_order=$lessvalue where display_order=$osn";
	$result=mysqli_query($dbc,$sql);

	$sql="update ads set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);			
				
				
}

if($task=="down" and $osn<=$num) 
{
			$lessvalue=$osn+1;
			$sql="select * from ads where display_order=$lessvalue";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update ads set display_order=$lessvalue where display_order=$osn";
	$result=mysqli_query($dbc,$sql);

	$sql="update ads set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);		
				
				
}
header("Location: $backto");
?>