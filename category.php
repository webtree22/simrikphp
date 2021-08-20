<?php include("base.php"); ?>
<?php
//getv
$category = $_GET['category'];
$pagenumber = $_GET['pagenumber'];
$menutitle = $category;
//title and menu
$pagetitle = "";
include("menu_highlight.php");
?>
<?php


//check if it has parent category
$category_parent = "";
$q = mysqli_query($dbc, "select * from category where slug='$category'");
$subcategory_of = 0;
$categoryname = "";
while ($r = mysqli_fetch_array($q)) {
    $category_sn = $r['sn'];
    $subcategory_of = $r['subcategory_of'];
    $categoryname = $r['categoryname'];
}
if ($subcategory_of > 0) {
    $q = mysqli_query($dbc, "select categoryname,slug from category where sn = $subcategory_of");
    while ($r = mysqli_fetch_array($q)) {
        $category_parent = $r['categoryname'];
        $category_parent_slug = $r['slug'];
    }
}
$pagetitle = $categoryname;
$pagetitle .= " | " . $set_companyname;
?>
<?php
//not used
function function_that_shortens_text_but_doesnt_cutoff_words($text, $length)
{
    if (strlen($text) > $length) {
        $text = substr($text, 0, strpos($text, ' ', $length));
    }

    return $text;
}
?>
<?php include("head.php"); ?>

<section class="page-header page-header-modern bg-color-primary page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1><?php echo $categoryname; ?></h1>
                <!-- <span class="sub-title">Learn more about our departments</span> -->
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-end breadcrumb-light">
                    <li><a href="<?php echo $set_sitename; ?>/index.php">Home</a></li>
                    <li class="active"><?php echo $categoryname; ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php include("category_posts.php"); ?>




<?php include("footer.php"); ?>