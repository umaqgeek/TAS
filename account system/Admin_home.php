
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="css/Admin(home).css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
</head>

<body>


<a href="Admin Account.php">back</a>

<table align="center" border="1">
<?php
error_reporting(0);
require("connect.php");
$result=mysql_query("select * from account");
$i = 1;
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
	
	echo'</tr>';
	echo'</table><br/><br/><br/>';
	$i++;
}

?>
</table>
</body>
</html>
