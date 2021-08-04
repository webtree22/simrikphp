 <?php

			   //$q=mysqli_query($dbc,"select * from pages where language='$currentlanguage' and sn not in(select mid from menu where menu='$menu') order by sn desc limit 20");
			   $q=mysqli_query($dbc,"select * from pages where language='$currentlanguage'");// and sn not in(select mid from menu where menu='$menu') order by sn desc limit 20");
			   if(!$q) echo mysqli_error($dbc);
				while($row = mysqli_fetch_array($q))
				{
					$id=$row['sn'];
					$mtitle=$row['title'];
					$slug = $row['slug'];
					$mtitle = htmlspecialchars($mtitle, ENT_QUOTES);

					?>
                    <div><a href="javascript: void(0)" onClick='setPages(<?php echo $id; ?>,"<?php echo $mtitle; ?>","<?php echo $slug; ?>")'><?php echo $mtitle; ?></a></div>
					
					<?php
				}
 ?>
 
 <script>
 	function setPages(mid,title,slug)
	{
		document.getElementById("menutype").value = "pages";
		document.getElementById("mid").value = mid;
		document.getElementById("title").value = title;
		document.getElementById("link").value = "<?php echo $set_sitename; ?>/page/"+slug;
	}
 </script>
 	