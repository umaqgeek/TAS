<?php

error_reporting(0);
include('connect_manageUser.php');
$ID=$_REQUEST['id'];
mysql_query("delete from users where id='" .$ID. "'");
header('location: register.php');

?>