<?php
session_start();
?>
<html>
<head>
	<title>Logged out</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="center">
	<?PHP
	if ($_SESSION['loggued_on_user'] != "")
	{
		$_SESSION['loggued_on_user'] = "";
		echo "<h1>You have Successfully logged out</h1>";
	}
	else
		echo "<h1>You are not logged in</h1>";
?>
<a href="home.html">Go Home</a><br>
<a href="login.html">Login</a><br>
<a href="shop.html">Shop</a><br>
</div>
</body>
</html>
