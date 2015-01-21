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

$i=$_SESSION['username'];
$p=$_SESSION['pass'];
$link=$_SESSION['id'];

echo "<b>username</b> = ".$i ." and <b>id</b> = ". $link ." and <b>password</b> = ". $p;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../Menu_css/index_css.css" />
<link rel="stylesheet" href="../Menu_css/form.css" />

</head>

<body background="black and white lights street lights 1920x1200 wallpaper_wallpaperswa.com_45.jpg">

<div class="header">
	<div>
        	<a><img src="../tuffahlogo.png" width="199" height="135" /></a>
	</div>
        
    <div>
    <ul>
      	<li><a href="User_home.php">Home</a></li>
        <li><a href="User_index(home).php">Account Form</a></li>
        <li><a href="User_CheckTransaction.php">Check Transaction</a></li>
        <li><a href="user_profile.php">Profile</a></li>
      	<li><a href=''>Log out</a></li>
	</ul>
	</div>
    <br />
    <br />

</div>








<?php
$update = $_POST['update'];
if(isset($_GET['id'])){
	$id= $_GET['id'];
	$sqlGET=mysql_query("SELECT * FROM account WHERE id ='" .$id. "'");
	while($row=mysql_fetch_array($sqlGET)){


	$oldname = $row['name']; 
	$oldJamaun = $row['Jamaun'];
	$oldJbank = $row['Jbank'];
	$oldjumlah = $row['jumlah'];
	$oldperkara = $row['perkara'];
	$oldtarikh = $row['tarikh'];
	$oldmasa = $row['masa'];
	$id = $row['id'];
	
	echo "hye ".$id;
}
}
if ($update){
	$newUsername = $_POST['name'];
	$newJamaun = $_POST['Jamaun'];
	$newJbank = $_POST['Jbank'];
	$newjumlah = $_POST['jumlah'];
	$newperkara = $_POST['perkara'];
	$newtarikh = $_POST['tarikh'];
	$newmasa = $_POST['masa'];
	
	mysql_query("update account set Jamaun='" .$newJamaun. "', Jbank='" .$newJbank. "', jumlah='" .$newjumlah. "', perkara='" .$newperkara. "' where id='" .$id. "'");
	

	$_SESSION['auth']=true;
	header ("Location: User_CheckTransaction.php");
	exit();
}

?>

<div>
<form action="" method="POST" class="table">
<table align="center">

<tr>
<td>username</td>
<td>:</td>
<td><?php echo $oldname ?>
</td>
</tr>

<tr>
<td>Jenis Amaun</td>
<td>:</td>
<td>
<input type="text" name="Jamaun" value="<?php echo $oldJamaun ?>" />
</td>
</tr>

<tr>
<td>Jenis Bank</td>
<td>:</td>
<td>
<select name="Jbank" id="select" style="border-radius:1">
<option></option>
<?php 
$callJbank=mysql_query("SELECT * FROM jenis_bank");
while($call=mysql_fetch_array($callJbank)){
?>
<option value="<?php echo $call['jenis_bank'] ?>"><?php echo $call['jenis_bank'] ?></option>
<?php }?>
</select>
</td>
</tr>

<tr>
<td>Jumlah</td>
<td>:</td>
<td>
<input type="text" name="jumlah" value="<?php echo $oldjumlah ?>" />
</td>
</tr>

<tr>
<td>Perkara</td>
<td>:</td>
<td>
<input type="text" name="perkara" value="<?php echo $oldperkara ?>" />
</td>
</tr>

<tr>
<td>Tarikh</td>
<td>:</td>
<td><?php echo $oldtarikh ?>
</td>
</tr>

<tr>
<td>Masa</td>
<td>:</td>
<td><?php echo $oldmasa ?>
</td></tr>


<tr>
<td colspan="3" align="left">
<input type="submit" name="update" value="Finish" />
</td>
<td>
<input type="reset" value="Reset" />
</td>
</tr>

</table>

</form>

</div>
</body>
</html>