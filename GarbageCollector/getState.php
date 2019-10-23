<?php

try {
	$connection = new mysqli('localhost', 'root', '', 'paviljon_dle');
} 
catch (Exception $e) {
    echo "Service unavailable";
	die("");
}

$sql = "SELECT * FROM trash_containers";
$result = $connection->query($sql);
$row = mysqli_fetch_array($result);

//echo json_encode(array($row["longitude"], $row["latitude"], $row["percentage"]));
echo $row["percentage"];

?>
