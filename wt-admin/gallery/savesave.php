<?php include "../base.php"; ?>
<?php
$pagecode=4; 
include("../general_permission.php"); 
?>
<?php 
$sn=$_POST['sn'];
$gallerysn=$_POST['gallerysn'];
$picpath=$_POST['picpath'];
$caption=$_POST['caption'];
$display_order=$_POST['display_order'];




//old values
$sql="select display_order from gallerypics where sn=$sn";
$result=mysqli_query($dbc,$sql);
while($row=mysqli_fetch_array($result))
{
$old_do = $row['display_order'];
}
//

if($sn == 0)
{
	$sql = "insert into gallerypics(gallerysn, picpath, display_order)
	values( \"$gallerysn\",\"$picpath\", -9)";
	$result=mysqli_query($dbc,$sql);
	$sn = mysqli_insert_id($dbc);
	
	$sql="update gallerypics set display_order = display_order+1 where display_order >= $display_order";
	$result=mysqli_query($dbc,$sql);
	

	$sql="update gallerypics set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}
else
{
	$sql = "update gallerypics set  picpath = \"$picpath\" where sn = $sn";
	$result=mysqli_query($dbc,$sql);
	include("resortingresorting.php");
}

	//check & populate or delete records in gallerydata table for the all languages
	$languages = explode(",", $set_sitelanguages);
	$c = sizeof($languages);
	$delwhere = "";
	for($i=0; $i<$c; $i++) 
	{
		$cl = trim($languages[$i]);
		$sql = "select sn from gallerypicsdata where language = '$cl' and gallerypicssn = $sn";
		//echo $sql . "<hr>";
		$check = mysqli_query($dbc, $sql);
		$checknum = mysqli_num_rows($check);
		if($checknum == 0)
		{
			$ins = mysqli_query($dbc, "insert into gallerypicsdata(gallerypicssn,caption,language) values(\"$sn\", \"\",
			\"$cl\")");
			if(!$ins) echo "<hr>" . mysqli_error($dbc);
		}
		$delwhere .= "'" . trim($languages[$i]) . "',";
	}
	$delwhere = trim($delwhere);
	$delwhere = substr($delwhere,0,strlen($delwhere)-1);
	$sql = "delete from gallerypicsdata where gallerypicssn = $sn and language not in($delwhere)";
	//echo $sql;
	$d = mysqli_query($dbc, $sql);
	//now update for currentlanguage
	$u = mysqli_query($dbc, "update gallerypicsdata set caption = \"$caption\" where language = '$currentlanguage' 
	and gallerypicssn = $sn");
	


header("location: indexindex.php?gallerysn=$gallerysn");

/*
kam banki
1. display_order automization
*/
?>