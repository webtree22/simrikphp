<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=4; 
include("../general_permission.php"); 
?>
<?php
$hp = "No";
if(isset($_GET['hp'])) $hp = $_GET['hp'];
if($hp == "Yes")
{
	$q=mysqli_query($dbc,"select * from gallery where hppics = 'Yes'");
	if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
		$galleryname = $row['description'];
		$gallerysn = $row['sn'];
	}
}
else
{
	$gallerysn = $_GET['gallerysn'];
	$q=mysqli_query($dbc,"select * from gallery where sn = $gallerysn");
	if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
		$galleryname = $row['description'];
	}
}
?>
<div class="container">
	<h2>Gallery / HP Sliders &raquo; <?php echo $galleryname; ?></h2><br>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Image</th>
         <th class="hidden-xs hidden-sm">Caption</th>
         <th>Order</th>
         <th colspan="2">
            <a href="updateupdate.php?sn=0&gallerysn=<?php echo $gallerysn; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Image</th>
         <th class="hidden-xs hidden-sm">Caption</th>
         <th>Order</th>
         <th colspan="2">
            <a href="update.php?sn=0&gallerysn=<?php echo $gallerysn; ?>" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
       </tr>
  </tfoot>
<tbody>
<?php
	
	
   $counter=0;
   $clname="";

	
   $q=mysqli_query($dbc,"select * from gallerypics where gallerysn=$gallerysn order by display_order");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$picpath=$row['picpath'];
		$display_order=$row['display_order'];
		
		$pos = strpos($picpath, "/.thumbs/");
		// /maxvision/upload/.thumbs/images/July/16base.png		
		if ($pos === false) {
			$p = 18;  //variable /maxvision/
			//$p =  7; //web always
			$newpicpath = substr_replace($picpath, ".thumbs/",$p , 0);
		} else {
			$newpicpath = $picpath;
		}
		
		$q1= mysqli_query($dbc, "select * from gallerypicsdata where gallerypicssn = $id and language = '$currentlanguage'");
		while($r1 = mysqli_fetch_array($q1))
		{
			$caption = $r1['caption'];
		}
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><img src="<?php echo $newpicpath; ?>" width="80px"></td>
            <td class="hidden-xs hidden-sm"><?php echo $caption; ?></td>
            <td> 
            	<?php echo $display_order; ?> &nbsp; 
	 			<a href="setsetorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=up&gallerysn=<?php echo $gallerysn; ?>"><span class="glyphicon glyphicon-upload"></span></a> 
             	<a href="setsetorder.php?sn=<?php echo"$id"; ?>&osn=<?php echo"$display_order"; ?>&task=down&gallerysn=<?php echo $gallerysn; ?>"><span class="glyphicon glyphicon-download"></span></a>
            </td>
            <td style="text-align:center">
            	<a href="updateupdate.php?sn=<?php echo $id; ?>&gallerysn=<?php echo $gallerysn; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="deletedelete.php?sn=<?php echo $id; ?>&gallerysn=<?php echo $gallerysn; ?>"><span class="glyphicon glyphicon-trash"></span></a>
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

