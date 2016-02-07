<?php
	$db = new SQLite3('serialNums.db') or die('Unable to open database');
	$query = <<<EOD
		CREATE TABLE IF NOT EXISTS cart (serial STRING, itemname STRING, price STRING)
EOD;
	$db->exec($query) or die('Create db failed');
	$serial = intval($_GET['q']);
	$db2 = new SQLite3('mainData.db') or die('Unable to open database');
	$result2 = $db2->query('SELECT * FROM data') or die('Query failed');
	while($row2 = $result2->fetchArray())
	{
		if($serial == $row2['serial'])
		{
			$name = $row2['itemname'];
			$price = $row2['price'];
			$query2 = <<<EOD
			INSERT INTO cart VALUES ( '$serial', '$name', '$price')
EOD;
			$db->exec($query2) or die("Unable to add cart $serial");
		}
	}
	$result = $db->query('SELECT * FROM cart') or die('Query failed');
	while ($row = $result->fetchArray())
	{
  		echo "Serial Number: {$row['serial']}\n Item Name: {$row['itemname']}\n Price: {$row['price']}";
  		echo "<br><br>";
	}

?>