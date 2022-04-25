<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Shopping Guide by Trinity</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
	<div id="logo">
		<img src="images/logo.png" width="40" alt=""> 
		<span><a class="navbar-brand"><i>Shopping Guide by Trinity</i></span></a>
	</div>
	<div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #e3f2fd;">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?=$webUrl;?>">Catalog</a>
			</li>
		</ul>
		<ul class="navbar-nav mr-auto" style="position: absolute; right: 20px">
			
			<li class="nav-item">
				<a class="nav-link" href="add_product.php">Add product</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">My purchases</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="compare.php">Compare price</a>
			</li>

			<li class="nav-item">
				<?php
				if (isset($_COOKIE["authorized_user_id"])) {
					$sql = "SELECT * FROM user WHERE id= " . $_COOKIE["authorized_user_id"];
					$result=($conn->query($sql));
					$user = mysqli_fetch_assoc($result);
					?>
					<a class="nav-link" href="logout.php">Logout</a>
					<?php
				} else {
					?>
					<a class="nav-link" href="login.php" id="open_autorization">Login/Registration</a>
					<?php
				}
				?>
			</li>
		</ul>
		
	</div>
</nav>

<!-- главный контент -->
<div class="container" >
	<!-- строка главного контента -->
	<div class="row m-2 col-12">
		