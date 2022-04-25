<?php

include "configs/main.php";
include $siteUrl . "/configs/db.php";
include  $siteUrl . '/parts/header.php';

if ( isset($_POST["name"]) && $_POST["name"] != "" ) {
	// вставить в таблицу "users" ()
	$sql = "INSERT INTO category (name) VALUES ('" . $_POST["name"] . "')";
	
	if($conn->query($sql)) {
		header("Location: /");
	} else {
		echo "<h2>Произошла ошибка</h2>" . mysqli_error($conn);
	}
}
?>

<div lass="row">
	<form method="POST">
		<div class="form-group">
			<label>Название категории</label>
			<input class="form-control" type="text" name="name">
		</div>
				
		<button type="submit" class="btn btn-secondary">Сохранить</button>
	</form>
</div>


<?php
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>