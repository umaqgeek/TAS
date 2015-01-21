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
</div>
<fieldset>
<table align="center">

<tr>
<div>





	<table align='center' border='1'>

		<table border='1' bordercolor='#000000' width='832' align='center'>
			<tr>
				<td width='64' align='center'><b>status</b></td>
				<td width='21' align='center'><b>no</b></td>
				<td width='58' align='center'><b>id</b></td>
				<td width='58' align='center'><b>name</b></td>
				<td width='124' align='center'><b>jenis amaun</b></td>
				<td width='108' align='center'><b>jenis bank</b></td>
				<td width='44' align='center'><b>jumlah</b></td>
    			<td width='85' align='center'><b>perkara</b></td>
				<td width='56' align='center'><b>masa</b></td>
    			<td width='255' align='center'><b>tarikh</b></td>
    
				<td width='13' colspan='2'></td>
			</tr>
  


<?php
$result = mysql_query("SELECT * FROM account WHERE name='" .$me. "' AND link_id='" .$link. "' AND semak='Baru'");
while($rows=mysql_fetch_array($result))
{
	$user=$rows['id'];
	echo'<tr>';	
	echo'<td width="100" align="center"><h3><b>'.$rows['semak'].'</b><h3></td>';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'<td width="100" align="center">'.$rows['id'].'</td>';
	echo'<td width="100" align="center">'.$rows['name'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jamaun'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['jumlah'].'</td>';
	echo'<td width="100" align="center">'.$rows['perkara'].'</td>';
	echo'<td width="100" align="center">'.$rows['masa'].'</td>';
	echo'<td width="100" align="center">'.$rows['tarikh'].'</td>';
	echo'<td><a href="User_edit_Transaction.php?id='.$user.'">Edit</a></td>';
	echo'<td><a href="user_delete_transaction.php?id='.$user.'">Delete</a></td>';
	echo'</tr>';

	$i++;

}

?>

		<hr/>

		</table>
	</table>
</div>

<br/><br/><br/>


</tr>
<tr>
<div>


	<table border="1" bordercolor="#000000" width="832" align="center">
		<tr>
			<td width="64" align="center"><b>status</b></td>
			<td width="21" align="center"><b>no</b></td>
			<td width="58" align="center"><b>id</b></td>
			<td width="58" align="center"><b>name</b></td>
			<td width="124" align="center"><b>jenis amaun</b></td>
			<td width="108" align="center"><b>jenis bank</b></td>
			<td width="44" align="center"><b>jumlah</b></td>
    		<td width="85" align="center"><b>perkara</b></td>
			<td width="56" align="center"><b>masa</b></td>
    		<td width="255" align="center"><b>tarikh</b></td>
    
		</tr>
  

<?php

$result = mysql_query("SELECT * FROM account WHERE name='" .$me. "' AND link_id='" .$link. "' AND semak='Disemak'");
while($rows=mysql_fetch_array($result))
{
	$user=$rows['id'];
	echo'<tr>';	
	echo'<td width="100" align="center"><h3><b>'.$rows['semak'].'</b><h3></td>';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'<td width="100" align="center">'.$rows['id'].'</td>';
	echo'<td width="100" align="center">'.$rows['name'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jamaun'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['jumlah'].'</td>';
	echo'<td width="100" align="center">'.$rows['perkara'].'</td>';
	echo'<td width="100" align="center">'.$rows['masa'].'</td>';
	echo'<td width="100" align="center">'.$rows['tarikh'].'</td>';
	echo'</tr>';

	$i++;

}

?>

<hr/>

</table>
</div>





</tr>
</table>

</fieldset>


</body>
</html>