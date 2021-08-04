<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=3; 
include("../general_permission.php"); 

?>
<?php
$category_sn = $_GET['category_sn'];

$catname = "Uncategorized";
$subcategory_of = 0;
$q=mysqli_query($dbc,"select * from category where sn = $category_sn");
while($row = mysqli_fetch_array($q))
{
	$catname = $row['categoryname'];
	$subcategory_of = $row['subcategory_of'];
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
function sendRequest(p,id,c) {

	http.open('get', 'feature.php?p=' + encodeURIComponent(p) + '&id=' + encodeURIComponent(id) + '&c=' + encodeURIComponent(c));
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
		//alert(http.responseText);
		brokenstring=longstring.split("~"); 
        var newptext = brokenstring[0];
		var c = brokenstring[1];
		document.getElementById("x"+c).innerHTML = newptext;
    }
}
// ]]>
</script>
<div class="container">
	<h2>Posts &raquo; <?php echo $catname; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Title</th>
         <th class="hidden-xs hidden-sm">Status</th>
         <th>Featured</th>
         <?php if($category_sn > 0) { // prevent uncategorized sorting ?>
         <th class="hidden-xs hidden-sm">Order</th>
         <?php } ?>
         <th colspan="2">
         	<?php if($category_sn > 0) {// prevent uncategorized add ?>
            <a href="update.php?sn=0&category_sn=<?php echo $category_sn; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
            <?php } ?>
        </th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Title</th>
         <th class="hidden-xs hidden-sm">Status</th>
         <th>Featured</th>
         <?php if($category_sn > 0) { ?>
         <th class="hidden-xs hidden-sm">Order</th>
         <?php } ?>
         <th colspan="2">
         	<?php if($category_sn > 0) { ?>
            <a href="update.php?sn=0&category_sn=<?php echo $category_sn; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
            <?php } ?>
        </th>
       </tr>
  </tfoot>
<tbody>
<?php

	
   $counter=0;
   $clname="";

	
   $q=mysqli_query($dbc,"select posts.* from posts inner join category on posts.category_sn = category.sn where 
   category_sn=$category_sn and language = '$currentlanguage' order by display_order"); //currentlanguage in base.php
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
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
		
		$q2 = mysqli_query($dbc,"select sn from featured where sn = $id");
		$p = mysqli_num_rows($q2);
		if($p == 0) $featured = "<span style='color:red; font-weight:bold'>No</span>";
		if($p == 1) $featured = "<span style='color:green; font-weight:bold'>Yes</span>";
		
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $title; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $post_status; ?></td>
            <td id="x<?php echo $counter; ?>"><a href="javascript:void(0)" onClick="sendRequest(<?php echo $p; ?>,<?php echo $id; ?>,<?php echo $counter; ?>)"><?php echo $featured; ?></a></td>
            <?php if($category_sn > 0) { ?>
            <td class="hidden-xs hidden-sm"> 
            	<?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=up&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=down&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-download"></span></a>
            </td>
            <?php } ?>
            <td style="text-align:center">
            	<a href="update.php?sn=<?php echo $id; ?>&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $id; ?>&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
         </tr>
<?php        
 	}
 ?>
   </tbody>
 </table>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

