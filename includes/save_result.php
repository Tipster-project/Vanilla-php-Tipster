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
header("Location: ../admin_dash.php");


//funktionen updaterar lagets poäng
function insertTeamPoints($points, $team_id){
	global $db_connect;
	mysqli_query($db_connect, "UPDATE teams SET team_points = $points WHERE team_id = '$team_id' " );

}

//funktionen räknar ut lagets akutella poäng.
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
?>