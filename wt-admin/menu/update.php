<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=12; 
include("../general_permission.php"); 
?>

<div class="container">

	<?php

	$menu = $_GET['menu'];
	function getPos($y)
	{
		$xt=$y."th";
		if(($y==1) or ($y==21) or ($y==31) or ($y==41) or ($y==51)) $xt=$y."st";
		if(($y==2) or ($y==22) or ($y==32) or ($y==42) or ($y==52)) $xt=$y."nd";
		if(($y==3) or ($y==23) or ($y==33) or ($y==43) or ($y==53)) $xt=$y."rd";
		return "$xt";
	}
	

	$sn=$_GET['sn'];
	$submenu_of = 0;
	$q=mysqli_query($dbc,"select submenu_of from menu where sn = $sn");
	while($row = mysqli_fetch_array($q))
	{
		$submenu_of = $row['submenu_of'];
	}
	
	$listaccount = mysqli_query($dbc,"select count(sn) as totalrec from menu where language='$currentlanguage' and submenu_of=$submenu_of");
	$row = mysqli_fetch_array($listaccount);
	$tdo=$row['totalrec'];
	$lastdo=$tdo+1;
	
			
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php?menu=$menu'>Menus &raquo; $menu</a> &raquo;  ADDING NEW RECORD...";
		$title = "";
		$link = "";
		$submenu_of = 0;
		$display_order = $lastdo;
		$menutype = "link";
		$mid = "0";

	}
	else
	{
		$task="<a href='index.php?menu=$menu'>Menus &raquo; $menu</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from menu where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$title=$row['title'];
			$link=$row['link'];
			$display_order=$row['display_order'];
			$submenu_of=$row['submenu_of'];
			$menu=$row['menu'];
			$menutype=$row['menutype'];
			$mid=$row['mid'];

		}		  
	}
	?>


    <script type="text/javascript" language="javascript">
	// <![CDATA[
	
	// Need to make an object of XMLHttpRequest Type.
	function createRequestObject() {
		var ro;
		if (navigator.appName == "Microsoft Internet Explorer") {
			ro = new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			ro = new XMLHttpRequest();
		}
		return ro;
	}
	var http = createRequestObject();
	
	// Function that calls the PHP script:
	function sendRequest(submenu_of,old_so, old_do) {
		//alert(id); 
		http.open('get', 'getit.php?submenu_of=' + encodeURIComponent(submenu_of) + '&old_so=' + encodeURIComponent(old_so) + '&old_do=' + encodeURIComponent(old_do));
		http.onreadystatechange = handleResponse;
		http.send(null);
	
	}
	
	String.prototype.trim = function () {
		return this.replace(/^\s*/, "").replace(/\s*$/, "");
	}
	
	
	
	
	// Function handles the response from the PHP script.
	function handleResponse() {
		// If everything's okay:
		if(http.readyState == 4){
			// Assign the returned value to the document object.
			var longstring=http.responseText;
			longstring=longstring.trim();
			//alert(longstring);
			document.getElementById("display_order").innerHTML = longstring;
			
			//setTimeout(function(){
			  //     window.location.reload();
			//}, 1000); 
		}
	}
	// ]]>
	</script>
    <script language="javascript">
	<!--
	function cAnds(s)
	{
		s.sBtn.disabled = true;
		s.sBtn.value = "Sending...";
		if(s.title.value=="")
		{
		alert("Please supply Menu Title.");
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
	<h2><?php echo $task; ?></h3><br>
    <div class="row">
    	<div class="col-md-5"><?php include("accordian.php"); ?></div>
        <div class="col-md-7">
            <form class="form-horizontal" action="save.php" method="post" onsubmit="return cAnds(this)">
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Menu Title</label>
                <div class="col-sm-9">
                  <input type="text" id="title" name="title" value="<?php echo $title; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="link" class="col-sm-3 control-label">Link</label>
                <div class="col-sm-9">
                  <input type="text" id="link" name="link" value="<?php echo $link; ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="submenu_of" class="col-sm-3 control-label">Sub Menu Of</label>
                <div class="col-sm-9">
                  <select name="submenu_of" class="form-control" id="submenu_of" onChange="sendRequest(this.value, <?php echo $submenu_of; ?>, <?php echo $display_order; ?>)" size="10">
                            <option value="0" <?php if($submenu_of == 0) echo "selected"; ?>>None</option>
                            <?php
                            $listaccount=mysqli_query($dbc,"select * from menu where sn<>$sn and submenu_of=0 and language='$currentlanguage' order by title");
                            while($row = mysqli_fetch_array($listaccount))
                            {
                                $s = "";
                                if($submenu_of == $row['sn']) $s = "selected";
								$menuid = $row['sn'];
                            ?>
                            <option value="<?php echo $row['sn']; ?>" <?php echo $s; ?>><?php echo $row['title']; ?></option>
                            <?php 
								$q=mysqli_query($dbc,"select * from menu where sn<>$sn and submenu_of=$menuid and language='$currentlanguage' order by title");
								while($r = mysqli_fetch_array($q))
								{
									$s = "";
									if($submenu_of == $r['sn']) $s = "selected";
								?>
								<option value="<?php echo $r['sn']; ?>" <?php echo $s; ?>>--<?php echo $r['title']; ?></option>
								<?php 
								}
							} ?>
                        </select>
                </div>
              </div>
              <div class="form-group">
                <label for="slug" class="col-sm-3 control-label">Order</label>
                <div class="col-sm-9" id="display_order">
                  <select name="display_order" class="form-control">
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
              <input type="hidden" name="menutype" id="menutype" value="<?php echo $menutype; ?>">
              <input type="hidden" name="mid" id="mid" value="<?php echo $mid; ?>">
              <input type="hidden" name="menu" id="menu" value="<?php echo $menu; ?>">
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <input type="hidden" name="sn" value="<?php echo $sn; ?>">
                  <input type="submit" value="Save" id="sBtn" class="btn btn-primary">
                </div>
              </div>
            </form>
        </div>
    </div>




</div> <!-- /container -->


<?php include("../footer.php"); ?>

