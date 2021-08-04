<?php include "../base.php"; ?>
<?php 
$pagecode=3; 
include("../general_permission.php"); 
?>
<?php 
$category_sn=$_GET['category_sn'];
$sn=$_GET['sn'];
$osn=$_GET['osn'];
$task=$_GET['task'];
$backto="index.php?category_sn=$category_sn";

//it is assumed that this page will not be accissible form index.php category_sn = 0;

$sql="select * from posts where category_sn=$category_sn";
$result=mysqli_query($dbc,$sql);
$num=mysqli_num_rows($result);
$num=$num-1;
if($task=="up" and $osn>1) 
{
			$lessvalue=$osn-1;
			$sql="select * from posts where display_order=$lessvalue and category_sn=$category_sn";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update posts set display_order=$lessvalue where display_order=$osn and category_sn=$category_sn";
	$result=mysqli_query($dbc,$sql);

	$sql="update posts set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);			
				
				
}

if($task=="down" and $osn<=$num) 
{
			$lessvalue=$osn+1;
			$sql="select * from posts where display_order=$lessvalue and category_sn=$category_sn";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update posts set display_order=$lessvalue where display_order=$osn and category_sn=$category_sn";
	$result=mysqli_query($dbc,$sql);

	$sql="update posts set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);		
				
				
}
header("Location: $backto");
?>
