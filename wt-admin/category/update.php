<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=1; 
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
	
	$lang = $_SESSION['AdminLanguage'];
	$sn=$_GET['sn'];
	$subcategory_of = 0;
	$q=mysqli_query($dbc,"select subcategory_of from category where sn = $sn");
	while($row = mysqli_fetch_array($q))
	{
		$subcategory_of = $row['subcategory_of'];
	}
	
	$listaccount = mysqli_query($dbc,"select count(sn) as totalrec from category where language='$lang' and subcategory_of=$subcategory_of");
	$row = mysqli_fetch_array($listaccount);
	$tdo=$row['totalrec'];
	$lastdo=$tdo+1;
	
			
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php'>Categories</a> &raquo;  ADDING NEW RECORD...";
		$categoryname = "";
		$display_order = $lastdo;
		$slug = "";
		$subcatgory_of = 0;
		$show_content = "Yes";
	}
	else
	{
		$task="<a href='index.php'>Categories</a> &raquo;  UPDATING REOCORD...";
		
		$listaccount=mysqli_query($dbc,"select * from category where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$categoryname=$row['categoryname'];
			$display_order=$row['display_order'];
			$language=$row['language'];
			$slug=$row['slug'];
			$subcategory_of=$row['subcategory_of'];
			$show_content=$row['show_content'];
		}		  
	}
	?>

	<script>
	var slug = function(str) {
		var $slug = '';
		var trimmed = $.trim(str);
		$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
		replace(/-+/g, '-').
		replace(/^-|-$/g, '');
		return $slug.toLowerCase();
	}
	
	function slug_it(cat)
	{
		var $slug = '';
		var trimmed = $.trim(cat);
		$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
		replace(/-+/g, '-').
		replace(/^-|-$/g, '');
		//return $slug.toLowerCase();
		document.getElementById("slug").value = $slug.toLowerCase();
	}
	</script>
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
	function sendRequest(subcategory_of,old_so, old_do) {
		//alert(id); 
		http.open('get', 'getit.php?subcategory_of=' + encodeURIComponent(subcategory_of) + '&old_so=' + encodeURIComponent(old_so) + '&old_do=' + encodeURIComponent(old_do));
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
		var cat = document.getElementById("categoryname").value;
		var $slug = '';
		var trimmed = $.trim(cat);
		$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
		replace(/-+/g, '-').
		replace(/^-|-$/g, '');
		//return $slug.toLowerCase();
		document.getElementById("slug").value = $slug.toLowerCase();
		
		s.sBtn.disabled = true;
		s.sBtn.value = "Sending...";
		if(s.categoryname.value=="")
		{
		alert("Please supply Category Name.");
		s.sBtn.disabled = false;
		s.sBtn.value = "Save";
		s.categoryname.focus();
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
	<form class="form-horizontal" action="save.php" method="post" onsubmit="return cAnds(this)">
      <div class="form-group">
        <label for="categoryname" class="col-sm-2 control-label">Category Name</label>
        <div class="col-sm-10">
          <input type="text" id="categoryname" name="categoryname" value="<?php echo $categoryname; ?>" class="form-control" onBlur="slug_it(this.value)">
        </div>
      </div>
      <div class="form-group">
        <label for="slug" class="col-sm-2 control-label">Slug</label>
        <div class="col-sm-10">
          <input type="text" id="slug" name="slug" value="<?php echo $slug; ?>" class="form-control" tabindex="-1" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="subcategory_of" class="col-sm-2 control-label">Parent Cetegory</label>
        <div class="col-sm-10">
          <select name="subcategory_of" class="form-control" id="subcategory_of" onChange="sendRequest(this.value, <?php echo $subcategory_of; ?>, <?php echo $display_order; ?>)">
					<option value="0" <?php if($subcategory_of == 0) echo "selected"; ?>>None</option>
					<?php
					$listaccount=mysqli_query($dbc,"select * from category where sn<>$sn and subcategory_of=0 order by categoryname");
					while($row = mysqli_fetch_array($listaccount))
					{
						$s = "";
						if($subcategory_of == $row['sn']) $s = "selected";
					?>
					<option value="<?php echo $row['sn']; ?>" <?php echo $s; ?>><?php echo $row['categoryname']; ?></option>
					<?php } ?>
				</select>
        </div>
      </div>
      <div class="form-group">
        <label for="slug" class="col-sm-2 control-label">Order</label>
        <div class="col-sm-10" id="display_order">
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
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="sn" value="<?php echo $sn; ?>">
		  <input type="submit" value="Save" id="sBtn" class="btn btn-primary">
        </div>
      </div>
    </form>




</div> <!-- /container -->


<?php include("../footer.php"); ?>

