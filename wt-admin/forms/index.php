<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>
<?php 
$pagecode=1; 
include("../general_permission.php"); 
?>

<div class="container">
<h2>Forms</h3>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
	<thead>
      <tr>
         <th>SN</th>
         <th>Form Name</th>
         <th colspan="2">
            <a href="update.php?sn=0" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
        <th>Fields</th>
       </tr>
  </thead>
  <tfoot>
 	<tr>
         <th>SN</th>
         <th>Form Name</th>
         <th colspan="2">
            <a href="update.php?sn=0" class="btn btn-primary btn-xs btn-block">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
            </a>
        </th>
        <th>Fields</th>
       </tr>
  </tfoot>
<tbody>
<?php

	//Copy form technique for forms in multiple languages
   $counter=0;
   $clname="";
	$lang = $_SESSION['AdminLanguage'];
	
   $q=mysqli_query($dbc,"select * from forms where language = '$lang' order by formname");
   if(!$q) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($q))
	{
   		$counter += 1;
		$id=$row['sn'];
		$formname=$row['formname'];
		
		$s = mysqli_query($dbc,"select count(sn) as tot from formsdetail where formsn=$id");
		$rs = mysqli_fetch_array($s);
		$nooffields = $rs['tot'];
		?>
        <tr>
        	<td><?php echo $counter; ?></td>
            <td><?php echo $formname; ?></td>

            <td style="text-align:center">
            	<a href="update.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
     		<td style="text-align:center">
				<a onclick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
            <td><a href="indexindex.php?formsn=<?php echo $id; ?>"><?php echo "($nooffields) Fields"; ?></a></td>
         </tr>
 	<?php
 	}
 ?>
   </tbody>
 </table>

</div> <!-- /container -->

<?php include("../footer.php"); ?>

