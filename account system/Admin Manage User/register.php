<?php
session_start();
error_reporting(0);
require("connect_manageUser.php");

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
<title>Admin</title>

</head>

<body>
  


	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>admin</strong></a>
					<ul>
						<li><a href="#">My Profile</a></li>
						<li><a href="setting.php">Settings</a></li>
						<li><a href="#">Change Password</a></li>
						<li><a href="../logout.php">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">Home</a></li>
                <li><a href="../Admin Account.php" class="round button dark menu-email-special image-left">Account Report</a></li>
				<li><a href="#" class="round button dark menu-email-special image-left">Staff Table</a></li>
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
				
			</div> <!-- end side-menu -->
			
            
            
            
            
            
            

<!----------------------------------------------------user account----------------------------------------->           
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Table staff</h3>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							<thead>
						
								<tr>
									<th>no</th>
									<th>staff name</th>
									<th>Password</th>
									<th>Full Name</th>
                                    <th>I/C Number</th>
                                    <th>Phone Number</th>
                                    <th>E-mail</th>
                                    <th>Address</th>
                                    <th colspan="2">Action</th>
								</tr>
							
 <!--------------------------------------------php tgk user---------------------------------------------------------------->
 <?php
 $result=mysql_query("select * from users");
 $i=1;
 while($rows=mysql_fetch_array($result))
{
	$user=$rows['username'];
	$id=$rows['id'];
	$p=$rows['pass'];	
		
	echo'<tbody>';	
	echo'<tr>';
	echo'<td width="3">'.$i.'</td>';
	echo'<td>'.$rows['username'].'</td>';
	echo'<td>'.$rows['pass'].'</td>';
	echo'<td>'.$rows['Fname'].'</td>';
	echo'<td>'.$rows['ic'].'</td>';
	echo'<td>'.$rows['tel'].'</td>';
	echo'<td><a href="'.$rows['email'].'">'.$rows['email'].'</a></td>';
	echo'<td>'.$rows['address'].'</td>';
	
	echo'<td><a href="register.php?id='.$id.'">Edit</a></td>';
	echo'<td><a href="delete_register.php?id='.$id.'">Delete</a></td>';
	echo'</tr>';
	echo'</tbody>';
	
	$i++;
}
 ?>
 							</thead>

						</table>
                    </div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

<!-------------------------------------------php untuk edit staf------------------------------------>
<?php

	$edit = $_POST['edit'];
	if(isset($_GET['id'])){
	$id= $_GET['id'];
	$sqlGET=mysql_query("SELECT * FROM users WHERE id ='" .$id. "'");
	while($row=mysql_fetch_array($sqlGET)){
	$oldname = $row['username'];
	$oldpass = $row['pass'];
	$oldFname = $row['Fname'];
	$oldic = $row['ic'];
	$oldtel = $row['tel'];
	$oldemail = $row['email'];
	$oldaddress = $row['address'];



echo "<div class='content-module'>";
				
				echo"<div class='content-module-heading cf'>";
					
					echo "<h3 class='fl'>Edit detail</h3>";
					
				echo "</div> <!-- end content-module-heading -->";
echo "</div>";

	echo "<fieldset>";
	echo "<form action='' method='post'>";
	echo "<div class='half-size-column fl'>";


	echo "<p>";
	echo "<label><b>staff name</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' type='text' name='newName' value='".$oldname."'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Password</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' name='newPass' value='".$oldpass."'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Full Name</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' type='text' name='newFname' value='".$oldFname."'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>I/C Number</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' type='text' name='newIc' value='".$oldic."'>";
	echo "</p>";
	
	echo "</div>";
	echo "<div class='half-size-column fr'>";
	
	
	echo "<p>";
	echo "<label><b>Phone Number</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' type='text' name='newTel' value='".$oldtel."'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Email</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' type='text' name='newEmail' value='".$oldemail."'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Address</b></label>";
	echo "<input id='simple-input' class='round default-width-input'  type='text' name='newAddress' value='".$oldaddress."'>";
	echo "</p>";
	
	echo "<input type='submit' value='update' name='edit' class='round blue ic-right-arrow' />";

	echo "</div>";//-- end half-size-column -->
	echo "</form>";
	echo "</fieldset>";
		}
	}
	if ($edit){
	$newName = $_POST['newName'];
	$newPass = $_POST['newPass'];
	$newFname = $_POST['newFname'];
	$newIc = $_POST['newIc'];
	$newTel = $_POST['newTel'];
	$newEmail = $_POST['newEmail'];
	$newAddress = $_POST['newAddress'];
	
	mysql_query("update users set username='" .$newName. "', pass='".$newPass."', Fname='".$newFname."', ic='".$newIc."', tel='".$newTel."', email='".$newEmail."', address='".$newAddress."' where id='" .$id. "'");
	
	$_SESSION['auth']=true;
	header ("Location: register.php");
	exit();
}

