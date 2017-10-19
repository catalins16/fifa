<?php 
class Users{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	

	public function userdata($id, $username="") {
		if($username!="") {
			$cond="`username`=";
			//$query = $this->db->prepare("SELECT * FROM `a1users` WHERE `active`='YES' AND  ".$cond." ?");
			$query = $this->db->prepare("SELECT * FROM `users` WHERE `active`='1' AND  ".$cond." ?");
			$query->bindValue(1, $username);
		} else {
			$cond="`id`=";
			$query = $this->db->prepare("SELECT * FROM `users` WHERE `active`='1' AND  ".$cond." ?");
			$query->bindValue(1, $id);
		} try {
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e) {
			die($e->getMessage());
		}

	}
	 

/*   ------------ LOGIN ----------------    */	
/*   ------------ LOGIN ----------------    */	
/*   ------------ LOGIN ----------------    */	

	public function login($username, $password) {
		$query = $this->db->prepare("SELECT `password`, `id` FROM `users` WHERE  `username` = ? AND `active` = '1' ");
		$query->bindValue(1, $username);
		
		try{
			
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password'];
			$id   				= $data['id'];
			
			if($stored_password === sha1($password)){
				return $id;	
			}else{
				return false;	
			}

		}catch(PDOException $e){
			die($e->getMessage());
		}

	}

	//$users->addChampionship($date, $numOfPlayers, $player1, $player2, $player3, $player4, $player5, $numOfMatches, $userID);
	public function addChampionship($date, $numOfPlayers, $player1, $player2, $player3, $player4, $player5, $numOfMatches, $userID){
		$query 	= $this->db->prepare("INSERT INTO `championships` (`date`, `numOfPlayers`, `player1`, `player2`, `player3`, `player4`, `player5`, `numOfMatches`, `addedBy`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ");
	 
		$query->bindValue(1, $date);
		$query->bindValue(2, $numOfPlayers);
		$query->bindValue(3, $player1);
		$query->bindValue(4, $player2);
		$query->bindValue(5, $player3);
		$query->bindValue(6, $player4);
		$query->bindValue(7, $player5);
		$query->bindValue(8, $numOfMatches);
		$query->bindValue(9, $userID);
				 
		try{
			$query->execute();
	
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	// add empty matches to championship
	public function addMatch($championshipId, $player1, $player2, $player3, $player4){
		$query 	= $this->db->prepare("INSERT INTO `matches` (`championshipId`, `player1`, `player2`, `player3`, `player4`) VALUES (?, ?, ?, ?, ?) ");
	 
		$query->bindValue(1, $championshipId);
		$query->bindValue(2, $player1);
		$query->bindValue(3, $player2);
		$query->bindValue(4, $player3);
		$query->bindValue(5, $player4);
				 
		try{
			$query->execute();
	
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	// update user info
	public function updateUser($firstname, $lastname, $username, $password, $email, $id) { 
		$password   = sha1($password);
		$query = $this->db->prepare("UPDATE `users` SET `firstname`=?, `lastname`=?, `username`=?, `password`=?, `email`=? WHERE `id` = ?");

		$query->bindValue(1, $firstname);
		$query->bindValue(2, $lastname);
		$query->bindValue(3, $username);
		$query->bindValue(4, $password);
		$query->bindValue(5, $email);
		$query->bindValue(6, $id);
		
		try{			
			$query->execute();
			
		} catch (PDOExcepetion $e) {
			die ($e->getMessage());
		}
	}
	
	// update user info
	public function endChampionship($id) { 
		$query = $this->db->prepare("UPDATE `championships` SET `finished`='1' WHERE `id` = ?");
		$query->bindValue(1, $id);
		
		try{			
			$query->execute();
			
		} catch (PDOExcepetion $e) {
			die ($e->getMessage());
		}
	}

	public function getActiveChampionshipsList() {
		$query = $this->db->prepare("SELECT * FROM `championships` where `finished`='0'");
		$i = 1;
				
		try{
			$query->execute();
			foreach ($query as $row) {
				if ($row['player5'] == '') {
					echo "<p>".$i++.") Championship: " . $row["id"]. ", Date: " . $row["date"]. ", Players: ".$row['player1'].', '.$row['player2'].', '.$row['player3'].', '.$row['player4'].'. <br/>
<button class="btn btn-primary" type="submit" name="submit2" value="'.$row["id"].'"><span class="glyphicon glyphicon-calendar"></span> Generate Matches</button> 
<button class="btn btn-danger" type="submit" name="submit3" value="'.$row["id"].'"><span class="glyphicon glyphicon-ban-circle"></span> End Championship</button>';					
				} else {
					echo "<p>".$i++.") Championship: " . $row["id"]. ", Date: " . $row["date"]. ", Players: ".$row['player1'].', '.$row['player2'].', '.$row['player3'].', '.$row['player4'].', '.$row['player5'].'. <br/>
<button class="btn btn-primary" type="submit" name="submit2" value="'.$row["id"].'"><span class="glyphicon glyphicon-calendar"></span> Generate Matches</button>
<button class="btn btn-danger" type="submit" name="submit3" value="'.$row["id"].'"><span class="glyphicon glyphicon-ban-circle"></span> End Championship</button>';					
				}
            }
		$this->queryResult = $query->fetch();

		} catch(PDOException $e){
			die($e->getMessage());
		}
	}	

	public function getActiveMatches() {
		$query = $this->db->prepare("SELECT * FROM `matches` where `finished`!='1'");
		$i = 1;
				
		try{
			$query->execute();
			foreach ($query as $row) {
				//echo "<p>".$i++.") " . $row["player1"]. " & " . $row["player2"]. " vs. ".$row['player3'].' & '.$row['player4'];			
				echo "<tr> <td>".$i++."</td><td>".$row['player1']." & ".$row['player2']."</td><td> VS. </td><td>".$row['player3']." & ".$row['player4']."</td> 
				<td>
					<input class='scoreInput' type='text'>
					<button class='btn btn-primary' type='submit' name='submitScore'><span class='glyphicon glyphicon-ok'></span> Add</button>
				</td> </tr>";
            }
		$this->queryResult = $query->fetch();

		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getNumOfPlayers($id) {
    $query = $this->db->prepare("SELECT * FROM `championships` WHERE `finished`='0' AND `id`= ?");
    $query->bindValue(1, $id);
    $numOfPlayers=0;
    $player1 = "";
    $player2 = "";
    $player3 = "";
    $player4 = "";
    $player5 = "";

    try{
        $query->execute();
        foreach ($query as $row) {
				$numOfPlayers=$row['numOfPlayers']; 
				$player1=$row['player1']; 
				$player2=$row['player2']; 
				$player3=$row['player3']; 
				$player4=$row['player4']; 
				$player5=$row['player5']; 
            }
		$this->queryResult = $query->fetch();
        $this->numOfPlayers = $numOfPlayers;
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->player3 = $player3;
        $this->player4 = $player4;
        $this->player5 = $player5;

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


}

