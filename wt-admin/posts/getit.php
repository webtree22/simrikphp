<?php include "../base.php"; ?>
<?php 
$pagecode=3; 
include("../general_permission.php"); 
?>
<?php 
function getPos($y)
{
$xt=$y."th";
if(($y==1) or ($y==21) or ($y==31) or ($y==41) or ($y==51)) $xt=$y."st";
if(($y==2) or ($y==22) or ($y==32) or ($y==42) or ($y==52)) $xt=$y."nd";
if(($y==3) or ($y==23) or ($y==33) or ($y==43) or ($y==53)) $xt=$y."rd";
return "$xt";
}


$category_sn=$_GET['category_sn'];
$old_csn=$_GET['old_csn'];
$old_do=$_GET['old_do'];

if($category_sn == $old_csn)
{
	$cdo = $old_do;
}
else
{
	$q = mysqli_query($dbc, "select sn from posts where category_sn = $category_sn");
	$n = mysqli_num_rows($q);
	$n = $n+1;
	$cdo = $n;
}

$q=mysqli_query($dbc,"select count(sn) as totalrec from posts where category_sn = $category_sn");
$row = mysqli_fetch_array($q);
$tdo=$row['totalrec'];
$lastdo=$tdo+1;		
$out_do="";
$out_do.="<select id=\"display_order\" name=\"display_order\" class=\"form-control\">";
			   for($i=1;$i<=$tdo;$i++)
				{
                $out_do.="<option value='$i'";
				$out_do.=">";
				$pos=getPos($i);
				$out_do.="$pos</option>";
                }
			$s= ""; 
$out_do.="<option value=\"$lastdo\">Last</option></select>";
echo $out_do;
?>