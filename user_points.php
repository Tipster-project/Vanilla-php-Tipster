<?php
echo userTournaments();
//funktionen updaterar lagets poäng
function updateUserPoints($points, $user_id, $tournament_id){
	global $db_connect;
	mysqli_query($db_connect, "UPDATE user_tournaments SET user_points = $points WHERE user_id = '$user_id' AND 
		tournament_id = $tournament_id" );
}
function userTournaments() {
	global $db_connect;
	$tournament_id = $_GET['group'];

	$query = "SELECT * from user_tournaments WHERE tournament_id = $tournament_id ORDER BY user_points DESC";
	$result = mysqli_query($db_connect, $query);
	?>
	<table>
		<tbody>
			<?php
			//for each row that exist with a specific letter, print table
			while($row = $result->fetch_assoc()) {
				
				if ( "{$row['tournament_id']}" == $tournament_id) {
					?>
					<tr>
						<td><?php echo "{$row['user_name']}"; ?></td>
						<!-- hämtar funktionen som räknar ut lagpoängen -->
						<td><?php echo userPoints("{$row['user_id']}"); ?></td>
					</tr>
					<?php
				}
			}	
			?>
		</tbody>
	</table>
<?php
}
function userPoints($user_id) {
	global $db_connect;
	$points = 0;
	$tournament_id = $_GET['group'];

	//hämtar all info från game_match och results.
	//Vill ha alla matchers resultat för att kunna räkna ut hur många poäng varje lag har.
	$query = "SELECT results.*, bets.* FROM results 
		RIGHT JOIN bets
		ON bets.game_id = results.game_id
		WHERE tournament_id = $tournament_id";

  	$result = $db_connect->query($query);
    $points = 0;
  	while ($row = mysqli_fetch_assoc($result)) {
  		if($row['user_id'] == $user_id) {
	  		if($row["goal_home"] == $row["goal_away"] && $row["result_goal_home"] == $row["result_goal_away"]) {
	  			$points = $points + 15;
		  	}	
	  		if($row["goal_home"] == $row["result_goal_home"]) {
	  			$points = $points + 5;		
	  		}
	  		if($row["goal_away"] == $row["result_goal_away"]) {
	  			$points = $points + 5;
	  		}
		  	
	  		if($row["goal_away"] < $row["goal_home"] && $row["result_goal_away"] < $row["result_goal_home"]) {
				$points = $points + 10;  			
	  		}
	  		else if($row["goal_away"] < $row["goal_home"] && $row["result_goal_away"] < $row["result_goal_home"]) {
	  			$points = $points + 10;	
	  		}
  		}
  		
    }
  	return $points;
  	updateUserPoints($points, $user_id, $tournament_id);

}
?>