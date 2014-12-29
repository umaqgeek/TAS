<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

if (isset($_GET['msg']))
{
	$message = $_GET['msg'];
	if($message == 1)
	echo "<span style='color:green'>Your entry has been saved!</span>";
	if($message == 2)
	echo "<span style='color:red;'>Invalid Username or password";
}
?>

 <form action="index.php" method="post">
    <input type="text" name="user" placeholder="Username"/><br /><br />
    <input type="password" name="pass" placeholder="Password" />
    <input type="submit" value="Log in" />
    
    </form>
 
</div>
</center>
</fieldset>
</body>
