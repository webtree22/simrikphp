        <?php if($sn > 0 ) { ?>
        <div class="form-group">
            <label for="post_status" class="col-sm-5 control-label">Post Status</label>
            <div class="col-sm-7">
            	<select name="post_status" id="post_status" class="form-control">
                	<option value="Published" <?php if($post_status == "Published") echo "selected"; ?>>Published</option>
                    <option value="Draft" <?php if($post_status == "Draft") echo "selected"; ?>>Draft</option>
                </select>
            </div>
        </div>
        <?php } ?>
        
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
        <div class="col-sm-offset-5 col-sm-7">
          <input type="hidden" name="sn" value="<?php echo $sn; ?>">
          <input type="hidden" name="author" value="<?php echo $author; ?>">
          <input type="hidden" name="post_type" value="post">
          <?php if($sn == 0) { ?>
          <input type="hidden" name="post_status" value="<?php echo $post_status; ?>">
          <?php } ?>
		  <input type="submit" value="Save" id="sBtn" class="btn btn-primary">
        </div>
      </div>