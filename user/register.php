<?php 

include_once '../layout/session.php';
// include_once 'config/config.php';
?> <p class="loggedin"> <?php if ($_SESSION['loggedin'] == TRUE ){
	header('Location: user.php');
	exit;
} ?> </p>
<style>
    .loggedin {
        display: none;
    }
</style>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Register</h1>
			<form action="./user-creation/register-redirect.php" method="post">
            <label for="voornaam">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="voornaam" placeholder="Voornaam" id="voornaam" required>
                <label for="achternaam">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="achternaam" placeholder="Achternaam" id="achternaam" required>
                <label for="telefoon_nummer">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="telefoon_nummer" placeholder="Telefoon Nummer" id="telefoon_nummer" required>
				<label for="email">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="email" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>

				<input type="submit" value="Register" name="register">
		</form>
		</div>
		<script src="https://kit.fontawesome.com/b72f5a32f8.js" crossorigin="anonymous"></script>
	</body>
</html>