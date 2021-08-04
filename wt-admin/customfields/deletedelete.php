<?php include "../base.php"; ?>
<?php include "../base.php"; ?>
<?php 
$pagecode = 2; 
include("../general_permission.php"); 
?>
<?php
		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
		$category_sn = mysqli_real_escape_string($dbc,$_GET['category_sn']);
		$registerquery = mysqli_query($dbc,"delete from categoryfields where sn=$sn");
			if($registerquery)
			{
				//Resort
				$i=0;
				$q=mysqli_query($dbc,"select sn from categoryfields where category_sn = $category_sn order by display_order");
				while($row = mysqli_fetch_array($q))
				{
					$i+=1;
					$id = $row['sn'];
					$u = mysqli_query($dbc,"update categoryfields set display_order = $i where sn = $id");
				}
				///
				header("location: indexindex.php?category_sn=$category_sn");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>