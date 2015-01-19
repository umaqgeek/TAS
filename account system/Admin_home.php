<?php
session_start();
error_reporting(0);
require("connect_manageUser.php");
$result=mysql_query("select * from account");
$i = 1;

$i=$_SESSION['username'];
$y= 'hello';
$id =$_SESSION['id'];
echo "<h2 align='center'>$y $i $id</h2>";

?>

<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="css/lay_menu.css">
<link rel="stylesheet" href="css/susun_menu.css">
<link rel="stylesheet" href="css/Admin(home).css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
</head>

<body bgcolor="#CCCCCC">

<img src="tuffahlogo.png" />



<div id="container">

<div id="Header"><h1><b>Tuffah Account Management System</b></h1>
</div>

<div id="Nav">

<nav>
<ul>
<li><a href="Admin Account.php">Home</a></li>
<li><a href="index_register.php">User Registration</a></li>
<li><a href="register.php">User Account</a></li>
<li><a href="#">Report</a></li>
<li><a href="logout.php">Logout</a></li></ul>
</nav>



</div>

<br /><br /><br /><br /><br/>
<a href="try table/table.php">Show in table</a>
<div>
<fieldset>
<table align="center" border="1">


<?php

$sqlSum = "SELECT Jamaun, SUM(jumlah) FROM account WHERE Jamaun = 'Kredit'"; 
$resSum = mysql_query($sqlSum) or die(mysql_error());
while ($row = mysql_fetch_array($resSum)){
	$Cre =  $row['SUM(jumlah)'];
}

$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Debit'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$total =  $row['sum(jumlah)'];
}

if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: index.php");
	exit();
}

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
<hr/>

</table>

</div>
</div>
</fieldset>
</body>
</html>
 