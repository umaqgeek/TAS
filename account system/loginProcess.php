<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];

if ($Username && $Password)
{
	// info is provided
	$queryget = mysql_query("SELECT * FROM user WHERE Username= '$Username' AND Password= '$Password'");
	
include("login_connect.php");

	}
	
	else{
		echo "You did not provide teh proper info needed for login.";
		include("login.php");

	}
?>