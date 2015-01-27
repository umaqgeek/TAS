<?php
$dbuser="root";
$dbpass = "";
$dbhost = "localhost";
$db = "sistem_akaun";
mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($db);

	$ID = $_GET['semak'];
	mysql_query("UPDATE account 
				SET semak = 'Disemak' 
				WHERE id = $ID");
	echo "Your Application has been Approved";
	Header("Location: Admin Account.php");
?>
