<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=1; 
include("../general_permission.php"); 
?>

<div class="container">
	<?php

	
	$lang = $_SESSION['AdminLanguage'];
	$sn=$_GET['sn'];


	
			
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php'>Forms</a> &raquo;  ADDING NEW RECORD...";
		$formname = "";
		$header = "";
		$footer ="";
	}
	else
	{
		$task="<a href='index.php'>Forms</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from forms where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$formname=$row['formname'];
			$header=$row['header'];
			$footer=$row['footer'];	
		}		  
	}
	?>

	<h2><?php echo $task; ?></h3>
	<form class="form-horizontal" action="save.php" method="post">
      <div class="form-group">
        <label for="formname" class="col-sm-2 control-label">Form Name</label>
        <div class="col-sm-10">
          <input type="text" id="formname" name="formname" value="<?php echo $formname; ?>" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="header" class="col-sm-2 control-label">Header Text</label>
        <div class="col-sm-10">
          <textarea class="form-control textarea" name="header" id="header" rows="15"><?php echo $header; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="footer" class="col-sm-2 control-label">Footer Text</label>
        <div class="col-sm-10">
          <textarea class="form-control textarea" name="footer" id="footer" rows="15"><?php echo $footer; ?></textarea>
        </div>
      </div>      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="sn" value="<?php echo $sn; ?>">
		  <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
    </form>




</div> <!-- /container -->
<?php include("../footer.php"); ?>

