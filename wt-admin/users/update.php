<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>

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


		
		

		
if($sn==0)
{
		$task=" ADDING NEW RECORD...";
	
		
		$first_name="";
		$last_name="";
		$email="";
		$pass="";
		$user_level=0;
		$active="Null";
		

		
		

}
else
{
		$task="UPDATING RECORD...";
	
	   	
	  	$listaccount=mysqli_query($dbc,"select * from users where user_id=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{

		$first_name=$row['first_name'];
		$last_name=$row['last_name'];
		$email=$row['email'];
		$pass=$row['pass'];
		$user_level=$row['user_level'];
		$active=$row['active'];


		 }

		  
}
?>
<h2 style="padding-left:25px"><a href="index.php">Users & Permission</a> &raquo; <?php echo $task; ?></h2>
<hr>
<form class="form-horizontal" action="save.php" method="post" onsubmit="return cAnds(this)">
  <div class="form-group">
    <label for="first_name" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="first_name" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email"  <?php if($sn>0) echo "readonly"; ?>>
    </div>
  </div>
  <?php if($sn==0) { ?>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass" id="password" placeholder="Password">
    </div>
  </div>
  <?php } ?> 
  <div class="form-group">
    <label for="userlevel" class="col-sm-2 control-label">User Level</label>
    <div class="col-sm-10">
     	<?php if($_SESSION['Role']==5) { ?>
        <select class="form-control" name="user_level">
        <option value="0" <?php if($user_level==1) echo " selected"; ?>>Site User</option>
        <option value="3" <?php if($user_level==3) echo " selected"; ?>>Administrator</option>
        <option value="5" <?php if($user_level==5) echo " selected"; ?>>Super User</option>
        </select>
        <?php }  else { ?>
        <input type="hidden" value="<?php echo $user_level; ?>" name="user_level" />   	
        <select class="form-control" name="xxx" disabled="disabled">
        <option value="0" <?php if($user_level==1) echo " selected"; ?>>Site User</option>
        <option value="3" <?php if($user_level==3) echo " selected"; ?>>Administrator</option>
        <option value="5" <?php if($user_level==5) echo " selected"; ?>>Super User</option>
        </select>
        <?php } ?>
    </div>
  </div> 
  <input type="hidden" name="sn" id="sn" value="<?php echo $sn; ?>" />
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="Submit" name="button" id="button" value="Submit" class="btn btn-primary" />
    </div>
  </div>
</form>
<hr>
<?php if($sn>0) { ?>
<form class="form-horizontal" action="changepassword.php" method="post">
  <div class="form-group">
  <em>Change Password</em>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pass" id="pass" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="conpass" id="conpass" placeholder="">
    </div>
  </div>
	<input type="hidden" name="sn" id="sn" value="<?php echo $sn; ?>" />
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="Submit" name="button" id="button" value="Submit" class="btn btn-primary" />
    </div>
  </div>
</form>

<?php } ?>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

