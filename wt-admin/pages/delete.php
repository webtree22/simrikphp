<?php include "../base.php"; ?>
<?php 
$pagecode=11; 
include("../general_permission.php"); 
?>
<?php
/*
Pose Delete Case
==============
1. Delete Post and all related data in postdata table
*/
		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
		$registerquery = mysqli_query($dbc,"delete from pages where sn=$sn");
			if($registerquery)
			{
				header("location: index.php");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>