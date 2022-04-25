<?php  

include "../configs/main.php";
include $siteUrl . "/configs/db.php";
// include  $siteUrl . '/parts/header.php';

$page = $_GET['page'];
$offset = $page * 6;

$sql = "SELECT * FROM product LIMIT 6 OFFSET " . $offset;

$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
	include $siteUrl . '/parts/product_card.php';
}

?>