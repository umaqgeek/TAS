
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="css/Admin(home).css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
</head>

<body>


<a href="Admin Account.php">back</a>


<?php
require("connect.php");
$result=mysql_query("select * from account");
while($rows=mysql_fetch_array($result))
{
	$user=$rows['name'];
	
	echo'<table border="1" align="center" class="table">';
	echo'<tr>';
	echo'<td align="center" colspan="3">
		<input name="semak" type="submit" value="Semak" id="td">
		</td>';
	echo'</tr>';
	echo'</table>';
		
	echo'<table border="1" align="center" class="table">';
	
	echo'<tr align="center">';
	echo'<td align="left"><b>Masa Urusan</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['masa'].'</td>';
	echo'</tr>';
	
	echo'<tr align="center">';
	echo'<td align="left"><b>Tarikh</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['tarikh'].'</td>';
	echo'</tr>';
				
	echo'<tr align="center">';
	echo'<td align="left"><b>id user</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['id'].'</td>';
	echo'</tr>';
	
	echo'<tr align="center">';
	echo'<td align="left"><b>Username</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['name'].'</td>';
	echo'</tr>';
	
	echo'<tr align="center">';
	echo'<td align="left"><b>Jenis Amaun</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['Jamaun'].'</td>';
	echo'</tr>';
	
	echo'<tr align="center">';
	echo'<td align="left"><b>Jenis Bank</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['Jbank'].'</td>';
	echo'</tr>';	
	
	echo'<tr align="center">';
	echo'<td align="left"><b>No. Akaun</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['Nbank'].'</td>';
	echo'</tr>';
	
	echo'<tr align="center">';
	echo'<td align="left"><b>Perkara</b></td>';
	echo'<td align="center" id="td"><b>:</b></td>';
	echo'<td align="left" id="input">'.$rows['perkara'].'</td>';
	echo'</tr>';

	echo'<tr>';
	echo'<td align="center" colspan="3">
		<input name="disemak" type="checkbox" value="disemak">Disemak
		</td>';
	echo'</table>';
	echo'</br></br></br>';
}

?>
</body>
</html>
