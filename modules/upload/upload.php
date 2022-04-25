<?php

include "../../configs/main.php";

    // загрузка файла в папку 

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
   		$fileTmpName = $_FILES['file']['tmp_name'];
       	// echo "<pre>fileTmpName =" . $fileTmpName . "</pre>";
      $image = getimagesize( $fileTmpName );
  		$extension = image_type_to_extension($image[2]);
  		// echo "<pre>extension =" . $extension . "</pre>";
  		$name = randomFileName( $extension );
  		// echo "<pre>name =" . $name . "</pre>";   
  		
      move_uploaded_file($_FILES['file']['tmp_name'], $siteUrl . '/images/upload/product-' . $name ); // $_FILES['file']['name']) - временное имя файла

      // возвращаем json на файл 
      $data = [ 'file' => 'product-' . $name ]; 
    	echo json_encode($data); // { file : "имя файла который загружен" }
    }

// Генерируем уникальное имя для файла
function randomFileName($extension = false)
{
  //
  // echo "передали " . $extension . "</br>";
  // $extension = $extension ? $extension : '';
  // echo "преобразовали" . $extension;

  do {
    $name = md5(microtime() . rand(0, 9999));
    $file = $name . $extension;
  } while (file_exists($file));
 
  return $file;
}



?>

