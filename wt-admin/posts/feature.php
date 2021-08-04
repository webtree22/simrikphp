<?php include "../base.php"; ?>
<?php 
$p=$_GET['p'];
$id=$_GET['id'];
$c=$_GET['c'];

$err = "";

	
if($p==0) 
{
	$newp = 1;
	$newptext = "<a href=\"javascript:void(0)\" onClick=\"sendRequest($newp,$id,$c)\"><span style=\"color:green; font-weight:bold\">Yes</span></a>";
	//Resort
		$u = mysqli_query($dbc,"update featured set display_order = display_order+1");
	///
				
	$sql="insert into featured values($id, 1 , '$currentlanguage')";
	$registerquery=mysqli_query($dbc,$sql);
	if(!$registerquery) $err = mysqli_error($dbc);
	
}
else
{
	$newp = 0;
	$newptext = "<a href=\"javascript:void(0)\" onClick=\"sendRequest($newp,$id,$c)\"><span style=\"color:red; font-weight:bold\">No</span></a>";
	$sql="delete from featured where sn = $id";
	$registerquery=mysqli_query($dbc,$sql);
	if(!$registerquery) $err = mysqli_error($dbc);
	//Resort
	$i=0;
	$q=mysqli_query($dbc,"select sn from featured order by display_order");
	while($row = mysqli_fetch_array($q))
	{
		$i+=1;
		$idx = $row['sn'];
		$u = mysqli_query($dbc,"update featured set display_order = $i where sn = $idx");
	}
	///
}




echo $newptext . "~" . $c . "~" . $err . "~" . $id ;
?>