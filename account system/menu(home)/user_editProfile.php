<?php
session_start();
error_reporting(0);

$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem_akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);

$i=$_SESSION['username'];
$link=$_SESSION['id'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../Menu_css/index_css.css" />
<link rel="stylesheet" href="../Menu_css/form.css" />

</head>

<body background="black and white lights street lights 1920x1200 wallpaper_wallpaperswa.com_45.jpg">

<div class="header">
	<div>
        	<a><img src="../tuffahlogo.png" width="199" height="135" /></a>
	</div>
        
    <div>
    <ul>
      	<li><a href="#">Home</a></li>
        <li><a href="User_index(home).php">Account Form</a></li>
        <li><a href="user_profile.php">Profile</a></li>
      	<li><a href='?logout=true'>Log out</a></li>
	</ul>
	</div>
    <br />
    <br />

</div>








<?php
$update = $_POST['update'];
$SQL = "SELECT * FROM users WHERE username='" .$i. "' AND id='" .$link. "'";
$QUERY = mysql_query($SQL);
while($edit=mysql_fetch_array($QUERY)){
	$oldname = $edit['username']; 
	$oldpass = $edit['pass'];
	$oldFname = $edit['Fname'];
	$oldic = $edit['ic'];
	$oldtel = $edit['tel'];
	$oldemail = $edit['email'];
	$oldaddress = $edit['address'];
}
if ($update){
	$newUsername = $_POST['name'];
	$newpass = $_POST['pass'];
	$newemail = $_POST['email'];
	$newic = $_POST['ic'];
	$newtel = $_POST['tel'];
	$newfname = $_POST['fname'];
	$newaddress = $_POST['address'];
	
	mysql_query("update users set username='" .$newUsername. "', pass='" .$newpass. "', Fname='" .$newfname. "', ic='" .$newic. "', tel='" .$newtel. "', email='" .$newemail. "', address='" .$newaddress. "' where username='" .$i. "' AND id='" .$link. "'");
	
	
	$passStr = "SELECT * FROM users WHERE id != '".$link."'";
	$Str = mysql_query($passStr);
	while($strength = mysql_fetch_array($Str)){
		$strPass = $strength['pass'];
	}
	if($newpass == $strPass){
		$_SESSION['auth']=true;
		header ("Location: user_profile.php?msg=2");
		exit();
	}else{
	$_SESSION['auth']=true;
	header ("Location: user_profile.php");
	exit();
	}
}
?>

<div>
<form action="" method="POST" class="table">
<table align="center">

<tr>
<td>username</td>
<td>:</td>
<td>
<input type="text" name="name" value="<?php echo $oldname ?>" />
</td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td>
<input type="text" name="pass" value="<?php echo $oldpass ?>" />
</td>
</tr>

<tr>
<td>Full Name</td>
<td>:</td>
<td>
<input type="text" name="fname" value="<?php echo $oldFname ?>" />
</td>
</tr>

<tr>
<td>I/C Number</td>
<td>:</td>
<td>
<input type="text" name="ic" value="<?php echo $oldic ?>" />
</td>
</tr>

<tr>
<td>Phone Number</td>
<td>:</td>
<td>
<input type="text" name="tel" value="<?php echo $oldtel ?>" />
</td>
</tr>

<tr>
<td>E-mail</td>
<td>:</td>
<td>
<input type="text" name="email" value="<?php echo $oldemail ?>" />
</td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td>
<input type="text" width="" height="" name="address" value="<?php echo $oldaddress ?>" />
</td></tr>


<tr>
<td colspan="3" align="left">
<input type="submit" name="update" value="Finish" />
</td>
<td>
<input type="reset" value="Reset" />
</td>
</tr>

</table>

</form>

</div>
</body>
</html>