<?php

error_reporting(0);
include("connect_manageUser.php");
$user=$_REQUEST['username'];
$pas = $_REQUEST['pass'];
$id = $_REQUEST['id'];
$update=$_POST['update'];
echo $user;
$result=mysql_query("select * from users where username='" .$user. "' AND id='" .$id. "'");
while($oldvalue=mysql_fetch_array($result))
{
	$oldname = $oldvalue['username']; 
	$oldpass = $oldvalue['pass'];
	$oldFname = $oldvalue['Fname'];
	$oldic = $oldvalue['ic'];
	$oldtel = $oldvalue['tel'];
	$oldemail = $oldvalue['email'];
	$oldaddress = $oldvalue['address'];
}
if ($update)
{
	$newUsername=$_POST['name'];
	$newpass=$_POST['pass'];
	$newfname=$_POST['fname'];
	$newic=$_POST['ic'];
	$newtel=$_POST['tel'];
	$newemail=$_POST['email'];
	$newaddress=$_POST['address'];
	
	mysql_query("update users set username='" .$newUsername. "', pass='" .$newpass. "', Fname='" .$newfname. "', ic='" .$newic. "', tel='" .$newtel. "', email='" .$newemail. "', address='" .$newaddress. "' where username='" .$user. "'");
	
	$_SESSION['auth']=true;
		header ("Location: Admin_manage user.php");
		exit();
}
echo $user;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="../css/Admin_ManageUser_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cornfirm</title>

</head>

<body>


<form action="" method="POST" class="table">

<table align="center">

<tr>
<td>username</td>
<td>:</td>
<td>
<input type="text" name="name" value="<?php echo $oldname  ?>" />
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


</body>
</html>