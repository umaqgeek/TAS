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

date_default_timezone_set("Asia/Kuala_Lumpur");
$tarikh = date("d/M/Y");
$jam = date("h/i/s A");

$me=$_SESSION['username'];
$p=$_SESSION['pass'];
$link=$_SESSION['id'];
$y= 'hello';
echo "$y $me $link $p";

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../Menu_css/index_css.css" />

<title>check transaction</title>
</head>

<body>


<div class="header">
	<div>
        	<a><img src="../tuffahlogo.png" width="199" height="135" /></a>
	</div>
        
    <div>
    <ul>
      	<li><a href="User_home.php">Home</a></li>
        <li><a href="User_index(home).php">Account Form</a></li>
        <li><a href="user_profile.php">Profile</a></li>
        <li><a href="#">Check Transaction</a></li>
      	<li><a href="../logout.php">Log out</a></li>
	</ul>
	</div>
    <br />
    <br />

<?php

$result = mysql_query("SELECT * FROM account WHERE name='" .$me. "' AND link_id='" .$link. "'");
while($rows=mysql_fetch_array($result))
{
	$user=$rows['id'];
	
	echo'<table align="center">';
	echo'<tr>';	
	echo'<td width="100" align="center" colspan="3"><h3><b>'.$rows['semak'].'</b><h3></td>';
	echo'</tr>';
		
	echo'<tr align="center">';
	echo'<td><b>id</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>Username</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['name'].'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>Jenis Amaun</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['Jamaun'].'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>Jenis Bank</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['Jbank'].'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>Masa</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['masa'].'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>Jumlah amaun</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['jumlah'].'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>No. Akaun</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['Nbank'].'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>Perkara</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['perkara'].'</td>';
	echo'</tr>';
	
	echo'<tr>';
	echo'<td><b>Tarikh</b></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$rows['tarikh'].'</td>';
	echo'</tr>';

	echo'<tr>';
	
	echo'<table align="center">';
	echo'<tr>';
	echo'<td align="left"><a href="conect_delete.php?id='.$user.'">Delete</a></td>';
	echo'<td align="right"><a href="connect_semak.php?semak='.$user.'">Semak</a></td>';
	echo'</tr>';
	echo'</table>';
	
	echo'<tr>';
	echo'<td><h3><b>Jumlah terkini</b></h3></td>';
	echo'<td><b>:</b></td>';
	echo'<td width="100" align="center">'.$total.' - '.$Cre.'='.($total-$Cre).'</td>';
	echo'</tr>';
	
	echo'</tr>';
	echo'</table><br/><br/><br/>';
	$i++;
	
	echo '<hr/>';
	echo '<br/>';
}

?>
</body>
</html>