<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=9; 
include("../general_permission.php"); 
?>
<div class="container">
	<h2>Google Map Setting</h3><br>
<div class="table-responsive">


	<table class="table table-striped table-hover table-bordered">
<thead>
  <tr class="odd">
     <th scope="col" width="2%">SN</th>
     <th>Lat</th>
     <th>Lng</th>
     <th>&nbsp;</th>
   </tr>
  </thead>
  <tfoot>
   <tr class="odd">
     <th scope="col" width="2%">SN</th>
     <th>Lat</th>
     <th>Lng</th>     
     <th>&nbsp;</th>
   </tr>
 </tfoot>
<tbody>
<?php

	
   $counter=1;
   $clname="";

			$q=mysqli_query($dbc,"select * from map");
			while($r = mysqli_fetch_array($q))
			{
				$id=$r['sn'];
				$lat=$r['lat'];
				$lng= $r['lng'];
		
		

		
	
 ?>
   <tr>
     <td><?php echo $counter; ?></td>
     <td style="text-align:right"><?php echo $lat; ?></td>
     <td style="text-align:right"><?php echo $lng; ?></td>
	
     <td><a href="setmap.php?sn=<?php echo $id; ?>">Set Map</a></td>
   </tr>
 <?php  
 $counter=$counter+1;
 }

 ?>
   </tbody>
 </table>
 </div>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

