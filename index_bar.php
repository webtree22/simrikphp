<?php 
	$introslug = "intro";
	if($sitelanguage=="English") $introslug = "intro";
	$listaccount=mysqli_query($dbc,"select * from pages where slug ='$introslug' and language='$sitelanguage'");

	while($row = mysqli_fetch_array($listaccount))
	{  
		$text = $row['content'];
		$htmlDom = new DOMDocument;
		@$htmlDom->loadHTML(htmlspecialchars_decode($text));
		$imageTags = $htmlDom->getElementsByTagName('img');
		$imgSrc = $imageTags[0]->getAttribute('src');


		//$extractedImages = array();
		// foreach($imageTags as $imageTag){
		// 	$imgSrc = $imageTag->getAttribute('src');
		// 	$altText = $imageTag->getAttribute('alt');
		// 	$titleText = $imageTag->getAttribute('title');
		// 	$extractedImages[] = array(
		// 		'src' => $imgSrc,
		// 		'alt' => $altText,
		// 		'title' => $titleText
		// 	);
		// }
		// var_dump($extractedImages);

	}		
?>
<section class="section-custom-medical">
					<div class="container">
						<div class="row medical-schedules">
							<div class="col-xl-3 box-one bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
								<div class="feature-box feature-box-style-2 align-items-center p-4">
									<div class="feature-box-icon p-0">
										<img src="img/demos/medical/icons/medical-icon-heart.png" alt class="img-fluid pt-1" />
									</div>
									<div class="feature-box-info">
										<h4 class="m-0 p-0">Security & Construction</h4>
									</div>
								</div>
							</div>
							<div class="col-xl-3 box-two bg-color-tertiary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
								<h5 class="m-0">
									<a href="/teams.php" title="">
										Experinced Teams
										<i class="icon-arrow-right-circle icons"></i>
									</a>
								</h5>
							</div>
							<!-- <div class="col-xl-3 box-three bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
								<div class="expanded-info p-4 bg-color-primary">
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
								<h5 class="m-0">
									Opening Hours
									<i class="icon-arrow-right-circle icons"></i>
								</h5>
							</div> -->
							<div class="col-xl-3 box-four bg-color-primary p-0 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
								<a href="tel:+008001234567" class="text-decoration-none">
									<div class="feature-box feature-box-style-2 m-0">
										<div class="feature-box-icon">
											<i class="icon-call-out icons"></i>
										</div>
										<div class="feature-box-info">
											<label class="font-weight-light">HongKong Hotline</label>
											<strong class="font-weight-normal">(921)123-4567</strong>
										</div>
									</div>
								</a>
							</div>
							<div class="col-xl-3 box-four bg-color-secondary p-0 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
								<a href="tel:+008001234567" class="text-decoration-none">
									<div class="feature-box feature-box-style-2 m-0">
										<div class="feature-box-icon">
											<i class="icon-call-out icons"></i>
										</div>
										<div class="feature-box-info">
											<label class="font-weight-light">Nepal Hotline</label>
											<strong class="font-weight-normal">(977)123-4567</strong>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="row mt-5 mb-5 pt-3 pb-3">
							<div class="col-md-8">
								<h2 class="font-weight-semibold mb-0">About Us</h2>
								<?php echo preg_replace("/<img[^>]+\>/i", "", htmlspecialchars_decode($text)); ?>
								<a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold">read more</a>
							</div>
							<div class="col-md-4 text-end">
								<img src="<?php echo $imgSrc; ?>" alt class="img-fluid box-shadow-custom" /> 
							</div>
						</div>
					</div>
				</section>