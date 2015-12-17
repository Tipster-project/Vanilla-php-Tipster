<?php
include 'db_connect.php';
session_start();
//Finlir med isset knapp osv behöver kirras.
$user_id = $_SESSION["user_id"];
$tournament_id = $_POST['tournament_id'];
$no_goal_set = null;

for ($i=0; $i < count($_POST['game_id']); $i++) { 

	$query = "SELECT * FROM bets WHERE game_id = '". $_POST['game_id'][$i] ."' AND
			  user_id = $user_id AND
			  tournament_id = $tournament_id";
	$result = $db_connect->query($query);
	$bet_exist = mysqli_fetch_assoc($result);

	if(is_null($bet_exist)){
		$query2 = "INSERT INTO bets (game_id, user_id, tournament_id, goal_home, goal_away) VALUES
				   ('". $_POST['game_id'][$i] ."', $user_id, $tournament_id, '". $_POST['home_goal'][$i] ."', '". $_POST['away_goal'][$i] ."')";

		if(mysqli_query($db_connect, $query2)){
			//success
			echo 'Insertion ex:1 succes';
		}else{
			// echo a error message if the query dident work.
			echo "Insert ex:1 Error: ". $query2 . "<br>" . mysqli_error($db_connect);
		}

	}else{
		$query3 = "UPDATE bets SET goal_home = '". $_POST['home_goal'][$i] ."' AND goal_away = '". $_POST['away_goal'][$i] ."' WHERE
		           game_id = '". $_POST['game_id'][$i] ."' AND
		           user_id = $user_id AND
		           tournament_id = $tournament_id";
		echo $query3."<br>";

		if(mysqli_query($db_connect, $query3)){
			//success
			//echo 'Update ex:1 succes';
		}else{
			// echo a error message if the query dident work.
			//echo "Update ex:1 Error: ". $query3 . "<br>" . mysqli_error($db_connect);
		}
	}
	//var_dump($bet_exist);



}

$db_connect->close();
?>