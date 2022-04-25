<?php
include "../configs/main.php";
include $siteUrl . "/configs/db.php";
//include  $siteUrl . '/parts/header.php';


 if ( !isset($row) ) {
    // для ajax запроса
    // здесь нужно сделать еще и поиск если передаются параметры для поиска
    if ( isset($_POST['search_pattern']) && $_POST['search_pattern'] !='' ) {
        echo "<div class='container'><div><h4>Pictures on request: " . $_POST['search_pattern'] . "</h4></div></div>";
        $sql = "SELECT DISTINCT picture.id, picture.name FROM picture, product WHERE product.name LIKE '%" . $_POST['search_pattern'] . "%' AND product.picture_id=picture.id ORDER BY id DESC";
        $result = $conn->query( $sql );
    } else {
        $sql = "SELECT * FROM picture ORDER BY id DESC";
        $result = $conn->query( $sql );
    }

 }

while ( $row = mysqli_fetch_assoc ($result) ) {
?>
  <div class="col-4">
    <div class="card m-2">
      <img src="<?=$webSiteUrl ?>images/upload/<?=$row['name'] ?>" class="img-thumbnail rounded mx-auto d-block" alt="Товар" >
      <div class="card-body">
        <button class="btn btn-primary" onclick="btnImageSelect( this )" data-id="<?=$row['id'] ?>" data-name="<?=$row['name'] ?>">Choose/button>
      </div>
    </div> 
  </div> <!-- /.col-4 -->

<?php  
  }
?>

<div class="mx-auto"><button id="btn-to-start" class="btn btn-secondary mt-3" onclick="btnToStart()">Go to start of list</button></div>
