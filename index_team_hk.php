<section class="team pb-2">
	<div class="container">
		<div class="row pt-4">
			<div class="col">
				<h2 class="font-weight-semibold mb-0">Team Members</h2>
				<p class="lead font-weight-normal">Hong Kong</p>

				<div id="porfolioAjaxBoxMedical" class="ajax-box ajax-box-init mb-4">

					<div class="bounce-loader">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>

					<div class="ajax-box-content" id="porfolioAjaxBoxContentMedical"></div>

				</div>

			</div>
		</div>
		<div class="row pb-4">
			<div class="owl-carousel owl-theme nav-bottom rounded-nav show-nav-title ps-1 pe-1" data-plugin-options="{'items': 4, 'loop': false, 'dots': false, 'nav': true}">
				<?php
				$sql = "select posts.* from posts inner join category on posts.category_sn = category.sn where 
                        category_sn=31 and language = '$sitelanguage' and posts.post_status ='Published' order by display_order";
				$q = mysqli_query($dbc, $sql);

				$pn = mysqli_num_rows($q);
				$c = 0;
				while ($row = mysqli_fetch_array($q)) {

					$title = $row['title'];
					$names = explode(" - ", $title);
					$featured_image = $row['featured_image'];

					$postlink = "$set_sitename/post/$slug";
				?>


					<div class="pe-3 ps-3">
						<a href="#" data-href="demo-medical-doctors-detail.html" data-ajax-on-page class="text-decoration-none">
							<span class="thumb-info thumb-info-no-zoom thumb-info-hide-wrapper-bg">
								<span class="thumb-info-wrapper m-0">
									<img src="<?php echo $featured_image; ?>" class="img-fluid" alt="">
								</span>
								<span class="thumb-info-caption p-4">
									<span class="custom-thumb-info-title">
										<span class="custom-thumb-info-type font-weight-light text-4"><?php echo $names[1]; ?></span>
										<span class="custom-thumb-info-inner font-weight-semibold text-5"><?php echo $names[0]; ?></span>
										<i class="icon-arrow-right-circle icons font-weight-semibold text-5 "></i>
									</span>
								</span>
							</span>
						</a>
					</div>


				<?php } ?>
			</div>
		</div>
	</div>
</section>
