<?php

include "../../configs/main.php";
include $siteUrl . "/configs/db.php";



// // сохраненние сообщения если введено
if ( ( isset( $_GET["name"] ) && $_GET["name"] != "" ) ) {
	$sql = "INSERT INTO picture (name)" .
		"VALUES (" . "'" . $_GET["name"] . "')";

	if (!$conn->query($sql)) {
			die( "Operation failed:" . $conn->errno );
		}

    // возвращаем json ok
    $data = [
    	'status' => true,
    	'id' => $conn->insert_id,
    	'name' => $_GET["name"]   
    ];

  	echo json_encode($data);
}

?>


