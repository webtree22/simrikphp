<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=6; 
include("../general_permission.php"); 
?>
<?php
		$listaccount=mysqli_query($dbc,"select * from settings limit 1");
		$numrow=mysqli_num_rows($listaccount);
		if($numrow==0)
		{
		$result=mysqli_query($dbc,"insert into settings(hitcount) values(1)");
		}
		

	   	
	  	$listaccount=mysqli_query($dbc,"select * from settings limit 1");
		while($row = mysqli_fetch_array($listaccount))
		{
			$hitcount=$row['hitcount'];
			$showhitcount=$row['showhitcount'];
			$postperpage=$row['postperpage'];
			$hptitle=$row['hptitle'];
			
			$companyname=$row['companyname'];
			$address=$row['address'];
			$city=$row['city'];
			$country=$row['country'];
			$phone=$row['phone'];
			$fax=$row['fax'];
			$email=$row['email'];
			$feedbackemail=$row['feedbackemail'];
			$lastupdated = $row['lastupdated'];
			
    }


?>
<div class="container">

	<h2>General Settings</h3><br>
    <?php if(isset($_GET['s'])) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Saved!</strong> Settings have been saved..
    </div>
    <?php } ?>
	<form class="form-horizontal" action="save.php" method="post">
      <div class="form-group">
        <label for="hptitle" class="col-sm-2 control-label">Home Page Title</label>
        <div class="col-sm-10">
          <input type="text" id="hptitle" name="hptitle" value="<?php echo $hptitle; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="postperpage" class="col-sm-2 control-label">Post Per Page (Category Listing)</label>
        <div class="col-sm-10">
          <input type="text" id="postperpage" name="postperpage" value="<?php echo $postperpage; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="showhitcount" class="col-sm-2 control-label">Show Hit Count(1=Yes,0=No)</label>
        <div class="col-sm-10">
          <input type="text" id="showhitcount" name="showhitcount" value="<?php echo $showhitcount; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="hitcount" class="col-sm-2 control-label">Hit Count</label>
        <div class="col-sm-10">
          <input type="text" id="hitcount" name="hitcount" value="<?php echo $hitcount; ?>" class="form-control">
        </div>
      </div>
		<hr>
      <div class="form-group">
        <label for="companyname" class="col-sm-2 control-label">Company Name</label>
        <div class="col-sm-10">
          <input type="text" id="companyname" name="companyname" value="<?php echo $companyname; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <input type="text" id="address" name="address" value="<?php echo $address; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="city" class="col-sm-2 control-label">City</label>
        <div class="col-sm-10">
          <input type="text" id="city" name="city" value="<?php echo $city; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="country" class="col-sm-2 control-label">Country</label>
        <div class="col-sm-10">
          <input type="text" id="country" name="country" value="<?php echo $country; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="fax" class="col-sm-2 control-label">Fax</label>
        <div class="col-sm-10">
          <input type="text" id="fax" name="fax" value="<?php echo $fax; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" id="email" name="email" value="<?php echo $email; ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="feedbackemail" class="col-sm-2 control-label">Feedback Email</label>
        <div class="col-sm-10">
          <input type="text" id="feedbackemail" name="feedbackemail" value="<?php echo $feedbackemail; ?>" class="form-control">
        </div>
      </div>
      
      <div class="form-group">
        <label for="lastupdated" class="col-sm-2 control-label">Last Updated</label>
        <div class="col-sm-10">
          <input type="text" id="lastupdated" name="lastupdated" value="<?php echo $lastupdated; ?>" class="form-control">
        </div>
      </div>
      
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-primary" value="Save Settings">
        </div>
      </div>
    </form>




</div> <!-- /container -->

<?php include("../footer.php"); ?>
