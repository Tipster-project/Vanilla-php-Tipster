<?php include 'db_connect.php' ?>

<?php
	$query = "SELECT allGames.*, results.goal_home, results.goal_away FROM
		  (SELECT T1.team_name as team_home, T2.team_name as team_away, 
		  		 T1.team_points as home_points, T2.team_points as away_points, game_match.*
		  FROM game_match, teams T1, teams T2
		  WHERE T1.team_id=game_match.home_team AND
		  		T2.team_id=game_match.away_team) as allGames
		  
		  LEFT OUTER JOIN 
		  (SELECT * FROM results) as results
		  ON allGames.game_id = results.game_id";

  	$result = $db_connect->query($query);

	$row = mysqli_fetch_assoc($result);
		//print_r($row);
		$game_id = $row["game_id"];
		$home_team_id = $row["home_team"];
		$away_team_id = $row["away_team"];
		$home_name = $row["team_home"];
		$away_name = $row["team_away"];
		$goal_home = $row["goal_home"];
		$goal_away = $row["goal_away"];
		$home_points = $row["home_points"];
		$away_points = $row["away_points"];
		
		echo $game_id;
		echo $home_team_id;
		echo $away_team_id;
	

		if($goal_home > $goal_away) {
			mysqli_query($db_connect, "UPDATE teams SET team_points +3 WHERE team_id = '$home_team_id'");
			 // 
			// $home_points=$home_points +3;
			echo "home winner";	

		}
		else if ($goal_home < $goal_away) {
			mysqli_query($db_connect, "UPDATE teams SET team_points +3 WHERE team_id = '$away_team_id'");
			echo "away winner";
		}
		else {
			mysqli_query($db_connect, "UPDATE teams SET team_points +1 WHERE team_id = '$home_team_id' AND '$away_team_id'");
			echo "oavgjort";
		}
	


?>
