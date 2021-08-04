    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $base; ?>/dashboard.php" style="color: #13a89e">
          <img src="<?php echo $base; ?>/images/webtreelogo.png" />
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown <?php echo $active_settings; ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base; ?>/category/index.php">Category</a></li>
                <li><a href="<?php echo $base; ?>/customfields/index.php">Category Custom Fields</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo $base; ?>/settings/index.php">General Setttings</a></li>
                <li><a href="<?php echo $base; ?>/social/index.php">Social Setttings</a></li>
                <li><a href="<?php echo $base; ?>/googlemap/index.php">Google Map Location</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo $base; ?>/users/index.php">Users & Permissioins</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">SET MENU</li>
                <?php
				$menus = explode(",", $set_menus);
				$c = sizeof($menus);
				for($i=0; $i<$c; $i++) {
				$s = "";
				?>
				<li><a href="<?php echo $base; ?>/menu/index.php?menu=<?php echo trim($menus[$i]); ?>"><?php echo trim($menus[$i]); ?></a></li>
				<?php } ?>
                
              </ul>
            </li>
            <li class="dropdown <?php echo $active_posts; ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Posts <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base; ?>/featured/index.php">Featured Posts</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Posts Entry</li>
                <li><a href="<?php echo $base; ?>/posts/index.php?category_sn=0">Uncategorized</a></li>
                <?php

			   $q=mysqli_query($dbc,"select * from category where language='$currentlanguage' and subcategory_of=0 order by display_order");
			   if(!$q) echo mysqli_error($dbc);
				while($row = mysqli_fetch_array($q))
				{
					$id=$row['sn'];
					$categoryname=$row['categoryname'];

					?>
                    <li><a href="<?php echo $base; ?>/posts/index.php?category_sn=<?php echo $id; ?>" style="font-weight:bold"><?php echo $categoryname; ?></a></li>
					<?php           
					$sub=mysqli_query($dbc,"select * from category where subcategory_of=$id order by display_order");
					if(!$sub) echo mysqli_error($dbc);
					while($rowsub = mysqli_fetch_array($sub))
					{
						$subid=$rowsub['sn'];
						$categoryname=$rowsub['categoryname'];
					?>
						<li><a href="<?php echo $base; ?>/posts/index.php?category_sn=<?php echo $subid; ?>">--- <?php echo $categoryname; ?></a></li>
					<?php
					}
				}
			 ?>
              </ul>
            </li>
            <li class="<?php echo $active_pages; ?>"><a href="<?php echo $base; ?>/pages/index.php">Pages</a></li>
            <li class="dropdown <?php echo $active_banners; ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Banner & Slides <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base; ?>/gallery/indexindex.php?hp=Yes">Home Page Slider</a></li>
                <li><a href="<?php echo $base; ?>/gallery/index.php">Photo Gallery</a></li>   
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo $base; ?>/adbanners/index.php">Ad Banners</a></li>
                             
              </ul>
            </li>
            <li class="dropdown <?php echo $active_media; ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Media <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base; ?>/media/index.php">Manage Images</a></li>
                <li><a href="<?php echo $base; ?>/media/indexfile.php">Manage Files</a></li>   
              </ul>
            </li>
            </li>
            <li class="dropdown <?php echo $active_forms; ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Forms <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base; ?>/forms/index.php">List / Create Forms</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Collected Data</li>
                <?php
				$listaccount=mysqli_query($dbc,"select * from forms order by formname");
				while($row = mysqli_fetch_array($listaccount))
				{
				?>
                	<li><a href="<?php echo $base; ?>/forms/formdata.php?sn=<?php echo $row['sn']; ?>"><?php echo $row['formname']; ?></a></li>
                <?php } ?>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-weight:bold"><?php echo $currentlanguage; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
               
                <li class="dropdown-header">Switch Language</li>
                
                <?php
				$languages = explode(",", $set_sitelanguages);
				$c = sizeof($languages);
				for($i=0; $i<$c; $i++) {
				$s = "";
				if(trim($languages[$i]) == $currentlanguage) $s = "style=\"font-weight:bold\"";
				?>
				<li><a href="<?php echo $base; ?>/language.php?nl=<?php echo trim($languages[$i]); ?>" <?php echo $s; ?>><?php echo trim($languages[$i]); ?></a></li>
				<?php } ?>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-weight:bold"><?php echo $currentuser; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base; ?>/logout.php">Log Out</a></li>
              </ul>
            </li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>