<?php

error_reporting(0);
include('connect.php');
$ID=$_REQUEST['id'];
mysql_query("delete from account where id='" .$ID. "'");
header('location: Admin_home.php');

?>