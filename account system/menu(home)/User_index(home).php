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
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../Menu_css/index_css.css" />
<link rel="stylesheet" href="../Menu_css/form.css" />

<body background="black and white lights street lights 1920x1200 wallpaper_wallpaperswa.com_45.jpg">

<div class="header">
	<div>
        	<a><img src="../tuffahlogo.png" width="199" height="135" /></a>
	</div>
        
    <div>
    <ul>
      	<li><a href="User_home.php">Home</a></li>
        <li><a href="#">Account Form</a></li>
        <li><a href="#">Profile</a></li>
      	<li><a href='?logout=true'>Log out</a></li>
	</ul>
	</div>
    <br />
    <br />




<form action="User_confirm 1st.php" method="POST">
<table align="center">

<tr>
<td align="center">
<input id="type" type="text" placeholder="Username" name="name" />
</td>
</tr>

<tr>
<td align="center">
<input id="type" type="email" placeholder="E-mail" name="email" />
</td>
</tr>

<tr>
<td align="center"><b>Jenis Pembayaran :</b></td>
</tr>
<tr>
<td align="center">
<select name="Jbayaran" id="select" />
<option></option>
<option>Debit</option>
<option>Kredit</option>
</select>
</td>
</tr>

<tr>
<td align="center">
<input id="type" type="text" placeholder="Perkara" name="perkara" />
</td>
</tr>

<tr>
<td align="center"><b>Jenis Bank</b></td>
</tr>
<tr>
<td>
<select name="Jbank" id="select">
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
<input type="text" id="type" placeholder="Number Akaun" name="Nakaun" />
</td><br />
</tr>

<tr>
<td align="center"><b>Tarikh</b></td>
</tr>
<tr>
<td align="center">
<input type="date" placeholder="Tarikh" id="select" name="date" />
</td>
</tr>

<tr>
<td align="center"><b>Masa</b></td>
</tr>
<tr>
<td align="center">
<input type="time" placeholder="Masa" name="time" id="select" />
</td>
</tr>

<tr>
<td align="center">
<input type="submit" name="send" />
</td>
</tr>




</table>

</form>



</body>
</html>