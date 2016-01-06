<h1>extra bet</h1>

<?php
include 'db_connect.php';

//Saves the values from the registration form into the database.
// $sql = "INSERT INTO results_extra (winner_team, winner_player)
// VALUES ('".$_POST['selected_team']."', '".$_POST['player']."' )";

// if(mysqli_query($db_connect, $sql)){
// 	//success
// 	echo 'Bean Bag';
// }else{
// 	// echo a error message if the query dident work.
// 	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
// }

$query2 = "SELECT * FROM user_tournaments";
$result2 = mysqli_query($db_connect, $query2);

//loopar igenom varje rad i user_tournaments
while ( $row = mysqli_fetch_assoc($result2)) {
	$user_id = $row["user_id"];
	$tournament_id = $row["tournament_id"];
	$user_name = $row["user_name"];
	$user_points = $row["user_points"];
	
	//sparar returvärdet från funktionen userExtraPoints
	$points = winnerExtraPoints($user_id, $tournament_id);

	echo $user_points;
	//hämtar funktionen som updaterar personens aktuella poäng
	//echo updateExtraPoints($points, $user_id, $tournament_id);

}





function winnerExtraPoints($user_id, $tournament_id) {
  global $db_connect;
  $points = 0;
 

  //hämtar all info från game_match och results.
  //Vill ha alla matchers resultat för att kunna räkna ut hur många poäng varje lag har.
  $query = "SELECT extra_bets.*, results_extra.* FROM extra_bets, results_extra 
  			WHERE tournament_id = $tournament_id AND user_id = $user_id";

    $result = $db_connect->query($query);
    $points = 0;

    while ($row = mysqli_fetch_assoc($result)) {
      if($row['user_id'] == $user_id) {
         if($row["winning_player"] == $row["winner_player"]) {
              $points = $points +30;
            
          }

          if($row["winning_team"] == $row["winner_team"]) {
              $points = $points +30;        
          }
      }
      
    }
    return $points;
    //updateUserPoints($points, $user_id, $tournament_id);

}

function updateExtraPoints($points, $user_id, $tournament_id){
    global $db_connect;
    
    // $new_points = 0;
    // $query = "SELECT * FROM user_tournaments";
    // $result = mysqli_query($db_connect, $query);

    // $row = mysqli_fetch_assoc($result);

    // $user_points = $row['user_points'];
    // return $user_points;

    mysqli_query($db_connect, "UPDATE user_tournaments SET user_points = $points + $user_points WHERE user_id = '$user_id' AND 
		tournament_id = $tournament_id" );

    return $new_points;
}




?>