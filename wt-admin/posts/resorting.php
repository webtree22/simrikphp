<?php

if($old_cat == $category_sn)
{
	//echo $old_do . " " . $display_order . "<hr>";
	if($old_do != $display_order)
	{
		updates($category_sn, $display_order, $old_do, $sn, $dbc); //assign display_order and rearrange
	}
}
else
{
	resort($old_cat,$dbc);//resort old_cat in source
	updatestwo($category_sn, $display_order, $sn, $dbc);
}

function resort($category_sn,$dbc)
{
	$i=0;
	$q=mysqli_query($dbc,"select sn from posts where category_sn = $category_sn order by display_order");
	while($row = mysqli_fetch_array($q))
	{
		$i+=1;
		$id = $row['sn'];
		$u = mysqli_query($dbc,"update posts set display_order = $i where sn = $id");
	}
}

function updates($category_sn, $display_order, $old_do, $sn, $dbc)
{
	$sql = "update posts set display_order = -9 where sn = $sn";
	$result = mysqli_query($dbc,$sql);
	
	if($old_do > $display_order) 
	{
		$sql="update posts set display_order = display_order+1 where display_order >= $display_order and display_order < $old_do
		 and category_sn = $category_sn";
		$result = mysqli_query($dbc,$sql);
	}
	else
	{
		$sql="update posts set display_order = display_order-1 where display_order > $old_do and display_order <= $display_order
		 and category_sn = $category_sn";
		$result = mysqli_query($dbc,$sql);
	}
	
	$sql="update posts set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}

function updatestwo($category_sn, $display_order, $sn, $dbc)
{
	$sql="update posts set display_order = -9 where sn = $sn";
	$result = mysqli_query($dbc,$sql);

	$sql="update posts set display_order = display_order+1 where display_order >= $display_order
	 and category_sn = $category_sn";
	$result = mysqli_query($dbc,$sql);

	$sql="update posts set display_order = $display_order where display_order=-9";
	$result = mysqli_query($dbc,$sql);
}

?>