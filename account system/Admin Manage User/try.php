<?php

$pass = "";
$status = "";
if(isset($_POST["pass"])){
	$pass = $_POST["pass"];
	include_once("strongpass.php");
	$strongpass = new strongpass();
	$response = $strongpass->check($pass);
	
	if($response !="OK"){
		$status = $response;
	}
	else{
		$status = "Password is strong so parsing can continue here.";
	}
}

?>

<h2>Class strongpass Demo</h2>
<form action="try.php" method="post">
<input name="pass" type="password" value="<?php echo $pass; ?>">
<input type="submit" value="Check Password Strength">
</form>
<h3><?php echo $status; ?></h3>