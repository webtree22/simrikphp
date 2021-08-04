<?php include "../base.php"; ?>
<?php 
$pagecode=10; 
include("../general_permission.php"); 
?>
<?php
		$sn = $_GET['sn'];
		$registerquery = mysqli_query($dbc,"delete from social where sn=$sn");
			if($registerquery)
			{

				header("location: index.php");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>