<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=2; 
include("../general_permission.php"); 
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
function sendRequest(sc,id,c) {

	http.open('get', 'saveit.php?sc=' + encodeURIComponent(sc) + '&id=' + encodeURIComponent(id) + '&c=' + encodeURIComponent(c));
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
	<h2>Custom Fields for Categories</h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Categories</th>
         <th>Content</th>
         <th>Fields</th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Categories</th>
         <th>Content</th>
         <th>Fields</th>         
       </tr>
  </tfoot>
<tbody>
<?php

	
   $counter=0;
   $clname="";

	
   $q=mysqli_query($dbc,"select * from category where language='" . $_SESSION['AdminLanguage'] . "' and subcategory_of=0 order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$categoryname=$row['categoryname'];
		$display_order=$row['display_order'];
		$slug=$row['slug'];
		$show_content=$row['show_content'];
		
		if($show_content == "No") $show_content_display = "<span style='color:red; font-weight:bold'>Hide</span>";
		if($show_content == "Yes") $show_content_display = "<span style='color:green; font-weight:bold'>Show</span>";
		
			$s = mysqli_query($dbc,"select count(sn) as tot_sub from categoryfields where category_sn=$id");
			$rs = mysqli_fetch_array($s);
			$noofposts = $rs['tot_sub'];

		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $categoryname; ?></td>
            <td id="x<?php echo $counter; ?>"><a href="javascript:void(0)" onClick="sendRequest('<?php echo $show_content; ?>',<?php echo $id; ?>,<?php echo $counter; ?>)"><?php echo $show_content_display; ?></a></td>
            <td><a href="indexindex.php?category_sn=<?php echo $id; ?>"><?php echo "($noofposts) Custom Fields"; ?></a></td>
         </tr>
        <?php           
		$sub=mysqli_query($dbc,"select * from category where subcategory_of=$id order by display_order");
	   	if(!$sub) echo mysqli_error($dbc);
		while($rowsub = mysqli_fetch_array($sub))
		{
			$counter += 1;
			$subid=$rowsub['sn'];
			$categoryname=$rowsub['categoryname'];
			$display_order=$rowsub['display_order'];
			$slug=$rowsub['slug'];
			$show_content=$rowsub['show_content'];
			
			if($show_content == "No") $show_content_display = "<span style='color:red; font-weight:bold'>Hide</span>";
			if($show_content == "Yes") $show_content_display = "<span style='color:green; font-weight:bold'>Show</span>";
			
			$s = mysqli_query($dbc,"select count(sn) as tot_sub from categoryfields where category_sn=$subid");
			$rs = mysqli_fetch_array($s);
			$noofposts = $rs['tot_sub'];
		?>
        	<tr>
                <td><?php echo $counter; ?></td>
                <td style="padding-left: 20px">-- <?php echo $categoryname; ?></td>
                <td id="x<?php echo $counter; ?>"><a href="javascript:void(0)" onClick="sendRequest('<?php echo $show_content; ?>',<?php echo $subid; ?>,<?php echo $counter; ?>)"><?php echo $show_content_display; ?></a></td>
                <td><a href="indexindex.php?category_sn=<?php echo $subid; ?>"><?php echo "($noofposts) Custom Fields"; ?></a></td>
             </tr>
		<?php
		}
 	}
 ?>
   </tbody>
 </table>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

