<?php include "../base.php"; ?>
<?php 
$pagecode=7; 
include("../general_permission.php"); 
?>
<?php
		$sn = $_GET['sn'];
		$registerquery = mysqli_query($dbc,"delete from ads where sn=$sn");
			if($registerquery)
			{
				
				//Resort
				$i=0;
				$q=mysqli_query($dbc,"select sn from ads order by display_order");
				while($row = mysqli_fetch_array($q))
				{
					$i+=1;
					$id = $row['sn'];
					$u = mysqli_query($dbc,"update ads set display_order = $i where sn = $id");
				}
				///
				header("location: index.php");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>