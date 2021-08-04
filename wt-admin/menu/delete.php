<?php include "../base.php"; ?>
<?php 
$pagecode=12; 
include("../general_permission.php"); 
?>
<?php

		$sn = mysqli_real_escape_string($dbc,$_GET['sn']);
		$menu = $_GET['menu'];
				$q=mysqli_query($dbc,"select submenu_of from menu where sn = $sn");
				while($row = mysqli_fetch_array($q))
				{
					$so = $row['submenu_of'];
				}
		$u = mysqli_query($dbc, "update menu set submenu_of = 0 where submenu_of = $sn");
		$registerquery = mysqli_query($dbc,"delete from menu where sn=$sn");
			if($registerquery)
			{
				//Resort
				$i=0;
				$q=mysqli_query($dbc,"select sn from menu where submenu_of = $so order by display_order");
				while($row = mysqli_fetch_array($q))
				{
					$i+=1;
					$id = $row['sn'];
					$u = mysqli_query($dbc,"update menu set display_order = $i where sn = $id");
				}
				///
				header("location: index.php?menu=$menu");
			}
			else
			{
				echo mysqli_error($dbc);
			}

?>