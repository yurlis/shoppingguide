<?php


include "../configs/main.php";
include $siteUrl . "/configs/db.php";
// include  $siteUrl . '/parts/header.php';

$user = isset($_COOKIES['authorized_user_id'])?$_COOKIES['authorized_user_id']:1;

if ( 
	( isset( $_POST["id"] ) && $_POST["id"] != "" ) &&
	( isset( $_POST["shop_id"] ) && $_POST["shop_id"] != "" ) &&
	( isset( $_POST["price"] ) && $_POST["price"] != "" ) &&
	( isset( $_POST["quantity"] ) && $_POST["quantity"] != "" ) ) {

	$sql = "INSERT INTO main (product_id, shop_id, price, quantity, user_id) " .
				"VALUES (" . "'" . $_POST["id"] . "', " .
				"'" . $_POST["shop_id"] . "', " .
				"'" . $_POST["price"] . "', " .
				"'" . $_POST["quantity"] . "', " .
				"'" . $user . "')";


	if (!$conn->query($sql)) {
			die( "Operation failed:" . $conn->errno );
		}

    // возвращаем json ok
    $data = [
    	'status' => true,
    	'id' => $conn->insert_id,
    	'info_message' => "Информация успешно сохранена"
    ];
} else {
	// если не все поля
	$data = [
	    	'status' => false,
	    	'info_message' => "Не заполнены необходимые поля"
	    ];
}

echo json_encode($data);


	// { status : true , id : "id продукта в БД", info_message : "Информация успешно сохранена" }  - если создали новый и записали запись о цене
	// { status : false , id : "id продукта в БД", info_message : "Такой продукт существует" }  - если такой продукт в базе уже есть
	// { status : false, info_message : "Не заполнены необходимые поля" } - не все поля введены
