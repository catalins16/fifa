<?php 
require 'core/init.php';
$general->logged_out_protect();
$user 		= $users->userdata($_SESSION['id']);

$username 	= $user['username'];
$userID 	= $user['id'];
$fn 		= $user['firstname'];
$ln 		= $user['lastname'];
$email 		= $user['email'];

date_default_timezone_set('Europe/Bucharest'); // CDT
$infoServer = getdate();
$dayServer	= $infoServer['mday'];
$monthServer= $infoServer['mon'];
$yearServer	= $infoServer['year'];
$hourServer	= $infoServer['hours'];
$minServer	= $infoServer['minutes'];
$date = $dayServer.'.'.$monthServer.'.'.$yearServer;
//echo $date;

// creating championship
if (isset($_POST['submit'])) {
	// chosen championship type
	if (isset($_POST["optradio"])) {
		$champType = $_POST["optradio"];	
		//echo $champType.'<br>';
		if (strlen($champType) > 1) {
			$partsOfString = explode(".", $champType);
			//echo "number of players: ".$partsOfString[0]."<br/>"; // numOfPlayers
			//echo "number of matches: ".$partsOfString[1]."<br/>"; // matches

			$numOfPlayers = $partsOfString[0];
			$numOfMatches = $partsOfString[1];
		} else { 
			$numOfPlayers = $champType;
			$numOfMatches = 15; 
		}
	}
	
	// selected players
	if (isset($_POST["players"])) {
		$players = $_POST["players"];	
		shuffle($players);

		// foreach($players as $result) {
		//     echo $result.'<br>';
		// }
		//echo count($players);
	}
	
	if(empty($_POST['optradio']) || empty($_POST['players'])){
		$errors[] = 'Error! Please select players!';
	} else if ($numOfPlayers != count($players) ) {
		$errors[] = 'Number of players doesn\'t match the championship type!';
	}

	$player1 = $players[0];
	$player2 = $players[1];
	$player3 = $players[2];
	$player4 = $players[3];
	if ($numOfPlayers == '5') {
		$player5 = $players[4];	
	} else {
		$player5 = "";
	}
	
	if(empty($errors) === true){
		//create championship
		$users->addChampionship($date, $numOfPlayers, $player1, $player2, $player3, $player4, $player5, $numOfMatches, $username);
		header('Location: new.php?success');
		exit();
	}
}

// generating matches for championship
if (isset($_POST['submit2'])) {
	$championshipId =  $_POST["submit2"];

	// get number of players and palyer names
	$users->getNumOfPlayers($championshipId);
	$numOfPlayers = $users->numOfPlayers;
	$player1 = $users->player1;
	$player2 = $users->player2;
	$player3 = $users->player3;
	$player4 = $users->player4;
	
	if ($numOfPlayers == '5') {
		$player5 = $users->player5;
	}
	//echo "XXXX num of players: ".$numOfPlayers.", players: ".$player1.", ".$player2.", ".$player3.", ".$player4.", ".$player5;	

	if(empty($errors) === true){
		// 2v2 / 5
		//add matches to championship
		$users->addMatch($championshipId, $player1, $player2, $player3, $player4);
		$users->addMatch($championshipId, $player1, $player2, $player3, $player5);
		$users->addMatch($championshipId, $player1, $player2, $player4, $player5);
		$users->addMatch($championshipId, $player1, $player3, $player2, $player4);
		$users->addMatch($championshipId, $player1, $player3, $player2, $player5);
		$users->addMatch($championshipId, $player1, $player3, $player4, $player5);
		$users->addMatch($championshipId, $player1, $player4, $player2, $player3);
		$users->addMatch($championshipId, $player1, $player4, $player2, $player5);
		$users->addMatch($championshipId, $player1, $player4, $player3, $player5);
		$users->addMatch($championshipId, $player1, $player5, $player2, $player3);
		$users->addMatch($championshipId, $player1, $player5, $player2, $player4);
		$users->addMatch($championshipId, $player1, $player5, $player3, $player4);
		$users->addMatch($championshipId, $player2, $player3, $player4, $player5);
		$users->addMatch($championshipId, $player2, $player4, $player3, $player5);
		$users->addMatch($championshipId, $player2, $player5, $player3, $player4);
		
		header('Location: new.php?success');
		exit();
	}
}

