<?php
	/*function resultToArray($result) {
	    $rows = array();
	    while($row = $result->fetch_assoc()) {
	        $rows[] = $row;
	    }
	    return $rows;
	}*/
	$query = "SELECT teams.*, games.* FROM games LEFT JOIN teams on games.team_name = teams.team_name";
	
	$result = $db_connect->query($query);
	/*$rows = resultToArray($result);*/
	/*var_dump($row);*/
	?>
	<form method="post" action="includes/betting.php">
		<?php
	while($row = mysqli_fetch_assoc($result)) {
		$game_id = $row["game_id"];
		$team_id = $row["team_id"];
		$user_id = $_SESSION["user_id"];
		$team_name = $row["team_name"];
		$tournament_id = 1;
		?>
		<p><?php echo $team_name; ?></p>
		<input type="number" name="goal[]"/></br>
		<input type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" />
		<input type="hidden" name="team_id[]" value="<?php echo $team_id; ?>" />
		<input type="hidden" name="<?php echo $tournament_id; ?>" />
		<?php
	}
	?>
	<input type="submit" name="save_bets" value="Spara Bets" /> 
	</form>
	<?php
	/*$game_id = array();
	for ($i=0; $i < count($rows); $i++) { 
		$game_id = $rows[$i]['team_name'];
	}*/
		/*var_dump($game_id);*/
		/*$combine_teams = implode(" ", $row_name);
		echo $combine_teams;*/
	      	
	$db_connect->close();
?>
