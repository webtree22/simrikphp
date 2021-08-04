<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=4; 
include("../general_permission.php"); 
?>
<div class="container">
	<h2>Gallery / HP Sliders</h2>
   	<em>Click on Description to View / Add / Update / Delete Gallery Images.</em>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Description</th>
         <th class="hidden-xs hidden-sm">Title</th>
         <th class="hidden-xs hidden-sm">Home Page Slider</th>
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
         <th class="hidden-xs hidden-sm">Title</th>
         <th class="hidden-xs hidden-sm">Home Page Slider</th>
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

	
   $q=mysqli_query($dbc,"select * from gallery order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$description=$row['description'];
		$hppics=$row['hppics'];
		$display_order=$row['display_order'];
		
		$q1= mysqli_query($dbc, "select * from gallerydata where gallerysn = $id and language = '$currentlanguage'");
		while($r1 = mysqli_fetch_array($q1))
		{
			$title = $r1['title'];
			$content = $r1['content'];
		}
		$q1= mysqli_query($dbc, "select * from gallerypics where gallerysn = $id");
		$n = mysqli_num_rows($q1);
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td>
            	<a href="indexindex.php?gallerysn=<?php echo $id; ?>">
				<?php echo $description; ?>
                </a> (<?php echo $n; ?> Pics)
            </td>
            <td class="hidden-xs hidden-sm"><?php echo $title; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $hppics; ?></td>
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

