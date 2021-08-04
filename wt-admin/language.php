<?php
include("base.php");
$_SESSION['AdminLanguage'] = $_GET['nl'];
header("location: dashboard.php");
?>