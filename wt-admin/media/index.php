<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=5; 
include("../general_permission.php"); 

$superroot = "../../upload/.thumbs/images";

if(!isset($_GET['root']))
{
	$root = "../../upload/.thumbs/images";
}
else
{
	$root = $_GET['root'];
}
$pre = "../../upload/.thumbs/";
$shortroot = str_replace($pre,"",$root);


?>
<div class="container">
	<h2>Media Images &raquo; <small style="color:#00CCFF"><?php echo $shortroot; ?></small></h2><br>
	<?php include("index_inside.php"); ?>
 </div>
 

</div> <!-- /container -->
<?php $bslity = "Show"; ?>
<?php include("../footer.php"); ?>

