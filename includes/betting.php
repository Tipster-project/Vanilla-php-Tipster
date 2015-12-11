<?php require "db_connect.php";
session_start();
// $tournament_name = $_POST["tournament_name"];
$tournament_id = $_POST["selected_tournament"];
$user_id = $_SESSION["user_id"];


$query = "SELECT * FROM bets WHERE tournament_id = $tournament_id AND user_id = $user_id";

if(mysqli_query($db_connect, $query)) {


	$query2 = "SELECT teams.*, games.*, bets.* FROM games LEFT JOIN teams on games.team_name = teams.team_name LEFT JOIN bets on bets.game_id = games.game_id";
	 
	$result2 = $db_connect->query($query2);

	?>
	<form method="post" action="includes/betting.php">
		<?php
		while($row = mysqli_fetch_assoc($result2)) {

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

} else {
	echo "Du är inte med i några turneringar än! Skapa en eller be dina kompisar om en inbjudan!";
}
//Finlir med isset knapp osv behöver kirras.
/*$user_id = $_SESSION["user_id"];*/
/*
for ($i=0; $i < count($_POST["game_id"]); $i++) { 

	$query = "INSERT INTO bets (game_id, team_id, user_id, tournament_id, goal) VALUES('".$_POST['game_id'][$i]."', '".$_POST['team_id'][$i]."', $user_id, 1, '".$_POST['goal'][$i]."')";

	if(mysqli_query($db_connect, $query)) {

		echo "SUccess mf!";
		// header('Location: ../bet.php');

	} else {
		
		echo "Error: ". $query . "<br>" . mysqli_error($db_connect);
	}
}
*/