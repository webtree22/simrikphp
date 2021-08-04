 <?php

			   $q=mysqli_query($dbc,"select posts.* from posts inner join category on posts.category_sn = category.sn where language='$currentlanguage'");// and posts.sn not in(select mid from menu where menu='$menu') order by sn desc limit 20");
			   if(!$q) echo mysqli_error($dbc);
				while($row = mysqli_fetch_array($q))
				{
					$id=$row['sn'];
					$mtitle=$row['title'];
					$slug = $row['slug'];
					$mtitle = htmlspecialchars($mtitle, ENT_QUOTES);

					?>
                    <div><a href="javascript: void(0)" onClick='setPosts(<?php echo $id; ?>,"<?php echo $mtitle; ?>","<?php echo $slug; ?>")'><?php echo $mtitle; ?></a></div>
					
					<?php
				}
 ?>
 
 <script>
 	function setPosts(mid,title,slug)
	{
		document.getElementById("menutype").value = "posts";
		document.getElementById("mid").value = mid;
		document.getElementById("title").value = title;
		document.getElementById("link").value = "<?php echo $set_sitename; ?>/post/"+slug;
	}
 </script>
 	