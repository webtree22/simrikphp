<?php include("base.php"); ?>
<?php include("head.php"); ?>
<?php include("nav.php"); ?>
<?php
if(empty($_SESSION['UserId']) or empty($_SESSION['Username']) or empty($_SESSION['LoggedIn']))
{
	$loginpage= $base ."/index.php";
	header("location: $loginpage");
	exit(); // Quit the script.
}
?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>WT-Admin Dashboard</h1>
        <p>
          <a class="btn btn-lg btn-primary" href="http://www.webtree.com.np/docs/wtadmin" role="button" target="_blank">View WT-Admin docs &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->
<?php include("footer.php"); ?>


