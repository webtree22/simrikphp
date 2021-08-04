<?php include "../base.php"; ?>
<?php
$pagecode=11; 
include("../general_permission.php"); 
?>
<?php 
$sn=$_POST['sn'];
$author=$_POST['author'];
$title=$_POST['title'];

$content = "";
if(isset($_POST['content'])) $content = $_POST['content'];
if ( get_magic_quotes_gpc() )
$content = htmlspecialchars( stripslashes( $content ) ) ;
else
$content = htmlspecialchars( $content ) ;

$excerpt = "";
if(isset($_POST['excerpt'])) $excerpt = $_POST['excerpt'];
if ( get_magic_quotes_gpc() )
$excerpt = htmlspecialchars( stripslashes( $excerpt ) ) ;
else
$excerpt = htmlspecialchars( $excerpt ) ;

$post_status=$_POST['post_status'];
$slug=$_POST['slug'];
$accesslevel = $_POST['accesslevel']; //Public, Private, Password Protected (password for individual post only)
$password = "";
if(isset($_POST['password'])) $password = $_POST['password'];
$language=$_SESSION['AdminLanguage'];

//database slug = unique, still check if the slug exists and assign new slug
	if($slug == "")
	{
		//probably because of unicode or other languages
		$slug = uniqid(); 
	}
	else
	{
		$q=mysqli_query($dbc,"select slug from pages where slug = '$slug' and sn <> $sn");
		$n = mysqli_num_rows($q);
		if($n>=1)
		{
			//slug exists
			$uid = uniqid();
			$slug = $slug . "-" . $uid; // let's hope duplicate doesn't occur
		}
	}


if($sn == 0)
{
	$sql = "insert into pages(author, title, content, excerpt, post_status, slug, accesslevel, password, language)  
	values(\"$author\", \"$title\", \"$content\", \"$excerpt\", \"$post_status\", \"$slug\",\"$accesslevel\"
	, \"$password\", \"$language\")";
	$result=mysqli_query($dbc,$sql);
	$new_category_sn = mysqli_insert_id($dbc);

}
else
{
	$sql = "update pages set  title = \"$title\", content = \"$content\", excerpt = \"$excerpt\", post_status = \"$post_status\",
	 slug = \"$slug\", accesslevel = \"$accesslevel\", password = \"$password\" where sn = $sn";
	$u = mysqli_query($dbc,$sql);
	//update link if menu if the title, therefore slug, has changed.
	$newmenulink = "$set_sitename/page/$slug";
	$sql = "update menu set link =\"$newmenulink\", title = \"$title\" where mid = $sn and menutype = 'pages' and language = '$currentlanguage'";
	$u = mysqli_query($dbc,$sql);
}

header("location: index.php");

/*
kam banki
1. display_order automization
*/
?>