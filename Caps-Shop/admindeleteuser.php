<?PHP
$login = $_GET['login'];

if ($login)
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
			{
				$taken = 1;
				array_splice($contents[$key], $key);
			}
		}
		if ($taken)
		{
			file_put_contents('../private/passwd', serialize($contents));
			echo "OK, Successfully deleted.\n";
			echo '<html';
			echo '</br><a href="admin.html">Admin Home</a>';
			echo '</html>';
		}
	}
	else
	{
		echo 'Empty Userbase.';
		echo '<html>';
		echo '</br><a href="admin.html">Admin Home</a>';
		echo '</html>';
	}
}
?>
