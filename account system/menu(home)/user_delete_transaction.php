<?php

error_reporting(0);
$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem_akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);

$ID=$_REQUEST['id'];
mysql_query("delete from account where id='" .$ID. "'");
header('location: User_CheckTransaction.php');

?>