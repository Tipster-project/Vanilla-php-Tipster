<h1>extra bet</h1>

<?php
include 'db_connect.php';
session_start();

$user_id = $_SESSION["user_id"];
$tournament_id = $_POST['tournament'];
$team = $_POST['selected_team'];
$player = $_POST['player'];
//Saves the values from the registration form into the database.

//Selects all the specific data to see if there is a record with that user and tournament
$result = mysqli_query($db_connect, "SELECT * FROM extra_bets WHERE user_id = '$user_id' AND tournament_id = '$tournament_id'");

//If a record exist, update with the new info
if($result->num_rows > 0) {
    mysqli_query($db_connect, "UPDATE extra_bets SET winning_team = '$team', winning_player = '$player' WHERE user_id = '$user_id' AND tournament_id = '$tournament_id'");
   	header("Location: ../user_dash.php");
}
//If a record does not exist, insert a new row with the data
else {
    mysqli_query($db_connect, "INSERT INTO extra_bets (user_id, tournament_id, winning_team, winning_player) 
	VALUES ('$user_id', '$tournament_id', '$team', '$player')");
	header("Location: ../user_dash.php");
}


?>