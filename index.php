<?php
include "configs/main.php";
include $siteUrl . "/configs/db.php";
include  $siteUrl . '/parts/header.php';
?>
	<div class="col-3">
		<?php
	    include $siteUrl . '/parts/cat_nav.php';
	    ?>
	</div>

	<div class="col-9">

		<div class="container">
			<form class="form-inline my-2 my-lg-0" method="POST" id="search" >
		      <input class="form-control mr-sm-2" type="text" name="search-text"  placeholder="Search" aria-label="Search" style="margin-left: 10px; width: 650px">
		      <button type="submit" name="search" class="btn btn-secondary">Search</button>
		    </form>
			<!-- Отображение всей продукции -->

			<div class="row" id="cards">
			<?php
			if (isset($_POST["search-text"])) {
				$sql="SELECT * FROM product WHERE `name` LIKE '%" . $_POST["search-text"] . "%'";  
			    $result = $conn->query($sql);
			    $kolich_prod = mysqli_num_rows($result);
			    
				$i = 0;
				// пока в переменной i хранится значение < чем кол-во пользователей
				while ($i < $kolich_prod && $row = mysqli_fetch_assoc($result)) {
					//mysqli_fetch_assoc - преобразует получ данные пользователя из БД в массив
					
						include 'parts/product_card.php';
				}
				// увеличиваем счетчик
				$i = $i + 1;
			} else {
				
				$sql = "SELECT * FROM product LIMIT 6";
				$result = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($result)) {

					include 'parts/product_card.php';
				}
			}

				?>
			</div>
			<!-- Кнопка "показать еще" -->
			<div class="row" id="esche">
				<div class="col-4 offset-4">
					<input type="hidden" value="1" id="current-page">
					<button class="btn btn-primary btn-lg" id="show-more" onclick="btnShowMoreOnClick()">Показать еще</button>
				</div>
				

			</div>



		</div>
	</div><!-- / class col-9 -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>
