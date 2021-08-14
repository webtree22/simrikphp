<section class="section">
					<div class="container">
						<div class="row pt-3">
							<div class="col">
								<h2 class="font-weight-semibold mb-0">Featured Projects</h2>
								<p class="lead font-weight-normal">Some of our featured construction Projects.</p>
							</div>
						</div>
						<div class="row">
						<?php
							$q=mysqli_query($dbc,"select * from featured where language = '$sitelanguage' order by display_order limit 0,3");
							while($r = mysqli_fetch_array($q))
							{
								$postsn = $r['sn'];
								$result=mysqli_query($dbc,"select * from posts where sn = $postsn");
								while($row = mysqli_fetch_array($result))
								{
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

									$postlink = "$set_sitename/post/$slug";
									
									$lkup=mysqli_query($dbc,"select * from category where sn = $category_sn");
									while($rowlkup = mysqli_fetch_array($lkup))
									{
										$thiscatname=$rowlkup['categoryname'];
										$thiscatslug=$rowlkup['slug'];
									}
									$catlink = "$set_sitename/category/$thiscatslug";
									?>
							<div class="col-md-4">
								<a href="demo-medical-resources-detail.html" class="text-decoration-none">
									<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight d-block">
										<span class="thumb-info-side-image-wrapper">
											<img alt="" class="img-fluid" src="<?php echo $featured_image; ?>">
										</span>
										<span class="thumb-info-caption px-4 pb-3">
											<span class="thumb-info-caption-text p-xl">
												<h4 class="font-weight-semibold mb-1"><?php echo $title; ?></h4>
												<p class="text-3"><?php echo htmlspecialchars_decode($excerpt); ?></p>
											</span>
										</span>
									</span>
								</a>
							</div>
						<?php } 
							}
						?>

						</div>
						<div class="row pb-4">
							<div class="col-lg-12 text-center">
								<a class="btn btn-outline btn-quaternary custom-button text-uppercase font-weight-bold">view more</a>
							</div>
						</div>
					</div>
				</section>