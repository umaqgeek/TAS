
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="../css/Admin_ManageUser_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cornfirm</title>

</head>

<body>



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
session_start();
error_reporting(0);
require("connect_manageUser.php");
$result=mysql_query("select * from users");
$i = 1;

$i=$_SESSION['username'];
$y= 'hello';
echo "$y $i";


if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: index.php");
	exit();
}else{
	echo "<br/><a href='?logout=true'>Logout</a>";
}

while($rows=mysql_fetch_array($result))
{
	$user=$rows['username'];
	$id=$rows['id'];
	$p=$rows['pass'];	
		
	echo'<tr align="center">';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'<td width="100" align="center">'.$rows['username'].'</td>';
	echo'<td width="100" align="center">'.$rows['pass'].'</td>';
	echo'<td width="100" align="center">'.$rows['Fname'].'</td>';
	echo'<td width="100" align="center">'.$rows['ic'].'</td>';
	echo'<td width="100" align="center">'.$rows['tel'].'</td>';
	echo'<td width="100" align="center">'.$rows['email'].'</td>';
	echo'<td width="100" align="center">'.$rows['address'].'</td>';
	
	echo'<td><a href="update.php?username='.$user.' AND id='.$id.' AND pass='.$p.'">Edit</a></td>';
	echo'<td><a href="delete.php?username='.$user.' AND id='.$id.' AND pass='.$p.'">Delete</a></td>';
	echo'</tr>';
	
	$i++;
}


?>
</table>

<center>
<a href="index.php"><input type="button" value="Add" /></a>
</center>

</body>
</html>