<?php include "../base.php"; ?>
<?php 
$pagecode=2; 
include("../general_permission.php"); 
?>
<?php 

$sn=$_POST['sn'];
$category_sn=$_POST['category_sn'];
$fieldname=$_POST['fieldname'];
$control=$_POST['control'];
$options=$_POST['options'];
$display_order=$_POST['display_order'];
$required=$_POST['required'];

//old values
	$sql="select display_order from categoryfields where sn=$sn";
	$result=mysqli_query($dbc,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$old_do = $row['display_order'];
	}
	//
if($sn == 0)
{
	/*
	Categoryfields Add Case
	====================
	1. Regular add
	2. parent category ko custom field add garda, tehi custom field child categories lai pani append garne
	*/
		$sql = "insert into categoryfields(category_sn, fieldname, control, options, display_order, required)
		values(\"$category_sn\", \"$fieldname\", \"$control\", \"$options\", \"-9\", \"$required\")";
		$u = mysqli_query($dbc,$sql);
		
		$sql="update categoryfields set display_order = display_order+1 where display_order >= $display_order 
		and category_sn = $category_sn";
		$result=mysqli_query($dbc,$sql);
	
		$sql="update categoryfields set display_order = $display_order where display_order = -9";
		$result=mysqli_query($dbc,$sql);
	
		$sn = mysqli_insert_id($dbc);
		//parent category ko custom field add garda, tehi custom field child categories lai pani append garne
		$q1=mysqli_query($dbc,"select * from category where subcategory_of = $category_sn"); //find child categories
		while($r1 = mysqli_fetch_array($q1))
		{ 
			$child_sn = $r1['sn'];
			$sql = "insert into categoryfields(category_sn, fieldname, control, options, display_order, required)
		values(\"$child_sn\", \"$fieldname\", \"$control\", \"$options\", \"$display_order\", \"$required\")";
			$ins = mysqli_query($dbc, $sql);
		}
		///////////////
}
else
{
/*
Categoryfields Update Case
====================
1. Regular Update
control type ra options haru change bhayeko huna sakchha tara hami kehi garna sakdainou kinabhane hamilai corresponding
categoryfield record for child category thaha hudaina, user le manual nai garnu parne hunchha.
*/

	$sql = "update categoryfields set category_sn = \"$category_sn\", fieldname = \"$fieldname\", control = \"$control\", options = \"$options\", displayorder = \"$displayorder\", required = \"$required\" where sn = $sn";
	$u = mysqli_query($dbc,$sql);
	include("resorting.php");
}

header("location: indexindex.php?category_sn=$category_sn");
?>