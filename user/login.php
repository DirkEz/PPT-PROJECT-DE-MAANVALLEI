<?php 
include_once '../layout/session.php';
include_once '../layout/bootstrap.php'
?> <p class="loggedin"> <?php if ($_SESSION['loggedin'] == TRUE ){
	if ($_SESSION['positie_id'] === 2){
		// echo 'Welcome admin, ' . $_SESSION['name'] . '!';
		header('Location: ./admin/medewerker.php');
	} elseif ($_SESSION['positie_id'] === 1) {

	} else {
		// echo 'Welcome user, ' . $_SESSION['name'] . '!';
		header('Location: ./user/user.php');
	}
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
		
			
			<div class="">
				<div class="position-absolute top-50 start-50 translate-middle">
					<h1>Login</h1>
					<div class="d-inline-flex p-2 ">
						<form action="config/authenticate.php" method="post">
							<div class="input-group flex-nowrap"> 
								<span class="input-group-text" id="addon-wrapping">@</span>
								<input type="email" name="email" placeholder="Email" id="email" required>
							</div>
							<div class="input-group flex-nowrap">
								<span class="input-group-text" id="addon-wrapping">🔒</span>
								<input type="password" name="password" placeholder="Password" id="password" required>
							</div>
							<div class="col-12">
								<input class="btn btn-primary" type="submit" value="Login">
							</div>
								
						</form>
						
					</div>
					<p><a class="register-txt" href="register.php">Dont have a account?</a></p>
				</div>
			</div>
		</div>
		
	</body>
</html>