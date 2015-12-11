<?php
include 'db_connect.php';
session_start();
//Finlir med isset knapp osv behöver kirras.
$user_id = $_SESSION["user_id"];
$tournament_id = $_POST['tournament_id'];

$query = "SELECT * FROM bets WHERE tournament_id = $tournament_id AND user_id = $user_id";
$result = $db_connect->query($query);

$row = mysqli_fetch_assoc($result);
$old_goal = $row['goal'];
for ($i=0; $i < count($_POST["game_id"]); $i++) { 

	// if( $old_goal != '') {
	// 	$query2 = "UPDATE bets SET game_id = '".$_POST['game_id'][$i]."', team_id = '".$_POST['team_id'][$i]."', user_id = $user_id, tournament_id = $tournament_id, goal = '".$_POST['goal'][$i]."'";
	// 	if(mysqli_query($db_connect, $query2)){
	// 		echo "Success mf!";
	// 	} else {
	// 		echo "Error: ". $query2 . "<br>" . mysqli_error($db_connect);
	// 	}
	// }
	// else {
		$query3 = "INSERT INTO bets (game_id, team_id, user_id, tournament_id, goal) 
				VALUES('".$_POST['game_id'][$i]."', '".$_POST['team_id'][$i]."', $user_id, $tournament_id, '".$_POST['goal'][$i]."')";

		if(mysqli_query($db_connect, $query3)) {
			echo "Success mf!";
		}

		else {
			echo "Error: ". $query3 . "<br>" . mysqli_error($db_connect);
		}
	
}

$db_connect->close();
?>