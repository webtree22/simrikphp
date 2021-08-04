<?php include("../base.php"); ?>
<?php include("../head.php"); ?>
<?php include("../nav.php"); ?>

<div class="container">
	<h2>Users & Permission</h2>	
    <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
         <th>SN</th>
         <th>Name</th>
         <th class="hidden-xs hidden-sm">Email</th>
         <th class="hidden-xs hidden-sm">User Level</th>
         <th class="hidden-xs hidden-sm">Status</th>	
         <th class="hidden-xs hidden-sm">Registration Date</th>			 
         <?php 
         if($_SESSION['Role']==5)
        {
        ?>
        <th colspan="2">
        <a href="update.php?sn=0" class="btn btn-primary btn-xs btn-block"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New</a></th>
        <th>Permission</th>
       <?php } else { ?>
        <th>&nbsp;</th>
        <?php } ?>
       
        
       </tr>
      </thead>
      <tfoot>
      <tr>
         <th>SN</th>
         <th>Name</th>
         <th class="hidden-xs hidden-sm">Email</th>
         <th class="hidden-xs hidden-sm">User Level</th>
         <th class="hidden-xs hidden-sm">Status</th>	
         <th class="hidden-xs hidden-sm">Registration Date</th>			 
         <?php 
         if($_SESSION['Role']==5)
        {
        ?>
        <th colspan="2">
        <a href="update.php?sn=0" class="btn btn-primary btn-xs btn-block"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New</a></th>
        <th>Permission</th>
        <?php } else { ?>
        <th>&nbsp;</th>
        <?php } ?>
       
       </tr>
      </tfoot>
    <tbody>
    <?php
    
        
       $counter=1;
       $clname="";
         
         $tc=0;
        if($_SESSION['Role']==5)
        {
        $sql="select * from users order by first_name,last_name";
        }
        else
        {
        $sql="select * from users where user_id=" . $_SESSION['UserId'];
        }
       $listaccount=mysqli_query($dbc,$sql);
       if(!$listaccount) echo mysqli_error();
        while($row = mysqli_fetch_array($listaccount))
        {
            $id=$row['user_id'];
            
    
        $userlevel="Site User";
        if($row['user_level']==5) $userlevel="<span style='color: #c00'>Super Admin</span>";
        if($row['user_level']==3) $userlevel="<span style='color: #360'>Administrator</span>";
        
        $status="Not Active";
        if(is_null($row['active'])) $status="Active";
        
        
    
     ?>
       <tr>
         <td><?php echo $counter; ?></td>
         <td><?php echo $row['first_name'] . " " . $row['last_name']; ?><strong></strong></td>
         <td class="hidden-xs hidden-sm"><?php echo $row['email']; ?></td>
         <td class="hidden-xs hidden-sm"><?php echo $userlevel; ?></td>
         <td class="hidden-xs hidden-sm"><?php echo $status; ?></td>
         <td class="hidden-xs hidden-sm"><?php echo $row['registration_date']; ?></td>
            <?php if($_SESSION['Role']==5)
            { ?>
         <td style="text-align:center"><a href="update.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
         <td style="text-align:center">
         
         <a onClick="if ( confirm('You are about to delete this item ?\n \'Cancel\' to stop, \'OK\' to delete.') ) { return true;}return false;" href="delete.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
         <td style="text-align:center"><a href="permission.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
         <?php } else { ?>
         <td style="text-align:center"><a href="update.php?sn=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
         <?php } ?>
         
         
          
         
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

