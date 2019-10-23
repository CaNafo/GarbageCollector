<?php

try {
	echo "ABC";
	$connection = new mysqli('localhost', 'root', '', 'paviljon_dle');
} 
catch (Exception $e) {
    echo "Service unavailable";
	die("");
}

$percentage = "";
$percentage = $_GET["perc"];

$sql = "UPDATE trash_containers SET percentage=" . $percentage . " WHERE ID = 1;";
$result = $connection->query($sql);

$connection->close();

?>
