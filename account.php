<?php 
require 'core/init.php';
$general->logged_out_protect();
$user 		= $users->userdata($_SESSION['id']);

$username 	= $user['username'];
$userID 	= $user['id'];
$fn 		= $user['firstname'];
$ln 		= $user['lastname'];
$email 		= $user['email'];

if (isset($_POST['submit'])) {
	if(empty($_POST['username']) || empty($_POST['password']) ||  empty($_POST['email'])  || empty($_POST['lastname'])  ||  empty($_POST['firstname'])){
		$errors[] = 'Error! Fill in all the fields!';
	} 
		
	if(empty($errors) === true){
		$firstname 		= htmlentities($_POST['firstname']);
		$lastname 		= htmlentities($_POST['lastname']);
		$username 		= htmlentities($_POST['username']);
		$password 		= htmlentities($_POST['password']);
		$email 			= htmlentities($_POST['email']);

		$users->updateUser($firstname, $lastname, $username, $password, $email, $userID);
		header('Location: account.php?success');
		exit();
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>FIFA STARS > Account</title>
	<?php include('header.php'); ?>
</head>
<body> 

	<?php include('nav.php'); ?>

	<div class="container" style="margin-top: 10px;">
		<div class="row bordered-box">
		
			<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
					echo 'Thanks! <a href="account.php">Go back.</a>';
				  
					$host  = $_SERVER['HTTP_HOST'];
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = 'account.php';
					//header("Location: http://$host$uri/$extra");
					header("Refresh: 2; url=$extra");
					exit;			
				}
			?>
				
			<?php 
				if(empty($errors) === false){
					echo '<div class="alert alert-danger fade in alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ' . implode('</p><p>', $errors) . '</div>';	
				}
			?>	

			<h2>Account:</h2>
			<h4>
			<form method="post" action="">
				<div class="col-md-6">	
					Firstname: <span class="currentInfo">(Current: <?php echo "<span class='explicit'>".$fn."</span>"; ?>)</span> <br/>
					<input type="text" name="firstname" class="widthFull"> <br/><br/>
					Lastname: <span class="currentInfo">(Current: <?php echo "<span class='explicit'>".$ln."</span>"; ?>)</span> <br/>
					<input type="text" name="lastname" class="widthFull"> <br/><br/>
					Username: <span class="currentInfo">(Current: <?php echo "<span class='explicit'>".$username."</span>"; ?>)</span> <br/>
					<input type="text" name="username" class="widthFull"> <br/><br/>
					Password: <span class="currentInfo">(Current: <?php echo "<span class='explicit'>***not shown***</span>"; ?>)</span> <br/>
					<input type="password" name="password" class="widthFull"> <br/><br/>
					E-mail: <span class="currentInfo">(Current: <?php echo "<span class='explicit'>".$email."</span>"; ?>)</span> <br/>
					<input type="email" name="email" class="widthFull"> <br/><br/>
					<button class="btn btn-success" type="submit" name="submit" value="Update"><span class="glyphicon glyphicon-ok"></span> Update</button>
					<button class="btn btn-danger" type="reset" name="reset" value="Reset"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				</div>
				<div class="col-md-6">
				</div>
			</form>
			</h4>
		</div>
	</div>

	<?php include('footer.php'); ?>
</body>
</html>