<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=1; 
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
function sendRequest(o,id) {
	//alert(id); 
	http.open('get', 'saveit.php?id=' + encodeURIComponent(id) + '&o=' + encodeURIComponent(o));
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
		//setTimeout(function(){
          //     window.location.reload();
        //}, 1000); 
    }
}
// ]]>
</script>
<?php
$formsn = $_GET['formsn'];
$q=mysqli_query($dbc,"select * from forms where sn = $formsn");
while($row = mysqli_fetch_array($q))
{
	$formname = $row['formname'];
}
?>
<div class="container">
<h2><a href="index.php">Forms</a> &raquo; Form Fields of <?php echo $formname; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Field Name</th>
         <th class="hidden-xs hidden-sm">Control</th>
         <th class="hidden-xs hidden-sm">Options</th>
         <th>Order</th>
         <th colspan="2">
            <a href="updateupdate.php?sn=0&formsn=<?php echo $formsn; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Field Name</th>
         <th class="hidden-xs hidden-sm">Control</th>
         <th class="hidden-xs hidden-sm">Options</th>
         <th>Order</th>
         <th colspan="2">
            <a href="updateupdate.php?sn=0&formsn=<?php echo $formsn; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </tfoot>
<tbody>
<?php
	

	//Copy form technique for forms in multiple languages
   $counter=0;
   $clname="";
	
   $q=mysqli_query($dbc,"select * from formsdetail where formsn = '$formsn' order by displayorder");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$formsn=$row['formsn'];
		$fieldname=$row['fieldname'];
		$control=$row['control'];
		$options=$row['options'];
		$displayorder=$row['displayorder'];
		$required=$row['required'];
		$s = "";
		if($required == "required") $s = " style=\"color:#cc0000\"";

		?>
        <tr<?php echo $s; ?>>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $fieldname; ?></td>
			<td class="hidden-xs hidden-sm"><?php echo $control; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $options; ?></td>
            <td><input value="<?php echo $displayorder; ?>" onChange="sendRequest(this.value,<?php echo $id; ?>)"  name="displayorder" size="4" style="text-align:right; font-weight:bold"></td>
            <td style="text-align:center">
            	<a href="updateupdate.php?sn=<?php echo $id; ?>&formsn=<?php echo $formsn; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="deletedelete.php?sn=<?php echo $id; ?>&formsn=<?php echo $formsn; ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
         </tr>
 	<?php
 	}
 ?>
   </tbody>
 </table>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

