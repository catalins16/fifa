<?php
require 'core/init.php';
$general->logged_in_protect();

if (!empty($_POST['username'])) {
	$username = htmlentities($_POST['username']);
	$password = htmlentities($_POST['password']);	
}

if (isset($username)){
	$login = $users->login($username, $password);
	if ($login === false) {
		$errors[] = 'That username/password combination is invalid.';
	}else {
		$_SESSION['id'] =  $login;
		header('Location: home.php');
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Fifa Stars - Login Page</title>

	<?php include('header.php'); ?>
</head>
<body>	
	<div id="container">
		<div class="container" style="margin-top: 10px;">
			<div class="row bordered-box">
				<h1 class="text-center">Welcome to Fifa Stars</h1>
				<h4>
				<p class="text-center">Please Login</p>
				<form method="post" action="" align="center">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<?php 
							if(empty($errors) === false){
								echo '<div class="alert alert-danger fade in alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ' . implode('</p><p>', $errors) . '</div>';	
							}
						?>	
						<span class="glyphicon glyphicon-user" style="color:black;"></span> Username: 
						<input class="widthFull" type="text" name="username">
						<span class="glyphicon glyphicon-lock"></span> Password:
						<input class="widthFull" type="password" name="password">

						<input type="submit" name="submit" class="btn btn-primary widthFull" value="Login">
					</div>
					<div class="col-md-4"></div>					
				</form>
				</h4>	
			</div>
		</div>	
	</div>
</body>
</html>