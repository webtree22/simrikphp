<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=10; 
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

	
	$listaccount = mysqli_query($dbc,"select count(sn) as totalrec from social");
	$row = mysqli_fetch_array($listaccount);
	$tdo=$row['totalrec'];
	$lastdo=$tdo+1;
	
	
	$sn = $_GET['sn'];	
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php'>Social Links</a> &raquo;  ADDING NEW RECORD...";
		$service = "";
		$link = "";
		$display_order = $lastdo;
	}
	else
	{
		$task="<a href='index.php'>Social Links</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from social where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$service=$row['service'];
			$link=$row['link'];
			$display_order=$row['display_order'];
		}		  
	}
	?>


	<h2><?php echo $task; ?></h3>
    <br>
	<form class="form-horizontal" action="save.php" method="post">
      <div class="form-group">
        <label for="service" class="col-sm-2 control-label">Service Name</label>
        <div class="col-sm-10">
          <select name="service" id="service" class="form-control">
          	<option value="facebook" <?php if($service == "facebook") echo "selected"; ?>>Facebook</option>
            <option value="twitter" <?php if($service == "twitter") echo "selected"; ?>>Twitter</option>
            <option value="googleplus" <?php if($service == "googleplus") echo "selected"; ?>>Google +</option>
            <option value="youtube" <?php if($service == "youtube") echo "selected"; ?>>YouTube</option>
            <option value="linkedin" <?php if($service == "linkedin") echo "selected"; ?>>Linked In</option>
            <option value="pinterest" <?php if($service == "pinterest") echo "selected"; ?>>Pinterest</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="link" class="col-sm-2 control-label">Service Link</label>
        <div class="col-sm-10">
          <input type="text" id="link" name="link" value="<?php echo $link; ?>" class="form-control" placeholder="Just your ID, not complete URL. Eg: webtree22 (Not https://www.facebook.com/webtree22)" required>
        </div>
      </div>
      <?php if($sn == 0) { ?>
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
      <?php } ?>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="sn" value="<?php echo $sn; ?>">
		  <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
    </form>




</div> <!-- /container -->

<?php include("../footer.php"); ?>