// deactivate championship
if (isset($_POST['submit3'])) { 
	$championshipId =  $_POST["submit3"];
		if(empty($errors) === true){		
		$users->endChampionship($championshipId);
		header('Location: new.php?success');
		exit();
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>New Championship</title>
	<?php include('header.php'); ?>
</head>
<body> 

	<?php include('nav.php'); ?>

	<div class="container" style="margin-top: 10px;">
		<div class="row bordered-box">
		
			<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
					echo 'Thanks! <a href="new.php">Go back.</a>';
				  
					$host  = $_SERVER['HTTP_HOST'];
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = 'new.php';
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

			<h2>New championship:</h2>
			<h4>
			<form method="post" action="">
				<div class="col-md-3">	
					Configuration:
					<div id="type">
						<div class="radio">
					      	<label><input type="radio" name="optradio" value="4.12">2v2 / 4 players (12 matches)</label>
					    </div>
					    <div class="radio">
					      	<label><input type="radio" name="optradio" value="4.15">2v2 / 4 players (15 matches)</label>
					    </div>
					    <div class="radio">
					      	<label><input type="radio" name="optradio" value="5" checked>2v2 / 5 players</label>
					    </div>
					    <div class="radio disabled">
					      	<label><input type="radio" name="optradio" value="6" disabled>2v2 / 6 players (N/A)</label>
					    </div>
					</div>					
		
				    <hr>

				    Players:
				    <div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Cata">Cata</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Pesky">Pesky</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Moshu">Moshu</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Tibi">Tibi</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Luci">Luci</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Oli">Oli</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Mario">Mario</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" name="players[]" id="players" value="Nicusor">Nicusor Dan</label>
					</div>
					<button class="btn btn-success" type="submit" name="submit" value="Update"><span class="glyphicon glyphicon-ok"></span> Create</button>
					<button class="btn btn-danger" type="reset" name="reset" value="Reset"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				</div>

				<div class="col-md-9">
				  	<div class="table-responsive">          
					  	<table class="table">
					    	<thead>
					      		<tr>
							        <th>#</th>
							        <th>Player</th>
							        <th>Wins</th>
							        <th>Draws</th>
							        <th>Losses</th>
							        <th>Scored</th>
							        <th>Conceded</th>
							        <th>GD</th>
							        <th>Points</th>
						      	</tr>
						    </thead>
						    <tbody>
								<tr>
									<td>1</td>
									<td>Cata</td>
									<td>3</td>
									<td>2</td>
									<td>1</td>
									<td>13</td>
									<td>3</td>
									<td>10</td>
									<td>7</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Tibi</td>
									<td>2</td>
									<td>3</td>
									<td>1</td>
									<td>10</td>
									<td>5</td>
									<td>5</td>
									<td>5</td>
								</tr>
						    </tbody>
						</table>
					</div>

					<h3>Active championships:</h3>
					<?php 
						$result = $users->getActiveChampionshipsList();
						echo $result;
					?>

					<h3>Active games:</h3>
					<div class="table-responsive">          
					  	<table class="table">
					    	<thead>
					      		<tr>
							        <th>Match #</th>
							        <th>Team 1</th>
							        <th></th>
							        <th>Team 2</th>
							        <th>Score</th>
						      	</tr>
						    </thead>
						    <tbody>
								<!-- <tr> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> -->
								<?php 
									$result = $users->getActiveMatches();
									echo $result;
								?>
						    </tbody>
						</table>
					</div>
				</div>
			</form>
			</h4>
		</div>
	</div>


</body>
</html>