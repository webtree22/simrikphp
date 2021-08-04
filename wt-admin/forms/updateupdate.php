<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=1; 
include("../general_permission.php"); 
?>

<div class="container">
	<?php

	$sn=$_GET['sn'];
	$formsn=$_GET['formsn'];
	$q=mysqli_query($dbc,"select * from forms where sn = $formsn");
	while($row = mysqli_fetch_array($q))
	{
		$formname = $row['formname'];
	}
	
	$s = mysqli_query($dbc,"select count(sn) as tot from formsdetail where formsn=$formsn");
	$rs = mysqli_fetch_array($s);
	$nooffields = $rs['tot'];	
			
	if($sn==0)
	{
		$id = 0;
		$task="<a href='indexindex.php?formsn=$formsn'>Form Fields - $formname</a> &raquo;  ADDING NEW RECORD...";
		$fieldname = "";
		$control = "text";
		$options = "";
		$displayorder = $nooffields + 1;
		$required = "No";
	}
	else
	{
		$task="<a href='indexindex.php?formsn=$formsn'>Form Fields - $formname</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from formsdetail where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$fieldname=$row['fieldname'];
			$control=$row['control'];
			$options=$row['options'];
			$displayorder=$row['displayorder'];
			$required=$row['required'];
		}		  
	}
	?>

	<h2><?php echo $task; ?></h3>
	<form class="form-horizontal" action="savesave.php" method="post">
      <div class="form-group">
        <label for="fieldname" class="col-sm-2 control-label">Field Name</label>
        <div class="col-sm-10">
          <input type="text" id="fieldname" name="fieldname" value="<?php echo $fieldname; ?>" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="required" class="col-sm-2 control-label">Required</label>
        <div class="col-sm-10">
          <select name="required" id="required" class="form-control">
          	<option value="required" <?php if($required == "required") echo " selected"; ?>>Yes</option>
            <option value="" <?php if($required == "") echo " selected"; ?>>No</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="control" class="col-sm-2 control-label">Control Type</label>
        <div class="col-sm-10">
          <select name="control" id="control" class="form-control">
          	<option value="text" <?php if($control == "text") echo " selected"; ?>>Text Box</option>
            <option value="email" <?php if($control == "email") echo " selected"; ?>>Text Box (Email)</option>
            <option value="radio" <?php if($control == "radio") echo " selected"; ?>>Radio Buttons</option>
            <option value="select" <?php if($control == "select") echo " selected"; ?>>Select Options</option>
            <option value="textarea" <?php if($control == "textarea") echo " selected"; ?>>Text Area</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="options" class="col-sm-2 control-label">Options (Select / Radio)</label>
        <div class="col-sm-10">
          <input type="text" id="options" name="options" value="<?php echo $options; ?>" class="form-control" placeholder="Only applicable for Select / Radio, Eg: Male, Female">
        </div>
      </div>
      <div class="form-group">
        <label for="displayorder" class="col-sm-2 control-label">Order</label>
        <div class="col-sm-10">
          <input type="text" id="displayorder" name="displayorder" value="<?php echo $displayorder; ?>" class="form-control">
        </div>
      </div>      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="sn" value="<?php echo $sn; ?>">
          <input type="hidden" name="formsn" value="<?php echo $formsn; ?>">
		  <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
    </form>




</div> <!-- /container -->

<?php include("../footer.php"); ?>

