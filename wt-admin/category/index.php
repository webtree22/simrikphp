<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=1; 
include("../general_permission.php"); 
?>
<div class="container">
	<h2>Categories</h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Category Name</th>
         <th class="hidden-xs hidden-sm">Slug</th>
         <th class="hidden-xs hidden-sm">Order</th>
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
         <th>Category Name</th>
         <th class="hidden-xs hidden-sm">Slug</th>
         <th class="hidden-xs hidden-sm">Order</th>
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

	
   $q=mysqli_query($dbc,"select * from category where language='" . $_SESSION['AdminLanguage'] . "' and subcategory_of=0 order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$categoryname=$row['categoryname'];
		$display_order=$row['display_order'];
		$subcategory_of=$row['subcategory_of'];
		$slug=$row['slug'];
		
		$s = mysqli_query($dbc,"select count(sn) as tot_sub from posts where category_sn=$id");
		$rs = mysqli_fetch_array($s);
		$noofposts = $rs['tot_sub'];
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><a href="../posts/index.php?post_type=post&category_sn=<?php echo $id; ?>"><?php echo $categoryname; ?><?php echo " ($noofposts)"; ?></a></td>
            <td class="hidden-xs hidden-sm"><?php echo $slug; ?></td>
            <td class="hidden-xs hidden-sm"> 
            	<?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=up&subcategory_of=<?php echo $subcategory_of; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=down&subcategory_of=<?php echo $subcategory_of; ?>"><span class="glyphicon glyphicon-download"></span></a>
            </td>
            <td style="text-align:center">
            	<a href="update.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
         </tr>
        <?php           
		$subcounter = 0;
		$sub=mysqli_query($dbc,"select * from category where subcategory_of=$id order by display_order");
	   	if(!$sub) echo mysqli_error($dbc);
		while($rowsub = mysqli_fetch_array($sub))
		{
			$subcounter += 1;
			$counter += 1;
			$subid=$rowsub['sn'];
			$categoryname=$rowsub['categoryname'];
			$display_order=$rowsub['display_order'];
			$slug=$rowsub['slug'];
			$subcategory_of=$rowsub['subcategory_of'];
			
			$s = mysqli_query($dbc,"select count(sn) as tot_sub from posts where category_sn=$subid");
			$rs = mysqli_fetch_array($s);
			$noofposts = $rs['tot_sub'];
		?>
        	<tr>
                <td><?php echo $counter; ?></td>
                <td style="padding-left: 20px">-- <a href="../posts/index.php?post_type=post&category_sn=<?php echo $subid; ?>"><?php echo $categoryname; ?><?php echo " ($noofposts)"; ?></a></td>
                <td class="hidden-xs hidden-sm"><?php echo $slug; ?></td>

                <td class="hidden-xs hidden-sm">
                	--------- <?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$subid"; ?>&osn=<?php echo"$display_order"; ?>&task=up&subcategory_of=<?php echo $subcategory_of; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$subid"; ?>&osn=<?php echo"$display_order"; ?>&task=down&subcategory_of=<?php echo $subcategory_of; ?>"><span class="glyphicon glyphicon-download"></span></a>
                </td>
                <td style="text-align:center">
                    <a href="update.php?sn=<?php echo $subid; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                </td>
                <td style="text-align:center">
                    <a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $subid; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
             </tr>
		<?php
		}
 	}
 ?>
   </tbody>
 </table>
 <hr>
<strong> Load Cagegories</strong>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

