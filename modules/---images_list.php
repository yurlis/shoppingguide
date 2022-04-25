<?php 

$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . "/configs/db.php";
include $siteUrl . "/configs/main.php";

// проверка при запросе со строкой поиска

// if (isset($_GET['id']) && $_GET['id']!='') {
// определить количество всех продуктов в запросе

$sql = "SELECT * FROM picture";
$result = $conn->query( $sql );

?>

<div id="images-list-container" class="container">
    <!-- search image -->
    <div class="row col-12">
        <input class="form-control mr-sm-2" type="search" placeholder="Enter part name of product" aria-label="search">
        <button class="btn btn-secondary">Search picture</button>
    </div> <!-- ./row -->
    <div>
      <?php include 'upload/upload-image.php'; ?>
    </div>
    <!-- list images -->
    <div class="row col-12">
      <?php
        while ( $row = mysqli_fetch_assoc ($result) ) {
      ?>
        <div class="col-4">
          <div class="card m-2">
            <img src="<?=$webSiteUrl ?>images/upload/<?=$row['name'] ?>" class="card-img-top" alt="Товар" >
            <div class="card-body">
              <button class="btn btn-primary" onclick="btnImageChoose( this )" data-id="<?=$row['id'] ?>" data-name="<?=$row['pictureName'] ?>">Выбрать</button>
            </div>
          </div> 
        </div> <!-- /.col-4 -->
      <?php  
        }
      ?>

    </div> <!-- ./row -->  
</div> <!-- ./container -->
