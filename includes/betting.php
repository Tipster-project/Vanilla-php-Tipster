<?php require "includes/db_connect.php";

if(isset($_POST["save_bets"])) {
	//Nån smart grej här -> $goal = $_POST[""]
	$away_score = $_POST["away_score"];
	$user_id = $_SESSION["user_id"];
	$game_id = $_POST["game_id"];
	$query = "INSERT INTO bets VALUES(game_id, team_id, user_id, tournament_id, goal)"
}