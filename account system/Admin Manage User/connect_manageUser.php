<?php

$host = "localhost";
$user = "root";
$pswd = "";
$conn = mysql_connect($host, $user, $pswd) 
or die ("Error connecting to MySQL");
$dbname = "sistem_akaun";
mysql_select_db($dbname) or
die ("Error connecting to Database: ".$dbname);

?>