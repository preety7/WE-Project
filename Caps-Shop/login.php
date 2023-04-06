<?php session_start() ?>
<html>
<head>
	<title>Error during login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="center">
<?PHP
	include("auth.php");

	if ($_GET["login"] && $_GET["passwd"] && auth($_GET["login"], $_GET["passwd"]))
	{
		$_SESSION['loggued_on_user'] = $_GET["login"];
		echo "<h1>You have Successfully logged in!</h1>";
		echo '</br><a href="home.html">Go to Home Page?</a>';
		echo '</br><a href="shop.html">Start Shopping!</a>';
		echo '</br><a href="basket.php?name=check">Check your basket</a>';
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		echo "<h1>User and/or Pass Not Found\n</h1>";
		echo "<html>";
		echo "<body>";
		echo '</br><a href="login.html">Try Again?</a>';
		echo '</br><a href="create.html">New User?</a>';
	}
?>
</div>
</body>
</html>
