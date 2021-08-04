<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=7; 
include("../general_permission.php"); 
?>
<div class="container">
	<h2>Ad Banners</h2>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Description</th>
         <th class="hidden-xs hidden-sm">Position</th>
         <th class="hidden-xs hidden-sm">From</th>
         <th class="hidden-xs hidden-sm">Until</th>
         <th>Order</th>
         <th colspan="2">
            <a href="update.php?sn=0" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Description</th>
         <th class="hidden-xs hidden-sm">Position</th>
         <th class="hidden-xs hidden-sm">From</th>
         <th class="hidden-xs hidden-sm">Until</th>
         <th>Order</th>
         <th colspan="2">
            <a href="update.php?sn=0" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </tfoot>
<tbody>
<?php
//NOTE: Add New language in base.php set_language
//And, Add corresponding fields for tile and content in gallerytable;
	
   $counter=0;
   $clname="";

	
   $q=mysqli_query($dbc,"select * from ads order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$description=$row['description'];
		$position=$row['position'];
		$start_date=$row['start_date'];
		$end_date=$row['end_date'];
		$display_order=$row['display_order'];
		
		$q1= mysqli_query($dbc, "select * from adsdata where adssn = $id and language = '$currentlanguage'");
		while($r1 = mysqli_fetch_array($q1))
		{
			$adtext = $r1['adtext'];
			$adpic = $r1['adpic'];
			$link = $r1['link'];
		}
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $description; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $position; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $start_date; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $end_date; ?></td>
            <td> 
            	<?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=up"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=down"><span class="glyphicon glyphicon-download"></span></a>
            </td>
            <td style="text-align:center">
            	<a href="update.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
         </tr>       
		<?php
 	}
 ?>
   </tbody>
 </table>
 </div>
 

</div> <!-- /container -->

<?php include("../footer.php"); ?>

