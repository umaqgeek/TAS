<?php

error_reporting(0);
include('connect_to_db.php');
$ID=$_REQUEST['username'];
mysql_query("delete from account where name='" .$ID. "'");
header('location: table.php');

?>