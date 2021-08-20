<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col">

            <h2 class="font-weight-semibold mb-3">Our mission</h2>
            
            <p class="lead font-weight-normal mb-5">Build a long-term relationship with our clients.</p>
            <?php
                $sql = "select posts.* from posts inner join category on posts.category_sn = category.sn where 
                category_sn=$category_sn and language = '$sitelanguage' and posts.post_status ='Published' order by display_order";
                $q = mysqli_query($dbc, $sql);

                $pn = mysqli_num_rows($q);
                $c = 0;
                while ($row = mysqli_fetch_array($q)) {
                    $postid = $row['sn'];
                    $author = $row['author'];
                    $post_date = $row['post_date'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $excerpt = $row['excerpt'];
                    $post_status = $row['post_status'];
                    $comment_status = $row['comment_status'];
                    $category_sn = $row['category_sn'];
                    $slug = $row['slug'];
                    $display_order = $row['display_order'];
                    $accesslevel = $row['accesslevel'];
                    $password = $row['password'];
                    $gallery_sn = $row['gallery_sn'];
                    $featured_image = $row['featured_image'];
                    if (strlen($featured_image) > 10) {
                        $featured_image_img = "<img src=\"$featured_image\"  class=\"img-fluid\">"; //filter thumb task	
                    } else {
                        $featured_image_img = "&nbsp;";
                    }
                    $postlink = "$set_sitename/post/$slug";
                ?>
            <div class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
                <div class="feature-box feature-box-style-2">
                    <div class="feature-box-icon" style="min-width: 4.7rem;">
                        <?php echo $featured_image_img; ?>
                    </div>
                    <div class="feature-box-info">
                        <h4 class="font-weight-semibold mb-1"><?php echo $title; ?></h4>
                        <p class="mb-0"><?php echo htmlspecialchars_decode($excerpt); ?></p>
                        <p class="mb-0"><a href="<?php echo $postlink; ?>" class="btn btn-outline btn-quaternary custom-button text-uppercase mt-3 font-weight-bold btn-md text-1">view more...</a></p>
                    </div>
                </div>

                <hr class="solid my-5">
            </div>
            <?php
}
?>
        </div>
    </div>

</div>

