



<table border="1" align="center">
<tr>
<td align="center"><b>id</b></td>
<td align="center"><b>Username</b></td>
<td align="center"><b>Jenis Amaun</b></td>
<td align="center"><b>Jenis Bank</b></td>
<td align="center"><b>Masa</b></td>
<td align="center"><b>No. Bank</b></td>
<td align="center"><b>Perkara</b></td>
<td align="center"><b>Tarikh</b></td>

<?php
require("connect.php");
$result=mysql_query("select * from account");
while($rows=mysql_fetch_array($result))
{
	$user=$rows['name'];
		
		
	echo'<tr align="center">';
	echo'<td width="100" align="center">'.$rows['id'].'</td>';
	echo'<td width="100" align="center">'.$rows['name'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jamaun'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['masa'].'</td>';
	echo'<td width="100" align="center">'.$rows['Nbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['perkara'].'</td>';
	echo'<td width="100" align="center">'.$rows['tarikh'].'</td>';
	
	echo'</tr>';
}

?>
</tr>
</table>