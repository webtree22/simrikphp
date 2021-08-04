<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode = 4; 
include("../general_permission.php"); 
?>
<?php
$gallerysn = $_GET['gallerysn'];
$q=mysqli_query($dbc,"select * from gallery where sn = $gallerysn");
if(!$q) echo mysqli_error($dbc);
while($row = mysqli_fetch_array($q))
{
	$galleryname = $row['description'];
}
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

	
	$listaccount = mysqli_query($dbc,"select count(sn) as totalrec from gallerypics where gallerysn = $gallerysn");
	$row = mysqli_fetch_array($listaccount);
	$tdo=$row['totalrec'];
	$lastdo=$tdo+1;
	
	
	$sn = $_GET['sn'];	
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php'>Gallery / HPSlider &raquo; $galleryname</a> &raquo;  ADDING NEW RECORD...";
		$picpath = "";
		$caption = "";
		$display_order = $lastdo;
		$small_img = "<div style=\"padding-left: 15px; padding-right:15px\"><span class=\"glyphicon glyphicon-picture\" aria-hidden=\"true\"></span></div>";
	}
	else
	{
		$task="<a href='index.php'>Gallery / HPSlider &raquo; $galleryname</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from gallerypics where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$picpath=$row['picpath'];
			$display_order=$row['display_order'];
			$q1= mysqli_query($dbc, "select * from gallerypicsdata where gallerypicssn = $id and language = '$currentlanguage'");
			while($r1 = mysqli_fetch_array($q1))
			{
				$caption = $r1['caption'];
			}

			$pos = strpos($picpath, "/.thumbs/");
			// /maxvision/upload/.thumbs/images/July/16base.png		
			if ($pos === false) {
				//$p = 18;  //variable /maxvision/
				$p =  8; //web always
				$newpicpath = substr_replace($picpath, ".thumbs/",$p , 0);
			} else {
				$newpicpath = $picpath;
			}
			$small_img = "<img src='$newpicpath' height='30px'>";
		}		  
	}
	?>
    <script language="javascript">
	<!--
	function cAnds(s)
	{
		s.sBtn.disabled = true;
		s.sBtn.value = "Sending...";
		if(s.picpath.value=="")
		{
		alert("Please Select an Image.");
		s.sBtn.disabled = false;
		s.sBtn.value = "Save";
		s.picpath.focus();
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
	<form class="form-horizontal" action="savesave.php" method="post" enctype="multipart/form-data" onsubmit="return cAnds(this)">
      <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Select Image</label>
        <div class="col-sm-10">
          <script type="text/javascript">
			function openKCFinder(field) {
				window.KCFinder = {
					callBack: function(url) {
						field.value = url;
						window.KCFinder = null;
					}
				};
				window.open('../kcfinder/browse.php?type=images&dir=images/gallery', 'kcfinder_textbox',
					'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
					'resizable=1, scrollbars=0, width=800, height=600'
				);
			}
			</script>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" style="padding:0"><?php echo $small_img; ?></span>
              <input type="text" readonly="readonly" onclick="openKCFinder(this)" placeholder="Click here and select an image." style=" cursor:pointer" class="form-control" name="picpath" id="picpath" value="<?php echo $picpath; ?>" aria-describedby="basic-addon1" />
            </div>
        </div>
      </div>
      
     
      <div class="form-group">
        <label for="caption" class="col-sm-2 control-label">Caption</label>
        <div class="col-sm-10">
          <input type="text" id="caption" name="caption" value="<?php echo $caption; ?>" class="form-control" placeholder="Image Caption">
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
          <input type="hidden" name="gallerysn" value="<?php echo $gallerysn; ?>">
		  <input type="submit" value="Save" class="btn btn-primary" id="sBtn">
        </div>
      </div>
    </form>




</div> <!-- /container -->

<?php include("../footer.php"); ?>

