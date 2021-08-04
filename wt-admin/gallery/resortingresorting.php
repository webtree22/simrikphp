<?php


	if($old_do != $display_order)
	{
		updates($gallerysn, $display_order, $old_do, $sn, $dbc); //assign display_order and rearrange
	}


function updates($gallerysn, $display_order, $old_do, $sn, $dbc)
{
	$sql = "update gallerypics set display_order = -9 where sn = $sn";
	$result = mysqli_query($dbc,$sql);
	
	if($old_do > $display_order) 
	{
		$sql="update gallerypics set display_order = display_order+1 where display_order >= $display_order and 
		display_order < $old_do and gallerysn = $gallerysn";
		$result = mysqli_query($dbc,$sql);
	}
	else
	{
		$sql="update gallerypics set display_order = display_order-1 where display_order > $old_do and 
		display_order <= $display_order and gallerysn = $gallerysn";
		$result = mysqli_query($dbc,$sql);
	}
	
	$sql="update gallerypics set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}



?>