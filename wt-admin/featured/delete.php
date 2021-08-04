<?php include "../base.php"; ?>
<?php 
$pagecode=13; 
include("../general_permission.php"); 
?>
<?php

		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
		$registerquery = mysqli_query($dbc,"delete from featured where sn=$sn");
			if($registerquery)
			{
				//Resort
				$i=0;
				$q=mysqli_query($dbc,"select sn from featured order by display_order");
				while($row = mysqli_fetch_array($q))
				{
					$i+=1;
					$id = $row['sn'];
					$u = mysqli_query($dbc,"update featured set display_order = $i where sn = $id");
				}
				///
				header("location: index.php");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>