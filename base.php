<?php
session_start();
include("db.php");


$listaccount = mysqli_query($dbc, "select * from settings limit 1");
while ($row = mysqli_fetch_array($listaccount)) {
    $set_hitcount = $row['hitcount'];
    $set_showhitcount = $row['showhitcount'];
    $set_companyname = $row['companyname'];
    $set_address = $row['address'];
    $set_city = $row['city'];
    $set_country = $row['country'];
    $set_phone = $row['phone'];
    $set_fax = $row['fax'];
    $set_email = $row['email'];
    $set_feedbackemail = $row['feedbackemail'];
    $set_postperpage = $row['postperpage'];
    $set_hptitle = $row['hptitle'];
    $set_lastupdated = $row['lastupdated'];
}

//increase hit count
$inhc = mysqli_query($dbc, "update settings set hitcount = hitcount+1");


//Global Settings
$site_title = "WT-Admin";
$set_sitename = "http://localhost/simrik";
// $set_sitename = "http://www.unitedinsurance.com.np/insurance-in-nepal";
$base = $set_sitename . "/wt-admin";
$set_iconsize = 100;
$set_thumbnailsize = 250;
$set_imagesize = 750;
$set_comment_status = "Yes";
$set_is_responsive = "Yes";
$set_sitelanguages = "English,Nepali";
$set_sitelanguages_home = "Home,गृहपृष्‍ठ"; // sl_readmore
$set_nocopy = "Yes";
$set_menus = "Main, Bottom";
$set_adpositions = "Top, Right";
$set_adpositions_help = "(Heigh Exactly 110px; Width Max: 390px),(Width = 360px)";



////////////////////language
$defaultlanguage = "English";


if (!isset($_GET['lang'])) {
    if (empty($_SESSION['lang'])) {
        $_SESSION['lang'] = $defaultlanguage;
    }
} else {
    $_SESSION['lang'] = $_GET['lang'];
}
$sitelanguage = $_SESSION['lang'];
