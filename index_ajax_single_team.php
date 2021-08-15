<?php
include("base.php");
$sn = $_GET['sn'];

$sql = "select posts.* from posts where sn=$sn and posts.post_status ='Published'";

$q = mysqli_query($dbc, $sql);

$pn = mysqli_num_rows($q);

while ($row = mysqli_fetch_array($q)) {
    $sn = $row['sn'];
    $title = $row['title'];
    $names = explode(" - ", $title);
    $featured_image = $row['featured_image'];
    $content = $row['content'];
    // echo $title;
}

?>

<hr class="solid">

<div class="row mt-5 mb-5 pt-1">
	<div class="col-lg-4">

		<!-- <div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 3000}">
			<div>
				<span class="img-thumbnail d-block no-borders">
					<img alt="" class="img-fluid" src="img/doctor-1.jpg">
				</span>
			</div>
			<div>
				<span class="img-thumbnail d-block no-borders">
					<img alt="" class="img-fluid" src="img/doctor-1-2.jpg">
				</span>
			</div>
		</div> -->

        <img alt="" class="img-fluid" src="<?php echo  $featured_image; ?>">

	</div>

	<div class="col-lg-8">

		<h3 class="font-weight-bold mt-2"><?php echo $names[0]; ?></h3>

		<h5 class="mt-2 mb-1"><?php echo $names[1]; ?></h5>
		<p><?php echo htmlspecialchars_decode($content)?></p>

		<!-- <a href="#" class="btn btn-primary btn-icon mb-3"><i class="icon-calendar icons"></i>Doctor Timetable</a>

		<h5 class="mt-2 mb-3">Procedures</h5>

		<ul class="list list-icons list-primary">
			<li><i class="fas fa-check-circle"></i> Surgeries</li>
			<li><i class="fas fa-check-circle"></i> Neck Pain</li>
			<li><i class="fas fa-check-circle"></i> Cervical Myelopathy</li>
		</ul> -->

	</div>
</div>

<hr class="solid">

<h4 class="font-weight-semibold mt-5 mb-1">More Doctors:</h4>