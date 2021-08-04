<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode = 4; 
include("../general_permission.php"); 
?>
<script language="javascript">
	<!--
	function cAnds(s)
	{
		
		
		s.sBtn.disabled = true;
		s.sBtn.value = "Sending...";
		if(s.description.value=="")
		{
		alert("Please supply gallery description.");
		s.sBtn.disabled = false;
		s.sBtn.value = "Save";
		s.title.focus();
		return false;
		}
		else if(s.title.value=="")
		{
		alert("Please supply gallery title.");
		s.sBtn.disabled = false;
		s.sBtn.value = "Save";
		s.title.focus();
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

	
	$listaccount = mysqli_query($dbc,"select count(sn) as totalrec from gallery");
	$row = mysqli_fetch_array($listaccount);
	$tdo=$row['totalrec'];
	$lastdo=$tdo+1;
	
	
	$sn = $_GET['sn'];	
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php'>Gallery / HPSlider</a> &raquo;  ADDING NEW RECORD...";
		$description = "";
		$title = "";
		$hppics = "No";
		$content = "";
		$display_order = $lastdo;
	}
	else
	{
		$task="<a href='index.php'>Gallery / HPSlider</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from gallery where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$description=$row['description'];
			$hppics=$row['hppics'];
			$display_order=$row['display_order'];
			$q1= mysqli_query($dbc, "select * from gallerydata where gallerysn = $id and language = '$currentlanguage'");
			while($r1 = mysqli_fetch_array($q1))
			{
				$title = $r1['title'];
				$content = $r1['content'];
			}
		}		  
	}
	?>
	<script src="../ckeditor/ckeditor.js"></script>

	<h2><?php echo $task; ?></h3>
    <br>
	<form class="form-horizontal" action="save.php" method="post" onsubmit="return cAnds(this)">
      <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Gallery Description</label>
        <div class="col-sm-10">
          <input type="text" id="description" name="description" value="<?php echo $description; ?>" class="form-control" placeholder="Description of the Gallery (Not displayed in Site)">
        </div>
      </div>
      
     
      <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
          <input type="text" id="title" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title of Gallery">
        </div>
      </div>
      <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Content</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="content" id="content"><?php echo $content; ?></textarea>
            <script>
			CKEDITOR.replace( 'content', {
				// Define the toolbar groups as it is a more accessible solution.
				toolbarGroups: [
					{"name":"basicstyles","groups":["basicstyles"]},
					{"name":"links","groups":["links"]},
					{"name":"document","groups":["mode"]}
				],
				// Remove the redundant buttons from toolbar groups defined above.
				removeButtons: 'Save,Language,Anchor,Styles'
			} );
			</script>
            </div>
        </div>
        
      <div class="form-group">
        <label for="hppics" class="col-sm-2 control-label">HP Slider ?</label>
        <div class="col-sm-10">
          <select name="hppics" id="hppics" class="form-control">
          	<option value="Yes" <?php if($hppics == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if($hppics == "No") echo "selected"; ?>>No</option>
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <label for="link" class="col-sm-2 control-label">Order</label>
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
		  <input type="submit" value="Save" id="sBtn" class="btn btn-primary">
        </div>
      </div>
    </form>




</div> <!-- /container -->

<?php include("../footer.php"); ?>

