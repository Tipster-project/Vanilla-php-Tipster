<?php require "db_connect.php";
session_start();
$tournament_name = $_POST["tournament_name"];
$tournament_id = $_POST["selected_tournament"];
echo $tournament_id . $tournament_name;
$query = "SELECT * FROM tournament WHERE tournament_id = $tournament_id";

if(mysqli_query($db_connect, $query)) {
	
} else {
	echo "Du är inte med i några turneringar än! Skapa en eller be dina kompisar om en inbjudan!";
}
//Finlir med isset knapp osv behöver kirras.
/*$user_id = $_SESSION["user_id"];*/
/*
for ($i=0; $i < count($_POST["game_id"]); $i++) { 
	$query = "INSERT INTO bets (game_id, team_id, user_id, tournament_id, goal) VALUES('".$_POST['game_id'][$i]."', '".$_POST['team_id'][$i]."', $user_id, 1, '".$_POST['goal'][$i]."')";
	if(mysqli_query($db_connect, $query)) {
		echo "SUccess mf!";
		// header('Location: ../bet.php');
	} else {
		echo "Error: ". $query . "<br>" . mysqli_error($db_connect);
	}
}
*/