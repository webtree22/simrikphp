<?php include "../base.php"; ?>
<?php 
$pagecode=12; 
include("../general_permission.php"); 
?>
<?php
$submenu_of=$_GET['submenu_of'];
$sn=$_GET['sn'];
$osn=$_GET['osn'];
$task=$_GET['task'];
$menu = $_GET['menu'];
$backto="index.php?menu=$menu";




$sql="select * from menu where submenu_of=$submenu_of";
$result=mysqli_query($dbc,$sql);
$num=mysqli_num_rows($result);
$num=$num-1;
if($task=="up" and $osn>1) 
{
			$lessvalue=$osn-1;
			$sql="select * from menu where display_order=$lessvalue and submenu_of=$submenu_of";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update menu set display_order=$lessvalue where display_order=$osn and submenu_of=$submenu_of";
	$result=mysqli_query($dbc,$sql);

	$sql="update menu set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);			
				
				
}

if($task=="down" and $osn<=$num) 
{
			$lessvalue=$osn+1;
			$sql="select * from menu where display_order=$lessvalue and submenu_of=$submenu_of";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update menu set display_order=$lessvalue where display_order=$osn and submenu_of=$submenu_of";
	$result=mysqli_query($dbc,$sql);

	$sql="update menu set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);		
				
				
}
header("Location: $backto");
?>