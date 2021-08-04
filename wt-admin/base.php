<?php
session_start();
include("db.php");

	    $listaccount=mysqli_query($dbc,"select * from settings limit 1");
		while($row = mysqli_fetch_array($listaccount))
		{
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
		}  


	
	//Global Settings
	$site_title="WT-Admin";
	$set_sitename = "http://localhost/simrik";
	// $set_sitename = "http://www.unitedinsurance.com.np/insurance-in-nepal";
	$base = $set_sitename . "/wt-admin";
	$set_iconsize = 100;
	$set_thumbnailsize = 250;
	$set_imagesize = 750;
	$set_comment_status = "Yes";
	$set_is_responsive = "Yes";
	$set_sitelanguages = "English,Nepali";
	$set_nocopy = "Yes";
	$set_menus = "Main, Bottom";
	$set_adpositions = "Top, Left, Right";
	$set_adpositions_help = "(Heigh Exactly 110px; Width Exactly: 360px),(Width = 360px),(Width = 360px)";
	
	
	if(!empty($_SESSION['Username']))
	{
		$currentuser_id = $_SESSION['UserId'];
		$currentuser = $_SESSION['Username'];
		$currentlanguage =  $_SESSION['AdminLanguage'];
	}
	
?>