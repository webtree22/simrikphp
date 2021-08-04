<div class="form-group">
            <label for="title" class="col-sm-1 control-label">Title</label>
            <div class="col-sm-11">
            <input type="text" id="title" name="title" value="<?php echo $title; ?>" class="form-control" onBlur="slug_it(this.value)" >
            </div>
        </div>

            <input type="hidden" id="slug" name="slug" value="<?php echo $slug; ?>">

        <div class="form-group">
            <label for="content2" class="col-sm-1 control-label">Content</label>
            <div class="col-sm-11">
            <script src="../ckeditor/ckeditor.js"></script>
            <textarea class="form-control" name="content" id="content"><?php echo $content; ?></textarea>

            
           <script>
			CKEDITOR.replace( 'content', {
				removeButtons: 'Save,Language,Styles',
				height : 500
			} );
			</script>
            </div>
        </div>
		<!--
        <div class="form-group">
            <label for="excerpt" class="col-sm-1 control-label">Excerpt</label>
            <div class="col-sm-11">
            <textarea class="form-control" name="excerpt" id="excerpt"><?php echo $excerpt; ?></textarea>
            <script>
			CKEDITOR.replace( 'excerpt', {
				// Define the toolbar groups as it is a more accessible solution.
				toolbarGroups: [
					{"name":"basicstyles","groups":["basicstyles"]},
					{"name":"links","groups":["links"]},
					{"name":"document","groups":["mode"]}
				],
				// Remove the redundant buttons from toolbar groups defined above.
				removeButtons: 'Save,Language,Anchor,Styles'
			} );
			</script>
            </div>
        </div>
        -->