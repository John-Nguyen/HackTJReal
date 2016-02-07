<?php 
    $db2 = new SQLite3('serialNums.db') or die('Unable to open database');
    $result = $db2->query('SELECT * FROM cart') or die('Query failed');
    while($row = $result->fetchArray())
?>