<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" data-dynamic-height="['650px','650px','650px','550px','500px']" style="height: 650px;">
    <div class="owl-stage-outer">
        <div class="owl-stage">

        <?php
	$q=mysqli_query($dbc,"select gallerypics.* from gallerypics inner join gallery on gallerypics.gallerysn = gallery.sn 
	where gallery.hppics='Yes' order by gallerypics.display_order");
   	if(!$q) echo mysqli_error($dbc);

	while($row = mysqli_fetch_array($q))
	{
		$galleryid=$row['sn'];
		$picpath=$row['picpath'];
		
		$newpicpath = str_replace(".thumbs/","",$picpath);
		// echo $newpicpath . "sss<hr/>";
		
		$q1= mysqli_query($dbc, "select * from gallerypicsdata where gallerypicssn = $galleryid and language = '$sitelanguage'");
		while($r1 = mysqli_fetch_array($q1))
		{
			$caption = $r1['caption'];
		}
        if ($caption) {
            $texts = explode(".", $caption);
        } else {
            $texts[0] = '';
            $texts[1] = '';
            $texts[2] = '';
        }
		
	?>
            <div class="owl-item position-relative overlay overlay-show overlay-op-3" style="background-image: url(<?php echo $newpicpath; ?>); background-size: cover; background-position: center;">
                <div class="container position-relative z-index-3 h-100">
                    <div class="row align-items-center h-100">
                        <div class="col pb-4 text-end">
                            <h1 class="text-color-light font-weight-extra-bold text-13 line-height-2 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}"><?php echo $texts[0]; ?></h1>
                            <h2 class="text-color-light font-weight-extra-bold text-4-5 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}"><?php echo $texts[1]; ?></h2>
                            <div class="d-inline-block">
                                <p class="text-color-light custom-border-bottom-1 font-weight-light text-4-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}"><?php echo $texts[2]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>  

            <!-- Carousel Slide 2 -->
            <!-- <div class="owl-item position-relative overlay overlay-show overlay-op-3" style="background-image: url(assets/img/slides/construction.jpeg); background-size: cover; background-position: center;">
                <div class="container position-relative z-index-3 h-100">
                    <div class="row align-items-center h-100">
                        <div class="col pb-4">
                            
                                <h1 class="text-color-light font-weight-extra-bold text-13 line-height-2 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">MEDICAL APPOINTMENT</h1>
                                <h2 class="text-color-light font-weight-extra-bold text-4-5 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">SCHEDULE A MEDICAL APPOINTMENT NOW</h2>
                                <div class="d-inline-block">
                                    <p class="text-color-light custom-border-bottom-1 font-weight-light text-4-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">Online or Over the Phone</p>
                                </div>
                         
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
    <div class="owl-dots mb-5">
        <button role="button" class="owl-dot active"><span></span></button>
        <button role="button" class="owl-dot"><span></span></button>
    </div>
</div>

