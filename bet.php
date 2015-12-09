<?php include 'includes/header.php';

	$query = "SELECT teams.*, games.* FROM games LEFT JOIN teams on games.team_name = teams.team_name";
	
	$result = $db_connect->query($query);

	?>
	<form method="post" action="includes/betting.php">
		<?php
	while($row = mysqli_fetch_assoc($result)) {
		$game_id = $row["game_id"];
		$team_id = $row["team_id"];
		$goal = $row["goal"];
		$user_id = $_SESSION["user_id"];	
		$team_name = $row["team_name"];
		$tournament_id = 1;
		?>
		<p><?php echo $team_name; ?></p>
		<input type="number" name="goal[]" value="<?php echo $goal; ?>"/></br>
		<input type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" />
		<input type="hidden" name="team_id[]" value="<?php echo $team_id; ?>" />
		<input type="hidden" name="<?php echo $tournament_id; ?>" />
		<?php
	}
	?>
	<input type="submit" name="save_bets" value="Spara Bets" /> 
	</form>
	<?php

	      	
	$db_connect->close();
?>
