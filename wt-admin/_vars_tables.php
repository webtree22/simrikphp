<?php
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "production"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = ""; /// the password that you created, or were given, to access your database




$link=mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
$result = mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
$sql="SET names 'utf8'";
$result=mysql_query($sql);
?>
<?php

$result = mysql_list_tables($dbname);
$num_rows = mysql_num_rows($result);
for ($j = 0; $j < $num_rows; $j++) {
    echo "Table: ", mysql_tablename($result, $j), "<br>";
	$tablename = mysql_tablename($result, $j);
	
		$sql="select * from $tablename";
		$query=mysql_query($sql);
		for ($i = 0; $i < mysql_num_fields($query); ++$i) {
			echo mysql_field_name($query, $i)."<br>";
		}
	echo "<br><br>";
}

mysql_free_result($result);






?>

