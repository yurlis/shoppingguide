<?php 

include "../configs/main.php";
include $siteUrl . "/configs/db.php";
// include  $siteUrl . '/parts/header.php';

$sql = "SELECT * FROM shop";
$result = $conn->query($sql);

?>
<div id="shop-list">
	<br/>
	<div id="add-form" style="display: none;">
		<div class="form-group" id="newShop">
			<label>Название магазина</label>
			<input class="form-control" type="text" id="newShopName">
		</div>
		<div class="form-group" id="newAddress">
			<label>Его адрес</label>
			<input class="form-control" type="text" id="newShopAddress">
		</div>
		<button id="btnAddShop" type="submit" class="btn btn-secondary" onclick="btnAddNewShop()">Добавить</button>
	</div>
	<br/>

	<div class="row">
    	<div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">ВЫБЕРИТЕ МАГАЗИН ИЗ СПИСКА</h4>
                <button id="btnAddForm" class="btn btn-secondary" onclick="btnOpnFormAddShop()">добавить новый</button>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Название</th>
                        <th>Адрес</th>
                    </thead>
                    <tbody>
                        <?php                                          
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["name"] ?></td>
                                <td><?php echo $row["address"] ?></td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a class="btn btn-secondary" onclick="btnSelectShop( this )" data-id="<?=$row['id'] ?>" data-name="<?=$row['name']?>" data-address="<?=$row['address']?>">Выбрать</a>
                                      
                                    </div>
                                </td>    
                            </tr>
                        <?php
                        }
                        ?>        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

