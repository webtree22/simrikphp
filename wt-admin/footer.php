<hr />
<div style="text-align: center">
<img src="<?php echo $base; ?>/images/webtreelogo.jpg" align="baseline" style="margin-bottom:5px" /><br />
<a href="http://www.webtree.com.np" style="font-weight:normal; font-size:14px">&copy; WebTree Pvt. Ltd.</a> | 
<a href="http://www.webtree.com.np/docs/wtadmin" style="font-weight:normal; font-size:14px">Documentation</a>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $base; ?>/js/jquery.min.js"></script>
    <script src="<?php echo $base; ?>/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $base; ?>/js/ie10-viewport-bug-workaround.js"></script>
    <!-- SmartMenus jQuery plugin -->
	<script type="text/javascript" src="<?php echo $base; ?>/js/jquery.smartmenus.min.js"></script>
    
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="<?php echo $base; ?>/js/jquery.smartmenus.bootstrap.js"></script>
    <?php if(isset($bsdp)) { ?>
    <link href="../css/datepicker.css" rel="stylesheet">
    <script src="../js/bootstrap-datepicker.js"></script>
    <script>
	// When the document is ready
            $(document).ready(function () {               
                $('#start_date').datepicker({
                    format: "yyyy-mm-dd"
                }); 
				$('#end_date').datepicker({
                    format: "yyyy-mm-dd"
                });
            });
	
	</script>
    <?php } ?>
     <?php if(isset($bslity)) { ?>        
        <link href="<?php echo $base; ?>/css/lity.min.css" rel="stylesheet">
        <script src="<?php echo $base; ?>/js/lity.min.js"></script>
   <?php } ?>
  </body>
</html>