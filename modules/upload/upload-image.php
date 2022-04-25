
<?php


include "../../configs/main.php";
include $siteUrl . "/configs/db.php";

?>
 
<div id="wrapper" class="row col-6">
  <h1>Upload new picture</h1>
    <input id="picture" type="file" />
    <button id="upload-btn">Upload picture to the server</button>
    <!-- Info Message -->
  <div id="info-container" class="container-fluid" style="display: none; ">        
  </div>

</div>



