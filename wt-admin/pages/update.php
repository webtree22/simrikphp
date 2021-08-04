<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=11; 
include("../general_permission.php"); 
?>
<?php

$sn = $_GET['sn'];

?>


<div class="container">
<?php
	
	
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php'>Pages</a> &raquo;  ADDING...";
		$author = $_SESSION['UserId'];
		$title = "";
		$content = "";
		$excerpt = "";
		$post_status = "Published";
		$slug = "";
		$accesslevel = "Public";
		$password = "";
	}
	else
	{
		$task="<a href='index.php'>Pages</a> &raquo;  UPDATING...";
		
		$listaccount=mysqli_query($dbc,"select * from pages where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$author=$row['author'];
			$post_date=$row['post_date'];
			$title=$row['title'];
			$content=$row['content'];
			$excerpt=$row['excerpt'];
			$post_status=$row['post_status'];
			$slug=$row['slug'];
			$accesslevel=$row['accesslevel'];
			$password=$row['password'];		
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
	function sendRequest(category_sn,old_csn, old_do) {
		//alert(id); 
		http.open('get', 'getit.php?category_sn=' + encodeURIComponent(category_sn) + '&old_csn=' + encodeURIComponent(old_csn) + '&old_do=' + encodeURIComponent(old_do));
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
			alert(longstring);
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
		var cat = document.getElementById("title").value;
		var $slug = '';
		var trimmed = $.trim(cat);
		$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
		replace(/-+/g, '-').
		replace(/^-|-$/g, '');
		//return $slug.toLowerCase();
		document.getElementById("slug").value = $slug.toLowerCase();
		
		s.sBtn.disabled = true;
		s.sBtn.value = "Sending...";
		if(s.title.value=="")
		{
		alert("Please supply Category Name.");
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
	<h2><?php echo $task; ?></h3>
    <br>
	<form class="form-horizontal" action="save.php" method="post" onsubmit="return cAnds(this)">
	<div class="row">
    	<div class="col-md-9">
        	<?php include("update_left.php"); ?>
        </div>
        <div class="col-md-3" style="background-color: #efefef">
        	<br>
	        <?php include("update_right.php"); ?>
        </div>
    </div>
    </form>




</div> <!-- /container -->
<script>
	function pwd(pass)
	{
		
		if(pass == "Protected")
		{
			document.getElementById("password").disabled = false;
			document.getElementById("password").focus();
		}
		else
		{
			document.getElementById("password").disabled = true;
		}
	}
</script>
<?php include("../footer.php"); ?>

