<?php

$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);

if (isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM admin WHERE username='".$username."' AND pass='".$password."' LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($res) > 0)
	{
		$_SESSION['auth']=true;
		header ("Location: Admin Account.php");
		exit();
	}}
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username='".$username."' AND pass='".$password."' LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($res) > 0)
	{
		$_SESSION['auth']=true;
		header ("Location: menu(Home).php");
		exit();
	}
	else{
		echo "invalid login";
		echo "Your password or you username is wrong!";
		header ("Location: login.php");
		exit();
	}
}

	
?>
    <link rel="stylesheet" href="login_css.css" />
<body bgcolor="#003333">
<center>
<fieldset>

<img src="tuffahlogo.png" />

<div id="login" align="center">
<h1 align="center" font>Account System</h1>
  <h2 align="center">Log in</h2>
  
  <form action="login.php" method="post">
  <input type="text" name="username" placeholder="Username"/><br /><br />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" value="Log in" />
    
    </form>
 
</div>
</center>
</fieldset>
</body>

