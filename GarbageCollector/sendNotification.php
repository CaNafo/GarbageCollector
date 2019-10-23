<?php
try {
	$connection = new mysqli('localhost', 'root', '', 'paviljon_dle');
} 
catch (Exception $e) {
    echo "Service unavailable";
	die("");
}
$id=$_GET["id"];
$status=$_GET["status"];

$sql = "UPDATE prijave SET Status=" . $status . " WHERE ID = ".$id.";";
$result = $connection->query($sql);

$connection->close();
?>