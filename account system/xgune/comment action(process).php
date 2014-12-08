<?php

require("connect.php");
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];
if($submit)
{
	if($name&&$comment)
	{
		$insert = mysql_query ("INSERT INTO comment (username, comment) VALUES ('$name','$comment')");
	}
	else{
		echo "Please fill out the fields";
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Comment box" />

<link rel="stylesheet" href="Menu_css/home/menu(layout).css" />
<link rel="stylesheet" href="Menu_css/home/menu(susunan).css" />

<title>Home</title>
</head>

<body bgcolor="#CCCCCC">


<img src="tuffahlogo.png">

<div id="container">
  
  <div id="Header"><h1><b>Tuffah Account Management System</b></h1>
</div>

<div align="center"><h3 id="Header"><small></small></h3></div>

<div align="center" id="Nav">

<nav align="center">
<ul>
	<li><a href="menu(Home).php">Home</a></li>
    <li><a href="Menu_Account.php">Account</a></li>
    <li><a href="Menu_Current_TransactionPage.php">Current Transaction</a></li>
    <li><a href="login.php">Log Out</a></li>
</ul>
</nav>

<div id="content"></div>
</div>

<fieldset>

<table width="528" border="1">
  <tr>
    <th width="123" scope="col" bgcolor="#FFFFFF">Date</th>
    <th width="155" scope="col" bgcolor="#FFFFFF">Description</th>
    <th width="155" scope="col" bgcolor="#FFFFFF">Debit</th>
    <th width="155" scope="col" bgcolor="#FFFFFF">Credit</th>
    <th width="155" scope="col" bgcolor="#FFFFFF">Account Balance</th>
  </tr>
  <tr>
    <td><a name="1"></a></td>
    <td><a name="1.2"></a></td>
    <td><a name="1.3"></a></td>
    <td><a name="1.4"></a></td>
    <td><a name="1.5"></a></td>
  </tr>
  <tr>
    <td><a name="2"></a></td>
    <td><a name="2.2"></a></td>
    <td><a name="2.3"></a></td>
    <td><a name="2.4"></a></td>
    <td><a name="2.5"></a></td>
  </tr>
  <tr>
    <td><a name="3"></a></td>
    <td><a name="3.2"></a></td>
    <td><a name="3.3"></a></td>
    <td><a name="3.4"></a></td>
    <td><a name="3.5"></a></td>
  </tr>
  <tr>
    <td><a name="4"></a></td>
    <td><a name="4.2"></a></td>
    <td><a name="4.3"></a></td>
    <td><a name="4.4"></a></td>
    <td><a name="4.5"></a></td>
  </tr>
  <tr>
    <td><a name="5"></a></td>
    <td><a name="5.2"></a></td>
    <td><a name="5.3"></a></td>
    <td><a name="5.4"></a></td>
    <td><a name="5.5"></a></td>
  </tr>
</table>


<form action="comment action(process).php" method="post">
<table>

<tr>
<td>Write your comment here :</td><br />
</tr>

<tr>
<td>Username :</td>
<td><input type="text" name="name"></td><br />
</tr>

<tr>
<td colspan="2"><input name="comment" type="text" size="55" maxlength="77" placeholder="Comment"></td><br />
</tr>

<tr>
<td><input type="submit" name="submit"></td>
</tr>

</table>
</form>




</fieldset>
</div>




</body>
</html>