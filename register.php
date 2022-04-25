
<?php
include "configs/main.php";
include $siteUrl . '/configs/db.php';
include $siteUrl . '/parts/header.php';

if (isset($_POST["name"]) && isset($_POST["login"]) && isset($_POST["password"])
	&& $_POST["name"] != "" && $_POST["login"] != "" && $_POST["password"] != "") {
	// вставить в таблицу "users" ()
	$sql = "INSERT INTO user (name, phone, password) VALUES ('" . $_POST["name"] . "' , '" . $_POST["login"] ."', '" . $_POST["password"] . "')";
	
	if($conn->query($sql)) {
		header("Location: login.php");
	} else {
		echo "<h2>Error</h2>" . mysqli_error($conn);
	}
 

}
?>

<div class="row">
	<form method="POST">
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name">
			<small class="form-text text-muted">Your name</small>
		</div>
		<div class="form-group">
			<label>Login</label>
			<input class="form-control" type="text" name="login">
			<small class="form-text text-muted">Phone number</small>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input class="form-control" type="password" name="password">
			<small class="form-text text-muted">Enter password</small>
		</div>
		<button type="submit" class="btn btn-secondary">Registrate</button>
		
	</form>
</div>
 
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>