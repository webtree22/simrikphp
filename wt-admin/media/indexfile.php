<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=5; 
include("../general_permission.php"); 

$superroot = "../../upload/files";

if(!isset($_GET['root']))
{
	$root = "../../upload/files";
}
else
{
	$root = $_GET['root'];
}
$pre = "../../upload/";
$shortroot = str_replace($pre,"",$root);


?>
<div class="container">
	<h2>Media Images &raquo; <small style="color:#00CCFF"><?php echo $shortroot; ?></small></h2><br>
	<?php include("indexfile_inside.php"); ?>
 </div>
 

</div> <!-- /container -->

<?php include("../footer.php"); ?>

