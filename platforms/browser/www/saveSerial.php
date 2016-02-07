<?php
	$db = new SQLite3('serialNums.db') or die('Unable to open database');
	$query = <<<EOD
		CREATE TABLE IF NOT EXISTS serials (serial varchar(255))
EOD;
	$db->exec($query) or die('Create db failed');
	$serial = $_GET['q'];
	$query = <<<EOD
		INSERT INTO serials VALUES ( '$serial')
EOD;
	$db->exec($query) or die("Unable to add serials $serial");
	$result = $db->query('SELECT * FROM serials') or die('Query failed');
	while ($row = $result->fetchArray())
	{
  		echo "Serial Number: {$row['serial']}";
  		echo "<br><br>";
	}

?>