<?php

if($old_submenuof == $submenu_of)
{
	//echo $old_do . " " . $display_order . "<hr>";
	if($old_do != $display_order)
	{
		updates($submenu_of, $display_order, $old_do, $sn, $dbc); //assign display_order and rearrange
	}
}
else
{
	resort($submenu_of,$dbc);//resort old_at / old subat in source
	updatestwo($submenu_of, $display_order, $sn, $dbc);
}

function resort($submenu_of,$dbc)
{
	$i=0;
	$q=mysqli_query($dbc,"select sn from menu where submenu_of = $submenu_of order by display_order");
	while($row = mysqli_fetch_array($q))
	{
		$i+=1;
		$id = $row['sn'];
		$u = mysqli_query($dbc,"update menu set display_order = $i where sn = $id");
	}
}

function updates($submenu_of, $display_order, $old_do, $sn, $dbc)
{
	$sql = "update menu set display_order = -9 where sn = $sn";
	$result = mysqli_query($dbc,$sql);
	
	if($old_do > $display_order) 
	{
		$sql="update menu set display_order = display_order+1 where display_order >= $display_order and display_order < $old_do
		 and submenu_of = $submenu_of";
		$result = mysqli_query($dbc,$sql);
	}
	else
	{
		$sql="update menu set display_order = display_order-1 where display_order > $old_do and display_order <= $display_order
		 and submenu_of = $submenu_of";
		$result = mysqli_query($dbc,$sql);
	}
	
	$sql="update menu set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}

function updatestwo($submenu_of, $display_order, $sn, $dbc)
{
	$sql="update menu set display_order = -9 where sn = $sn";
	$result = mysqli_query($dbc,$sql);

	$sql="update menu set display_order = display_order+1 where display_order >= $display_order
	 and submenu_of = $submenu_of";
	$result = mysqli_query($dbc,$sql);

	$sql="update menu set display_order = $display_order where display_order=-9";
	$result = mysqli_query($dbc,$sql);
}

?>