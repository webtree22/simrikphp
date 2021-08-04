<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode = 7; 
include("../general_permission.php"); 
?>

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

	
	$listaccount = mysqli_query($dbc,"select count(sn) as totalrec from ads");
	$row = mysqli_fetch_array($listaccount);
	$tdo=$row['totalrec'];
	$lastdo=$tdo+1;
	$date_img = "<div style=\"padding-left: 15px; padding-right:15px\"><span class=\"glyphicon glyphicon-calendar\" aria-hidden=\"true\"></span></div>";
	
	$sn = $_GET['sn'];	
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php'>Ad Banners</a> &raquo;  ADDING NEW RECORD...";
		$description = "";
		$position = "";
		$start_date = "";
		$end_date = "";
		$adtext = "";
		$adpic = "";
		$link = "";
		$display_order = $lastdo;
		$small_img = "<div style=\"padding-left: 15px; padding-right:15px\"><span class=\"glyphicon glyphicon-picture\" aria-hidden=\"true\"></span></div>";
	}
	else
	{
		$task="<a href='index.php'>Gallery / HPSlider</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from ads where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$description = $row['description'];
			$position = $row['position'];
			$start_date = $row['start_date'];
			$end_date = $row['end_date'];
			$display_order = $row['display_order'];
			
			$q1= mysqli_query($dbc, "select * from adsdata where adssn = $id and language = '$currentlanguage'");
			while($r1 = mysqli_fetch_array($q1))
			{
				$adtext = $r1['adtext'];
				$adpic = $r1['adpic'];
				$link = $r1['link'];
			}
			$pos = strpos($adpic, "/.thumbs/");
			// /maxvision/upload/.thumbs/images/July/16base.png		
			if ($pos === false) {
				//$p = 18;  //variable /maxvision/
				$p =  8; //web always
				$newadpic = substr_replace($adpic, ".thumbs/",$p , 0);
			} else {
				$newadpic = $adpic;
			}
			$small_img = "<img src='$newadpic' height='30px'>";
			
		}		  
	}
	?>
	<script src="../ckeditor/ckeditor.js"></script>

    <script language="javascript">
	<!--
	function cAnds(s)
	{
		s.sBtn.disabled = true;
		s.sBtn.value = "Sending...";
		if(s.description.value=="")
		{
		alert("Please enter Description.");
		s.sBtn.disabled = false;
		s.sBtn.value = "Save";
		s.description.focus();
		return false;
		}
		else
		{
		return true;
		}
	}
	-->
	</script>
	<h2><?php echo $task; ?></h3>
    <br>
	<form class="form-horizontal" action="save.php" method="post" onsubmit="return cAnds(this)">
      <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Ad Description</label>
        <div class="col-sm-10">
          <input type="text" id="description" name="description" value="<?php echo $description; ?>" class="form-control" placeholder="Description of the Ad Banner (Not displayed in Site)">
        </div>
      </div>
      <div class="form-group">
        <label for="position" class="col-sm-2 control-label">Position</label>
        <div class="col-sm-10">
          <select id="position" name="position" class="form-control">
           <?php
				$positions_help = explode(",", $set_adpositions_help);
				$positions = explode(",", $set_adpositions);
				$c = sizeof($positions);
				for($i=0; $i<$c; $i++) {
				$s = "";
				if($position == trim($positions[$i])) $s = "selected";
				?>
				<option value="<?php echo trim($positions[$i]); ?>" <?php echo $s; ?>><?php echo trim($positions[$i]); ?> <?php echo trim($positions_help[$i]); ?></option>
			<?php 
			} ?>
           	</select>
        </div>
      </div>
      <div class="form-group">
        <label for="start_date" class="col-sm-2 control-label">From</label>
        <div class="col-sm-10">
          <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" style="padding:0"><?php echo $date_img; ?></span>
              <input type="text" id="start_date" name="start_date" value="<?php echo $start_date; ?>" class="form-control" readonly>
            </div>
        </div>
      </div>
      
      <div class="form-group">
        <label for="end_date" class="col-sm-2 control-label">Until</label>
        <div class="col-sm-10">
        	<div class="input-group">
              <span class="input-group-addon" id="basic-addon1" style="padding:0"><?php echo $date_img; ?></span>
              <input type="text" id="end_date" name="end_date" value="<?php echo $end_date; ?>" class="form-control" readonly>
            </div>
          
        </div>
      </div>
     
      <div class="form-group">
        <label for="adpic" class="col-sm-2 control-label">Ad Banner</label>
        <div class="col-sm-10">
          <script type="text/javascript">
			function openKCFinder(field) {
				window.KCFinder = {
					callBack: function(url) {
						field.value = url;
						window.KCFinder = null;
					}
				};
				window.open('../kcfinder/browse.php?type=images&dir=images/adbanners', 'kcfinder_textbox',
					'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
					'resizable=1, scrollbars=0, width=800, height=600'
				);
			}
			</script>
          <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" style="padding:0"><?php echo $small_img; ?></span>
              <input type="text" readonly="readonly" onclick="openKCFinder(this)" style="cursor:pointer" class="form-control" name="adpic" id="adpic" value="<?php echo $adpic; ?>" aria-describedby="basic-addon1" />
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="link" class="col-sm-2 control-label">Link</label>
        <div class="col-sm-10">
          <input type="text" id="link" name="link" value="<?php echo $link; ?>" class="form-control" placeholder="Start with http://">
        </div>
      </div>
      <div class="form-group">
            <label for="adtext" class="col-sm-2 control-label">Ad Text</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="adtext" id="adtext"><?php echo $adtext; ?></textarea>
            <script>
			CKEDITOR.replace( 'adtext', {
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
            <small>Only if Ad Banner is not available</small>
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
		  <input type="submit" value="Save" class="btn btn-primary" id="sBtn">
        </div>
      </div>
    </form>
	
	


</div> <!-- /container -->
<?php $bsdp = "Show"; ?>
<?php include("../footer.php"); ?>

