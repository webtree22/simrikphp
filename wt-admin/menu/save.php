<?php include "../base.php"; ?>
<?php
$pagecode=12; 
include("../general_permission.php"); 
?>
<?php 
$sn=$_POST['sn'];
$title=$_POST['title'];
$link=$_POST['link'];
$display_order=$_POST['display_order'];
$submenu_of=$_POST['submenu_of'];
$menu=$_POST['menu'];
$menutype=$_POST['menutype'];
$mid=$_POST['mid'];
$language=$currentlanguage;



//old values
	$sql="select submenu_of,display_order from menu where sn=$sn";
	$result=mysqli_query($dbc,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$old_do = $row['display_order'];
	$old_submenuof = $row['submenu_of'];
	}
	//

if($sn == 0)
{
	//display_order funda	
	$sql = "insert into menu(title, link, display_order, submenu_of, menu, menutype, mid, language)
	values(\"$title\", \"$link\", \"-9\", \"$submenu_of\", \"$menu\", \"$menutype\", \"$mid\", \"$language\")";
	$result=mysqli_query($dbc,$sql);
	$new_category_sn = mysqli_insert_id($dbc);
	
	$sql="update menu set display_order = display_order+1 where display_order >= $display_order 
	and submenu_of = $submenu_of";
	$result=mysqli_query($dbc,$sql);
	

	$sql="update menu set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);	
}
else
{
	//Free up child categories if exists
	if($old_submenuof != $submenu_of) {
	$u1=mysqli_query($dbc,"update menu set submenu_of = 0 where submenu_of = $sn"); 
	}

	//first simply update without display_order
	$sql = "update menu set  title = \"$title\", link = \"$link\", submenu_of = \"$submenu_of\", menu = \"$menu\", menutype = \"$menutype\", mid = \"$mid\", language = \"$language\" where sn = $sn";
	$result=mysqli_query($dbc,$sql);
	include("resorting.php");
	
}

header("location: index.php?menu=$menu");

/*
kam banki
1. display_order automization
*/
?>