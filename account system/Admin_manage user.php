<?php

?>

<html>
<head>
<title>User </title>
</head>

<body>

<h1 align="center"><b><i>User Profile</i></b></h1>

<center><form action="" method="post">

<table align="center">
<tr>
<td align="center">ID Number</td>
<td>:</td>
<td><input name="id" type="text"></td>
</tr>

<tr>
<td align="center">Username</td>
<td>:</td>
<td><input name="username" type="text"></td>
</tr>

<tr>
<td align="center">ic number</td>
<td>:</td>
<td><input name="ic" type="text"></td>
</tr>

<tr>
<td align="center">SEX</td>
<td>:</td>
<td><input name="man" type="radio" value="Man" checked>
Man</td>
</tr>
<tr>
<td></td><td></td>
<td><input name="women" type="radio" value="Women" checked>Women</td>
</tr>

<tr>
<td>E-mail</td>
<td>:</td>
<td><input name="email" type="text"></td>
</tr>

<tr>
<td>Salary</td>
<td>:</td>
<td><input type="number" name="salary"></td>
</tr>
</table>



<input type="submit" value="Update">
<input type="reset" value="Reset" name="reset">
</form>
</center>

<a href="Admin_User Account.php">Back</a>

</body>
</html>