<?php

$introslug = "services-introduction";
if($sitelanguage=="English") $introslug = "services-introduction";
$listaccount=mysqli_query($dbc,"select * from pages where slug ='$introslug' and language='$sitelanguage'");
$intro = "";
while($row = mysqli_fetch_array($listaccount))
{  
    $intro = $row['content'];
}		

$q=mysqli_query($dbc,"select * from category where slug='security-services'");
$subcategory_of = 0;
$categoryname = "";
while($r = mysqli_fetch_array($q))
{
	$category_sn = $r['sn'];
	$subcategory_of = $r['subcategory_of'];
	$categoryname = $r['categoryname'];
}

?>
<section class="section section-no-border">
    <div class="container">
        <div class="row pt-3">
            <div class="col">
                <h2 class="font-weight-semibold mb-0"><?php echo $categoryname; ?></h2>
                <p class="lead font-weight-normal"><?php echo htmlspecialchars_decode($intro); ?></p>
            </div>
        </div>
        <div class="row mt-4">
        <?php
            $sql = "select posts.* from posts inner join category on posts.category_sn = category.sn where 
            category_sn=$category_sn and language = '$sitelanguage' and posts.post_status ='Published' order by display_order";
            $q=mysqli_query($dbc,$sql); 

            $pn = mysqli_num_rows($q);
            $c = 0;
            while($row = mysqli_fetch_array($q))
            {
                $postid = $row['sn'];
                $author=$row['author'];
                $post_date=$row['post_date'];
                $title=$row['title'];
                $content=$row['content'];
                $excerpt=$row['excerpt'];
                $post_status=$row['post_status'];
                $comment_status=$row['comment_status'];
                $category_sn=$row['category_sn'];
                $slug=$row['slug'];
                $display_order=$row['display_order'];
                $accesslevel=$row['accesslevel'];
                $password=$row['password'];
                $gallery_sn = $row['gallery_sn'];
                $featured_image = $row['featured_image'];
                // if(strlen($featured_image)>10) 
                // {
                //     $featured_image_img = "<img src=\"$featured_image\"  class=\"leftside\">"; //filter thumb task	
                // }
                // else
                // {
                //     $featured_image_img = "&nbsp;";
                // }
                $postlink = "$set_sitename/post/$slug";
            ?>

                
                <div class="col-lg-4">
                    <div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                        <div class="feature-box-icon" style="min-width: 4.7rem;">
                            <img src="<?php echo $featured_image; ?>" alt class="img-fluid" />
                        </div>
                        <div class="feature-box-info">
                            <h4 class="font-weight-semibold"><a href="<?php echo $postlink; ?>" class="text-decoration-none"><?php echo $title; ?></a></h4>
                            <p><?php echo htmlspecialchars_decode($excerpt); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>

        <div class="row mt-2 pb-4">
            <div class="col-lg-12 text-center">
                <a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 font-weight-bold" href="<?php echo $set_sitename."/category/security-services/1"; ?>">view in detail</a>
            </div>
        </div>
    </div>
</section>