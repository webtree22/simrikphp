<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=1; 
include("../general_permission.php"); 
?>
<?php
$sn = $_GET['sn'];
$q=mysqli_query($dbc,"select * from forms where sn = $sn");
if(!$q) echo mysqli_error($dbc);
while($row = mysqli_fetch_array($q))
{
	$formname=$row['formname'];
}
?>		
<div class="container">
<h2>Form Data: <?php echo $formname; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
		<?php
        $listaccount=mysqli_query($dbc,"select * from formsdetail where formsn=$sn order by displayorder,fieldname");
        while($row = mysqli_fetch_array($listaccount))
        {
            $id = $row['sn'];
            $fieldname=$row['fieldname'];
        ?>
        <th><?php echo substr($fieldname,0,15); ?></th>
        <?php } ?>
         <th>&nbsp;
            
        </th>
       </tr>
  </thead>
  <tfoot>
 	 <tr>
         <th>SN</th>
		<?php
        $listaccount=mysqli_query($dbc,"select * from formsdetail where formsn=$sn order by displayorder,fieldname");
        while($row = mysqli_fetch_array($listaccount))
        {
            $id = $row['sn'];
            $fieldname=$row['fieldname'];
        ?>
        <th><?php echo substr($fieldname,0,15); ?></th>
        <?php } ?>
         <th>&nbsp;
            
        </th>
       </tr>
  </tfoot>
<tbody>
	
<?php
	
	//Copy form technique for forms in multiple languages
   $counter=0;
	$q1=mysqli_query($dbc,"select distinct(unique_id) as uid from formdata where formsn=$sn");
   	if(!$q1) echo mysqli_error($dbc);
	while($r1 = mysqli_fetch_array($q1))
	{ 
	$counter += 1;
	$uid = $r1['uid'];
	?>
    	<tr>
		<td><?php echo $counter; ?></td>
        <?php
		$listaccount=mysqli_query($dbc,"select * from formsdetail where formsn=$sn order by displayorder,fieldname");
        while($row = mysqli_fetch_array($listaccount))
        {
			$fdsn = $row['sn'];
			$q2=mysqli_query($dbc,"select data_value from formdata where fdsn = $fdsn and unique_id = '$uid' and formsn = $sn");
			if(!$q2) echo mysqli_error($dbc);
			while($r2 = mysqli_fetch_array($q2))
			{
				echo "<td>" . $r2['data_value'] . "</td>";
			} //q2
		}
		?>
        <td><a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="formdatadelete.php?uid=<?php echo $uid; ?>&formsn=<?php echo $sn; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
	<?php 
	} //q1 ?>
 	
   </tbody>
 </table>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

