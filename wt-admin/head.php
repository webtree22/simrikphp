<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $base; ?>/images/favicon.ico">

    <title><?php echo $site_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $base; ?>/css/styles.css" rel="stylesheet">
	<link href="<?php echo $base; ?>/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
  <?php
	include("active.php");
	
	$active_posts = "";
	$active_settings = "";
	$active_banners = "";
	$active_media = "";
	$active_forms = "";
	$active_pages = "";
	
	
	if($active=="posts") $active_posts="active";
	if($active=="settings") $active_settings="active";
	if($active=="banners") $active_banners="active";
	if($active=="media") $active_media="active";
	if($active=="forms") $active_forms="active";
	if($active=="pages") $active_pages="active";

	?>