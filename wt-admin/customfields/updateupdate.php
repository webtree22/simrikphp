<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=2; 
include("../general_permission.php"); 
?>
<script language="javascript">
<!--
function cAnds(s)
{
	s.sBtn.disabled = true;
	s.sBtn.value = "Sending...";
	if((s.control.value=="radio" || s.control.value=="select") && document.getElementById("options").value=="")
	{
	alert("Please supply Options, separated with comma.");
	s.sBtn.disabled = false;
	s.sBtn.value = "Save";
	document.getElementById("options").focus();
	return false;
	}
	else if(s.fieldname.value == "")
	{
	alert("Please type Filed Name");
	s.sBtn.disabled = false;
	s.sBtn.value = "Save";
	s.fieldname.focus();
	return false;
	}
	else
	{
	return true;
	}
}
-->
</script>

<div class="container">
	<?php
	function getPos($y)
	{
		$xt=$y."th";
		if(($y==1) or ($y==21) or ($y==31) or ($y==41) or ($y==51)) $xt=$y."st";
		if(($y==2) or ($y==22) or ($y==32) or ($y==42) or ($y==52)) $xt=$y."nd";
		if(($y==3) or ($y==23) or ($y==33) or ($y==43) or ($y==53)) $xt=$y."rd";
		return "$xt";
	}
	
	$sn=$_GET['sn'];
	$category_sn=$_GET['category_sn'];
	$q=mysqli_query($dbc,"select * from category where sn = $category_sn");
	while($row = mysqli_fetch_array($q))
	{
		$catname = $row['categoryname'];
	}
	
	$s = mysqli_query($dbc,"select count(sn) as tot from categoryfields where category_sn=$category_sn");
	$rs = mysqli_fetch_array($s);
	$tdo = $rs['tot'];
	$lastdo = $tdo + 1;	
			
	if($sn==0)
	{
		$id = 0;
		$task="<a href='indexindex.php?category_sn=$category_sn'>Category Fields - $catname</a> &raquo;  ADDING NEW RECORD...";
		$fieldname = "";
		$control = "text";
		$options = "";
		$display_order = $tdo + 1;
		$required = "No";
	}
	else
	{
		$task="<a href='indexindex.php?category_sn=$category_sn'>Category Fields - $catname</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from categoryfields where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$fieldname=$row['fieldname'];
			$control=$row['control'];
			$options=$row['options'];
			$display_order=$row['display_order'];
			$required=$row['required'];
		}		  
	}
	?>

	<h2><?php echo $task; ?></h3>
	<form class="form-horizontal" action="savesave.php" method="post" onsubmit="return cAnds(this)">
      <div class="form-group">
        <label for="fieldname" class="col-sm-2 control-label">Field Name</label>
        <div class="col-sm-10">
          <input type="text" id="fieldname" name="fieldname" value="<?php echo $fieldname; ?>" class="form-control">
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
            <option value="textarea" <?php if($control == "textarea") echo " selected"; ?>>Text Area (Full Editor)</option>
            <option value="textareaMini" <?php if($control == "textareaMini") echo " selected"; ?>>Text Area (Mini Editor)</option>
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
          <select id="display_order" name="display_order" class="form-control">
			  <?php for($i=1;$i<=$tdo;$i++)
				{
                echo"<option value='$i'";
				if($display_order==$i) echo" selected";
				echo">";
				$pos=getPos($i);
				echo"$pos</option>";
                } 
				
				?>
                <?php if($sn==0) { ?>
                <option value="<?php echo"$lastdo"; ?>" <?php if($display_order==$lastdo) echo" selected"; ?>>Last</option>
                <?php } ?>
				
              </select>
        </div>
      </div>      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="sn" value="<?php echo $sn; ?>">
          <input type="hidden" name="category_sn" value="<?php echo $category_sn; ?>">
		  <input type="submit" value="Save" id="sBtn" class="btn btn-primary">
        </div>
      </div>
    </form>




</div> <!-- /container -->

<?php include("../footer.php"); ?>

