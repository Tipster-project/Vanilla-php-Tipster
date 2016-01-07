<?php require "db_connect.php";
session_start();
$user_id = $_SESSION["user_id"];
$tournament_id = $_GET['tour_id'];

/* REGISTRERING AV SLUTVINNARE OCH SKYTTEKUNG */
$query1 = "SELECT team_name, team_id FROM teams";

$result1 = $db_connect->query($query1);
?>
<div class="container">
	<div class="row">
		<div class="extra_bet_box">
			<form action="save_extra_bet.php" class="col-sm-12" method="post">
				<label for="player">Målkung:</label>
				<input type="text" name="player" />

				<label for="winning_team">EM-vinnare 2016:</label>
				<select name="selected_team"> 
					<?php
					while($row = mysqli_fetch_assoc($result1)) { 
						?>
						<option value="<?php echo $row['team_id']; ?>"><?php echo $row['team_name']; ?></option>
					<?php 
					} 
					?>
				</select></br>
				<input type="submit" value="Spara"/>
				<input type="hidden" name="tournament" value="<?php echo $tournament_id; ?>" />
			</form>	
		</div>
	</div>
</div>

<?php


//lägg till _id efter home_team och away_team ^_^!
/* REGISTRERING AV RESULTAT */

$query = "SELECT allGames.*, bets.goal_home, bets.goal_away FROM 
			(SELECT T1.team_name AS team_home, T2.team_name AS team_away, T1.team_flag 
			AS home_flag, T2.team_flag AS away_flag, game_match.* 
			FROM game_match, teams T1, teams T2 
			WHERE T1.team_id=game_match.home_team_id AND T2.team_id=game_match.away_team_id) AS allGames 

			LEFT OUTER JOIN 
			(SELECT * FROM bets 
			WHERE user_id = $user_id AND tournament_id = $tournament_id ) AS bets 
			ON allGames.game_id = bets.game_id
			ORDER BY allGames.game_id";

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
			$game_start = $row["game_start"];

			//date check variabels
			$date = date('Y-m-d H:i:s');
			$currentDate = strtotime($date);
			$futureDate = $currentDate+(60*10);
			$formatDate = date(" Y-m-d H:i:s", $futureDate);

			$start_time = strtotime($game_start);
			$lock_time = strtotime($formatDate);

			?>
			
			<!-- <div class="bet_boxes"> -->
			<table class="table1 col-sm-12">
				<tbody>

				<?php if($start_time >= $lock_time){ ?>
					
					<!-- YOU CAN BET -->
					<tr>
						<td style="width:25%; text-align:right;"><?php echo date("d M H:i", strtotime($game_start));?></td>
						<td style="width:25%; text-align:right;"><?php echo $home_name;?>
							
						<td style="width:10%; text-align:center;"><img class="flag" src="img/<?php echo $home_flag; ?>" /></td>
						<td style="width:10%; text-align:center;"> VS 
							
						<td style="width:10%; text-align:center;"><img class="flag" src="img/<?php echo $away_flag; ?>" />
						
						<td style="width:25%"><?php echo $away_name;?></td>
						
						
						<td><input class="goal_home" original="<?php echo $goal_home; ?>" type="number" gameID="<?php echo $game_id; ?>" value="<?php echo $goal_home; ?>" /></td>
						<td>-</td>
						<td><input class="goal_away" original="<?php echo $goal_away; ?>" type="number" gameID="<?php echo $game_id; ?>" value="<?php echo $goal_away; ?>"/></td><br/>
						<td><input class="game_id" type="hidden" name="game_id[]" value="<?php echo $game_id; ?>" /></td>
						<td class="error">Du måste fylla i båda fälten</td>
					</tr>
				<?php }else{ ?>
					<tr>
						<td style="width:25%; text-align:right;"><?php echo date("d M H:i", strtotime($game_start));?></td>
						<td style="width:25%; text-align:right;"><?php echo $home_name;?>
							
						<td style="width:10%; text-align:center;"><img class="flag" src="img/<?php echo $home_flag; ?>" /></td>
						<td style="width:10%; text-align:center;"> VS 
							
						<td style="width:10%; text-align:center;"><img class="flag" src="img/<?php echo $away_flag; ?>" />
						
						<td style="width:25%"><?php echo $away_name;?></td>
						
						<td><?php echo $goal_home; ?> - <?php echo $goal_away; ?></td><br/>
						<td>this bet is locked because the game has started</td>
						
					</tr>
				<?php } ?>
			</tbody>
		</table>
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
		$('tr').each(function() {

			var game_id = $(this).children('td').children('input.game_id');
			var goal_home = $(this).children('td').children('input.goal_home');
			var goal_away = $(this).children('td').children('input.goal_away');


			if(goal_home.attr('original') !== goal_home.val() || goal_away.attr('original') !== goal_away.val()){
				if (goal_home.val() == '' || goal_away.val() == '') {
					$(this).children('td.error').show();
				}else{
					$(this).children('td.error').hide();
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
		        url:"includes/save_bet.php",
		        data:"tournament_id=<?php echo $tournament_id;?>&bets="+JSON.stringify(post_values),
		        	success:function(data){
		        		alert("Succes, " + data);
		        	}
	   		});
		}

	});

	
});

</script>



