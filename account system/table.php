<?php
session_start();
error_reporting(0);
$host = "localhost";
$user = "root";
$pswd = "";
$conn = mysql_connect($host, $user, $pswd) 
or die ("Error connecting to MySQL");
// jika perlu -> echo "Connected to MySQL <br />";
$dbname = "sistem_akaun";
mysql_select_db($dbname) or
die ("Error connecting to Database: ".$dbname);
$result=mysql_query("select * from account");
$i = 1;

$i=$_SESSION['username'];
$y= 'hello';
echo "<h2 align='center'>$y $i</h2>";

?>
<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$pswd = "";
$conn = mysql_connect($host, $user, $pswd) 
or die ("Error connecting to MySQL");
// jika perlu -> echo "Connected to MySQL <br />";
$dbname = "sistem_akaun";
mysql_select_db($dbname) or
die ("Error connecting to Database: ".$dbname);
$result=mysql_query("select * from account");


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
<li><a href=''>Logout</a></li></ul>
</nav>



</div>

<br /><br /><br /><br /><br/>
<div>
<fieldset>
<table align="center" border="1">

<table border="1" bordercolor="#000000" width="832" align="center">
<tr>
	<td width="64" align="center"><b>status</b></td>
	<td width="21" align="center"><b>id</b></td>
	<td width="58" align="center"><b>name</b></td>
	<td width="124" align="center"><b>jenis amaun</b></td>
	<td width="108" align="center"><b>jenis bank</b></td>
	<td width="56" align="center"><b>masa</b></td>
	<td width="85" align="center"><b>no bank</b></td>
    <td width="85" align="center"><b>perkara</b></td>
    <td width="255" align="center"><b>tarikh</b></td>
	<td width="44" align="center"><b>jumlah</b></td>
    
    <td width="13" colspan="2"></td>
	</tr>
  

<?php
session_start();
$result=mysql_query("select * from account");
$i = 1;

while($rows=mysql_fetch_array($result))
{
	$user=$rows['username'];
		
		
	echo'<tr align="center">';
	echo'<td width="100" align="center">'.$rows['semak'].'</td>';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'<td width="100" align="center">'.$rows['name'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jamaun'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['masa'].'</td>';
	echo'<td width="100" align="center">'.$rows['Nbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['perkara'].'</td>';
	echo'<td width="100" align="center">'.$rows['tarikh'].'</td>';
	echo'<td width="100" align="center">'.$rows['jumlah'].'</td>';
	
	echo'<td><a href="update_register.php?username='.$user.'">Edit</a></td>';
	echo'<td><a href="delete_register.php?username='.$user.'">Delete</a></td>';
	echo'</tr>';
	
	$i++;
}
$query = "SELECT Jamaun, COUNT(name), SUM(jumlah) FROM account GROUP BY Jamaun"; 
$result = mysql_query($query) or die(mysql_error());

// Print out result
while($row = mysql_fetch_array($result)){
	echo "- There are ". $row['COUNT(name)'] ." ". $row['Jamaun'] ."<br/> And ". $row['Jamaun']. " = RM". $row['SUM(jumlah)'] ;
	echo "<br />";

}

$sqlSum = "SELECT Jamaun, SUM(jumlah) FROM account WHERE Jamaun = 'Kredit'"; 
$resSum = mysql_query($sqlSum) or die(mysql_error());
while ($row = mysql_fetch_array($resSum)){
	$total =  $row['SUM(jumlah)'];
}

$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Debit'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$deb =  $row['sum(jumlah)'];
}

echo "<br />total = ". $total;
echo "<br />total kredit = ". ($total - $deb);
?>


<hr/>

</table>

</div>
</div>
</fieldset>
</body>
</html>
 