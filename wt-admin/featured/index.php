<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=13; 
include("../general_permission.php"); 
?>
<div class="container">
	<h2>Featured Posts</h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Post</th>
         <th>Category</th>
         <th class="hidden-xs hidden-sm">Order</th>
         <th colspan="1">
           &nbsp;
        </th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Post</th>
         <th>Category</th>
         <th class="hidden-xs hidden-sm">Order</th>
         <th colspan="1">
            &nbsp;
        </th>
       </tr>
  </tfoot>
<tbody>
<?php

	
   $counter=0;
   $clname="";

	
   $q=mysqli_query($dbc,"select * from featured where language='$currentlanguage' order by display_order");
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$display_order=$row['display_order'];
		$titl2 = "";
		$q2=mysqli_query($dbc,"select title,category_sn from posts where sn = $id");
		while($r2 = mysqli_fetch_array($q2))
		{
			$title = $r2['title'];
			$category_sn = $r2['category_sn'];
		}
		$category = "";
		$q2=mysqli_query($dbc,"select categoryname from category where sn = $category_sn");
		while($r2 = mysqli_fetch_array($q2))
		{
			$category = $r2['categoryname'];
		}
		
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $category; ?></td>
            <td class="hidden-xs hidden-sm"> 
            	<?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=up"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=down"><span class="glyphicon glyphicon-download"></span></a>
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

</div> <!-- /container -->

<?php include("../footer.php"); ?>

