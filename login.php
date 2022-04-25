<?php
include "configs/main.php";
include $siteUrl . '/configs/db.php';
include $siteUrl . '/parts/header.php';

if (isset($_POST["login"]) && isset($_POST["password"]) 
	&& $_POST["login"] != "" && $_POST["password"] != "" ){
	
	$sql = "SELECT * FROM user WHERE phone LIKE '" . $_POST["login"] ."' AND password LIKE '" . $_POST["password"] . "' ";
 	$result = ($conn->query($sql));
 	$kolich_users = mysqli_num_rows($result);

 	if ($kolich_users == 1) {
 		$user = mysqli_fetch_assoc($result);
 		// создаем КУКИ для хранения данных пользователя
 		setcookie("authorized_user_id", $user["id"], time() + 10000);
 		// перенаправить на страницу
 		header("Location: /");
 	} else {
 		echo "<h2>Error authorisation</h2>";
 	}
}


?>

<div class="row">
	<form method="POST">
		<div class="form-group">
			<label>Login</label>
			<input class="form-control" type="text" name="login">
			<small class="form-text text-muted">Enter phone number</small>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input class="form-control" type="password" name="password">
			<small class="form-text text-muted">Enter password</small>
		</div>
		<button type="submit" class="btn btn-secondary">Enter</button>
		<a href="register.php" type="button" class="btn btn-secondary">Registration</a>
	</form>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>

