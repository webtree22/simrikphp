<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>

<?php
	if($_SESSION['Role']!=5)
	{
		echo "<h1>Permission Denied!</h1>";
		die();
	}
?>

<div class="container">

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

	http.open('get', 'saveit.php?p=' + encodeURIComponent(p) + '&id=' + encodeURIComponent(id) + '&c=' + encodeURIComponent(c));
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
<h2><a href="index.php">Users & Permission</a> - Update</h2>	
	
<?php
$user_sn=$_GET['sn'];
$sql="select * from users where user_id=$user_sn";
$q=mysqli_query($dbc,$sql);
if(!$q) echo mysqli_error($dbc);
while($r = mysqli_fetch_array($q))
{
   		$name=$r['first_name'] . " " . $r['last_name'] . " (" . $r['email'] . ")";
}
echo "<strong style='color: #003388'>Setting Permission for $name</strong>";
?>
<?php
$sql="select * from permission_items";
$q=mysqli_query($dbc,$sql);
while($r = mysqli_fetch_array($q))
{
	$id = $r['sn'];
	$dp = $r['dp'];
   	$sql2 = "select * from permissions where user_id = $user_sn and pisn = $id";
	$q2 = mysqli_query($dbc,$sql2);
	$n2 = mysqli_num_rows($q2);
	if($n2 == 0)
	{
		$i = mysqli_query($dbc, "insert into permissions(pisn,user_id,p) values($id,$user_sn,$dp)");
	}
}
?>
<table class="table table-striped table-hover table-bordered">
    <tr>
    	<td colspan="1" style="text-align:left"><strong>Permissions</strong></td>
        <td colspan="1" style="text-align:left"><em>Click to Toggle</em></td>
    </tr>
    <?php
	$sql="select permission_items.item,permissions.sn,permissions.p from permission_items inner join permissions
			on permission_items.sn = permissions.pisn where user_id = $user_sn order by permission_items.item";
			//echo $sql;
	$c = 0;
	$q=mysqli_query($dbc,$sql);
	while($r = mysqli_fetch_array($q))
	{
		$c += 1;
		$item = $r['item'];
		$id = $r['sn'];
		$p = $r['p'];
		if($p == 0) $permission = "<span style='color:red; font-weight:bold'>No</span>";
		if($p == 1) $permission = "<span style='color:green; font-weight:bold'>Yes</span>";
	
	?>
    <tr>
   	 	<td><?php echo $item; ?></td>
    	<td id="x<?php echo $c; ?>"><a href="javascript:void(0)" onClick="sendRequest(<?php echo $p; ?>,<?php echo $id; ?>,<?php echo $c; ?>)"><?php echo $permission; ?></a></td>
    </tr>
    <?php } ?>
</table>


</div> <!-- /container -->

<?php include("../footer.php"); ?>

