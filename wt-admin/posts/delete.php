<?php include "../base.php"; ?>
<?php 
$pagecode=3; 
include("../general_permission.php"); 
?>
<?php
/*
Pose Delete Case
==============
1. Delete Post and all related data in postdata table
*/
		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
		$category_sn = mysqli_real_escape_string($dbc,$_GET['category_sn']);
		
		$u = mysqli_query($dbc, "delete from postdata where post_sn = $sn");
		if(!$u) echo mysqli_error($dbc);
		
		//featured post
		$u = mysqli_query($dbc, "delete from featured where sn = $sn");
		if(!$u) echo mysqli_error($dbc);
		//Resort
		$i=0;
		$q=mysqli_query($dbc,"select sn from featured order by display_order");
		while($row = mysqli_fetch_array($q))
		{
			$i+=1;
			$idx = $row['sn'];
			$u = mysqli_query($dbc,"update featured set display_order = $i where sn = $idx");
		}
		///
		
		$registerquery = mysqli_query($dbc,"delete from posts where sn=$sn");
			if($registerquery)
			{
				//Resort
				$i=0;
				$q=mysqli_query($dbc,"select sn from posts where category_sn = $category_sn order by display_order");
				while($row = mysqli_fetch_array($q))
				{
					$i+=1;
					$id = $row['sn'];
					$u = mysqli_query($dbc,"update posts set display_order = $i where sn = $id");
				}
				///	
				header("location: index.php?category_sn=$category_sn");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>