<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'simrik');



// DEFINE ('DB_USER', 'unitedinsurancec_utddbu');
// DEFINE ('DB_PASSWORD', 'aMte]u!eR@1t');
// DEFINE ('DB_HOST', 'localhost');
// DEFINE ('DB_NAME', 'unitedinsurancec_utddb');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$dbc) {
	trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
}

$sql="SET names 'utf8'";
$result=mysqli_query($dbc, $sql);
?>