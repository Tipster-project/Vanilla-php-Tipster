<?php require "db_connect.php";
session_start();
// $tournament_name = $_POST["tournament_name"];
$tournament_id = $_POST["selected_tournament"];
$user_id = $_SESSION["user_id"];



$query = "SELECT allGames.*, bets.goal_home, bets.goal_away
		  FROM
		  (SELECT T1.team_name as team_home, T2.team_name as team_away, T1.team_flag as home_flag, T2.team_flag as away_flag, T1.team_id as home_team_id, T2.team_id as away_team_id, game_match.*
		  FROM
		  game_match, teams T1, teams T2
		  WHERE T1.team_id=game_match.home_team AND
		  T2.team_id=game_match.away_team) as allGames
		  
		  LEFT OUTER JOIN 
		  (
		  SELECT
		  *
		  FROM
		  bets
		  WHERE
		  user_id = $user_id AND
		  tournament_id = $tournament_id
		  ) as bets
		  ON
		  allGames.game_id = bets.game_id";

		$result = $db_connect->query($query);

	?>
	<form method="post" action="save_bet.php">
		<?php

		while($row = mysqli_fetch_assoc($result)) {

			$game_id = $row["game_id"];
			$home_team_id = $row["home_team_id"];
			$away_team_id = $row["away_team_id"];
			$home_name = $row["team_home"];
			$away_name = $row["team_away"];
			$home_flag = $row["home_flag"];
			$away_flag = $row["away_flag"];
			$goal_home = $row["goal_home"];
			$goal_away = $row["goal_away"];

			
			?>
			<p><?php echo ' ' . $home_name. ''; ?><img src="../img/<?php echo $home_flag ?>" style="width:30px", "height:30px"/> VS <img src="../img/<?php echo $away_flag ?>" style="width:30px", "height:30px"/><?php echo ' ' . $away_name. ''; ?><input type="number" name="home_goal[]" <?php if(!is_null($goal_home)){ echo 'value="'. $goal_home .'"'; }else{ } ?>/> - <input type="number" name="away_goal[]" <?php if(!is_null($goal_away)){ echo 'value="'. $goal_away .'"'; }else{ } ?>/></p>
			
			<input type="hidden" name="home_team_id[]" value="<?php echo $home_team_id; ?>" />
			<input type="hidden" name="away_team_id[]" value="<?php echo $away_team_id; ?>" />
			<input type="hidden" name="tournament_id" value="<?php echo $tournament_id; ?>" />
			<input type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" /></br>
			<?php
		}
		?>
		<input type="submit" name="save_bets" value="Spara Bets" /> 
	</form>
	<?php

