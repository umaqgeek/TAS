<?php

error_reporting(0);
$host = "localhost";
$user = "root";
$pswd = "";
$conn = mysql_connect($host, $user, $pswd) 
or die ("Error connecting to MySQL");
$dbname = "sistem_akaun";
mysql_select_db($dbname) or
die ("Error connecting to Database: ".$dbname);
$ID=$_REQUEST['id'];
mysql_query("delete from account where id='" .$ID. "'");
header('location: Admin Account.php');

?>