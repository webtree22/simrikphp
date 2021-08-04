<?php include "../base.php"; ?>
<?php 
$pagecode=4; 
include("../general_permission.php"); 
?>
<?php
		$sn = $_GET['sn'];
		$gallerysn = $_GET['gallerysn'];
		$registerquery = mysqli_query($dbc,"delete from gallerypics where sn=$sn");
			if($registerquery)
			{				
				//Resort
				$i=0;
				$q=mysqli_query($dbc,"select sn from gallerypics where gallerysn = $gallerysn order by display_order");
				while($row = mysqli_fetch_array($q))
				{
					$i+=1;
					$id = $row['sn'];
					$u = mysqli_query($dbc,"update gallerypics set display_order = $i where sn = $id");
				}
				///
				header("location: indexindex.php?gallerysn=$gallerysn");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>