<?php
include 'db_connect.php';
$game_id = $_POST['game_id'];
$home_goal = $_POST['home_goal'];
$away_goal = $_POST['away_goal'];
$home_team_id = $_POST['home_team_id'];
$away_team_id = $_POST['away_team_id'];

$result = mysqli_query($db_connect, "SELECT * FROM results WHERE game_id = $game_id ");

if($result->num_rows > 0) {
    mysqli_query($db_connect, "UPDATE results SET result_goal_home = '$home_goal', result_goal_away = '$away_goal' WHERE game_id = '$game_id' ");
    //header("Location: ../.php");
}
else {
    mysqli_query($db_connect, "INSERT INTO results (game_id, result_goal_home, result_goal_away) 
	VALUES ('$game_id', '$home_goal', $away_goal)");
    //header("Location: ../admin_dash.php");
}

$points1 = teamPoints("$home_team_id");
$points2 = teamPoints("$away_team_id");

insertTeamPoints($points1, "$home_team_id");
insertTeamPoints($points2, "$away_team_id");


//header("Location: ../admin_dash.php");

$query2 = "SELECT * FROM user_tournaments";
$result2 = mysqli_query($db_connect, $query2);
while ( $row = mysqli_fetch_assoc($result2)) {
	$user_id = $row["user_id"];
	$tournament_id = $row["tournament_id"];
	echo $row["user_name"];
	echo "</br>";
	 $points = userPoints($user_id, $tournament_id);
	 echo $points;
	updateUserPoints($points, $user_id, $tournament_id);
	echo "</br>";
}


//funktionen updaterar lagets poäng
function insertTeamPoints($points, $team_id){
	global $db_connect;
	mysqli_query($db_connect, "UPDATE teams SET team_points = $points WHERE team_id = '$team_id' " );
}

//funktionen räknar ut lagets aktuella poäng.
function teamPoints($team_id){
	global $db_connect;
	$points = 0;

	//hämtar all info från game_match och results.
	//Vill ha alla matchers resultat för att kunna räkna ut hur många poäng varje lag har.
	$query1 = "SELECT game_match.*, results.* FROM game_match 
			RIGHT JOIN results
			ON results.game_id = game_match.game_id
			WHERE home_team_id = $team_id OR away_team_id = $team_id";

  	$result1 = $db_connect->query($query1);
  	//var_dump($result);
  	while ($row = mysqli_fetch_assoc($result1)) {

  		if($row["home_team_id"] == $team_id) {
  			if($row["result_goal_home"] > $row["result_goal_away"]){
  				$points = $points +3;
  			}
  		}
  		else if ($row["away_team_id"] == $team_id){
  			if($row["result_goal_away"] > $row["result_goal_home"]){
  				$points = $points +3;
  			}
  		}
  		
  		if($row["result_goal_away"] == $row["result_goal_home"]){
  			$points = $points +1;
  		}
  	} 
    return $points;   
}

//funktionen räknar ut poängen för varje användare
function userPoints($user_id, $tournament_id) {
	global $db_connect;
	$points = 0;

	//hämtar all info från game_match och results.
	//Vill ha alla matchers resultat för att kunna räkna ut hur många poäng varje lag har.
	$query = "SELECT results.*, bets.* FROM results 
		RIGHT JOIN bets
		ON bets.game_id = results.game_id
		WHERE tournament_id = $tournament_id AND user_id = $user_id";

  	$result = $db_connect->query($query);
  	//print_r($result);
    $points = 0;

  	while ($row = mysqli_fetch_assoc($result)) {
  		
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
  	return $points;
  	//updateUserPoints($points, $user_id, $tournament_id);

}

function updateUserPoints($points, $user_id, $tournament_id){
	global $db_connect;
	mysqli_query($db_connect, "UPDATE user_tournaments SET user_points = $points 
								WHERE user_id = $user_id AND tournament_id = $tournament_id");
}
?>