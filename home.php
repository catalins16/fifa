<?php 
require 'core/init.php';
$general->logged_out_protect();
$user 		= $users->userdata($_SESSION['id']);

$username 	= $user['username'];
$userID 	= $user['id'];
$fn 		= $user['firstname'];
$ln 		= $user['lastname'];

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>☆☆☆ FIFA STARS ☆☆☆</title>
	<?php include('header.php'); ?>
</head>
<body> 

	<?php include('nav.php'); ?>

	<div class="container" style="margin-top: 10px;">
		<div class="row bordered-box">
		
			<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
					echo 'Thanks!. <a href="home.php">Go back.</a>';
				  
					$host  = $_SERVER['HTTP_HOST'];
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = 'home.php';
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

			<h2>Adauga client:</h2>

			<form method="post" action="">
				
				<div class="col-md-3">
					<h4>Date produs:<br/><br/>
					Model arzator sau centrala<br/>
					<select name="tipProdus" class="widthFull">
						<option value="b30">B30 (arzator)</option>
						<option value="b50">B50 (arzator)</option>
						<option value="b70">B70 (arzator)</option>
						<option value="b90">B90 (arzator)</option>
						<option value="b100">B100 (arzator)</option>
						<option value="b200">B200 (arzator)</option>
						<option value="b300">B300 (arzator)</option>
						<option value="b500">B500 (arzator)</option>
					   	<option value="cb25">CB25 (centrala)</option>
						<option value="cb29">CB29 (centrala)</option>
						<option value="cb34">CB34 (centrala)</option>
						<option value="cb43">CB43 (centrala)</option>
						<option value="cb50">CB50 (centrala)</option>
						<option value="cb56">CB56 (centrala)</option>
					</select>
					<br/><br/>

					Numarul si seria produsului: <br/>
					<input type="text" name="nrSerie" class="widthFull"> <br/><br/>

					Optionale: <br/>
					<input type="text" name="optionale" class="widthFull"> <br/><br/>
					</h4>
				</div>
		
				<div class="col-md-3">	
					<h4>
						Date client: <br/><br/>
						Nume: <br/>
						<input type="text" name="nume" class="widthFull"> <br/><br/>
						Prenume: <br/>
						<input type="text" name="prenume" class="widthFull"> <br/><br/>
						Judet: <br/>
						<input type="text" name="judet" class="widthFull"> <br/><br/>
						Oras: <br/>
						<input type="text" name="oras" class="widthFull">
					</h4>
				</div>

				<div class="col-md-6">							
					<h4>
						Date client: <br/><br/>
						CNP: <br/>
						<input type="text" name="cnp" class="widthFull"> <br/><br/>
						Strada: <br/>
						<input type="text" name="strada" class="widthFull"> <br/><br/>
						Data prima pornire: <br/>
						<input type="text" name="primaPornire" class="widthFull"> <br/><br/>
						Nota: <br/>
						<textarea rows="4" cols="50" type="text" name="nota" class="widthFull"> </textarea>
					</h4>
				</div>
				<input class="btn btn-primary pull-right" type="submit" name="submit" value="Adauga client">
			</form>
		</div>
	</div>

	<?php include('footer.php'); ?>
</body>
</html>