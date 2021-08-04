<style type="text/css">
#image {
    width: 100%;
    height: 100%;
    overflow: hidden;
    cursor: pointer;
    background:  #ccc;
    color: #333;
}
/*
#image img {
    visibility: hidden;
}
*/
</style>
 
<script type="text/javascript">
function openKCFinder(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                div.innerHTML = '<img id="img" src="' + url + '" />';
				document.getElementById("featured_image").value = url;
                var img = document.getElementById('img');
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
                img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                img.style.visibility = "visible";
            }
        }
    };
    window.open('../kcfinder/browse.php?type=images&dir=images/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
 

	<div class="form-group">
            <label for="featured_image" class="col-sm-12 control-label">Featured Image</label>
            <div class="col-sm-12">
            	<div id="image" onclick="openKCFinder(this)"><div style="margin:5px">
                	<?php echo $featured_image_img; ?>
                </div></div>
                <em><small>Click above to add/update Featured Image</small></em>
                <input type="hidden" id="featured_image" name="featured_image" value="<?php echo $featured_image; ?>" />
            </div>
        </div>
<?php if($sn > 0) { ?>
        <div class="form-group">
            <label for="post_status" class="col-sm-5 control-label">Category</label>
            <div class="col-sm-7">
            	<select name="category_sn" id="category_sn" class="form-control" onChange="sendRequest(this.value, <?php echo $category_sn; ?>, <?php echo $display_order; ?>)">
                	<?php
                    $listaccount=mysqli_query($dbc,"select * from category where subcategory_of=0 order by display_order");
                    while($row = mysqli_fetch_array($listaccount))
                    { 
					$category_id = $row['sn'];
					$catname = $row['categoryname'];
					$s = "";
					if($row['sn'] == $category_sn) $s = "selected";
					?>
                	<option value="<?php echo $category_id; ?>" <?php echo $s; ?>><?php echo $catname; ?></option>
                    <?php 
						$q=mysqli_query($dbc,"select * from category  where subcategory_of=$category_id order by display_order");
						while($r = mysqli_fetch_array($q))
						{ 
						$subcategory_id = $r['sn'];
						$subcatname = $r['categoryname'];
						$s = "";
						if($r['sn'] == $category_sn) $s = "selected";
						?>
                        <option value="<?php echo $subcategory_id; ?>" <?php echo $s; ?>>---<?php echo $subcatname; ?></option>
						<?php
						}
					}
					?>
                </select>
            </div>
        </div>
        <?php } ?>
        <div class="form-group">
            <label for="post_status" class="col-sm-5 control-label">Post Status</label>
            <div class="col-sm-7">
            	<select name="post_status" id="post_status" class="form-control">
                	<option value="Published" <?php if($post_status == "Published") echo "selected"; ?>>Published</option>
                    <option value="Draft" <?php if($post_status == "Draft") echo "selected"; ?>>Draft</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="comment_status" class="col-sm-5 control-label">Comment</label>
            <div class="col-sm-7">
            <select name="comment_status" id="comment_status" class="form-control">
                	<option value="Allow" <?php if($comment_status == "Allow") echo "selected"; ?>>Allow</option>
                    <option value="Disallow" <?php if($comment_status == "Disallow") echo "selected"; ?>>Disallow</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="display_order" class="col-sm-5 control-label">Order</label>
            <div class="col-sm-7" id="display_order">
				  <select name="display_order" class="form-control">
				  <?php for($i=1;$i<=$tdo;$i++)
                    {
                    echo"<option value='$i'";
                    if($display_order==$i) echo" selected";
                    echo">";
                    $pos=getPos($i);
                    echo"$pos</option>";
                    } 
                    
                    ?>
                    <?php if($sn==0) { ?>
                    <option value="<?php echo"$lastdo"; ?>" <?php if($display_order==$lastdo) echo" selected"; ?>>Last</option>
                    <?php } ?>
                    
                  </select>            
              </div>
        </div>
        <div class="form-group">
            <label for="accesslevel" class="col-sm-5 control-label">Access Level</label>
            <div class="col-sm-7">
            <select name="accesslevel" id="accesslevel" class="form-control" onChange="pwd(this.value)">
                	<option value="Public" <?php if($accesslevel == "Public") echo "selected"; ?>>Public</option>
                    <option value="Private" <?php if($accesslevel == "Private") echo "selected"; ?>>Private</option>
                    <option value="Protected" <?php if($accesslevel == "Protected") echo "selected"; ?>>Password Protected</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-5 control-label">Password</label>
            <div class="col-sm-7">
            <?php
				$disabled = "disabled";
				if($accesslevel == "Protected")
				{
					$disabled = "";
				}
			?>
            <input type="text" id="password" name="password" value="<?php echo $password; ?>" class="form-control" <?php echo $disabled; ?>>
            </div>
        </div>
        
         <div class="form-group">
            <label for="gallery_sn" class="col-sm-5 control-label">Related Gallery</label>
            <div class="col-sm-7">
            <select name="gallery_sn" id="gallery_sn" class="form-control">
            		<option value="0">None</option>
                	<?php
                    $listaccount=mysqli_query($dbc,"select * from gallery order by description");
                    while($row = mysqli_fetch_array($listaccount))
                    {
					$description = $row['description'];
					$s = "";
					if($row['sn'] == $gallery_sn) $s = "selected";
					?>
                	<option value="<?php echo $row['sn']; ?>" <?php echo $s; ?>><?php echo $description; ?></option>
                    <?php 
					}
					?>
                </select>
            </div>
        </div>

 
        
      <div class="form-group">
        <div class="col-sm-offset-5 col-sm-7">
          <input type="hidden" name="sn" value="<?php echo $sn; ?>">
          <input type="hidden" name="author" value="<?php echo $author; ?>">
          <input type="hidden" name="post_type" value="post">
          <?php if($sn == 0) { ?>
          <input type="hidden" name="post_status" value="<?php echo $post_status; ?>">
          <input type="hidden" name="category_sn" value="<?php echo $category_sn; ?>">
          <?php } ?>
		  <input type="submit" value="Save" id="sBtn" class="btn btn-primary">
        </div>
      </div>