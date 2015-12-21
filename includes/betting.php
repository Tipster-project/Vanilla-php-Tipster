<?php require "db_connect.php";
session_start();
$tournament_id = $_POST["selected_tournament"];
$user_id = $_SESSION["user_id"];



$query = "SELECT allGames.*, bets.goal_home, bets.goal_away FROM
		  (SELECT T1.team_name as team_home, T2.team_name as team_away, 
		  		T1.team_flag as home_flag, T2.team_flag as away_flag, game_match.* 
		  	FROM game_match, teams T1, teams T2
		  WHERE T1.team_id=game_match.home_team AND
		  T2.team_id=game_match.away_team) as allGames
		  
		  LEFT OUTER JOIN 
		  (SELECT * FROM bets
		  WHERE user_id = $user_id AND
		  tournament_id = $tournament_id
		  ) as bets
		  ON allGames.game_id = bets.game_id";
		  // die($query);

		$result = $db_connect->query($query);

	?>
	<form method="post" action="">
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
			<p><?php echo ' ' . $home_name. ''; ?><img class="flag" src="../img/<?php echo $home_flag ?>"/> VS <img class="flag" src="../img/<?php echo $away_flag ?>"/><?php echo ' ' . $away_name. ''; ?><input type="number" name="home_goal[]" value="<?php echo $goal_home; ?>" /> - <input type="number" name="away_goal[]" value="<?php echo $goal_away; ?>"/></p>
			<input type="hidden" name="tournament_id" value="<?php echo $tournament_id; ?>" />
			<input type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" /></br>
			<?php
		}
		?>
	</form>
	<button id="check" name="save_bets" value="Spara Bets">spara bets</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

$(document).ready(function(){
	var inputs = $('input[type="number"]').each(function() {
	    $(this).data('original', this.value);
	});


	$('#check').click(function(){
	    inputs.each(function() {
	        if ($(this).data('original') !== this.value) {
	            alert(this + 'has changed');
	        } else {
	           //Do nothing
	        }
	    });
	});
});

</script>



