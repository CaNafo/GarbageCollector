<?php

try {
	$connection = new mysqli('localhost', 'root', '', 'paviljon_dle');
} 
catch (Exception $e) {
    echo "Service unavailable";
	die("");
}

$sql = "SELECT * FROM prijave WHERE status = 0";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = mysqli_fetch_array($result);
        $_tmpAry = array(
            "id" => $row["ID"],
            "opis" => $row["Opis"],
            "slika" => $row["Slika"],
            "datum" => $row["Datum"],
            "lat" => $row["Lat"],
            "lon" => $row["Lon"],
        );
        $_data[] = $_tmpAry;
    }
}

echo json_encode($_data);

?>
