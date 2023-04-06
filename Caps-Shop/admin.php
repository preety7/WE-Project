<html>
<head>
	<title>Welcome Admin!</title>
	<link = rel="stylesheet" href="style.css">
</head>
<body>
	<div class="center">
<?PHP

$login = "admin";
$password = $_POST['passwd'];
$submit = $_POST['adminsubmit'];

if ($password == "admin" && $submit && $submit == "OK")
{
	$contents = file_get_contents("./admin/admin");
	$password = hash('whirlpool', $password);
	if (strcmp($password, $contents == 0))
	{
		echo "<html>";
		echo "<body>";
		echo '</br><a href="admin.html">Congrats! Go Here.</a>';
		echo '</br><a href="login.html">Or return to the simpleton Login.</a>';
	}
}
else
{
	echo "Sorry, you aren't that cool.";
	echo '</br><a href="login.html">Go back to Login.</a>';
}
?>
</div>
</body>
</html>
