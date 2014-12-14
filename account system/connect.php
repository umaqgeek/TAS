<?php

$host = "localhost";
$user = "root";
$pswd = "";
$conn = mysql_connect($host, $user, $pswd) 
or die ("Error connecting to MySQL");
// jika perlu -> echo "Connected to MySQL <br />";
$dbname = "sistem_akaun";
mysql_select_db($dbname) or
die ("Error connecting to Database: ".$dbname);
//echo ni utk kluar kt interface -> echo "Connected to Database <br />";

?>