<?php

try {
	$link = new mysqli('localhost', 'root', '', 'paviljon_dle');
} 
catch (Exception $e) {
    echo "Service unavailable";
	die("");
}

$_errAry = array("status" => 400, "success" => "false", "message" => "Can't Service your request ", "data" => array());
$_sucAry = array("status" => 200, "success" => "true", "message" => "", "data" => array());

//echo json_encode($_POST);

// get database connection
$query = "SELECT Opis, Status FROM prijave";

$result = $link->query($query);

$_data = array();

if ($result->num_rows > 0) {
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = mysqli_fetch_array($result);
        $_tmpAry = array(
            "opis" => $row["Opis"],
            "status" => $row["Status"]
        );
        $_data[] = $_tmpAry;
    }
}

echo json_encode($_data);

exit(0);
?>
