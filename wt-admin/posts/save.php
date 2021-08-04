<?php include "../base.php"; ?>
<?php
$pagecode=3; 
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
$comment_status=$_POST['comment_status'];
$category_sn=$_POST['category_sn'];
$slug=$_POST['slug'];
$display_order=$_POST['display_order'];
$accesslevel = $_POST['accesslevel']; //Public, Private, Password Protected (password for individual post only)
$password = "";
if(isset($_POST['password'])) $password = $_POST['password'];
$featured_image=$_POST['featured_image'];
$gallery_sn=$_POST['gallery_sn'];


//database slug = unique, still check if the slug exists and assign new slug
	if($slug == "")
	{
		//probably because of unicode or other languages
		$slug = uniqid(); 
	}
	else
	{
		$q=mysqli_query($dbc,"select slug from posts where slug = '$slug' and sn <> $sn");
		$n = mysqli_num_rows($q);
		if($n>=1)
		{
			//slug exists
			$uid = uniqid();
			$slug = $slug . "-" . $uid; // let's hope duplicate doesn't occur
		}
	}
	
	//old values
	$sql="select category_sn,display_order from posts where sn=$sn";
	$result=mysqli_query($dbc,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$old_do = $row['display_order'];
	$old_cat = $row['category_sn'];
	}
	//

if($sn == 0)
{
	$sql = "insert into posts(author, title, content, excerpt, post_status, comment_status, category_sn, slug,
	display_order, accesslevel, password, gallery_sn, featured_image) 
	values(\"$author\", \"$title\", \"$content\", \"$excerpt\", \"$post_status\", \"$comment_status\", \"$category_sn\", 
	\"$slug\", \"-9\", \"$accesslevel\", \"$password\", \"$gallery_sn\", \"$featured_image\")";
	$result=mysqli_query($dbc,$sql);
	$new_category_sn = mysqli_insert_id($dbc);
	
	$sql="update posts set display_order = display_order+1 where display_order >= $display_order 
	and category_sn = $category_sn";
	$result=mysqli_query($dbc,$sql);
	

	$sql="update posts set display_order = $display_order where display_order = -9";
	$result=mysqli_query($dbc,$sql);
}
else
{
	$sql = "update posts set  title = \"$title\", content = \"$content\", excerpt = \"$excerpt\", post_status = \"$post_status\",
	comment_status = \"$comment_status\", category_sn = \"$category_sn\", slug = \"$slug\", accesslevel = \"$accesslevel\"
	, password = \"$password\", gallery_sn = \"$gallery_sn\", featured_image = \"$featured_image\" where sn = $sn";
	$u = mysqli_query($dbc,$sql);
	include("resorting.php");
	//update link if menu if the title, therefore slug, has changed.
	$newmenulink = "$set_sitename/post/$slug";
	$sql = "update menu set link =\"$newmenulink\", title = \"$title\" where mid = $sn and menutype = 'posts' and language = '$currentlanguage'";
	$u = mysqli_query($dbc, $sql);
}

header("location: index.php?category_sn=$category_sn");

/*
kam banki
1. display_order automization
*/
?>