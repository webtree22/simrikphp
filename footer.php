</div>

<footer id="footer" class="m-0">
<?php
$sql = "select posts.* from posts inner join category on posts.category_sn = category.sn where 
   category_sn=29 and language = '$sitelanguage' and posts.post_status ='Published' order by display_order";
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
	if(strlen($featured_image)>10) 
	{
		$featured_image_img = "<img src=\"$featured_image\"  class=\"leftside\">"; //filter thumb task	
	}
	else
	{
		$featured_image_img = "&nbsp;";
	}
	$postlink = "$set_sitename/post/$slug";
?>

    <div class="container">

        <div class="row pt-5 pb-4">
            <div class="col-lg-2 text-md-center text-lg-start ms-lg-auto">
                <h4 class="mb-4"><?php echo $title; ?></h4>
                <ul class="social-icons">
                    <li class="social-icons-facebook">
                        <a href="http://www.facebook.com/" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="social-icons-twitter">
                        <a href="http://www.twitter.com/" target="_blank" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="social-icons-linkedin">
                        <a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 mb-2">
                <h4 class="mb-4">Location</h4>
                <?php echo htmlspecialchars_decode($excerpt); ?>
            </div>
            <div class="col-md-4 col-lg-3">
                <h4 class="mb-4">Opening Hours</h4>
                <div class="info custom-info">
                    <span>Mon-Fri</span>
                    <span>8:30 am to 5:00 pm</span>
                </div>
                <div class="info custom-info">
                    <span>Saturday</span>
                    <span>9:30 am to 1:00 pm</span>
                </div>
                <div class="info custom-info">
                    <span>Sunday</span>
                    <span>Closed</span>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="contact-details">
                    <h4 class="mb-4">Hotline</h4>
                    <a class="text-decoration-none" href="tel:1234567890">
                        <strong class="font-weight-light">(800)123-4567</strong>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <?php
}
?>
    <div class="footer-copyright pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center m-0">
                    <p>?? Copyright 2021. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- Vendor -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/assets/vendor/jquery.cookie/jquery.cookie.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/jquery.validation/jquery.validate.min.js"></script>
<script src="/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="/assets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="/assets/vendor/lazysizes/lazysizes.min.js"></script>
<script src="/assets/vendor/isotope/jquery.isotope.min.js"></script>
<script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/assets/vendor/vide/jquery.vide.min.js"></script>
<script src="/assets/vendor/vivus/vivus.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/js/theme.js"></script>



<!-- Demo -->
<script src="/assets/js/demos/demo-medical.js"></script>

<!-- Theme Custom -->
<!-- <script src="assets/js/custom.js"></script> -->

<!-- Theme Initialization Files -->
<script src="/assets/js/theme.init.js"></script>

</body>

</html>