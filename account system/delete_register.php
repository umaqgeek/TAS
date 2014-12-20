<?php

error_reporting(0);
include('connect_manageUser.php');
$ID=$_REQUEST['username'];
mysql_query("delete from users where username='" .$ID. "'");
header('location: register.php');

?>