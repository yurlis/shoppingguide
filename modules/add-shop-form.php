<?php 

include "../configs/main.php";
include $siteUrl . "/configs/db.php";
//include  $siteUrl . '/parts/header.php';

if ( 
	( isset( $_GET["name"] ) && $_GET["name"] != "" ) &&
	( isset( $_GET["address"] ) && $_GET["address"] != "" ) ) {

		$sql = "SELECT * FROM shop WHERE name='" . $_GET["name"] . "' AND address='" . $_GET["address"] . "'";



		$result = $conn->query( $sql );

		if ( $row = mysqli_fetch_assoc ($result) ) {
			// если такой магазин существует
		    $data = [
		    	'status' => false,
		    	'id' => $row['id'],
		    	'info_message' => 'Такой магазин есть в списке'
		    ];
 		} else {	
			$sql = "INSERT INTO shop (name, address) VALUES ('" . $_GET['name'] . "', '" . $_GET['address'] . "')";

			$result = $conn->query( $sql );

			if (!$conn->query($sql)) {
				die( 'Operation failed:' . $conn->errno );
			}

			$data = [
				'status' => true,
				'id' => $conn->insert_id,
				'name' => $_GET['name'],
				'address' => $_GET['address'],
				'info_message' => 'Информация успешно сохранена'
			];

		}
} else {
	// если не все поля
	$data = [
	    	'status' => false,
	    	'info_message' => "Не заполнены необходимые поля"
	    ];
}

echo json_encode($data);

?>