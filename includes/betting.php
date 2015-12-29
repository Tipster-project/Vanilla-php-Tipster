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
		  (SELECT * FROM bets WHERE
		  user_id = $user_id AND
		  tournament_id = $tournament_id
		  ) as bets
		  ON
		  allGames.game_id = bets.game_id";
		  // die($query);

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

			<div class="bet_boxes">
				<p>
					<?php echo ' ' . $home_name. ''; ?><img src="../img/<?php echo $home_flag ?>" style="width:30px", "height:30px"/> VS 
					<img src="../img/<?php echo $away_flag ?>" style="width:30px", "height:30px"/><?php echo ' ' . $away_name. ''; ?>
					<input class="goal_home" original="<?php echo $goal_home; ?>" type="number" gameID="<?php echo $game_id; ?>" value="<?php echo $goal_home; ?>" /> - 
					<input class="goal_away" original="<?php echo $goal_away; ?>" type="number" gameID="<?php echo $game_id; ?>" value="<?php echo $goal_away; ?>"/>
				</p>
				<p class="error">
					du har fel...
				</p>
				<input class="game_id" type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" /></br>
			</div>

		<?php } ?>

	<button id="check" name="save_bets" value="Spara Bets">spara bets</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

$(document).ready(function(){

	$('.error').hide();

	var post_values = [];

	//loops trough all the input values again and and matches them with the old ones 'variabel inputs' to se if any have changed.
	function check_values(){
		post_values = [];
		$('.bet_boxes').each(function() {

			var game_id = $(this).children('input.game_id');
			var goal_home = $(this).children('p').children('input.goal_home');
			var goal_away = $(this).children('p').children('input.goal_away');


			if(goal_home.attr('original') !== goal_home.val() || goal_away.attr('original') !== goal_away.val()){
				if (goal_home.val() == '' || goal_away.val() == '') {
					$(this).children('p.error').show();
				}else{
					$(this).children('p.error').hide();
					var post_value = {game_id:game_id.val(), goal_home:goal_home.val(), goal_away:goal_away.val()};
					post_values.push(post_value);
				}
			}

	    });
	}

	$('#check').click(function(){
	    check_values();
	    if(post_values.length > 0) {
		    $.ajax({
		        type:"post",
		        url:"save_bet.php",
		        data:"tournament_id=<?php echo $tournament_id;?>&bets="+JSON.stringify(post_values),
		        	success:function(data){
		        		alert("Succes, " + data);
		        	}
	   		});
		}

	});

	
});

</script>



