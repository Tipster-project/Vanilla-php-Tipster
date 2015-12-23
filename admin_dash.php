<?php 
 	include 'includes/header.php';

?>
<div class="container">
	<div class="row">
		
		<!-- REGISTERING AV LAG -->
		<div id='team_reg' class="col-sm-12">
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
		</div><!-- #team_reg -->

		<!-- REGISTERING AV MATCHER -->
<!-- 		<div id='game_reg'>
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
		</div> -->
		
		<!-- REGISTERING AV RESULTAT -->
		<div class="result_reg col-sm-12">
			<h1>Registrate results</h1>
			<form method="post" action="save_result">
				<table class="table1 col-sm-12">
					<tbody>
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

					while($row = mysqli_fetch_assoc($result)) {

						$game_id = $row["game_id"];
						$home_name = $row["team_home"];
						$away_name = $row["team_away"];
						$home_flag = $row["home_flag"];
						$away_flag = $row["away_flag"];
						$goal_home = $row["goal_home"];
						$goal_away = $row["goal_away"];

						
						?>
						<tr>
							<td style="width:25%; text-align:right;"><?php echo $home_name;?></td>
							<td style="width:10%; text-align:center;"><img class="flag" src="img/<? echo $home_flag; ?>" /></td>
							<td style="width:10%; text-align:center;"> VS </td>
							<td style="width:10%; text-align:center;"><img class="flag" src="img/<? echo $away_flag; ?>" /></td>
							<td style="width:25%"><?php echo $away_name;?></td>
							<td><input type="number" name="home_goal[]" value="<?php echo $goal_home; ?>" /></td>
							<td>-</td>
							<td><input type="number" name="away_goal[]" value="<?php echo $goal_away; ?>"/></td>
						</tr>

						
						<?php
					}
					?>
					</tbody>
				</table>
			</form>
			<button style="float:right;" id="check" name="save_result" value="Spara Resultat">Spara Resultat</button>
		</div>

	</div><!-- #row -->
</div><!-- #container -->
<?php include 'includes/footer.php'; ?>