<?php
include 'db_connect.php';
$game_id = $_POST['game_id'];
$home_goal = $_POST['home_goal'];
$away_goal = $_POST['away_goal'];

$result = mysqli_query($db_connect, "SELECT * FROM results WHERE game_id = $game_id ");



if($result->num_rows > 0) {
    mysqli_query($db_connect, "UPDATE results SET goal_home = '$home_goal', goal_away = '$away_goal' WHERE game_id = '$game_id' ");
    header("Location: ../admin_dash.php");
}
else {
    mysqli_query($db_connect, "INSERT INTO results (game_id, goal_home, goal_away) 
	VALUES ('$game_id', '$home_goal', $away_goal)");
    header("Location: ../admin_dash.php");
}
?>
