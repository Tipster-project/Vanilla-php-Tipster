<?php 
include 'includes/db_connect.php';
session_start();

$T_name = $_POST['tournament_name'];
$T_text = $_POST['tournament_text']; 
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
//$email_string = $_POST['invitation-email'];
//$emails = explode(' ', $email_string);


$sql = "INSERT INTO tournament (tournament_name, user_id, tournament_text) 
VALUES ('". $T_name ."', '". $user_id ."', '". $T_text ."') ";

if(mysqli_query($db_connect, $sql)){
	//success
}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
}


$tournament_id = mysqli_insert_id($db_connect);
$sql = "INSERT INTO user_tournaments (user_id, user_name, tournament_id) 
VALUES ('". $user_id ."', '". $user_name ."','". $tournament_id ."')";

if(mysqli_query($db_connect, $sql)){
	//success
}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
}

//$subject = 'Din vän '. $user_name . 'har bjudit in dig till Tippzter';
//$txt = 'För att gå med i '. $user_name .' grupp och registrera dig, tryck på länken';
//$header = ''
//foreach ($emails as $email) {
	
//}
 ?>