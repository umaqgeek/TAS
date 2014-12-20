<?php

$host = "localhost";
$user = "root";
$pswd = "";
$conn = mysql_connect($host, $user, $pswd) 
or die ("Error connecting to MySQL");
//echo "Connected to MySQL <br />";
$dbname = "sistem_akaun";
mysql_select_db($dbname) or
die ("Error connecting to Database: ".$dbname);
//echo "Connected to Database <br />";

?>