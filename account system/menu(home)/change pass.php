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
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="../css/style.css" />
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/script.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff</title>

</head>

<body>
  


	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>Staff</strong></a>
					<ul>
						<li><a href="user_editProfile.php">My Profile</a></li>
						<li><a href="#">Change Password</a></li>
						<li><a href="../logout.php">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">Home</a></li>
                <li><a href="User_CheckTransaction.php" class="round button dark menu-email-special image-left">Account Transaction</a></li>
                <li><a href="../logout.php" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.html" class="active-tab dashboard-tab">Dashboard</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="../tuffahlogo.png" alt="Tuffah Informatic" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Side Menu</h3>
				<ul>
					<li><a href="#">Side menu link</a></li>
					<li><a href="#">Another link</a></li>
					<li><a href="#">A third link</a></li>
					<li><a href="#">Fourth link</a></li>
				</ul>
                
                <h3 style="color:white">Info transaction</h3>
<ul style='background:white'>
<?php

$acc = "SELECT Jamaun, COUNT(name), SUM(jumlah) FROM account WHERE name='" .$i. "' AND link_id='".$link."' GROUP BY Jamaun "; 
$res = mysql_query($acc) or die(mysql_error());

// Print out result from user amount transacation
while($row = mysql_fetch_array($result)){
	echo "You have ". $row['COUNT(name)'] ." ". $row['Jamaun'] ."<br/> And total from your ". $row['Jamaun']. " = RM". $row['SUM(jumlah)'] ;
	echo "<br /><br/>";

}

//total account balance - total user debit
$sqlbaki=mysql_query("SELECT Baki FROM setting");
while($baki=mysql_fetch_array($sqlbaki)){
	$akaun=$baki['Baki'];
	}

$sqlSum = "SELECT Jamaun, SUM(jumlah) FROM account WHERE Jamaun = 'Debit'"; 
$resSum = mysql_query($sqlSum) or die(mysql_error());
while ($row = mysql_fetch_array($resSum)){
	$debit =  $row['SUM(jumlah)'];
}

$deb = $debit + $akaun;

$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Kredit' and name = '" .$i. "' AND link_id='".$link."'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$Cre =  $row['sum(jumlah)'];
}

echo "<li><p><b>Total balance from <br/> account = </b>".$deb." <br/> <b>Credit from you = </b>".$Cre."";
echo "<br />Balance = ". ($deb - $Cre)."</p></li>";



//limit for user transaction (per/month)
$limit = "SELECT month, SUM(quantity) FROM users WHERE username ='" .$i. "' AND id='".$link."'";
$M = mysql_query($limit);
while ($month = mysql_fetch_array($M)){
	$monthQuantity = $month['SUM(quantity)'];
	if ($monthQuantity == 0){
		echo "<li><p style='color:red'>You have a limit transaction for this week.Sila cuba lagi dibulan hadapan</p>";
	}else{
		echo "<br/><p>your limit of debit for this month is " .$monthQuantity."</p>";
	}
}

//limit for user transaction (per/week)
$Wlimit = "SELECT week, SUM(weekQuantity) FROM users WHERE username ='" .$i. "' AND id='".$link."'";
$W = mysql_query($Wlimit);
while ($week = mysql_fetch_array($W)){
	$weekQuantity = $week['SUM(weekQuantity)'];
	if ($weekQuantity == 0){
		echo "<br/><p style='color:red'>You have a limit transaction for this week..cuba lagi minggu depan</p>";
	}else{
	echo "<p>your limit of debit for this week is " .$weekQuantity ."</p>";
	}
}

//limit for user transaction (per/day)
$Dlimit = "SELECT day, SUM(dayQuantity) FROM users WHERE username ='" .$i. "' AND id='".$link."'";
$D = mysql_query($Dlimit);
while ($day = mysql_fetch_array($D)){
	$dayQuantity = $day['SUM(dayQuantity)'];
	if ($dayQuantity == 0){
		echo "<br/><p style='color:red'>You have a limit transaction for today.Please try again tomorrow</p>";
	}else{
	echo "<br/><li><p>your limit of debit for today is " .$dayQuantity. "</p></li>";
	}
}
?>
</ul></div><!--side-menu fl-->
    
	
            

<!--tgk detail profile ------------>
<?php


$change = "SELECT * FROM users WHERE id='".$link."'";
$word = mysql_query($change);
while($call=mysql_fetch_array($word)){
	
	$id = $call['id'];
	$username = $call['username'];
	$pass = $call['pass'];

}

?>
<div class="side-content fr">
	<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Change Password</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>

					</div> <!-- end content-module-heading -->
	</div><!--content-module-->
	
    
    
	<div class="content-module-main">
<fieldset>
	<form action="" method="POST">
    <div class="half-size-column fl">

			<p>
			<label>username</label><?php echo $username ?>
			</p>
            
            <p>
            <label>Password</label><?php echo $pass ?>
			</p>
            
			<?php echo '
			<a href="change pass.php?id='.$id.'"; ?><input type="button" name="Edit" value="Edit" class="round blue ic-right-arrow" /></a>';
			?>
			
	</div><!--half-size-column fl-->
	</form>
</fieldset>
	</div><!--content-module-main-->
</div><!--side-content fr--> <!--form detail-->



<!--php edit detail profile----------------->
<?php
$update = $_POST['update'];
if(isset($_GET['id'])){
	$ip= $_GET['id'];
$SQL = "SELECT * FROM users where id='".$ip."'";
$QUERY = mysql_query($SQL);
while($edit=mysql_fetch_array($QUERY)){
	$oldname = $edit['username']; 
	$oldpass = $edit['pass'];


echo "<div class='side-content fr'>";
  
	echo "<div class='content-module-main'>";
echo "<fieldset>";
	echo "<form action='' method='POST' class='table'>";
    echo "<div class='half-size-column fl'>";

			echo "<p>";
			echo "<label>username</label>";
			echo "<input name='name' id='simple-input' class='round default-width-input'  type='text' value='$oldname'  />";
			echo "</p>";
            
            echo "<p>";
            echo "<label>Password</label>";
			echo "<input name='pass' id='simple-input' class='round default-width-input'  type='text' value='$oldpass' />";
			echo "</p>";

			echo "<input type='submit' name='update' value='Finish' class='round blue ic-right-arrow' />";
			echo "<input type='reset' value='Reset' class='round blue ic-right-arrow' />";
			
	echo "</div>";//<!--half-size-column fl-->
	echo "</form>";
echo "</fieldset>";
echo "</div>";//<!--content-module-main-->
echo "</div>";//<!--side-content fr--> 
}
}

if ($update){
	$newUsername = $_POST['name'];
	$newpass = $_POST['pass'];
	
	mysql_query("update users set username='" .$newUsername. "', pass='" .$newpass. "'");
	
	
	$passStr = "SELECT * FROM users";
	$Str = mysql_query($passStr);
	while($strength = mysql_fetch_array($Str)){
		$strPass = $strength['pass'];
	}
	if($newpass == $strPass){
		$_SESSION['auth']=true;
		header ("Location: change pass.php?msg=2");
		exit();
	}else{
	$_SESSION['auth']=true;
	header ("Location: change pass.php");
	exit();
	}
}
?>




</body>
</html>
</body>
</html>


	</div><!--page-full-width cf-->
</div>



<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2015 <a href="#">Tuffah Informatic, @</a>. All rights reserved.</p>
		<p><strong>Account System</strong> theme by <a href="http://www.buzzlee199@yahoo.com">buzzlee199@yahoo.com</a></p>
	
	</div> <!-- end footer -->


</body>
</html>