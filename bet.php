<?php

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

$query = "SELECT tournament_id FROM user_tournaments WHERE user_id = '". $_SESSION['user_id'] ."'"; 
$result = $db_connect->query($query);
$rows = resultToArray($result);
$result->free();

$row_id = array();
for ($x = 0; $x < count($rows); $x++) {
    $row_id[] = $rows[$x]['tournament_id'];
} 
$comma_separated = implode(",", $row_id);


$query = "SELECT tournament_name, tournament_id FROM tournament WHERE tournament_id IN ($comma_separated)";

$result = $db_connect->query($query);
?> 
<h2>Välj turnering</h2>
<form action="includes/betting.php" method="post">
<select name="selected_tournament"> 
	<?php
while($row = mysqli_fetch_assoc($result)) { ?>
	<option value="<?php echo $row['tournament_id']; ?>"><?php echo $row['tournament_name']; ?></option>
	<input type="hidden" name="tournament_name" value="<?php echo $row['tournament_name']; ?>" />

<?php } ?>
</select>
<input type="submit" value="Välj turnering">
</form>
<?php

/*	$query = "SELECT teams.*, games.*, bets.* FROM games LEFT JOIN teams on games.team_name = teams.team_name";
	//  LEFT JOIN bets on bets.game_id = games.game_id
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
*/
	      	
	$db_connect->close();
?>
