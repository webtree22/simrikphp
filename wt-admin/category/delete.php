<?php include "../base.php"; ?>
<?php 
$pagecode=1; 
include("../general_permission.php"); 
?>
<?php
/*
Category Delete Case:
====================
1. child posts category_sn = 0 (uncategorized)
2. child posts ko aru kehe nachalaune
3. Yedi yo category ko child category chha bhane subcategory_of=0 garne
*/
		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
				$q=mysqli_query($dbc,"select subcategory_of from category where sn = $sn");
				while($row = mysqli_fetch_array($q))
				{
					$so = $row['subcategory_of'];
				}
		$u = mysqli_query($dbc, "update posts set category_sn = 0 where category_sn = $sn");
		$u = mysqli_query($dbc, "update category set subcategory_of = 0 where subcategory_of = $sn");
		$registerquery = mysqli_query($dbc,"delete from category where sn=$sn");
			if($registerquery)
			{
				//Resort
				$i=0;
				$q=mysqli_query($dbc,"select sn from category where subcategory_of = $so order by display_order");
				while($row = mysqli_fetch_array($q))
				{
					$i+=1;
					$id = $row['sn'];
					$u = mysqli_query($dbc,"update category set display_order = $i where sn = $id");
				}
				///
				header("location: index.php");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>