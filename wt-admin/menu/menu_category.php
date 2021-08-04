 <?php

			   $q=mysqli_query($dbc,"select * from category where language='$currentlanguage' and subcategory_of=0 order by display_order");
			   if(!$q) echo mysqli_error($dbc);
				while($row = mysqli_fetch_array($q))
				{
					$id=$row['sn'];
					$categoryname=$row['categoryname'];
					$slug = $row['slug'];

					?>
                    <div><a href="javascript: void(0)" onClick="setCategory(<?php echo $id; ?>,'<?php echo $categoryname; ?>','<?php echo $slug; ?>')"><?php echo $categoryname; ?></a></div>
					<?php           
					$sub=mysqli_query($dbc,"select * from category where subcategory_of=$id and sn not in(select mid from menu where menu = '$menu') order by display_order");
					if(!$sub) echo mysqli_error($dbc);
					while($rowsub = mysqli_fetch_array($sub))
					{
						$subid=$rowsub['sn'];
						$categoryname=$rowsub['categoryname'];
						$slug = $rowsub['slug'];

					?>
						<div><a href="javascript: void(0)" onClick="setCategory(<?php echo $subid; ?>,'<?php echo $categoryname; ?>','<?php echo $slug; ?>')">--- <?php echo $categoryname; ?></a></div>
					<?php
					}
				}
 ?>
 
 <script>
 	function setCategory(mid,title,slug)
	{
		document.getElementById("menutype").value = "category";
		document.getElementById("mid").value = mid;
		document.getElementById("title").value = title;
		document.getElementById("link").value = "<?php echo $set_sitename; ?>/category/"+slug+"/1";
	}
 </script>
 	