<!-- Левый блок навигации -->
<?php

include "../configs/main.php";
include $siteUrl . "/configs/db.php";

?>



<span><a class="navbar-brand">Categories</a></span>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	<a class="nav-link <?php if(!isset($_GET['id'])){ ?>active <?php } ?>" href="<?=$webUrl;?>">Все</a>
	<?php
			//Вывод списка категорий из БД "Категории" (менятеся в зависимости от количества категорий в БД) 
			$sql = "SELECT * FROM category";
			$result = $conn->query($sql);
			while ($row = mysqli_fetch_assoc($result)) {
				if(isset($_GET['id']) && $_GET['id']==$row['id']) {
				echo "<a class='nav-link active' href='".$webUrl."/cat.php?id=" . $row['id'] . "'>" . $row['name'] . "</a>";
				} else {
				echo "<a class='nav-link' href='".$webUrl."/cat.php?id=" . $row['id'] . "'>" . $row['name'] . "</a>";
				}
			}
		?>
</div>
<a href="add_cat.php" type="submit" class="btn btn-secondary">Add categoty</a>





