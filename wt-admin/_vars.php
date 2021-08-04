<?php
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "dbpurecms"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = "love"; /// the password that you created, or were given, to access your database




$link=mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
$sql="SET names 'utf8'";
$result=mysql_query($sql);
?>
<?php
$sql="select * from menu";
$query=mysql_query($sql);



for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo " $" . mysql_field_name($query, $i) . "=\$row['" . mysql_field_name($query, $i) . "'];<br>";
}

echo "<hr>";

for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo " $" . mysql_field_name($query, $i) . "=\$_POST['" . mysql_field_name($query, $i) . "'];<br>";
}

echo "<hr>";

for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo " $" . mysql_field_name($query, $i)."<br>";
}

echo "<hr>";

for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo " $" . "trimmed['" . mysql_field_name($query, $i) . "'] = \"\";<br>";
}
echo "<hr>";
for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo " $" . "error_" . mysql_field_name($query, $i) . " = \"\";<br>";
}
echo "<hr>";
for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo " \\\"$" . mysql_field_name($query, $i)."\\\",";
}

echo "<hr>";
for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo " " . mysql_field_name($query, $i).",";
}

echo "<hr>";
for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo  mysql_field_name($query, $i)." = \\\"$" . mysql_field_name($query, $i). "\\\", ";
}

echo "<hr>";
for ($i = 0; $i < mysql_num_fields($query); ++$i) {
    echo  "$" . mysql_field_name($query, $i)." = mysqli_real_escape_string ($" . "dbc, $" . "trimmed['" . mysql_field_name($query, $i). "']);<br>";
}

echo "<hr>";
for ($i = 0; $i < mysql_num_fields($query); ++$i) {
	$fieldname = mysql_field_name($query, $i);
	echo "<pre>&lt;div class=\"form-group\"&gt;<br>";
        echo "&lt;label for=\"$fieldname\" class=\"col-sm-2 control-label\"&gt;$fieldname&lt;/label&gt;<br>";
        echo "&lt;div class=\"col-sm-10\"&gt;<br>";
          echo "&lt;input type=\"text\" id=\"$fieldname\" name=\"$fieldname\" value=\"&lt;&#63;php echo $" .$fieldname ."; &#63;&gt;\" class=\"form-control\"&gt;<br>";
        echo "&lt;/div&gt;<br>";
      echo "&lt;/div&gt;</pre>";
}

?>

