<html>
<head>
	<title>Creation Failed</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="center">
<?PHP

$login = $_POST['login'];
$password = $_POST['passwd'];
$submit = $_POST['submit'];

if ($login && $password && $submit && $submit == "OK")
{
	if (!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/passwd"))
		file_put_contents("../private/passwd", null);
	$contents = unserialize(file_get_contents("../private/passwd"));
	if ($contents)
	{
		$taken = 0;
		foreach ($contents as $key => $i)
		{
			if ($i['login'] === $login)
				$taken = 1;
		}
	}
	if (strlen($tmp['login'] > 8))
	{
		echo "<h1>8 Characters Maximum Please</h1>";
		echo '<html>';
		echo '</br><a href="create.html">Retry</a>';
		echo '</html>';
		return FALSE;
	}
	if ($taken)
	{
		echo "That Username is taken.\n";
		echo "<html>";
		echo '</br><a href="create.html">Try Again?</a>';
	}
	else
	{
		$tmp['login'] = $login;
		$tmp['passwd'] = hash('whirlpool', $password);
		$contents[] = $tmp;
		file_put_contents('../private/passwd', serialize($contents));
		echo "<h1>Congratz! You've created an account!\n</h1>";
		echo '<html>';
		echo '</br><a href="home.html">Take me Home</a>';
		echo '</br><a href="shop.html"> Take to the Shop</a>';
	}
}
else
	echo "ERROR\n";
?>
</div>
</body>
</html>
