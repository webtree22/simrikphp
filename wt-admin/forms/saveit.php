<?php include "../base.php"; ?>
<?php 
$o=$_GET['o'];
$id=$_GET['id'];




$sql="update formsdetail set displayorder=$o where sn = $id";
$registerquery=mysqli_query($dbc,$sql);


echo "$o";
?>