<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=12; 
include("../general_permission.php"); 
?>
<?php
$menu = $_GET['menu'];
?>
<div class="container">
	<h2>Menus - <?php echo $menu; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Menu</th>
         <th class="hidden-xs hidden-sm">Order</th>
         <th colspan="2">
            <a href="update.php?sn=0&menu=<?php echo $menu; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Menu</th>
         <th class="hidden-xs hidden-sm">Order</th>
         <th colspan="2">
            <a href="update.php?sn=0&menu=<?php echo $menu; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </tfoot>
<tbody>
<?php

	
   $counter=0;
   $clname="";

	
   $q=mysqli_query($dbc,"select * from menu where language='$currentlanguage' and submenu_of=0 and menu='$menu' order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$title=$row['title'];
		$display_order=$row['display_order'];
		$submenu_of=$row['submenu_of'];
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $title; ?></td>
            <td class="hidden-xs hidden-sm"> 
            	<?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=up&submenu_of=<?php echo $submenu_of; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=down&submenu_of=<?php echo $submenu_of; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-download"></span></a>
            </td>
            <td style="text-align:center">
            	<a href="update.php?sn=<?php echo $id; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $id; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
         </tr>
        <?php           
		$sub=mysqli_query($dbc,"select * from menu where submenu_of=$id order by display_order");
	   	if(!$sub) echo mysqli_error($dbc);
		while($rowsub = mysqli_fetch_array($sub))
		{
			$counter += 1;
			$subid=$rowsub['sn'];
			$title=$rowsub['title'];
			$display_order=$rowsub['display_order'];
			$submenu_of=$rowsub['submenu_of'];
		?>
        	<tr>
                <td><?php echo $counter; ?></td>
                <td style="padding-left: 20px">-- <?php echo $title; ?></td>

                <td class="hidden-xs hidden-sm">
                	--------- <?php echo $display_order; ?> &nbsp; 
	 			<a href="setorder.php?sn=<?php echo"$subid"; ?>&osn=<?php echo"$display_order"; ?>&task=up&submenu_of=<?php echo $submenu_of; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setorder.php?sn=<?php echo"$subid"; ?>&osn=<?php echo"$display_order"; ?>&task=down&submenu_of=<?php echo $submenu_of; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-download"></span></a>
                </td>
                <td style="text-align:center">
                    <a href="update.php?sn=<?php echo $subid; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                </td>
                <td style="text-align:center">
                    <a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $subid; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
             </tr>
             <?php           
				$subsub=mysqli_query($dbc,"select * from menu where submenu_of=$subid order by display_order");
				if(!$subsub) echo mysqli_error($dbc);
				while($rowsub2 = mysqli_fetch_array($subsub))
				{
					$counter += 1;
					$subid2=$rowsub2['sn'];
					$title=$rowsub2['title'];
					$display_order=$rowsub2['display_order'];
					$submenu_of=$rowsub2['submenu_of'];
				?>
					<tr>
						<td><?php echo $counter; ?></td>
						<td style="padding-left: 20px">--------- <?php echo $title; ?></td>
		
						<td class="hidden-xs hidden-sm">
							----------------------- <?php echo $display_order; ?> &nbsp; 
						<a href="setorder.php?sn=<?php echo"$subid2"; ?>&osn=<?php echo"$display_order"; ?>&task=up&submenu_of=<?php echo $submenu_of; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
						<a href="setorder.php?sn=<?php echo"$subid2"; ?>&osn=<?php echo"$display_order"; ?>&task=down&submenu_of=<?php echo $submenu_of; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-download"></span></a>
						</td>
						<td style="text-align:center">
							<a href="update.php?sn=<?php echo $subid2; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-edit"></span></a>
						</td>
						<td style="text-align:center">
							<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $subid2; ?>&menu=<?php echo $menu; ?>"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					 </tr>
		<?php
			}
		}
 	}
 ?>
   </tbody>
 </table>
 <hr>
<strong> Load Cagegories</strong>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

