<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=11; 
include("../general_permission.php"); 
?>

<div class="container">
	<h2>Pages</h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Title</th>
         <th class="hidden-xs hidden-sm">Status</th>
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
         <th>Title</th>
         <th class="hidden-xs hidden-sm">Status</th>
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

   $q=mysqli_query($dbc,"select * from pages where language = '$currentlanguage' order by title"); //currentlanguage in base.php
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$author=$row['author'];
		$post_date=$row['post_date'];
		$title=$row['title'];
		$content=$row['content'];
		$excerpt=$row['excerpt'];
		$post_status=$row['post_status'];
		$slug=$row['slug'];

		
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $title; ?></td>
            <td class="hidden-xs hidden-sm"><?php echo $post_status; ?></td>
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

</div> <!-- /container -->

<?php include("../footer.php"); ?>

