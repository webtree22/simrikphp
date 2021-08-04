<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>KCFinder: /image</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link href="css/index.php" rel="stylesheet" type="text/css" />
<style type="text/css">
div.file{width:100px;}
div.file .thumb{width:100px;height:100px}
</style>
<link href="themes/default/css.php" rel="stylesheet" type="text/css" />
<script src="js/index.php" type="text/javascript"></script>
<script src="js_localize.php?lng=en" type="text/javascript"></script>
<script src="themes/default/js.php" type="text/javascript"></script>
<script type="text/javascript">
_.version = "3.20-test2";
_.support.zip = true;
_.support.check4Update = true;
_.lang = "en";
_.type = "image";
_.theme = "default";
_.access = {"files":{"upload":true,"delete":true,"copy":true,"move":true,"rename":true},"dirs":{"create":true,"delete":true,"rename":true}};
_.dir = "image";
_.uploadURL = "/maxvision/upload";
_.thumbsURL = _.uploadURL + "/.thumbs";
_.opener = {"name":"tinymce4","TinyMCE":{"field":"tinymce-39-inp"}};
_.cms = "";
_.dropUploadMaxFilesize = 10485760;
_.langs = <?= json_encode($this->getLangs()) ?>;
$.$.kuki.domain = "";
$.$.kuki.path = "/";
$.$.kuki.prefix = "KCFINDER_";
$(function() { _.resize(); _.init(); });
$(window).resize(_.resize);
</script>
</head>
<body>
<div id="resizer"></div>
<div id="menu"></div>
<div id="clipboard"></div>
<div id="all">

<div id="left">
    <div id="folders"></div>
</div>

<div id="right">

    <div id="toolbar">
        <div>
        <a href="kcact:upload"><span>Upload</span></a>
        <a href="kcact:refresh"><span>Refresh</span></a>
        <a href="kcact:settings"><span>Settings</span></a>
        <a href="kcact:maximize"><span>Maximize</span></a>
        <a href="kcact:about"><span>About</span></a>
        <div id="loading"></div>
        </div>
    </div>

    <div id="settings">

    <div>
    <fieldset>
    <legend>View:</legend>
        <table summary="view" id="view"><tr>
        <th><input id="viewThumbs" type="radio" name="view" value="thumbs" /></th>
        <td><label for="viewThumbs">&nbsp;Thumbnails</label> &nbsp;</td>
        <th><input id="viewList" type="radio" name="view" value="list" /></th>
        <td><label for="viewList">&nbsp;List</label></td>
        </tr></table>
    </fieldset>
    </div>

    <div>
    <fieldset>
    <legend>Show:</legend>
        <table summary="show" id="show"><tr>
        <th><input id="showName" type="checkbox" name="name" /></th>
        <td><label for="showName">&nbsp;Name</label> &nbsp;</td>
        <th><input id="showSize" type="checkbox" name="size" /></th>
        <td><label for="showSize">&nbsp;Size</label> &nbsp;</td>
        <th><input id="showTime" type="checkbox" name="time" /></th>
        <td><label for="showTime">&nbsp;Date</label></td>
        </tr></table>
    </fieldset>
    </div>

    <div>
    <fieldset>
    <legend>Order by:</legend>
        <table summary="order" id="order"><tr>
        <th><input id="sortName" type="radio" name="sort" value="name" /></th>
        <td><label for="sortName">&nbsp;Name</label> &nbsp;</td>
        <th><input id="sortType" type="radio" name="sort" value="type" /></th>
        <td><label for="sortType">&nbsp;Type</label> &nbsp;</td>
        <th><input id="sortSize" type="radio" name="sort" value="size" /></th>
        <td><label for="sortSize">&nbsp;Size</label> &nbsp;</td>
        <th><input id="sortTime" type="radio" name="sort" value="date" /></th>
        <td><label for="sortTime">&nbsp;Date</label> &nbsp;</td>
        <th><input id="sortOrder" type="checkbox" name="desc" /></th>
        <td><label for="sortOrder">&nbsp;Descending</label></td>
        </tr></table>
    </fieldset>
    </div>

    <div>
        <select id="lang"></select>
    </div>

    </div>

    <div id="files">
        <div id="content"></div>
    </div>
</div>
<div id="status"><span id="fileinfo">&nbsp;</span></div>
</div>
</body>
</html>