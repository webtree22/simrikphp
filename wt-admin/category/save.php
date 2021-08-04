<?php include "../base.php"; ?>
<?php
$pagecode=1; 
include("../general_permission.php"); 
?>
<?php 
$sn=$_POST['sn'];
$categoryname=$_POST['categoryname'];
$display_order=$_POST['display_order'];
$language=$_SESSION['AdminLanguage'];
$slug=$_POST['slug'];
$subcategory_of = 0;
if(isset($_POST['subcategory_of'])) $subcategory_of=$_POST['subcategory_of'];
$show_content="Yes";

//database slug = unique, still check if the slug exists and assign new slug 
	if($slug == "")
	{
		//probably because of unicode or other languages
		$slug = uniqid(); 
	}
	else
	{
		$q=mysqli_query($dbc,"select slug from category where slug = '$slug' and sn <> $sn");
		$n = mysqli_num_rows($q);
		if($n>=1)
		{
			//slug exists
			$uid = uniqid();
			$slug = $slug . "-" . $uid; // let's hope duplicate doesn't occur
		}
	}

//old values
	$sql="select subcategory_of,display_order from category where sn=$sn";
	$result=mysqli_query($dbc,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$old_do = $row['display_order'];
	$old_subcatof = $row['subcategory_of'];
	}
	//

if($sn == 0)
{
	//display_order funda	
	$sql = "insert into category(categoryname, display_order, language, slug, subcategory_of, show_content)
	values( \"$categoryname\", \"-9\", \"$language\", \"$slug\", \"$subcategory_of\", \"$show_content\")";
	$result=mysqli_query($dbc,$sql);
	$new_category_sn = mysqli_insert_id($dbc);
	
	$sql="update category set display_order = display_order+1 where display_order >= $display_order 
	and subcategory_of = $subcategory_of";
	$result=mysqli_query($dbc,$sql);
	

	$sql="update category set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
	
	// parent category custom fields add to this new category
		//echo "select * from categoryfields where category_sn = $subcategory_of";
		$q1=mysqli_query($dbc,"select * from categoryfields where category_sn = $subcategory_of"); 
		//echo mysqli_num_rows($q1);
		while($r1 = mysqli_fetch_array($q1))
		{ 
			$fieldname = $r1['fieldname'];
			$control = $r1['control'];
			$options = $r1['options'];
			$display_order = $r1['display_order'];
			$required = $r1['required'];
			$sql = "insert into categoryfields(category_sn, fieldname, control, options, display_order, required)
		values(\"$new_category_sn\", \"$fieldname\", \"$control\", \"$options\", \"$display_order\", \"$required\")";
			//echo $sql . "<hr>";
			$ins = mysqli_query($dbc, $sql);
		}
		
	
}
else
{
	//Free up child categories if exists
	if($old_subcatof != $subcategory_of) {
	$u1=mysqli_query($dbc,"update category set subcategory_of = 0 where subcategory_of = $sn"); 
	}

	//first simply update without display_order
	$sql = "update category set  categoryname = \"$categoryname\", language = \"$language\", 
	slug = \"$slug\", subcategory_of = \"$subcategory_of\" where sn = $sn";
	$result=mysqli_query($dbc,$sql);
	include("resorting.php");
	
	//update link if menu if the title, therefore slug, has changed.
	$newmenulink = "$set_sitename/category/$slug/1";
	$sql = "update menu set link =\"$newmenulink\", title = \"$title\" where mid = $sn and menutype = 'category' and language = '$currentlanguage'";
	
}

header("location: index.php");

/*
kam banki
1. display_order automization
*/
?>