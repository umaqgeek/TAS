<?php

error_reporting(0);
include('connect_to_db.php');
$ID=$_REQUEST['id'];
mysql_query("delete from account where id='" .$ID. "'");
header('location: table.php');

?>