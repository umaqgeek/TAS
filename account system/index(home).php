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

$i=$_SESSION['username'];
$y= 'hello';
echo "$y $i";


if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: login.php");
	exit();
}else{
	echo "<a href='?logout=true'>Logout</a>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" href="css/lay_menu.css" />
<link rel="stylesheet" href="css/susun_menu.css" />
<link rel="stylesheet" href="../css/menu(home)_css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home(index)</title>
</head>

<body>

<center><img src="../tuffahlogo.png" id="img"></center>

<form action="confirm.php" method="POST">
<table align="center">

<tr>
<td align="center">
<input type="text" name="name" placeholder="Username" />
</td>
</tr>

<tr>
<td align="center"><b>Jenis Bank</b></td>
</tr>
<tr>
<td><select name="Jbank" id="select">
<option></option>
<option>Bank Islam</option>
<option>Maybank</option>
<option>AgroBank</option>
<option>Bank Rakyat</option>
<option>Tabung Haji</option>
<option>CIMBank</option>
<option>Bank Simpanan Berhad(BSN)</option>
</select>
</td><br />
</tr>

<tr>
<td align="center">
<input type="text" name="Nakaun" placeholder="Number Akaun">
</td><br />
</tr>

<tr>
<td align="center">
<input type="text" name="perkara" placeholder="Perkara">
</td>
</tr>

<tr>
<td align="center"><b>Jenis Pembayaran :</b></td>
</tr>
<tr>
<td align="center">
<select name="Jbayaran" id="select">
<option></option>
<option>Debit</option>
<option>Kredit</option>
</select>
</td>
</tr>

<tr>
<td align="center"><b>Tarikh</b></td>
</tr>
<tr>
<td align="center">
<input id="select" type="date" name="date" placeholder="Tarikh" align="middle">
</td>
</tr>

<tr>
<td align="center"><b>Masa</b></td>
</tr>
<tr>
<td align="center">
<input type="time" id="select" name="time" placeholder="Masa" align="middle">
</td>
</tr>

<tr>
<td align="center">
<input type="submit" name="Submit">
</td>
</tr>
</table>

</form>




</body>
</html>