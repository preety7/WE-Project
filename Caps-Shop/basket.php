<?php
	session_start();
	$item_db = fopen("database/basket.csv", 'a+');
	$total = 0;
	$item_id = $_POST['name'];
	if ($item_id)
	{
		if ($_POST['submit'] == "")
		{
			$store_db = fopen("store.csv", "r");
			$store = fgetcsv($store_db);
			while ($store = fgetcsv($store_db))
			{
				if ($store[3] == $item_id)
				{
					echo "You added $store[1] $store[0] hat!!";
					array_push($store, $_SESSION['loggued_on_user']);
					$basket = fgetcsv($item_db);
					while (($basket = fgetcsv($item_db)) !== FALSE)
						$tab = $basket[5];
					array_push($store, $tab);
					$store[5]= $store[5] + $store[2];
					fputcsv($item_db, $store);
					echo "<br><br>Subtotal is $$store[5]";
				}
			}
		}
	}
	rewind($item_db);
	if ($_GET['name'] == "check")
	{
		$basket = fgetcsv($item_db);
		echo "Your Basket\n<br><br>";
		while ($basket = fgetcsv($item_db))
		{
			print "$basket[1] $basket[0] -- $$basket[2]\n<br>";
			$tab = $basket[5];
		}
		echo "For a total of: $$tab";
	}
	rewind($item_db);
	$basket = fgetcsv($item_db);
	$basket = fgetcsv($item_db);
	if (!$basket)
		echo "Nothin here bro!<br>";
	rewind($item_db);
	$basket = fgetcsv($item_db);
	if ($_POST['submit'] == "Submit")
	{
		if ($_SESSION['loggued_on_user'])
		{
		   echo "Congratz! You bought: <br>";
		   $orders = fopen("database/orders.csv", 'a+');
		   while ($basket = fgetcsv($item_db))
		   {
			   print "$basket[1] $basket[0]\n<br>";
			   fputcsv($orders, $basket);
			   $tab = $basket[5];
		   }
		   echo "For a total of: $tab\n";
		}
		else
		{
			echo "<html>";
			echo '<a href="login.html">Please Login Before Checking Out</a>';
			echo '</html>';
		}
	}
	rewind($item_db);
	$basket = fgetcsv($item_db);
	if ($_POST['submit'] == "Disable")
	{
		while ($basket = fgetcsv($item_db))
		{
			unlink("./database/basket.csv");
			touch("./database/basket.csv");
			file_put_contents("./database/basket.csv","Style, Color, Price, ID, User, Total\n");
		}
		echo "You have deleted your basket\n\n\n";
		echo "<html>";
		echo '<br><a href="home.html">Click Here to go Home</a>';
		echo "</html>";
	}
	$_POST = array();
?>

<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="basket.php" method="POST">
		<input type="submit" name="submit" value="Submit">
		<input type="submit" name="submit" value="Disable">
		<br><a href="shop.html">MOAR HATZ</a>
	</form>
<body>
</html>
