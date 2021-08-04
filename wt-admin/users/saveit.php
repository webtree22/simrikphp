<?php include "../base.php"; ?>
<?php 
$p=$_GET['p'];
$id=$_GET['id'];
$c=$_GET['c'];

if($p==0) 
{
$newp = 1;
$newptext = "<a href=\"javascript:void(0)\" onClick=\"sendRequest($newp,$id,$c)\"><span style=\"color:green; font-weight:bold\">Yes</span></a>";
}
else
{
$newp = 0;
$newptext = "<a href=\"javascript:void(0)\" onClick=\"sendRequest($newp,$id,$c)\"><span style=\"color:red; font-weight:bold\">No</span></a>";
}

$sql="update permissions set p=$newp where sn = $id";
$registerquery=mysqli_query($dbc,$sql);


echo $newptext . "~" . $c;
?>