<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Tuffah Sistem Account Management System</title>
    <meta name="description" content="">
    <meta name="author" content="">

<link rel="stylesheet" href="Menu_css/home/menu(layout).css" />
<link rel="stylesheet" href="Menu_css/home/menu(susunan).css" />


<script type="text/javascript" src="js/jquery-1.8.1.js"></script>
<script src="js/bootstrap.min.js"></script>


<title>Home</title>
</head>

<body bgcolor="#CCCCCC">

<img src="tuffahlogo.png" />



<div id="container">

<div id="Header"><h1><b>Tuffah Account Management System</b></h1>
</div>

<div align="center"><h3 id="Header"><small>Account Balance</small></h3></div>

<div align="center" id="Nav">

<nav align="center">
<ul>
	<li><a href="menu(Home).php">Home</a></li>
    
    <li class="dropdown">
       <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
       <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
          <li><a href="Menu_KreditPage.php">Kredit</a></li>
          <li><a href="Menu_DebitPage.php">Debit</a></li>
          <li><a href="Menu_Acc_BalancePage.php">Account Balance</a></li>
       </ul>
       </li>
    <li><a href="Menu_Current_TransactionPage.php">Current Transaction</a></li>
    <li><a href="#">Log Out</a></li>
</ul>
</nav>

<div id="content"></div>
</div>

<fieldset>


<a>Write your comment here :</a>
<input name="Comment" type="text" size="55" maxlength="77">

</fieldset>

</div>

</body>
</html>