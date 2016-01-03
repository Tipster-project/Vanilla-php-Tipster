<h1>extra bet</h1>

<?php
include 'db_connect.php';

//Saves the values from the registration form into the database.
$sql = "INSERT INTO results_extra (winning_team, winning_player)
VALUES ('".$_POST['selected_team']."', '".$_POST['player']."' )";

if(mysqli_query($db_connect, $sql)){
	//success
	echo 'Bean Bag';
}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
}
?>