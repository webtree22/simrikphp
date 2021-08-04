<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=2; 
include("../general_permission.php"); 
?>
<?php
$category_sn = $_GET['category_sn'];
$q=mysqli_query($dbc,"select * from category where sn = $category_sn");
while($row = mysqli_fetch_array($q))
{
	$catname = $row['categoryname'];
}
?>
<div class="container">
<h2><a href="index.php">Categories</a> &raquo; Custom Fields of <?php echo $catname; ?></h3>
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
            <a href="updateupdate.php?sn=0&category_sn=<?php echo $category_sn; ?>" class="btn btn-primary btn-xs btn-block">
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
            <a href="updateupdate.php?sn=0&category_sn=<?php echo $category_sn; ?>" class="btn btn-primary btn-xs btn-block">
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
	
   $q=mysqli_query($dbc,"select * from categoryfields where category_sn = '$category_sn' order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$category_sn=$row['category_sn'];
		$fieldname=$row['fieldname'];
		$control=$row['control'];
		$options=$row['options'];
		$display_order=$row['display_order'];
		$required=$row['required'];
		$s = "";
		if($required == "required") $s = " style=\"color:#cc0000\"";

		?>
        <tr<?php echo $s; ?>>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $fieldname; ?></td>
			<td class="hidden-xs hidden-sm"><?php echo $control; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $options; ?></td>
            <td>
            <?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=up&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=down&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-download"></span>
            </td>
            <td style="text-align:center">
            	<a href="updateupdate.php?sn=<?php echo $id; ?>&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="deletedelete.php?sn=<?php echo $id; ?>&category_sn=<?php echo $category_sn; ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
         </tr>
 	<?php
 	}
 ?>
   </tbody>
 </table>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

