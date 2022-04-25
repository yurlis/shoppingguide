<?php


include "../configs/main.php";
include $siteUrl . "/configs/db.php";
// include  $siteUrl . '/parts/header.php';

$user = isset($_COOKIES['authorized_user_id'])?$_COOKIES['authorized_user_id']:1;

// &name=Хлеб&category_id=1&measure_id=2&picture_id=23
// // сохраненние сообщения если введено
if ( 
	( isset( $_POST["name"] ) && $_POST["name"] != "" ) &&
	( isset( $_POST["category_id"] ) && $_POST["category_id"] != "" ) &&
	( isset( $_POST["measure_id"] ) && $_POST["measure_id"] != "" ) &&
	( isset( $_POST["shop_id"] ) && $_POST["shop_id"] != "" ) &&
	( isset( $_POST["price"] ) && $_POST["price"] != "" ) &&
	( isset( $_POST["quantity"] ) && $_POST["quantity"] != "" ) ) {
	// есть информация для записи товара, фото не обязательно

	$sql = "SELECT * FROM product WHERE name='" . $_POST["name"] . "' AND category_id=" . $_POST["category_id"];
	$result = $conn->query( $sql );

	// если такой товар есть возвращаем json false и его id
	if ( $row = mysqli_fetch_assoc ($result) ) {
	    $data = [
	    	'status' => false,
	    	'id' => $row['id'],
	    	'info_message' => "Такой продукт существует"
	    ];
	} else {
	// продукта нет сохраняем
		$sql = "INSERT INTO product (name, category_id, measure_id, picture_id) " .
				"VALUES (" . "'" . $_POST["name"] . "', " .
				"'" . $_POST["category_id"] . "', " .
				"'" . $_POST["measure_id"] . "', " .
				"'" . (isset($_POST["picture_id"])?$_POST["picture_id"]:0) . "')";

		if (!$conn->query($sql)) {
				die( "Operation failed:" . $conn->errno );
			}

			// запись в таблицу main

		$sql = "INSERT INTO main (product_id, shop_id, price, quantity, user_id) " .
				"VALUES (" . "'" . $conn->insert_id . "', " .
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
	}
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

