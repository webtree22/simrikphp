<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=10; 
include("../general_permission.php"); 
?>
<div class="container">
	<h2>Social Settings</h2><br>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Service Name</th>
         <th class="hidden-xs hidden-sm">Link</th>
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
         <th>Service Name</th>
         <th class="hidden-xs hidden-sm">Link</th>
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

	
   $counter=0;
   $clname="";

	
   $q=mysqli_query($dbc,"select * from social order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$service=$row['service'];
		$link=$row['link'];
		$display_order=$row['display_order'];

		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo ucfirst($service); ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $link; ?></td>
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

