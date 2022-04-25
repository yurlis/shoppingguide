
<!-- Отображем карточки продукции -->
<div id="card">
	<div class="card m-2">
		<div class="card-body" style="position: relative;
								    width: 100%;
								    padding: .625rem;
								    border-bottom: 1px solid #d2d2d2;">
			<div id="picture">
				<?php
			    $sql_IMG = "SELECT * FROM picture";
				$result_IMG = $conn->query($sql_IMG);
				while ( $row_IMG = mysqli_fetch_assoc($result_IMG) ) {

					if ( $row['picture_id'] == $row_IMG['id'] ) {

					?>
					<img src="images/upload/<?=$row_IMG['name'] ?>" class="img-thumbnail rounded mx-auto d-block">
				    <?php
				    } 
			    }
				?>
				
			</div>
			<div id="prod_content">
				
				<h5 class="card-title">
						<a href="compare.php?text=<?=$row['name'] ?>">
								    		<?=$row['name'] ?>
					    	</a>									    	
			    </h5>

			    <?php
			    $sql_izm = "SELECT * FROM measure";
				$result_izm = $conn->query($sql_izm);
				while ( $row_izm = mysqli_fetch_assoc($result_izm) ) {

					if ($row['measure_id'] == $row_izm['id'] ) {

					?>
				    <p> <?php echo $row_izm['unit'] ?> </p>
				    <?php
				    } 
				}
			    ?>

			    <a id="add_price" href="add_price.php?id=<?=$row['id'] ?>" type="submit" class="btn btn-secondary">Add price</a>

		    </div>
		  
		</div>
	</div>
</div>