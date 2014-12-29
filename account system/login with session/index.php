<?php
session_start();
$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem_akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);
$i= hello;
$username = $_POST['user'];
$password = $_POST['pass'];

$getLogin = mysql_query("SELECT * FROM users WHERE username='$username' AND pass = '$password'"); 
$rows = mysql_fetch_array($getLogin);

if(mysql_num_rows($getLogin) > 0)
{
	$_SESSION['IsValid']= true;
	$_SESSION['id'] = $rows['id'];
	$_SESSION['username'] = $rows['username'];
	$_SESSION['password'] = $rows['pass'];
	$_SESSION['email'] = $rows['email'];
	$_SESSION['full name'] = $rows['Fname'];
	$_SESSION['address'] = $rows['address'];
	$_SESSION['ic num'] = $rows['ic'];
	$_SESSION['phone'] = $rows['tel'];
	echo "Success";
	
	header("Location:add.php");
}
else
{
	header("Location:login.php?msg=2");
}
?>