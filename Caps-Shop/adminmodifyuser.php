<html>
<head>
	<title>adminusermodify</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="center">
<?PHP
function auth($login) {
	if (!file_exists("../private/passwd"))
		return False;
	$serialized_file = "../private/passwd";
	if (!file_get_contents($serialized_file))
		return FALSE;
	$serialized_contents = file_get_contents($serialized_file);
	if (!$serialized_contents)
		return FALSE;
	$authentication = unserialize($serialized_contents);
	foreach ($authentication as $element)
	{
		if ($element['login'] === $login)
		{
			return TRUE;
		}
	}
	return FALSE;
}

$oldlogin = $_POST['login'];
$newlogin = $_POST['newlogin'];

if (!auth($oldlogin))
{
	echo "<h1>No User by that name.</h1>";
	echo '<html>';
	echo '</br><a href="adminmodifyuser.html">Retry</a></br>';
	echo '<a href="admin.html">Admin Home</a>';
	echo '</html>';
}
else
{
	$serialized_file = "../private/passwd";
	if (!file_get_contents($serialized_file))
		return FALSE;
	$serialized_contents = file_get_contents($serialized_file);
	if (!$serialized_contents)
		return FALSE;
	$authentication = unserialize($serialized_contents);
	$taken = 0;
	foreach ($authentication as $element => $i)
	{
		if ($i['login'] === $oldlogin)
		{
			$taken = 1;
			$authentication[$element]['login'] = $newlogin;
		}
	}
	if ($taken)
	{
		file_put_contents("../private/passwd", serialize($authentication));
		echo "<h1>OK, Successfully changed.\n</h1>";
		echo '<html>';
		echo '</br><a href="admin.html">Admin Home</a>';
		echo '</html>';
	}
}
?>
</div>
</body>
</html>
