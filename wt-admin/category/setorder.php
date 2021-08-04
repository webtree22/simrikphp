<?php include "../base.php"; ?>
<?php 
$pagecode=1; 
include("../general_permission.php"); 
?>
<?php
$subcategory_of=$_GET['subcategory_of'];
$sn=$_GET['sn'];
$osn=$_GET['osn'];
$task=$_GET['task'];
$backto="index.php";



$sql="select * from category where subcategory_of=$subcategory_of";
$result=mysqli_query($dbc,$sql);
$num=mysqli_num_rows($result);
$num=$num-1;
if($task=="up" and $osn>1) 
{
			$lessvalue=$osn-1;
			$sql="select * from category where display_order=$lessvalue and subcategory_of=$subcategory_of";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update category set display_order=$lessvalue where display_order=$osn and subcategory_of=$subcategory_of";
	$result=mysqli_query($dbc,$sql);

	$sql="update category set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);			
				
				
}

if($task=="down" and $osn<=$num) 
{
			$lessvalue=$osn+1;
			$sql="select * from category where display_order=$lessvalue and subcategory_of=$subcategory_of";
			$result=mysqli_query($dbc,$sql);
			while($row=mysqli_fetch_array($result))
				{
				$justchangedid="$row[sn]";
				}
					
	$sql="update category set display_order=$lessvalue where display_order=$osn and subcategory_of=$subcategory_of";
	$result=mysqli_query($dbc,$sql);

	$sql="update category set display_order=$osn where sn=$justchangedid";
	$result=mysqli_query($dbc,$sql);		
				
				
}
header("Location: $backto");
?>