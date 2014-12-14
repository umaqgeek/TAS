<?php
error_reporting(0);
require("connect_manageUser.php");
$name=$_POST['name'];
$pass=$_POST['pass'];
$fname=$_POST['fname'];
$ic=$_POST['ic'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$address=$_POST['address'];
$submit=$_POST['submit'];
if($submit)
{
	if($name && $pass && $fname && $ic && $tel && $email && $address)
	{
		$sql = "INSERT INTO users 
		(username, pass, Fname, ic, tel, email, address) 
		VALUES ('$name','$pass','$fname','$ic','$tel','$email','$address')";

$retval = mysql_query($sql, $conn);
	
		if ($retval)
		{
		echo "<b>SUCCESS!!!</b>";
		}
		else
		{
		die('could not get data : '. mysql_error());;
		}
	}

	else{
		echo "insert your detail to all form";
		$_SESSION['auth']=true;
		header ("Location: index.php");
		exit();
	}
}
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
<input type="text" name="name" />
</td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td>
<input type="text" name="pass" />
</td>
</tr>

<tr>
<td>Full Name</td>
<td>:</td>
<td>
<input type="text" name="fname" />
</td>
</tr>

<tr>
<td>I/C Number</td>
<td>:</td>
<td>
<input type="text" name="ic" />
</td>
</tr>

<tr>
<td>Phone Number</td>
<td>:</td>
<td>
<input type="text" name="tel" />
</td>
</tr>

<tr>
<td>E-mail</td>
<td>:</td>
<td>
<input type="text" name="email" />
</td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td>
<input type="text" name="address">
</td></tr>


<tr>
<td colspan="3" align="left">
<input type="submit" name="submit" value="Add" />
</td>
</tr>
<tr>
<td colspan="3" align="left">
<a href="../Admin Account.php"><b>Back</b></a></td>
</tr>
</table>

</form>

<table border="1" bordercolor="#000000" width="750px" align="center">
<tr>
	<td align="center"><b>id</b></td>
	<td align="center"><b>Username</b></td>
	<td align="center"><b>Password</b></td>
	<td align="center"><b>Fullname</b></td>
	<td align="center"><b>I/C Number</b></td>
	<td align="center"><b>Phone Number</b></td>
	<td align="center"><b>Email</b></td>
	<td align="center"><b>Address</b></td>
    <td colspan="2"></td>
	</tr>
  

<?php

$result=mysql_query("select * from users");
while($rows=mysql_fetch_array($result))
{
	$user=$rows['username'];
		
		
	echo'<tr align="center">';
	echo'<td width="100" align="center">'.$rows['id'].'</td>';
	echo'<td width="100" align="center">'.$rows['username'].'</td>';
	echo'<td width="100" align="center">'.$rows['pass'].'</td>';
	echo'<td width="100" align="center">'.$rows['Fname'].'</td>';
	echo'<td width="100" align="center">'.$rows['ic'].'</td>';
	echo'<td width="100" align="center">'.$rows['tel'].'</td>';
	echo'<td width="100" align="center">'.$rows['email'].'</td>';
	echo'<td width="100" align="center">'.$rows['address'].'</td>';
	
	echo'<td><a href="update.php?username='.$user.'">Edit</a></td>';
	echo'<td><a href="delete.php?username='.$user.'">Delete</a></td>';
	echo'</tr>';
}

?>
</table>



</body>
</html>