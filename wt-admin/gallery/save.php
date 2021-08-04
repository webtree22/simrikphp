<?php include "../base.php"; ?>
<?php
$pagecode=4; 
include("../general_permission.php"); 
?>
<?php 
$sn=$_POST['sn'];
$description=$_POST['description'];
$hppics=$_POST['hppics'];
$display_order=$_POST['display_order'];
$title=$_POST['title'];

$content = "";
if(isset($_POST['content'])) $content = $_POST['content'];
if ( get_magic_quotes_gpc() )
$content = htmlspecialchars( stripslashes( $content ) ) ;
else
$content = htmlspecialchars( $content ) ;



//old values
	$sql="select display_order from gallery where sn=$sn";
	$result=mysqli_query($dbc,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$old_do = $row['display_order'];

	}
	//

if($sn == 0)
{
	$sql = "insert into gallery(description, hppics, display_order)
	values( \"$description\", \"$hppics\", -9)";
	$result=mysqli_query($dbc,$sql);
	$sn = mysqli_insert_id($dbc);
	
	$sql="update gallery set display_order = display_order+1 where display_order >= $display_order";
	$result=mysqli_query($dbc,$sql);
	

	$sql="update gallery set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}
else
{
	$sql = "update gallery set  description = \"$description\", hppics = \"$hppics\" where sn = $sn";
	$result=mysqli_query($dbc,$sql);
	include("resorting.php");
}

	//check & populate or delete records in gallerydata table for the all languages
	$languages = explode(",", $set_sitelanguages);
	$c = sizeof($languages);
	$delwhere = "";
	for($i=0; $i<$c; $i++) 
	{
		$cl = trim($languages[$i]);
		$sql = "select sn from gallerydata where language = '$cl' and gallerysn = $sn";
		//echo $sql . "<hr>";
		$check = mysqli_query($dbc, $sql);
		$checknum = mysqli_num_rows($check);
		if($checknum == 0)
		{
			$ins = mysqli_query($dbc, "insert into gallerydata(gallerysn,title,content,language) values(\"$sn\", \"\",
			\"\", \"$cl\")");
			if(!$ins) echo mysqli_error($dbc);
		}
		$delwhere .= "'" . trim($languages[$i]) . "',";
	}
	$delwhere = trim($delwhere);
	$delwhere = substr($delwhere,0,strlen($delwhere)-1);
	$sql = "delete from gallerydata where gallerysn = $sn and language not in($delwhere)";
	//echo $sql;
	$d = mysqli_query($dbc, $sql);
	//now update for currentlanguage
	$u = mysqli_query($dbc, "update gallerydata set title = \"$title\", content = \"$content\" 
	where language = '$currentlanguage' and gallerysn = $sn");
	
	
	//lastly set only one gallery
	if($hppics == "Yes") {
	$u = mysqli_query($dbc, "update gallery set hppics = 'No' where sn<>$sn");
	}


header("location: index.php?dw=$delwhere");

/*
kam banki
1. display_order automization
*/
?>