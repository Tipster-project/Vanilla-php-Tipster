<?php require "db_connect.php";
session_start();
// $tournament_name = $_POST["tournament_name"];
$tournament_id = $_POST["selected_tournament"];
$user_id = $_SESSION["user_id"];


$query = "SELECT * FROM bets WHERE tournament_id = $tournament_id AND user_id = $user_id";

if(mysqli_query($db_connect, $query)) {


	$query2 = "SELECT teams.*, games.*, bets.* 
				FROM games 
				LEFT JOIN teams on games.team_name = teams.team_name 
				LEFT JOIN bets on bets.game_id = games.game_id";
	 
	$result2 = $db_connect->query($query2);

	?>
	<form method="post" action="save_bet.php">
		<?php
		while($row = mysqli_fetch_assoc($result2)) {

			// var_dump($row);

			$game_id = $row["game_id"];
			$team_id = $row["team_id"];
			$goal = $row["goal"];
			$user_id = $_SESSION["user_id"];	
			$team_name = $row["team_name"];
			$game_nr = $row["game_number"];

			
			
			?>
			<p><?php echo $team_name . $game_id . $row["team_id"]; ?></p>
			<input type="number" gamenr="<?php echo $game_nr; ?>" name="goal_<?php echo $game_id; ?>"  value="<?php echo $goal; ?>"/></br>
			<!-- <input type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" /> -->
			<input type="hidden" name="team_id[]" value="<?php echo $team_id; ?>" />
			<input type="hidden" name="tournament_id" value="<?php echo $tournament_id; ?>" />
			<?php
		}
		?>
		<input type="submit" name="save_bets" value="Spara Bets" /> 
	</form>
	<?php

} else {
	echo "Du är inte med i några turneringar än! Skapa en eller be dina kompisar om en inbjudan!";
}