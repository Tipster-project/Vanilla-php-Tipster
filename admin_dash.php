<?php 
 	include 'includes/header.php';

?>
<div id='team_reg'>
	<h1>Registrate teams</h1>
	<form action='team_reg.php' method='post'>
		<label>Team:</label></br>
		<input type='text' name='country' placeholder='country'></br>
		<label>Team-flag:</label></br>
		<input type='file' name='country_flag' accept='image/*' multiple></br>
		<label>Group:</label></br>
		<input type='text' name='group_reg' placeholder='group'></br>
		<input type='submit' name='team_reg_btn' value='Registrate'>
	</form>	
</div>

<div id='game_reg'>
	<h1>Registrate games</h1>
	<form action='game_reg.php' method='post'>
		<label>Hometeam:</label></br>
		<input type='text' name='home_team' placeholder='home_team'></br>
		<label>Awayteam:</label></br>
		<input type='text' name='away_team' placeholder='away_team'></br>
		<label>Game date:</label></br>
		<input type='date' name='game_date' placeholder='game_date'></br>
		<label>Game time:</label></br>
		<input type='time' name='game_time' placeholder='game_time'></br>
		<input type='submit' name='game_reg_btn' value='Registrate'>
	</form>	
</div>
<?php include 'includes/footer.php'; ?>