echo "<br/>";
?>
 
       <!------------------------------------------------------------------------------------------>                 
                        
					

<!-----------------------------------------------add staff------------------------------------------------->


<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add Staff</h3>

					</div> <!-- end content-module-heading -->
</div>
<?php
	if (isset($_GET['msg']))
		{
			$message = $_GET['msg'];
			if($message == 1)
			echo "<span style='color:green'><b>Your entry has been saved!</span></b><br/><br/><br/>";
			if($message == 2)
			echo "<span style='color:red'><b>Invalid Username or password</span></b>";
			if($message == 3)
			echo "<span style='color:red'><b>Please fill all the form</span></b><br/><br/><br/>";
			if($message == 4)
			echo "<span style='color:red'><b>Password must be at least 8 character</b></span><br/><br/><br/>";
			if($message == 5)
			echo "<span style='color:red'><b>Password must contain at least one letter</b</span><br/><br/><br/>";
			if($message == 6)
			echo "<span style='color:red'><b>Password must contain at least one number</b></span><br/><br/><br/>";
			if($message == 7)
			echo "<span style='color:red'><b>Your Password has been denied</b></span><br/><br/><br/>";
			if($message == 8)
			echo "<span style='color:red'><b>Your username has been denied</b></span><br/><br/><br/>";
		}
?><!--msg-->
    
    
<fieldset>
	<form action="adminAddStaff.php" method="POST">
	<div class="half-size-column fl">


	<p>
	<label><b>staff name</b></label>
	<input id="simple-input" class="round default-width-input" type="text" name="name">
	</p>
	
	<p>
	<label><b>Password</b></label>
	<input id="simple-input" class="round default-width-input" type="text" name="pass">
	</p>
	
	<p>
	<label><b>Full Name</b></label>
	<input id="simple-input" class="round default-width-input" type="text" name="fname">
	</p>
	
	<p>
	<label><b>I/C Number</b></label>
	<input id="simple-input" class="round default-width-input" type="text" name="ic">
	</p>
	
	</div>
	<div class="half-size-column fr">
	
	
	<p>
	<label><b>Phone Number</b></label>
	<input id="simple-input" class="round default-width-input" type="text" name="tel">
	</p>
	
	<p>
	<label><b>Email</b></label>
	<input id="simple-input" class="round default-width-input" type="text" name="email">
	</p>
	
	<p>
	<label><b>Address</b></label>
	<input id="simple-input" class="round default-width-input"  type="text" name="address">
	</p>
	 
	<input type="submit" value="add" name="submit" class="round blue ic-right-arrow" />

	</div><!-- end half-size-column -->
	</form>
</fieldset>
							
							
						
				
    
    
    
	

				
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2015 <a href="#">Tuffah Informatic, @</a>. All rights reserved.</p>
		<p><strong>Account System</strong> theme by <a href="http://www.buzzlee199@yahoo.com">buzzlee199@yahoo.com</a></p>
	
	</div> <!-- end footer -->

</body>
</html>

</body>
</html>
</body>
</html>