<html>
<head>
	<title>Modify User</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="center">
		<h1>ADMIN<br>Please choose from the options below</h1>
<?PHP

$add = $_POST['Add'];
$edit = $_POST['Info'];
$del = $_POST['Delete'];

if ($add)
{
	echo '<html>';
	echo '<a href="create.html">Create new user</a></form>';
	echo '</br><a href="adminuser.html">Back</a>';
	echo '</br><a href="admin.html">Back to Admin Home</a>';
	echo '</html>';
}
if ($edit)
{
	echo '<html>';
	echo '<a href="adminmodifyuser.html">Modify User</a>';
	echo '</br><a href="adminuser.html">Back</a>';
	echo '</br><a href="admin.html">Back to Admin Home</a>';
	echo '</html>';
}
if ($del)
{
	echo '<html>';
	echo '<a href="admindeleteuser.html">Delete User</a>';
	echo '</br><a href="adminuser.html">Back</a>';
	echo '</br><a href="admin.html">Back to Admin Home</a>';
	echo '</html>';
}
?>
</div>
</body>
</html>
