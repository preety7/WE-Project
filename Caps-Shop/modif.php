<html>
<link rel="stylesheet" href="style.css">
<body>
	<div class="center">
<?PHP

$login = $_POST['login'];
$oldpass = $_POST['oldpw'];
$newpass = $_POST['newpw'];
$submit = $_POST['submit'];

if ($login && $oldpass && $newpass && $submit && $submit == "OK")
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
			if ($i['login'] === $login && $i['passwd'] === hash('whirlpool', $oldpass))
			{
				$taken = 1;
				$contents[$key]['passwd'] = hash('whirlpool', $newpass);
			}
		}
		if ($taken)
		{
			file_put_contents('../private/passwd', serialize($contents));
			echo "<h1><br>PASSWORD CHANGED\n</h1>";
		}
		else
			echo "<h1><br>ERROR Invalid Username or Password\n</h1>";
	}
	else
		echo "<h1><br>ERROR Invalid Username or Password\n</h1>";
}
else
	echo "<h1><br>ERROR Please fill in all the fields\n</h1>";
?>
<a href="home.html">Go Home</a><br>
<a href="shop.html">Start Shopping</a><br>
<a href="login.html">Return to login page</a>
</div>
</body>
</html>
