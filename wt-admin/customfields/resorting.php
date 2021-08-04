<?php


	if($old_do != $display_order)
	{
		updates($category_sn, $display_order, $old_do, $sn, $dbc); //assign display_order and rearrange
	}


function updates($category_sn, $display_order, $old_do, $sn, $dbc)
{
	$sql = "update categoryfields set display_order = -9 where sn = $sn";
	$result = mysqli_query($dbc,$sql);
	
	if($old_do > $display_order) 
	{
		$sql="update categoryfields set display_order = display_order+1 where display_order >= $display_order and 
		display_order < $old_do and category_sn = $category_sn";
		$result = mysqli_query($dbc,$sql);
	}
	else
	{
		$sql="update categoryfields set display_order = display_order-1 where display_order > $old_do and 
		display_order <= $display_order and category_sn = $category_sn";
		$result = mysqli_query($dbc,$sql);
	}
	
	$sql="update categoryfields set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}



?>
	