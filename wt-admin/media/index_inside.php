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
	  
	  $linkName_thumb    = str_replace(" ", "%20", substr($value, 3));
	  $linkName = str_replace(".thumbs/", "", $linkName_thumb);
	  
	  $displpayImage = "<img src=\"$linkName_thumb\">";
	  
      if (is_dir($fileName)) {
	  	$dirDisplay = substr($linkName_thumb, $rootLen);
		
        echo prePad($level) . "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"index.php?root=$linkName_thumb\" style=\"font-weight: bold; color: #205477\">" . $dirDisplay . "</a><br>\n";
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
	  
	  $linkName_thumb    = str_replace(" ", "%20", substr($value, 3));
	  $linkName = str_replace(".thumbs/", "", $linkName_thumb);
	  
	  $displpayImage = "<img src=\"$linkName_thumb\">";
	  
      if (is_dir($fileName)) {
	  	//
      } else {
        echo "<div class=\"outer\"><div class=\"imagethumb\"><span class=\"helper\"></span><a href=\"" . $linkName . "\" style=\"text-decoration:none;\" data-lity>" . $displpayImage . "</a></div>";
		echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\" style=\"text-decoration: none\" onclick=\"modalval('$linkName')\"><span class=\"label label-info\">URL</span></a></div>";
      }
    }
  }
}

?>
  <style>
  .outer
  {
  	float:left;
	margin-bottom:20px;
  }
  .imagethumb
  {
  	padding:5px;
	border:1px solid #e5e5e5;
	border-radius: 2px;
	margin-right: 20px;
	width: 112px;
	height: 87px;
	text-align: center;
	white-space: nowrap;

  }

	
	.imagethumb .helper {
		display: inline-block;
		height: 100%;
		vertical-align: middle;
	}
	
	.imagethumb img {
		vertical-align: middle;
		max-height: 75px;
		max-width: 100px;
	}
  </style>
<div class="row">
	<div class="col-md-2">
    	<h4>Browse</h4>
        <a href="index.php?root=<?php echo $superroot; ?>" style="font-weight: bold; color: #205477">images</a><br>
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