<?php include "../base.php"; ?>
<?php
$pagecode=7; 
include("../general_permission.php"); 
?>
<?php 
$sn=$_POST['sn'];
$description=$_POST['description'];
$position=$_POST['position'];
$display_order=$_POST['display_order'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];

$adtext = "";
if(isset($_POST['adtext'])) $excerpt = $_POST['adtext'];
if ( get_magic_quotes_gpc() )
$adtext = htmlspecialchars( stripslashes( $adtext ) ) ;
else
$adtext = htmlspecialchars( $adtext ) ;

$adpic=$_POST['adpic'];
$link=$_POST['link'];


//old values
	$sql="select display_order from ads where sn=$sn";
	$result=mysqli_query($dbc,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$old_do = $row['display_order'];

	}
	//

if($sn == 0)
{
	$sql = "insert into ads(description, position, display_order, start_date, end_date)
	values( \"$description\", \"$position\", -9 , \"$start_date\", \"$end_date\" )";
	$result=mysqli_query($dbc,$sql);
	$sn = mysqli_insert_id($dbc);
	
	$sql="update ads set display_order = display_order+1 where display_order >= $display_order";
	$result=mysqli_query($dbc,$sql);
	

	$sql="update ads set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}
else
{
	$sql = "update ads set  description = \"$description\", position = \"$position\", 
	start_date = \"$start_date\", end_date = \"$end_date\" where sn = $sn";
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
		$sql = "select sn from adsdata where language = '$cl' and adssn = $sn";
		//echo $sql . "<hr>";
		$check = mysqli_query($dbc, $sql);
		$checknum = mysqli_num_rows($check);
		if($checknum == 0)
		{
			$ins = mysqli_query($dbc, "insert into adsdata(adssn, adtext, adpic, link,language) values(\"$sn\", \"\",
			\"\", \"\", \"$cl\")");
			if(!$ins) echo mysqli_error($dbc);
		}
		$delwhere .= "'" . trim($languages[$i]) . "',";
	}
	$delwhere = trim($delwhere);
	$delwhere = substr($delwhere,0,strlen($delwhere)-1);
	$sql = "delete from adsdata where adssn = $sn and language not in($delwhere)";
	//echo $sql;
	$d = mysqli_query($dbc, $sql);
	//now update for currentlanguage
	$u = mysqli_query($dbc, "update adsdata set adtext = \"$adtext\", adpic = \"$adpic\" , link = \"$link\" 
	where language = '$currentlanguage' and adssn = $sn");
	


header("location: index.php?dw=$delwhere");

?>