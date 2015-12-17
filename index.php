<?php 
	include 'includes/header.php'; 
?>

<a href='reg/index.php'>Registrera här!</a>
<div class="games">
	<?php games(); ?>
</div>

<?php
	
//funktion som hämtar ut dagens matcher
function games(){
	
	global $db_connect;
	$query = "SELECT T1.team_name as team_home, T2.team_name as team_away, 
	  				T1.team_flag as home_flag, T2.team_flag as away_flag, 
	  				T1.group_nr as home_team_number, T2.group_nr as away_team_number, 
	  				game_match.*
					FROM game_match, teams T1, teams T2
					WHERE T1.team_id=game_match.home_team AND T2.team_id=game_match.away_team ";

	$result = mysqli_query($db_connect, $query);
	
	while($row = mysqli_fetch_assoc($result)){

		// print_r($row);
		$game_id = $row["game_id"];
		$group_nr = $row["home_team_number"];
		$home_name = $row["team_home"];
		$away_name = $row["team_away"];
		$home_flag = $row["home_flag"];
		$away_flag = $row["away_flag"];
		$game_start = $row['game_start'];
		
		//kollar om det är någon match idag och skriver ut det
		if(date('Ymd') == date('Ymd', strtotime($game_start))){
			echo $game_start . $home_name; ?>
			<img src="img/<? echo $home_flag; ?> "> VS 
			<img src="img/<? echo $away_flag; ?>"><? echo $away_name; ?></br><?
		}								
	}
}


?>


<?php 
	include 'includes/footer.php'; 
?>