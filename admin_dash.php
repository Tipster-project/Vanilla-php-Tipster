<?php 
 	include 'includes/header.php';

?>
<div id='team_reg'>
	<h1>Registrate teams</h1>
	<form enctype="multipart/form-data" action='team_reg.php' method='post'>
		<label>Team:</label></br>
		<input type='text' name='country' placeholder='country'></br>
		<label>Team-flag:</label>
		<input type='file' name='country_flag' accept='image/*' multiple></br>
		<label>Group:</label></br>
		<input type='text' name='group_reg' placeholder='group'></br>
		<input type='submit' name='team_reg_btn' value='Registrate'>
	</form>	
</div>

<div id='game_reg'>
	<h1>Registrate games</h1>
	<form action='game_reg.php' method='post'>
		<label>Home-team:</label></br>
		<input type='text' name='home_team' placeholder='home_team'></br>
		<label>Away-team:</label></br>
		<input type='text' name='away_team' placeholder='away_team'></br>
		<label>Game date:</label></br>
		<input type='date' name='game_date' placeholder='game_date'></br>
		<label>Game time:</label></br>
		<input type='time' name='game_time' placeholder='game_time'></br>
		<input type='submit' name='game_reg_btn' value='Registrate'>
	</form>	
</div>

<div class="result_reg">
	<h1>Registrate results</h1>
<?php
$query = "SELECT allGames.*, results.goal_home, results.goal_away FROM
		  (SELECT T1.team_name as team_home, T2.team_name as team_away, 
		  		T1.team_flag as home_flag, T2.team_flag as away_flag, game_match.* 
		  	FROM game_match, teams T1, teams T2
		  WHERE T1.team_id=game_match.home_team AND
		  T2.team_id=game_match.away_team) as allGames
		  
		  LEFT OUTER JOIN 
		  (SELECT * FROM results) as results
		  ON allGames.game_id = results.game_id";

		$result = $db_connect->query($query);


	?>
	<form method="post" action="save_result">
		<?php

		while($row = mysqli_fetch_assoc($result)) {

			$game_id = $row["game_id"];
			$home_name = $row["team_home"];
			$away_name = $row["team_away"];
			$home_flag = $row["home_flag"];
			$away_flag = $row["away_flag"];
			$goal_home = $row["goal_home"];
			$goal_away = $row["goal_away"];

			
			?>
			<p><?php echo ' ' . $home_name. ''; ?>
					<img class="flag" src="img/<?php echo $home_flag ?>"/> VS 
					<img class="flag" src="img/<?php echo $away_flag ?>"/>
				<?php echo ' ' . $away_name. ''; ?>
					<input type="number" name="home_goal[]" value="<?php echo $goal_home; ?>" /> - 
					<input type="number" name="away_goal[]" value="<?php echo $goal_away; ?>"/></p>
			<input type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" /></br>
			<?php
		}
		?>
	</form>
	<button id="check" name="save_result" value="Spara Bets">spara bets</button>
</div>
<?php include 'includes/footer.php'; ?>