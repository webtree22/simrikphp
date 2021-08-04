<?php

function prePad($level)
{
  $ss = "";

  for ($ii = 0;  $ii < $level;  $ii++)
  {
    $ss = $ss . "&nbsp;&nbsp;&nbsp;&nbsp;";
  }

  return $ss;
}


function myScanDirFolder($dir, $level, $rootLen)
{

  if ($handle = opendir($dir)) {

    $allFiles = array();

    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
          $allFiles[] = "X: " . $dir . "/" . $entry;
      }
    }
    closedir($handle);

    natsort($allFiles);

    foreach($allFiles as $value)
    {
	  $displayName = substr($value, $rootLen + 4);
      $fileName    = substr($value, 3);  
	  $linkName    = str_replace(" ", "%20", substr($value, 3));
	  
      if (is_dir($fileName)) {
	  	$dirDisplay = substr($linkName, $rootLen);
		
        echo prePad($level) . "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"indexfile.php?root=$linkName\" style=\"font-weight: bold; color: #205477\">" . $dirDisplay . "</a><br>\n";
		myScanDirFolder($fileName, $level + 1, strlen($fileName));
	  }
    }
  }
}


function myScanDir($dir, $level, $rootLen)
{

  if ($handle = opendir($dir)) {

    $allFiles = array();

    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        if (is_dir($dir . "/" . $entry))
        {
          $allFiles[] = "D: " . $dir . "/" . $entry;
        }
        else
        {
          $allFiles[] = "F: " . $dir . "/" . $entry;
        }
      }
    }
    closedir($handle);

    natsort($allFiles);
	$sidelink = "";
    foreach($allFiles as $value)
    {
	  $displayName = substr($value, $rootLen + 4);
      $fileName    = substr($value, 3);
	  $tokens = explode('/', $fileName);
	  
	  $linkName    = str_replace(" ", "%20", substr($value, 3));

	  
      if (is_dir($fileName)) {
	  	//
      } else {
        echo "<div class=\"outer\"><a target=\"_blank\" href=\"" . $linkName . "\" style=\"text-decoration:none;\">" . $displayName . "</a> &nbsp;&nbsp;";
		echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\" style=\"text-decoration: none\" onclick=\"modalval('$linkName')\"><span class=\"label label-info\">URL</span></a></div>";
      }
    }
  }
}

?>
  <style>
  .outer
  {
	padding-bottom: 10px;
	margin-bottom:10px;
	border-bottom: 1px solid #e5e5e5;
  }
  
  </style>
<div class="row">
	<div class="col-md-2">
    	<h4>Browse</h4>
        <a href="indexfile.php?root=<?php echo $superroot; ?>" style="font-weight: bold; color: #205477">files</a><br>
    	<?php
		  myScanDirFolder($superroot, 0, strlen($superroot)); 
		?>
    </div>
    <div class="col-md-10">
    	
    	<?php
		  myScanDir($root, 0, strlen($root)); 
		?>
    </div>
</div>

<script>
function modalval(linkName)
{
	linkName = "<?php echo $set_sitename; ?>" + linkName.substring(5,500);
	document.getElementById("linkval").value = linkName;
	
}

function selectall()
{
	document.getElementById("linkval").setSelectionRange(0, document.getElementById("linkval").value.length);
}
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Image Path</h4>
      </div>
      <div class="modal-body">
       	<input id="linkval" class="form-control" onClick="selectall()">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>