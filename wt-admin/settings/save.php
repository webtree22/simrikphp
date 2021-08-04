<?php include "../base.php"; ?>
<?php
$pagecode=6; 
include("../general_permission.php"); 
?>
<?php 
$hitcount=$_POST['hitcount'];
$showhitcount=$_POST['showhitcount'];
$companyname=$_POST['companyname'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$feedbackemail=$_POST['feedbackemail'];
$postperpage=$_POST['postperpage'];
$hptitle=$_POST['hptitle'];
$lastupdated =$_POST['lastupdated'];

$sql = "update settings set hitcount = \"$hitcount\", showhitcount = \"$showhitcount\", companyname = \"$companyname\", address = \"$address\", city = \"$city\", country = \"$country\", phone = \"$phone\", fax = \"$fax\", email = \"$email\", feedbackemail = \"$feedbackemail\", postperpage = \"$postperpage\", hptitle = \"$hptitle\", lastupdated = \"$lastupdated\"";

$u = mysqli_query($dbc,$sql);
header("location: index.php?s=1");
?>