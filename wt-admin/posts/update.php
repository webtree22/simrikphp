<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=3; 
include("../general_permission.php"); 
?>
<?php
$category_sn = $_GET['category_sn'];
$sn = $_GET['sn'];

$catname = "Uncategorized";
$subcategory_of = 0;
$q=mysqli_query($dbc,"select * from category where sn = $category_sn");
while($row = mysqli_fetch_array($q))
{
	$catname = $row['categoryname'];
	$subcategory_of = $row['subcategory_of'];
	$show_content = $row['show_content'];
}

$master_catname = "";
$q=mysqli_query($dbc,"select * from category where sn = $subcategory_of");
while($row = mysqli_fetch_array($q))
{
	$master_catname = $row['categoryname'];
}
if($master_catname != "")
{
	$catname = "Posts - " . $master_catname . " &raquo; " . $catname;
	
}

if($show_content == "Yes")
{
	$show_excerpt = "Yes";
}
else
{
	$show_excerpt = "No";
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
	
	
	$listaccount = mysqli_query($dbc,"select count(posts.sn) as totalrec from posts inner join category 
	on posts.category_sn = category.sn where category_sn='$category_sn' and language = '$currentlanguage'");
	$row = mysqli_fetch_array($listaccount);
	$tdo=$row['totalrec'];
	$lastdo=$tdo+1;
	
	
	if($sn==0)
	{
		$id = 0;
		$task="<a href='index.php?category_sn=$category_sn'>$catname</a> &raquo;  ADDING...";
		$author = $_SESSION['UserId'];
		$title = "";
		$content = "";
		$excerpt = "";
		$post_status = "Published";
		$comment_status = "Allow";
		$category_sn = $category_sn; 
		$slug = "";
		$display_order = 1; //new post on top ($lastdo);
		$accesslevel = "Public";
		$password = "";
		$featured_image = "";
		$featured_image_img = "&nbsp;";
		$gallery_sn = 0;
		
	}
	else
	{
		$task="<a href='index.php?category_sn=$category_sn'>$catname</a> &raquo;  UPDATING...";
		
		$listaccount=mysqli_query($dbc,"select * from posts where sn=$sn");
		while($row = mysqli_fetch_array($listaccount))
		{
			$id = $row['sn'];
			$author=$row['author'];
			$post_date=$row['post_date'];
			$title=$row['title'];
			$content=$row['content'];
			$excerpt=$row['excerpt'];
			$post_status=$row['post_status'];
			$comment_status=$row['comment_status'];
			$category_sn=$row['category_sn'];
			$slug=$row['slug'];
			$display_order=$row['display_order'];
			$accesslevel=$row['accesslevel'];
			$password=$row['password'];
			$gallery_sn = $row['gallery_sn'];
			$featured_image = $row['featured_image'];
			if(strlen($featured_image)>10) 
			{
				$featured_image_img = "<img src=\"$featured_image\" class=\"img-centered\">"; //filter thumb task	
			}
			else
			{
				$featured_image_img = "&nbsp;";
			}
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
		alert("Please supply Post Title.");
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

