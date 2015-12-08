<?php require "db_connect.php";
session_start();
//Finlir med isset knapp osv behöver kirras.
$user_id = $_SESSION["user_id"];
for ($i=0; $i < count($_POST["game_id"]); $i++) { 
	$query = "INSERT INTO bets (game_id, team_id, user_id, tournament_id, goal) VALUES('".$_POST['game_id'][$i]."', '".$_POST['team_id'][$i]."', $user_id, 1, '".$_POST['goal'][$i]."')";
	if(mysqli_query($db_connect, $query)) {
		echo "SUccess mf!";
	} else {
		echo "Error: ". $query . "<br>" . mysqli_error($db_connect);
	}
}

