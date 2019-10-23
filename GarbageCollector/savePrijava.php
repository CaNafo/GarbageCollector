<?php
if (!empty($_POST))
{
    $slika = "data:image/jpeg;base64, ".$_POST["slika"];
    $lon = $_POST["lon"];
    $lat = $_POST["lat"];
    $opis = $_POST["opis"];

    try {
	    $connection = new mysqli('localhost', 'root', '', 'paviljon_dle');
    } 
    catch (Exception $e) {
        echo "Service unavailable";
    }

    $sql = "INSERT INTO prijave(Opis, Slika, Lon, Lat, Status) VALUES ('".$opis."','".$slika."',".$lon.",".$lat.", 0) ";
    $result = $connection->query($sql);

    $connection->close();
}
?>