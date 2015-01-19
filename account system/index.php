<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <link rel="stylesheet" href="css/login_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
</head>


<body background="img/bg.jpg">


<center>
<fieldset>

<img src="tuffahlogo.png" />

<div id="login" align="center">
<h1 align="center" font>Account System</h1>
  <h2 align="center">Log in</h2>


<?php

if (isset($_GET['msg']))
{
	$message = $_GET['msg'];
	if($message == 1)
	echo "<span style='color:green'>Your entry has been saved!</span>";
	if($message == 2)
	echo "<span style='color:red;'>Invalid Username or password</span>";
	if($message == 3)
	echo "<span style='color:red;'>Please fill all the form</span>";
}
?>

  
  <form action="login_process.php" method="post" id="form">
  <input type="text" name="username" placeholder="Username"/><br /><br />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" value="Log in" />
    
    </form>
 
</div>
</fieldset>
</center>

</body>
</html>
