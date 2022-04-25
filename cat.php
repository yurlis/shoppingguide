<?php

include "configs/main.php";

include $siteUrl . "/configs/db.php";
include  $siteUrl . '/parts/header.php';

$sql = "SELECT * FROM category WHERE id=" . $_GET['id'];
$category = mysqli_fetch_assoc( $conn->query($sql) );

?>
<!-- Меню "хлебные крошки" -->
<div class="row">
	<div class="col-12">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">
	    	<a href="<?=$webUrl;?>">Home</a>
	    </li>
	    <li class="breadcrumb-item" aria-current="page"><?php echo $category['name']; ?></li>
	  </ol>
	</nav>
	</div>
</div>
<!-- Отображение продукции по категориям -->
<div class="row" >
	<div class="col-12 mt-2 mx-auto">
	<?php
		$sql = "SELECT * FROM product WHERE category_id=" . $_GET['id'];
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			include 'parts/product_card.php';
		}
	?>
	</div>
</div>

<?php
include 'parts/footer.php';
?>