
<?php

include "configs/main.php";
include $siteUrl . "/configs/db.php";
include  $siteUrl . '/parts/header.php';

?>

<div id="info-container" class="col-12" style="display: none;">
</div>

<div class="container border rounded-lg p-3">
	<form class="form-inline my-2 my-lg-0" method="GET" id="compare" >
      	<input class="form-control mr-sm-2" type="text" name="text"  placeholder="Enter product to analize" aria-label="Search" style="width: 965px">
      	<button type="submit" name="search" class="btn btn-secondary">Find</button>
    </form>
	
	<div class="row" id="cards">
		<?php
		if (isset($_GET["text"])) {
			$sql="SELECT product.name, main.price, measure.unit, main.quantity, shop.name AS shop_name, measure.name AS measure_name, shop.address, picture.name AS picture_name, (1 / main.quantity * main.price / measure.normalize_unit) AS normalize_price FROM main inner join product on main.product_id = product.id inner join picture on product.picture_id = picture.id inner join measure on product.measure_id = measure.id inner join shop on main.shop_id = shop.id WHERE product.name LIKE '%" . $_GET["text"] . "%' ORDER BY normalize_price ASC";  
			
		    $result = $conn->query( $sql );
		    $num_rows = mysqli_num_rows( $result );
		    

		   	while ($row = mysqli_fetch_assoc($result)) {
			
					?>
					<div class="row mx-auto" id="card">
						<div class="col-12">
							<div class="card m-2">
								<div class="card-body" style="position: relative;
														    width: 100%;
														    padding: .625rem;
														    border-bottom: 1px solid #d2d2d2;">
									<div id="picture" class="mr-3">
										
											<img src="images/upload/<?=$row['picture_name'] ?>" class="img-thumbnail rounded mx-auto d-block">
																				
									</div>
									<div id="prod_content_compare">
										
									<h5 class="card-title">
								    	<a href="compare.php?text=<?=$row['name'] ?>">
								    		<?=$row['name'] ?>
								    	</a>						    	
								    </h5>

								    <p> Quantity: <?php echo $row['quantity'] ?> <?php echo $row['measure_name'] ?></p>
								    <p> Price: <?php echo $row['price'] ?> </p>
								    <p> Shop: <?php echo $row['shop_name'] ?>, <?php echo $row['address'] ?> </p>
								    <p> Normalized price <?php echo $row['unit'] ?>: <?php echo (round($row['normalize_price'], 2)) ?> </p>
									    
								   
								  
									</div>
								</div>
							</div>
						</div>
					</div>
			<?php
			}
		}
	?>
	</div>
</div>


<?php
include $siteUrl . '/parts/footer.php';
?>