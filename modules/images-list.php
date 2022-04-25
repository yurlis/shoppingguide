<?php 

include "../configs/main.php";
include $siteUrl . "/configs/db.php";
// include  $siteUrl . '/parts/header.php';



// проверка при запросе со строкой поиска

// if (isset($_GET['id']) && $_GET['id']!='') {
// определить количество всех продуктов в запросе

$sql = "SELECT * FROM picture ORDER BY id DESC";
$result = $conn->query( $sql );

?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div id="images-list-container" class="container mt-5 border rounded-lg p-3">
    <!-- search image -->
    <div class="row">
        <div class="col-12 d-flex">
          <div class="d-flex mr-auto mt-1"><h3>SELECT or LOAD IMAGE</h3></div>
          <div class="d-flex ml-auto">
            <button class="btn btn-secondary mt-2" onclick="btnToForm()">Return to form</button>
          </div>
        </div>
    </div> <!-- ./row -->

    <div class="row col-12 container-fluid mt-2">
        <input id="search-picture-name" class="form-control mr-sm-2" type="search" placeholder="Введите название продукта или его часть" aria-label="search">
        <button class="btn btn-secondary mt-2" onclick="btnSearchPicture()">Search image</button>
    </div>

    <div class="row col-12 mt-3">
      <div>
        <h4>Load new image</h4>
      </div>
    </div>
    <div class="row col-12">
      <div class="container">
        <div class="custom-file">
          <input id="picture" type="file" class="custom-file-input">
          <label class="custom-file-label" for="picture">Choose file...</label>
        </div>
      </div>

    </div>
    <div class="row col-12">
      <div>
        <button id="upload-btn" class="btn btn-secondary mt-3" onclick="onClickUploadBtn()">Download Image to the Server</button>
      </div>
    </div>

    <!-- list images -->
    <div id="list-images-container" class="row col-12 mt-5">
      <?php include "show-list-images.php" ?>
    </div> <!-- ./row -->  
</div> <!-- ./container -->
