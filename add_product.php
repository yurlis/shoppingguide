<?php


include "configs/main.php";
include $siteUrl . "/configs/db.php";
include  $siteUrl . '/parts/header.php';

// if ( isset($_POST["name"]) && isset($_POST["address"])
// 	&& $_POST["name"] != "" && $_POST["address"] != "") {
// 	// вставить в таблицу "users" ()
// 	$sql = "INSERT INTO shop (name, address) VALUES ('" . $_POST["name"] . "' , '" . $_POST["address"] ."')";
	
// 	if($conn->query($sql)) {
// 		echo "<h2>Магазин добавлен</h2>";
// 	} else {
// 		echo "<h2>Произошла ошибка</h2>" . mysqli_error($conn);
// 	}
// }
?>

		<div id="info-container" class="col-12" style="display: none;">
		</div>
		<div class="container border rounded-lg p-3">
			<form id="add-product-form" method="POST">
				<div class="form-group">
					<label>Name of product</label>
					<input class="form-control" type="text" name="name">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select class="form-control" name="category_id">
				    	<option value="0">not selected</option>
				    	<?php
				    	$sql = "SELECT * FROM category";
				    	$result = $conn->query($sql);
				    	while ($row = mysqli_fetch_assoc($result)) {
				    		echo "<option value='" . $row['id'] . "'>" . $row["name"] . "</option>"; 
				    	}
				    	?>
				    </select>


				</div>
				<div class="form-group">
				    <label>Units of measurement</label>
				    <select class="form-control" name="measure_id">
				    	<option value="0">not selected</option>
				    	<?php
				    	$sql = "SELECT * FROM measure";
				    	$result = $conn->query($sql);
				    	while ($row = mysqli_fetch_assoc($result)) {
				    		echo "<option value='" . $row['id'] . "'>" . $row["name"] . "</option>"; 
				    	}
				    	?>
				    </select>
				</div>

				<div class="form-group">
					<label>Shop name and address</label>
					<a id="add_shops" type="submit" class="btn btn-secondary" onclick="btnShowShops()">Choose shop</a>
					<p class="form-group">
					<p id="chosenShop" class="form-control" type="" value="" style="display: none;"><!-- <p id="chosen-shop"></p> -->
					<p id="chosenAddress" class="form-control" type="" value="" style="display: none;">	
					<p id="shop-id" type="hidden" value="">
				  	</p>
				</div>
				<div class="form-group">
					<label>Price</label>
					<input class="form-control" type="text" name="price">
				</div>
				<div class="form-group">
					<label>Quantity</label>
					<input class="form-control" type="text" name="quantity">
				</div>

				<div class="form-group">
<!-- 					<label>Фото товара</label>
					<a id="add_photo" type="submit" class="btn btn-secondary">Добавить фото</a> -->
<!-- ЮРА  -->
					<label>Photo item</label>
					<a class="btn btn-secondary mt-2" onclick="btnChooseImage()">Add photo</a>
					<input id="picture-id" type="hidden" value="">
					<div id="photo-content" class="mt-3" style="display: none;"></div>
<!-- ./ ЮРА -->

				</div>
				<a id="btnSaveProduct" class="btn btn-secondary" onclick="saveProduct(null)">Save</a>
			</form>
		</div>

		<!-- контейнер для выбора магазинов и картинок -->
		<div id="add-container" class="col-12" style="display: none;">
		</div>
		<!-- ./ -->


<?php
include $siteUrl . '/parts/footer.php';
?>