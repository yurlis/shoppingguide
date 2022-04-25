<?php
include "configs/main.php";
include $siteUrl . "/configs/db.php";
include  $siteUrl . '/parts/header.php';


if ( isset($_GET["id"]) && $_GET["id"] > 0)  {
	// запрос данных по id
	$sql = "SELECT product.name, category.name as 'category_name', measure.name as 'measure_name', picture.name as 'picture_name' FROM product INNER JOIN measure on product.measure_id=measure.id INNER JOIN category on product.category_id=category.id INNER JOIN picture on product.picture_id=picture.id WHERE product.id=" . $_GET["id"];


	if( !($result=$conn->query($sql)) ) {
		die ("<h2>Произошла ошибка</h2>" . mysqli_error($conn));
	} 

    $row = mysqli_fetch_assoc($result); 

?>

		<div id="info-container" class="col-12" style="display: none;">
		</div>
		<div class="container border rounded-lg p-3">
			<form id="add-product-form" method="POST">
				<div class="form-group">
					<label>Название товара: </label>
					<label><h4><?=$row['name'] ?></h4></label>
				</div>
				
				<div class="form-group">
					<label>Категория товара: </label>
					<label><h4><?=$row['category_name'] ?></h4></label>
				</div>

				<div class="form-group">
				    <label>Единицы измерения: </label>
				    <label><h4><?=$row['measure_name'] ?></h4></label>
				</div>

				<div class="form-group">
					<label>Фото товара</label>
					<div id="selected-image" class="img-item"><img src="images/upload/<?=$row['picture_name'] ?>" width="200"></div>
				</div>


				<div class="form-group">

					<label>Название магазина и адрес</label>
					<a id="add_shops" type="submit" class="btn btn-secondary" onclick="btnShowShops()">Выбрать магазин</a>
					<p class="form-group">
					<p id="chosenShop" class="form-control" type="" value="" style="display: none;"><!-- <p id="chosen-shop"></p> -->
					<p id="chosenAddress" class="form-control" type="" value="" style="display: none;">	
					<p id="shop-id" type="hidden" value="">
				  	</p>
				</div>
				<div class="form-group">
					<label>Стоимость товара</label>
					<input class="form-control" type="text" name="price">
				</div>
				<div class="form-group">
					<label>Количество</label>
					<input class="form-control" type="text" name="quantity">
				</div>


				<a id="btnSaveProduct" class="btn btn-secondary" onclick="saveProduct( <?=$_GET["id"]?> )">Сохранить</a>
			</form>
		</div>

		<!-- контейнер для выбора магазинов и картинок -->
		<div id="add-container" class="col-12" style="display: none;">
		</div>
		<!-- ./ -->


<?php
}
include $siteUrl . '/parts/footer.php';
?>